<?php
namespace toDoList\inc;
class Message{
    public function printError(){//key value is error
        $errors=[];
        if(Session::get('error')){
            if(!is_array(Session::get('error')))
                $errors[]=Session::get('error');
            else
            $errors=Session::get('error');
        ?>
        <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <?php foreach($errors as $error) :?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error?>
                    </div>
                    <?php endforeach;?>
            </div>
        </div>
    </div>
        <?php
        Session::unset('error');
        }
    }
    public function printSuccess(){
        if(Session::get('success')){
          
        ?>
        <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
               
                    <div class="alert alert-success" role="alert">
                        <?= Session::get('success'); Session::unset('success');?>
                    </div>
                   
            </div>
        </div>
    </div>
        <?php
        }
    }
    }
