<?php


namespace app\core;


class DB
{
    use TSingletone;

    protected function __construct () {
        $db = require_once CONFIG . '/configDB.php';
        class_alias('\RedBeanPHP\r', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        if ( !\R::testConnection() ) throw new \Exception("Ошибка подключения к Базе Данных", 500);

        \R::freeze(true);
        if (DEBUG) \R::debug(true,1);
    }
}