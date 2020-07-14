<?php


namespace app\controllers;


use app\core\AppController;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta("Главная страница", "Её описание", "Её ключевики");
    }
}
