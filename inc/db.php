<?php

namespace toDoList\inc;
class DB{
     private $conn ;
     public function __construct($hostname,$username ,$password,$database) {
       $this->conn=mysqli_connect($hostname,$username ,$password,$database);
    }
    public function SelectOne($columns,$table,$cond){
        $row=[];
        $query="select $columns from $table where $cond ";
        $runQuery=mysqli_query($this->conn,$query);
        if(mysqli_num_rows($runQuery)>0){
            $row= mysqli_fetch_assoc($runQuery);
        }
        else{
            
            Session::set('error','this task not found');
        }
        return $row;
    }
    public function SelectAll($table,$cond,$columns="*"){
        $rows=[];
        $query="select $columns from $table where $cond order by id desc";
        $runQuery=mysqli_query($this->conn,$query);
        if(mysqli_num_rows($runQuery)>0){
            while($row=mysqli_fetch_assoc($runQuery)){
                $rows[]=$row;
            }
        }
      
        return $rows;
    }
    
    public function update($columns,$columnsAndValues,$table,$cond){
       //search on this row in the database
        $foundRow=$this->SelectOne($columns,$table,$cond);
        if(count($foundRow)>0){
            $query="update $table set $columnsAndValues where $cond ";
            $runQuery=mysqli_query($this->conn,$query);
            if($runQuery){
                Session::set('success','Updated successfully');
            }
            else{
                
                Session::set('error','There is an error in update');
            }
        }
        else{
            Session::set('error','This task is not found');
        }
    }
    public function insert ($columns,$values,$table){
        
        $query="insert into $table ($columns) values ($values) ";
        $runQuery=mysqli_query($this->conn,$query);
        if($runQuery){
            Session::set('success','insert successfully');
            return true;
        }
        else{
            
            Session::set('error','This an error in insert');
            return false;
        }
    }
    public function delete($table,$cond,$columns="*"){
        //check if this row is found
        $foundRow=$this->SelectOne($columns,$table,$cond);
        if(count($foundRow)>0){
            $query="delete from $table where $cond";
            $runQuery=mysqli_query($this->conn,$query);
            if($runQuery){
                Session::set('success','deleted successfully');
                return true;
            }
            else{
                
                Session::set('error','This an error in delete');
                return false;
            }
        
        }
        else{
            Session::set('error','This task is not found');
        }
    }
    
} 
?>