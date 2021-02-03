<?php


namespace App\lib\Mailer;

abstract class Transport
{

    /**
     * @param $to
     * @param $subject
     * @param $message
     * @param $sender
     * @return mixed
     */
    abstract public function send($to, $subject, $message, $sender);

}
