<?php
class Cookie{
    private $cookie_name;
    private $cookie_value;

    public static function setCookie($cookie_name,$cookie_value){
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }
    public static function deleteCookie($cookie_name ,$cookie_value){
        unset($cookie_value);
        setcookie($cookie_name, '', time() - 3600, '');
    }
}