<?php
namespace toDoList\inc;
class Request{
    public function get($key){
        if(isset($_GET[$key]))
            return $_GET[$key];
        else
        return false;
    }
    public function post($key){
        return (isset($_POST[$key])?$_POST[$key]:false);
    }
    public function checkPost($data){
        return isset($_POST[$data])?true :false;
    }
    public function checkGet($data){
        return isset($_GET[$data])?true :false;
    }
    public function filter($data){
        return trim(htmlspecialchars($data));
    }
    public function validateString($str){//return title  or false
        $errors=[];
        $str=$this->filter($str);
        if(strlen($str)==0){
            $errors[]="Title can not be empty";
        }
        if(is_numeric($str)){
            $errors[]="Title can not be string";
        }
        Session::set('error',$errors);
       if(empty($errors))
            return $str;
        else
            return false;
    }
    public function redirect($page){
        header("location:$page");
    }
}
