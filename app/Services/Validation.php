<?php


namespace App\Services;

use Respect\Validation\Exceptions\ValidationException;

class Validation
{

    public $createForm;

    public $updateForm;

    public $regForm;

    public $setForm;

    public $logForm;


    public function __construct()
    {
        $this->createForm = config('validator.createForm');
        $this->updateForm = config('validator.updateForm');
        $this->regForm    = config('validator.regForm');
        $this->setForm    = config('validator.setForm');
        $this->logForm    = config('validator.logForm');

    }//end __construct()


    // функция проверяет поля формы на правильность заполнения
    public function validate($validator, $fields)
    {
        try {
            $validator->assert($fields);
        } catch (ValidationException $exception) {
            $Messages = [
                'title'      => 'Введите название',
                'content'    => 'Введите описание',
                'image'      => 'Необходимо добавить изображение',
                'terms'      => 'Вы должны согласиться с правилами',
                'username'   => 'Необходимо указать Имя пользователя',
                'email'      => 'Необходимо указать Email',
                'password'   => 'Необходимо указать Пароль',
                'passRepeat' => 'Введенные пароли не совпадают',
            ];
            $errorMsg = $exception->findMessages($Messages);
            flash()->error($errorMsg);

            return back();
        }

    }//end validate()


    public function errorCheck($validator, $fields)
    {
        $this->validate($validator, $fields);

    }//end errorCheck()


}//end class
