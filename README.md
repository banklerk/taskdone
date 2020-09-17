# Проект Taskdone

Учебный проект на курсе «Самый понятный курс по PHP для начинающих»

Ссылка на [проект](http://taskdone.fun/)

## Начало работы

  * Для запуска проекта на локальном необходимо установить сборку веб-сервера XAMPP/MAMP или любой другой подобный софт содержащий Apache, MySQL, интерпретатор скриптов PHP 
  * Установленный менеджер зависимостей Composer
  * `git clone <URL>` - клонируем репозиторий 
  * Переносим проект в папку откуда по умолчанию сборка веб-сервера запускает скрипты (для MAMP это папка `/Applications/MAMP/htdocs/`)
  * Экспортируем во вновь созданную базу MySQL таблицы проекта из файла `taskbase.sql`
  * Устанавливаем все зависимости Composer - вводим команду в терминале `composer install`
  * В файле`config.php` настраиваем доступ к базе данных локального сервера
  * Проект готов к работе


## Структура проекта

```bash
├── app
│   ├── Controllers
│   │   ├── Controller.php
│   │   ├── HomeController.php
│   │   ├── LoginController.php
│   │   ├── RegisterController.php
│   │   ├── ResetPasswordController.php
│   │   └── TasksController.php
│   ├── Services
│   │   ├── Database.php
│   │   ├── ImageManager.php
│   │   ├── Mail.php
│   │   ├── Notifications.php
│   │   ├── RegistrationService.php
│   │   └── Validation.php
│   ├── Views
│   │   ├── auth
│   │   │   ├── login.php
│   │   │   ├── password-recovery.php
│   │   │   ├── password-set.php
│   │   │   ├── register.php
│   │   │   └── verification-form.php
│   │   ├── home.php
│   │   ├── layout.php
│   │   ├── partials
│   │   │   ├── footer.php
│   │   │   ├── navigation.php
│   │   │   └── pagination.php
│   │   └── tasks
│   │       ├── create.php
│   │       ├── edit.php
│   │       ├── index.php
│   │       └── show.php
│   ├── config.php
│   ├── helpers.php
│   └── routes.php
│   
├── Web
│   ├── css
│   ├── img
│   │   ├── favicon
│   │   └── placeholders
│   ├── uploads
│   ├── js
│   ├── site.webmanifest
│   └── index.php
├── composer.json
└──  README.md
```

## Используемые библиотеки

  * `nikic/fast-route` – быстрый роутинг, основанный на регулярных выражениях
  * `league/plates` – шаблонизатор
  * `aura/sqlquery` – генератор запросов SQL
  * `intervention/image` – библиотека для работы с изображениям
  * `delight-im/auth` – регистрация/аутентификации пользователей
  * `swiftmailer/swiftmailer` – библиотека для отправки электронных писем
  * `php-di/php-di` – сервис контейнер для реализации механизма внедрения зависимостей 
  * `respect/validation`– удобный инструмент валидации данных
  * `tamtamchik/simple-flash`– библиотека для вывода флеш-уведомлений
  * `jasongrimes/paginator`– вывод записей из базы данных постранично