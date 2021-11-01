<?php

namespace App\Lib;
/**
*Session Class
**/
class Session{
    // Session start
    public static function init(){
    if (version_compare(phpversion(), '7.3.0', '>')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }

    // Session value set
    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    // Get session value
    public static function get($key){
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    // Check session for logout user
    public static function checkSession(){
        self::init();
        if (self::get("userlogin")== false) {
            self::destroy();
            header("Location:login.php");
        }
    }

    // Check authenticated user session
    public static function checkLogin(){
        self::init();
        if (self::get("userlogin")== true) {
            header("Location:index.php");
        }
    }

    // session destroy after logout
    public static function destroy(){
        session_destroy();
        header("Location:login.php");
    }
}
?>