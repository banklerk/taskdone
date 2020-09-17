# Проект Taskdone

Учебный проект на курсе «Самый понятный курс по PHP для начинающих»

## Начало работы

  Для запуска проекта на локальном сервере необходимо:
  * установить сборку веб-сервера XAMPP/MAMP или любой другой подобный софт содержащий Apache, MySQL, интерпретатор скриптов PHP 
  * установленный менеджер зависимостей Composer
  * `git clone <URL>` - скачать репозиторий 
  * перенести проект в папку откуда по умолчанию сборка веб-сервера запускает скрипты (для MAMP это папка `/Applications/MAMP/htdocs/`)
  * экспортировать во вновь созданную базу MySQL таблицы проекта из файла `taskbase.sql`
  * устанавить все зависимости Composer (ввести команду в терминале `composer install`)
  * в файле`config.php` настроить доступ к базе данных локального сервера
  * проект готов к работе

  [**Онлайн демо**](http://taskdone.fun/)

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
  * `intervention/image` – плагин для работы с изображениям
  * `delight-im/auth` – регистрация/аутентификации пользователей
  * `swiftmailer/swiftmailer` – клиент для отправки электронных писем
  * `php-di/php-di` – сервис контейнер для реализации механизма внедрения зависимостей 
  * `respect/validation`– удобный инструмент валидации данных
  * `tamtamchik/simple-flash`– плагин для вывода флеш-уведомлений
  * `jasongrimes/paginator`– вывод записей из базы данных постранично