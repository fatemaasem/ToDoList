<?php 
require_once "../inc/app.php";
//check the previous page is is edit.php
if($req->checkPost('edit')){
    if($req->get('id')){
        $id=$req->get('id');
        $title =$req->post('title');
        $date =$req->post('date');
        //validation 
        $title=$req->validateString($title);
        if($title){//there is no error
            //make update
            if(!empty($date))
                $insert=$db->insert("`title`,`created_at`","'$title','$date'",'list');
            else
                $insert=$db->insert("`title`","'$title'",'list');
            //if there is an error insert redirect to index.php with error
                $req->redirect('../index.php');
        }
        else{//if there are errors on validation
            $req->redirect("../edit.php?id=$id"); 
         
        }
    }
    else{
        $ses->set('error','There is not define taste');echo "3";
        $req->redirect('../edit.php');
    }
}
else{
    $req->redirect('../edit.php');
}
?>