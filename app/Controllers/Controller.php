<?php
namespace App\Controllers;

use App\Services\Database;
use Delight\Auth\Auth;
use League\Plates\Engine;
use PDO;

class Controller
{

    protected $view;

    protected $database;

    protected $auth;


    public function __construct()
    {
        $this->view     = components(Engine::class);
        $this->database = components(Database::class);
        $this->auth     = components(Auth::class);

    }//end __construct()


}//end class
