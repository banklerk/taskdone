<?php


namespace App\Services;


class Notifications
{

    private $mailer;


    public function __construct(Mail $mailer)
    {
        $this->mailer = $mailer;

    }//end __construct()


    // функция отправляет сообщение при смене почты/первичной регистрации
    public function emailWasChanged($email, $selector, $token): void
    {
        $message = ROOT_PATH.'/verify_email?selector='.\urlencode($selector).'&token='.\urlencode($token);
        $this->mailer->send($email, $message);

    }//end emailWasChanged()


    // функция отправялет сообщение при сбросе пароля
    public function passwordReset($email, $selector, $token): void
    {
        $message = ROOT_PATH.'/password-recovery/form?selector='.\urlencode($selector).'&token='.\urlencode($token);
        $this->mailer->send($email, $message);

    }//end passwordReset()


}//end class
