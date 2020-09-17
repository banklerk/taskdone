<?php


namespace App\Services;


use Delight\Auth\Auth;
use Delight\Auth\InvalidSelectorTokenPairException;
use Delight\Auth\TokenExpiredException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;
use Delight\Auth\Role;

class RegistrationService
{

    private $auth;

    private $database;

    private $notifications;


    public function __construct(Auth $auth, Database $database, Notifications $notifications)
    {
        $this->auth          = $auth;
        $this->database      = $database;
        $this->notifications = $notifications;

    }//end __construct()


    // функция вносит нового пользователя в таблицу и отправляет письмо на указанную почту для верификации пользователя
    public function make($email, $password, $username): int
    {
        $userId = $this->auth->register(
            $email,
            $password,
            $username,
            function ($selector, $token) use ($email) {
                $this->notifications->emailWasChanged($email, $selector, $token);
            }
        );
        $this->database->update('users', $userId, ['roles_mask' => Role::AUTHOR]);

        return $userId;

    }//end make()


    // функция сверяет токен с базой
    public function verify($selector, $token): string
    {
        try {
            $this->auth->confirmEmail($selector, $token);
            flash()->success(['Ваш email подвержден! Добро пожаловать!']);
        } catch (InvalidSelectorTokenPairException $e) {
            flash()->error(['Неверный токен']);
        } catch (TokenExpiredException $e) {
            flash()->error(['Срок действия токена истек']);
        } catch (UserAlreadyExistsException $e) {
            flash()->error(['Email уже существует']);
        } catch (TooManyRequestsException $e) {
            flash()->error(['Превышен лимит попыток верификации']);
        }

        return redirect('/login');

    }//end verify()


}//end class
