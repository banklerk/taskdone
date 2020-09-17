<?php

namespace App\Controllers;

use App\Services\ImageManager;
use App\Services\Validation;

class TasksController extends Controller
{

    private $imageManager;

    private $validation;


    public function __construct(ImageManager $imageManager, Validation $validation)
    {
        parent::__construct();
        $this->imageManager = $imageManager;
        $this->validation   = $validation;

    }//end __construct()


    // экшн вывода списка задач пользователя постранично
    public function index(): void
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $perPage = 6;

        $userId    = $this->auth->getUserId();
        $myTasks   = $this->database->getPaginatedFrom('tasks', 'user_id', $userId, $page, $perPage);
        $paginator = paginate(
            $this->database->getCount('tasks', 'user_id', $userId),
            $page,
            $perPage,
            '/tasks?page=(:num)'
        );
        echo $this->view->render('tasks/index', ['data' => $myTasks, 'paginator' => $paginator]);

    }//end index()


    // экшн вывода задачи пользователя по его $id
    public function show($id): void
    {
        $myTask = $this->database->getOne('tasks', $id);
        echo $this->view->render('tasks/show', ['task' => $myTask]);

    }//end show()


    // отрисовка формы для создания задачи
    public function create(): void
    {
        echo $this->view->render('tasks/create');

    }//end create()


    // экшн сохранение новой задачу
    public function store(): void
    {
        $attribute = $this->validation->createForm;
        $fields    = array_merge($_POST, $_FILES);
        $this->validation->errorCheck($attribute, $fields);
        $image = $this->imageManager->uploadImage($_FILES['image']);
        $data  = [
            'image'   => $image,
            'title'   => $_POST['title'],
            'content' => $_POST['content'],
            'user_id' => $this->auth->getUserId(),
            'date'    => time(),
        ];
        $this->database->store('tasks', $data);

        flash()->success(['Спасибо! Картинка загружена']);

        back();

    }//end store()


    // отрисовка формы для внесения изменений в задачу
    public function edit($id): void
    {
        $myTask = $this->database->getOne('tasks', $id);
        echo $this->view->render('tasks/edit', ['task' => $myTask]);

    }//end edit()


    // экшн изменение\обновление существующей задачи
    public function update($id): void
    {
        $attribute = $this->validation->updateForm;
        $fields    = array_merge($_POST, $_FILES);
        $this->validation->errorCheck($attribute, $fields);
        $task  = $this->database->getOne('tasks', $id);
        $image = $this->imageManager->uploadImage($_FILES['image'], $task['image']);
        $data  = [
            'image'   => $image,
            'title'   => $_POST['title'],
            'content' => $_POST['content'],
            'user_id' => $this->auth->getUserId(),
        ];
        $this->database->update('tasks', $id, $data);

        flash()->success(['Запись успешно обновлена']);

        back();

    }//end update()


    // экшн удаление задачи
    public function delete($id)
    {
        $task = $this->database->find('tasks', $id);
        if ($task['user_id'] != $this->auth->getUserId()) {
            flash()->error(['Можно редактировать только свои записи.']);
            return redirect('/tasks');
        }

        $this->imageManager->deleteImage($task['image']);
        $this->database->delete('tasks', $id);

        return back();

    }//end delete()


}//end class
