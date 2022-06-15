<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotifications extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModel;


    public $data;

    /**
     * @var view
     */
    public $view;

    /**
     * MailNotifications constructor.
     * @param $data
     * @param $view
     */
    public function __construct($data,$view)
    {
        //
        $this->data = $data;
        $this->view = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view);
    }
}
