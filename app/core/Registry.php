<?php


namespace app\core;


class Registry
{
    use TSingletone;

    protected static array $properties = [];


    public function setProperty (string $name, $value): void {
        self::$properties[$name] = $value;
    }

    public function getProperty (string $name) {
        if ( isset(self::$properties[$name]) ) return self::$properties[$name];
        return null;
    }


    public static function getProperties (): array {
        return self::$properties;
    }

}