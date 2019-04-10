<?php

namespace App\Listeners;

use App\Events\ReadAdd;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReadAddListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ReadAdd  $event
     * @return void
     */
    public function handle(ReadAdd $event)
    {
        //
        //使用 $event->order 来访问 order ...
        $event->topic->increment('view_count',1);
        //$event->topic->save();

        info("文章访问加一",[
            'id'=>$event->topic->id,
            'title'=>$event->topic->title,
            'view_count'=>$event->topic->view_count
        ]);

    }
}
