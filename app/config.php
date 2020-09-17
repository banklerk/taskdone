<?php

use Respect\Validation\Validator as v;

return [
    'mail'          => [
        'smtp'       => 'smtp.gmail.com',
        'port'       => 587,
        'encryption' => 'tls',
        'email'      => 'banqlerk@gmail.com',
        'password'   => 'bdvu akuk flgl chxj',
    ],
    'database'      => [
        'driver'   => 'mysql',
        'host'     => 'localhost',
        'db_name'  => 'taskbase',
        'username' => 'root',
        'password' => 'root',
    ],
    'validator'     => [
        'createForm' => v::key('title', v::stringType()->notEmpty())->key('content', v::stringType()->notEmpty())->keyNested('image.tmp_name', v::image()),
        'updateForm' => v::key('title', v::stringType()->notEmpty())->key('content', v::stringType()->notEmpty())->keyNested('image.tmp_name', v::optional(v::image())),
        'regForm'    => v::key('username', v::stringType()->notEmpty())->key('email', v::email())->key('password', v::stringType()->notEmpty())->key('terms', v::trueVal())->keyValue('passRepeat', 'equals', 'password'),
        'setForm'    => v::key('password', v::stringType()->notEmpty())->keyValue('passRepeat', 'equals', 'password'),
        'logForm'    => v::key('password', v::stringType()->notEmpty())->key('email', v::email()),
    ],
    'uploadsFolder' => 'uploads/',
    'views_path'    => '../app/Views/',
];
