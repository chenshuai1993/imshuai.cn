<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2019/3/18
 * Time: 18:35
 */

namespace App\Services;

#引入模型
use App\Models\Tags;
use App\Models\Topic;
use Auth;
use DB;

class TopiceService
{
    public $topic;
    public $tags;


    public function __construct(Topic $topic, Tags $tags)
    {
        $this->topic = $topic;
        $this->tags = $tags;

    }

    public function store(array $request)
    {


        $tags = [];
        $tagsIds = [];


        if($request['tags']){
            $tags = explode(',',$request['tags']);
            foreach ($tags as $key => $val){
                $this->tags::firstOrCreate(
                    [
                        'name'=>$val
                    ]
                );

            }
            $tagsIds =  $this->tags::whereIn('name',$tags)->pluck('id')->toArray();
            unset($request['tags']);
        }

        $this->topic->fill($request);
        $this->topic->user_id = Auth::id();

        info($request['body']);
        $this->topic->save();
        $this->topic->tags()->attach($tagsIds);

    }


    public function update(Topic $topic, array $request)
    {
        $oldTags = [];
        $delTags = [];
        $addTags = [];
        $addTagsIds = [];

        $topic->update($request);

        if($request['tags']){
            $tags = explode(',',$request['tags']);


            $oldTagsCollection = $topic->tags->pluck('name');
            $delTags = $oldTagsCollection->diff($tags)->all();
            $addTags = collect($tags)->diff($oldTagsCollection)->all();

            if($delTags){
                $tagsIds =  $this->tags::whereIn('name',$delTags)->pluck('id')->toArray();
                $topic->tags()->detach($tagsIds);
            }

            if($addTags){
                foreach ($addTags as $key => $val){
                    $this->tags::firstOrCreate(
                        [
                            'name'=>$val
                        ]
                    );
                }
                $addTagsIds =  $this->tags::whereIn('name',$addTags)->pluck('id')->toArray();
                $topic->tags()->attach($addTagsIds);
            }
        }
    }
}