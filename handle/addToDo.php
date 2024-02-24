<?php
require_once "../inc/app.php";
//check the previous page is is index.php
if($req->checkPost('add')){
    $title =$req->post('title');
    $date=$req->post('date');
    //validation 
    $title=$req->validateString($title);
    if($title){//there is no error
        //make insert
        if(!empty($date))
        $insert=$db->insert("`title`,`created_at`","'$title','$date'",'list');
       else
        $insert=$db->insert("`title`","'$title'",'list');
        //if there is an error insert redirect to index.php with error
            $req->redirect('../index.php');
    }
    else{//if there are errors on validation
        $req->redirect('../index.php');
    }
    
}
else{
   $req->redirect('../index.php');
}