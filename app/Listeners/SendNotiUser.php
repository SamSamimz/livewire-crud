<?php

namespace App\Listeners;

use App\Events\StudentCreated;
use App\Mail\NotiMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotiUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StudentCreated $event): void
    {
        $student = $event->student;
        $users = User::all();
        foreach($users as $user) {
            Mail::to($user->email)->send(new NotiMail($student));
        }
    }
}
