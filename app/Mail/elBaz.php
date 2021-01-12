<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class elBaz extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $view;
    public $id;

    public function __construct($view,$id)
    {
        //
        //return $this->markdown($view,['id',$id]);
        $this->view=$view;
        $this->id=$id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('');
        return $this->view($this->view)->with(['id'=>$this->id,]);
    }
}
