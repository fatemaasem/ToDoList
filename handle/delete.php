<?php
require_once "../inc/app.php";
if($req->get('id')){
    $id=$req->get('id');
    $db->delete('list',"id=$id");
    $req->redirect('../index.php');
}
else{
    $req->redirect('../index.php');
}