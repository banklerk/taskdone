<?php


namespace App\Controllers;


use App\Services\Notifications;
use App\Services\Validation;
use Delight\Auth\EmailNotVerifiedException;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\InvalidSelectorTokenPairException;
use Delight\Auth\ResetDisabledException;
use Delight\Auth\TokenExpiredException;
use Delight\Auth\TooManyRequestsException;

class ResetPasswordController extends Controller
{

    public $notifications;

    public $validation;


    public function __construct(Notifications $notifications, Validation $validation)
    {
        parent::__construct();
        $this->notifications = $notifications;

        $this->validation = $validation;

    }//end __construct()


    // отрисовка формы восстановление пароля
    public function showForm()
    {
        echo $this->view->render('auth/password-recovery');

    }//end showForm()


    // отрисовка формы повторной отправки письма для подтверждения адреса почты
    public function resendForm()
    {
        echo $this->view->render('auth/verification-form');

    }//end resendForm()


    // экшн сверка почты с таблицей "users" и отправка письма для смены пароля
    public function recovery()
    {
        try {
            $this->auth->forgotPassword(
                $_POST['email'],
                function ($selector, $token) {
                    $this->notifications->passwordReset($_POST['email'], $selector, $token);
                    flash()->success(['Код сброса пароля был отправлен вам на почту.']);
                }
            );
        } catch (InvalidEmailException $e) {
            flash()->error(['Такого адреса нет / поле Email пустое']);
        } catch (EmailNotVerifiedException $e) {
            flash()->error(['Адрес почты не верифицирован']);
        } catch (ResetDisabledException $e) {
            flash()->error(['Опция восстановить пароль отключена']);
        } catch (TooManyRequestsException $e) {
            flash()->error(['Превышено количество попыток смены пароля']);
        }

        return back();

    }//end recovery()


    // отрисовка формы ввода нового пароля
    public function showSetForm()
    {
        if ($this->auth->canResetPassword($_GET['selector'], $_GET['token'])) {
            echo $this->view->render('auth/password-set', ['data' => $_GET]);
        }

    }//end showSetForm()


    // экшн внесение нового пороля в таблицу "users"
    public function change()
    {
        $attribute = $this->validation->setForm;
        $this->validation->errorCheck($attribute, $_POST);
        try {
            $this->auth->resetPassword($_POST['selector'], $_POST['token'], $_POST['password']);

            flash()->success(['Пароль успешно изменен.']);
            return redirect('/login');
        } catch (InvalidSelectorTokenPairException $e) {
            flash()->error(['Неверный токен']);
        } catch (TokenExpiredException $e) {
            flash()->error(['Токен просрочен']);
        } catch (ResetDisabledException $e) {
            flash()->error(['Опция восстановить пароль отключена']);
        } catch (InvalidPasswordException $e) {
            flash()->error(['Введите пароль']);
        } catch (TooManyRequestsException $e) {
            flash()->error(['Превышено количество попыток смены пароля']);
        }//end try

        return back();

    }//end change()


}//end class
