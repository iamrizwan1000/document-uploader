<?php

namespace App\Jobs;

use App\Mail\InvitationEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class InviteUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $token;
    public $clickToAccount;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$token,$clickToAccount)
    {
        $this->email = $email;
        $this->token = $token;
        $this->clickToAccount = $clickToAccount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new InvitationEmail($this->token,$this->clickToAccount));
    }
}
