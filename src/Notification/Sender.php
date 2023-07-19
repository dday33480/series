<?php

namespace App\Notification;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\User\UserInterface;

class Sender 
{
    protected $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendNewUserNotification(UserInterface $user): void {

        $message = new Email();
        $message->from('accounts@series.com')
                ->to('admin@series.com')
                ->subject('New account created')
                ->html('<h1>New account created!</h1>email: ' . $user->getEmail());
        
        $this->mailer->send($message);
    }
}