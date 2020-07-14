<?php


namespace app\core\base;


abstract class Controller
{
    protected array $route;
    protected string $controller;
    protected string $model;
    protected string $view;
    protected string $prefix;
    protected $layout;
    protected array $data = [];
    protected array $meta = ['title' => '', 'description' => '', 'keywords' => ''];

    public function __construct (array $route) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function getView (): void {
        $viewObject = new View($this->route, $this->meta, $this->layout, $this->view);
        $viewObject->render($this->data);
    }

    protected function setData (array $data): void {
        $this->data = $data;
    }

    public function setMeta (string $title = '', string $description = '', string $keywords = ''): void {
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }

}