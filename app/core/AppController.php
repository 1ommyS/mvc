<?php

namespace app\core;


use app\core\base\Controller;

class AppController extends Controller
{
    public function __construct (array $route) {
        parent::__construct($route);
        new AppModel();
    }
}