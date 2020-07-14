<?php


namespace app\core;


use app\components\Router;

class App
{
    public static $app;

    public function __construct () {
        $query = trim($_SERVER['QUERY_STRING'], "/");
        session_start();
        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();

        try {
            Router::dispatch($query);
        } catch ( \Exception $e ) {
        }
    }

    protected function getParams () {
        $params = require_once CONFIG . "/params.php";
        if ( !empty($params) ) {
            foreach ( $params as $k => $v ) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}