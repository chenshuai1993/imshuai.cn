<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use Tymon\JWTAuth\Contracts\JWTSubject; //jwt

class User extends Authenticatable implements JWTSubject
{
    use HasRoles; //模型

    use Traits\ActiveUserHelper; //引入模型
    use Traits\LastActivedAtHelper; //记录用户最后登录时间
    


    
    use Notifiable {
        notify as protected laravelNotify;
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','introduction','phone', 'weixin_openid', 'weixin_unionid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Rest omitted for brevity
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    //jwt
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function topics()
    {
        return $this->hasMany(Topic::class);
    }


    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

    //一个人对应多个回复
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    //通知
    public function notify($instance)
    {
        // 如果要通知的人是当前用户，就不必通知了！
        if ($this->id == Auth::id()) {
            return;
        }
        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }

    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }


}
