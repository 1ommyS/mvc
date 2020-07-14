<?php


namespace app\core\base;


class View
{
    protected array $route;

    protected string $controller;
    protected string $model;
    protected string $view;
    protected string $prefix;
    protected $layout;

    protected array $data = [];
    protected array $meta = [];


    public function __construct (array $route, $meta, $layout = '', string $view = '') {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;

        if ( $layout === false ) {
            $this->layout = false;
        } else {
            $this->layout = $layout ? $layout : LAYOUT;
        }
    }

    public function render (array $data): void {
        if ( is_array($data) ) extract($data);

        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

        if ( file_exists($viewFile) ) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception("Не найден View: {$viewFile}", 500);
        }

        if ( $this->layout !== false ) {
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";

            if ( file_exists($layoutFile) ) require_once $layoutFile; else throw new \Exception("Не найден LayOut: {$layoutFile}", 500);

        }
    }

    public function getMeta (): string {
        $output = "<title>{$this->meta['title']}</title>\n";
        $output .= "<meta name='description' content='{$this->meta['description']}'>\n";
        $output .= "<meta name='keywords' content='{$this->meta['keywords']}'>\n";
        return $output;
    }

}