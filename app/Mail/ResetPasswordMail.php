<?php

namespace App\Mail;

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Member;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The user instance.
     *
     * @var Order
     */
    public $member;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Member $member, $password)
    {
        $this->member = $member;
        $this->password = $password;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.resetpassword');
    }
}
