<?php
include_once('constant.php');
class Database{
    public $con=NULL;
    public $table=NULL;
    public $query=NULL;
    public $result=NULL;
    public $data=array();
    public $cond=array();
    
    function __construct() {
       $this->connect_db();
    }
    
    function connect_db(){
        $this->con = mysql_connect(HOST,USERNAME,PASSWORD); 
        if(!$this->con){
            die("Could not connect: " . mysql_error());
        }
        mysql_select_db(DATABASE_NAME) or die("Could not select database");                
    }
    
    function execute(){
        if($this->query){
           if($res=mysql_query($this->query)){
               $this->result= $res;
               return $res; 
           }else{
               return false;
               echo '<pre>';
               echo mysql_error();
               echo '</pre>'; 
           } 
        }else{
            return false;
            echo 'Empty Query';
        }
        
    }
    
    function fetch_array($fetchType='1'){
        if($this->result){
            if($fetchType=='1'){ 
                return mysql_fetch_assoc($this->result);
            }else if($fetchType=='2'){
                return mysql_fetch_array($this->result);
            }else if($fetchType=='3'){
                return mysql_fetch_object($this->result);
            }else{
                return mysql_fetch_assoc($this->result);
            }
        }else{
            echo 'No result set found';
        }
    }
	
    function total_record(){
        if($this->result){
             return mysql_num_rows($this->result);
        }else{
            echo 'No result set found';
        }
    }
   
    function show_query(){
        if($this->query){
            $sql= $this->query;
            $printSql = sprintf('<div style="border:1px solid;width:auto;padding:2px;background:cyan"><pre>%s</pre></div>',$sql);
            echo $printSql;
       }else{
            echo 'Empty Query';
       }
    }
    
    function insert(){
        $Sql="insert into $this->table set ";
        if(sizeof($this->data)>0){
            foreach($this->data as $key=>$val){
                $insertArr[]="$key='$val'";
            }
            $Sql.= implode(',',$insertArr);
            $this->query=$Sql;
            $this->execute();
            return true;
        }else{
            echo "No data to insert";
            return false;
        }
    } 
    
    function update(){
        $Sql="update $this->table set ";
        if(sizeof($this->data)>0){
            foreach($this->data as $key=>$val){
                $updateArr[]="$key='$val'";
            }
            $Sql.= implode(',',$updateArr);
            $Sql.=" where 1=1";
            if(sizeof($this->cond)>0){
                foreach($this->cond as $key=>$val){
                    $condArr[]=" and $key='$val'";
                }
            }
            $Sql.= implode(',',$condArr);
            $this->query=$Sql;
            $this->execute();
	    return true;
        }else{
            echo "No data to update";
            return false;
        }
    } 
    
    function delete(){
        $Sql="delete from $this->table ";
        $Sql.=" where 1=1";
        if(sizeof($this->cond)>0){
            foreach($this->cond as $key=>$val){
                $condArr[]=" and $key='$val'";
            }
        }
        $Sql.= implode(',',$condArr);
        $this->query=$Sql;
        if($this->execute()){
            return true;
        }else{
            return false;
        }
        
    }  
    
    
}
?>