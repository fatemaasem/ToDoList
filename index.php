<?php 
require_once 'inc/header.php';
require_once 'inc/app.php';

?>
<body>
    <div class="container my-3 ">    
        <div class="row d-flex justify-content-center">
               <?php  $mes->printError();?>
               <?php $mes->printSuccess();?>
               <?php if($ses->get('error')){
                        $ses->unset('error');
                    }
                if($ses->get('success')){
                    $ses->unset('success');
                } ?>
                <div class="container mb-5 d-flex justify-content-center">
                    <div class="col-md-4">
                        <form action="handle/addToDo.php" method="post">
                         <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                         <input type="date" class="input input-bordered input-secondary w-full max-w-xs schedule-date" />
                         <div class="text-center">
                            <button type="submit" name="add" class="form-control text-white bg-info mt-3 " >Add To Do</button>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
        <div class="row d-flex justify-content-between">   
            <!-- all -->
            <div class="col-md-3 "> 
                <h4 class="text-white">All Notes</h4>
                <!-- select all tasks must be done...if there is no task print ( empty to do) -->
                <?php
                $tasks=$db->selectAll('list',"status='todo'");
                $foundTasks=0;
                if(count($tasks)>0)
                $foundTasks=1;
                ?>
                
                <div class="m-2  py-3">
                    <div class="show-to-do">

                            <div class="item">
                                <?php if($foundTasks==0):?>
                                <div class="alert-info text-center ">
                                empty to do
                                </div>
                                <?php endif;?>
                                
                            </div>
                    
                     <?php if($foundTasks==1):foreach ($tasks as $task):?>
                        <div class="alert alert-info p-2">
                        <a href="handle/delete.php?id=<?=$task['id']?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " ><i class="fa fa-close" style="font-size:16px;"></i></a>                                                                

                                <h4 ><?=$task['title']?></h4>
                                <h5><?=$task['created_at']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="edit.php?id=<?=$task['id']?>"class="btn btn-info p-1 text-white" >edit</a>
                                   
                                    <a href="handle/goto.php?id=<?=$task['id']?>&statue='doing'"class="btn btn-info p-1 text-white" >doing</a>
                                </div>
                            
                        </div>
                     <?php endforeach;endif;?>
                    </div>
                </div>
                <!--  -->

                
            </div>
            <!--  -->
            <!-- doing -->
            <div class="col-md-3 ">
            
                <h4 class="text-white">Doing</h4>

                <?php
                $tasks=$db->selectAll('list',"status='doing'");
                $foundTasks=0;
                if(count($tasks)>0)
                $foundTasks=1;
                ?>
                
                <div class="m-2 py-3">
                    <div class="show-to-do">
                            <div class="item">
                            <?php if($foundTasks==0):?>
                                <div class="alert-success text-center ">
                                 empty to do
                                </div>
                                <?php endif;?>
                            </div>
                  
                            <?php if($foundTasks==1):foreach ($tasks as $task):?>
                        <div class="alert alert-info p-2">
                        <a href="handle/delete.php?id=<?=$task['id']?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " ><i class="fa fa-close" style="font-size:16px;"></i></a>                                                                

                                <h4 ><?=$task['title']?></h4>
                                <h5><?=$task['created_at']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="edit.php?id=<?=$task['id']?>"class="btn btn-info p-1 text-white" >edit</a>
                                   
                                    <a href="handle/goto.php?id=<?=$task['id']?>&statue='done'"class="btn btn-info p-1 text-white" >done</a>
                                </div>
                            
                        </div>
                     <?php endforeach;endif;?>
                    </div>
                </div>
            
            </div>
           
            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>
                <?php
                $tasks=$db->selectAll('list',"status='done'");
                $foundTasks=0;
                if(count($tasks)>0)
                $foundTasks=1;
                ?>
                <div class="m-2 py-3">
                    <div class="show-to-do">

                            <div class="item">
                                <?php if($foundTasks==0):?>
                                <div class="alert-warning text-center ">
                                 empty to do
                                </div>
                                <?php endif;?>
                            </div>
                            <?php if($foundTasks==1):foreach ($tasks as $task):?>
                            <div class="alert alert-warning p-2">
                            <a href="handle/delete.php?id=<?=$task['id']?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " ><i class="fa fa-close" style="font-size:16px;"></i></a>                                                                
                                <h4 ><?=$task['title']?></h4>
                               <h5><?=$task['created_at']?></h5>
                        </div>
                        <?php endforeach;endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>