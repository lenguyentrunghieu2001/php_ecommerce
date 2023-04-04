<?php

class Session
{
    public function __construct()
    {
    }

    public static function init()
    {
    }


    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }



    public static function unset($key)
    {
        unset($key);
    }

    public static function destroy()
    {
        session_destroy();
    }
}
