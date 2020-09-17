<?php

use App\Services\ImageManager;
use Delight\Auth\Auth;
use JasonGrimes\Paginator;


$scheme = ($_SERVER['HTTP_SCHEME'] ?? (
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
        443 == $_SERVER['SERVER_PORT']
    )) ? 'https://' : 'http://';

define('ROOT_PATH', $scheme .$_SERVER['SERVER_NAME']);
define('APP_PATH', ROOT_PATH.'/tasks');


function back()
{
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;

}//end back()


function redirect($path)
{
    header("Location: $path");
    exit;

}//end redirect()


function config($field)
{
    $config = include '../app/config.php';
    return array_get($config, $field);

}//end config()


function auth()
{
    global $container;
    return $container->get(Auth::class);

}//end auth()


function components($name)
{
    global $container;
    return $container->get($name);

}//end components()


function uploadedDate($timestamp)
{
    return date('d.m.Y', $timestamp);

}//end uploadedDate()


function getImage($image)
{
    return (new ImageManager())->getImage($image);

}//end getImage()


function paginate($count, $page, $perPage, $url)
{
    $totalItems   = $count;
    $itemsPerPage = $perPage;
    $currentPage  = $page;
    $urlPattern   = $url;

    $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    return $paginator;

}//end paginate()


function paginator($paginator)
{
    include config('views_path').'partials/pagination.php';

}//end paginator()
