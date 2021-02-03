<?php


namespace App\lib\Mailer;


class Mailer
{
    protected $transport;

    public function __construct(Transport $type)
    {
        $this->transport = $type;
    }

    public function send($to, $subject, $message, $sender)
    {
        $this->transport->send($to, $subject, $message, $sender);
    }
}
