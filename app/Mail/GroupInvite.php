<?php

namespace App\Mail;

use App\Group;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GroupInvite extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var Group
     */
    public $group;

    /**
     * Create a new message instance.
     *
     * @param Group $group
     */
    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.invite_to_group');
    }
}
