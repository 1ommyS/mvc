<?php


namespace app\core\base;


use app\core\DB;

class Model
{
    public $attributs = [];
    public $errors = [];
    public $rules = [];

    public function __construct () {
        DB::instance();
    }

}