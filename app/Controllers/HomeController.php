<?php


namespace App\Controllers;


use App\Services\ImageManager;


class HomeController extends Controller
{

    public $imageManager;


    public function __construct(ImageManager $imageManager)
    {
        parent::__construct();
        $this->imageManager = $imageManager;

    }//end __construct()


    // функция выводит список задач пользователя с таблицы "tasks" и имя пользователя с таблицы "users"
    public function home(): void
    {
        $data      = [
            'tasks.id',
            'title',
            'content',
            'image',
            'date',
            'username',
        ];
        $tasksPlus = $this->database->joinTables($data, 'tasks', 'users', 'tasks.user_id = users.id', 9);

        echo $this->view->render('/home', ['data' => $tasksPlus]);

    }//end home()


}//end class
