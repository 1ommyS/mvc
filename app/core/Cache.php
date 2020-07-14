<?php


namespace app\core;


class Cache
{
    use TSingletone;

    public function set (string $key, array $data, int $time = 3600): bool {
        if ( $time ) {
            $content['data'] = $data;
            $content['endTime'] = time() + $time;
            if ( file_put_contents(CACHE . "/" . md5($key) . ".txt", serialize($content)) ) return true;
        }
        return false;
    }

    public function get (string $key) {
        $file = CACHE . '/' . md5($key) . '.txt';
        if ( file_exists($file) ) {
            $content = unserialize(file_get_contents($file));
            if ( time() <= $content['endTime'] ) return $content;
            unlink($file);
        }
        return false;
    }

    public function delete ($key): void {
        $file = CACHE . '/' . md5($key) . '.txt';
        if ( file_exists($file) ) {
            unlink($file);
        }
    }
}