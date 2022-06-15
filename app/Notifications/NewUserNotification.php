<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [/*'mail',*/'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }*/

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $response =  [
                        'name'=>$this->user->name,
                        'surname'=>$this->user->surname,
                        'email'=>$this->user->email,
                        'username'=>$this->user->email,
                    ];

        if($this->user->category == 0){
            $response['message'] = __('message.user.new-visitor-created',['name'=> $this->user->name.' '.$this->user->surname]);
        }else if($this->user->category == 1){
            $response['message'] = __('message.user.new-event-planner-created',['name'=> $this->user->name.' '.$this->user->surname]);
        }

        return $response;
    }
}
