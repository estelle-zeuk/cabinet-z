<?php

namespace App\Mail;

use App\Repositories\EnquiriesRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;

    public $view;

    /**
     * EnquiryMessage constructor.
     * @param $data
     * @param $view
     */
    public function __construct($data, $view)
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
