<?php

namespace app\controllers;


use app\models\AppModel;
use app\core\base\Controller;

class AppController extends Controller
{
    public function __construct (array $route) {
        parent::__construct($route);
        new AppModel();
    }
}