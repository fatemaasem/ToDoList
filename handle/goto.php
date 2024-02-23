<?php 
require_once "../inc/app.php";
//check the previous page is is edit.php
    if($req->get('id')&&$req->get('statue')){echo "kl;";
        $id=$req->get('id');
        $statue=$req->get('statue');
        //make update
        $db->update("`status`","`status`=$statue ",'list',"id=$id");
        //if there is an error insert redirect to index.php with error
        $req->redirect('../index.php');
    }
    else{
        $ses->set('error','There is not define taste');
        $req->redirect('../index.php');
    }

?>
