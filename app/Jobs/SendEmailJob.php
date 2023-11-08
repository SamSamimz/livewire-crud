<?php

namespace App\Jobs;

use App\Mail\NotiMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $student;
    public function __construct($student)
    {
        $this->student = $student;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new NotiMail($this->student));
        };
    }
}
