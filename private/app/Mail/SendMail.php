<?php

namespace App\Mail;

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Member;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The user instance.
     *
     * @var Order
     */
    public $member;
    public $verification_code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Member $member, $verification_code)
    {
        $this->member = $member;
        $this->verification_code = $verification_code;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verify');
    }
}
