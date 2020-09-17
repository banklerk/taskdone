<?php


namespace App\Controllers;

use App\Services\Validation;
use Delight\Auth\EmailNotVerifiedException;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;

class LoginController extends Controller
{

    public $validation;


    public function __construct(Validation $validation)
    {
        parent::__construct();

        $this->validation = $validation;

    }//end __construct()


    // отрисовка формы авторизации на сайте
    public function showForm()
    {
        echo $this->view->render('auth/login');

    }//end showForm()


    // экшн сверка данных из формы с данными из таблицы "users" (вход в систему)
    public function login()
    {
        $attribute = $this->validation->logForm;
        $this->validation->errorCheck($attribute, $_POST);

        try {
            $rememberDuration = null;

            if (isset($_POST['remember'])) {
                $rememberDuration = (int) (60 * 60 * 24 * 365.25);
            }

            $this->auth->login($_POST['email'], $_POST['password'], $rememberDuration);

            return redirect('/tasks');
        } catch (InvalidEmailException $e) {
            flash()->error(['Неверно указан пароль / адрес почты']);
        } catch (InvalidPasswordException $e) {
            flash()->error(['Неверно указан пароль / адрес почты']);
        } catch (EmailNotVerifiedException $e) {
            flash()->error(['Адрес почты не подтвержден']);
        } catch (TooManyRequestsException $e) {
            flash()->error(['Превышено количество попыток входа']);
        }

        return back();

    }//end login()


    // экшн "выход пользователя из системы"
    public function logout()
    {
        $this->auth->logOut();

        return redirect('/');

    }//end logout()


}//end class
