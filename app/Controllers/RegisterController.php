<?php

namespace App\Controllers;


use App\Services\RegistrationService;
use App\Services\Validation;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;

class RegisterController extends Controller
{

    private $registration;

    private $validation;


    public function __construct(RegistrationService $registration, Validation $validation)
    {
        parent::__construct();
        $this->registration = $registration;

        $this->validation = $validation;

    }//end __construct()


    // отрисовка формы регистрации на сайте
    public function showForm(): void
    {
        echo $this->view->render('auth/register');

    }//end showForm()


    // экшн добавление нового пользователя в таблицу и отправка письма на указанную почту для верификации пользователя
    public function register()
    {
        $attribute = $this->validation->regForm;
        $this->validation->errorCheck($attribute, $_POST);
        try {
            $this->registration->make(
                $_POST['email'],
                $_POST['password'],
                $_POST['username']
            );
            flash()->success(['На вашу почту '.$_POST['email'].' был отправлен код с подтверждением.']);

            return redirect('/login');
        }//end try
        catch (InvalidEmailException $e) {
            flash()->error(['Неверно указан адрес почты']);
        } catch (InvalidPasswordException $e) {
            flash()->error(['Неверно указан пароль']);
        } catch (UserAlreadyExistsException $e) {
            flash()->error(['Пользователь уже существует']);
        } catch (TooManyRequestsException $e) {
            flash()->error(['Превышен лимит попыток регистрации']);
        }

        return redirect('/register');

    }//end register()


    // экшн верификация пользователя
    public function verify(): string
    {
        $this->registration->verify($_GET['selector'], $_GET['token']);

    }//end verify()


}//end class
