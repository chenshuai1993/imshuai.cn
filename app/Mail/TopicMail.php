<?php

namespace App\Mail;

use App\Models\Topic;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class TopicMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $topic;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Topic $topic)
    {
        //
        $this->topic = $topic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.topic')
                    ->with([
                      'title'=>$this->topic->title
                    ]);

    }
}
