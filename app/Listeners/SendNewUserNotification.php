<?php

namespace App\Listeners;

use App\Repositories\UserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewUserNotification;

class SendNewUserNotification implements ShouldQueue
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * Create the event listener.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        //
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $companyAdmins = $this->userRepository->getUserByCategory(1);

        \Notification::send($companyAdmins, new NewUserNotification($event->user));
    }
}
