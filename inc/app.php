<?php
require_once "db.php";
require_once "request.php";
require_once "session.php";
require_once "message.php";
use toDoList\inc\Message;
use toDoList\inc\Request;
use toDoList\inc\Session;
use toDoList\inc\DB;
$db=new DB('localhost','root','','to_do_list');
$req=new Request;
$ses=new Session;
$ses->start();
$mes=new Message;

