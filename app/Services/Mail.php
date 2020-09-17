<?php


namespace App\Services;


use Swift_Mailer;
use Swift_Message;

class Mail
{

    private $mailer;


    public function __construct(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;

    }//end __construct()


    // функция готовит сообщение к отправке
    public function send($email, $body): int
    {
        $message = (new Swift_Message('Project Task-done'))->setFrom(['info@tasks.com' => 'Подтвердите почту - пройдите по ссылке'])->setTo($email)->setBody($body);

        return $this->mailer->send($message);

    }//end send()


}//end class
