<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EmailSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;



      protected $message = '';

      protected $email = '';

       protected $from = '';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $email, $from)
    {
       $this->message = $message;
        $this->email = $email;
        $this->from = $from;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $email = new EmailVerification($this->user);
      Mail::to($this->user->email)->send($email);
    }
}
