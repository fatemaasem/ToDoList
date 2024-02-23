<?php
require_once 'inc/header.php';
require_once 'inc/app.php';
?>
<?php 
if($req->get('id')){
    $id=$req->get('id');
}
else{
    $req->redirect("index.php");
}
?>
<body class="container w-50 mt-5">
<?php $mes->printError();?>
    <form action="handle/edit.php?id=<?=$id?>" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"></textarea>
            <div class="text-center">
                <button type="submit" name="edit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>