<?php
namespace toDoList\inc;
class Session{
    public function start(){
        session_start();
    }
    public static function set($key,$value){
        
        $_SESSION[$key]=$value;
        
    }
    public static function get($key){
       
        return (isset($_SESSION[$key])?$_SESSION[$key]:false);
    }
    public static function unset($key){
        unset($_SESSION[$key]);
    }
    public function destroy(){
        session_destroy();
    }
}
 ?>