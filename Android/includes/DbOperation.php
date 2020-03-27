<?php
  class DbOperation{
	  private $con;
   function __construct(){
	   require_once dirname(__FILE__).'/DbConnect.php';
	   $db =new DbConnect();
	   $this->con =$db->connect();
   }
   function putday($receive1,$receive2,$note){
       $stmt = $this->con->prepare("INSERT INTO `users` (`id`, `receive1`, `receive2`, `note`) VALUES (NULL, ?, ?, ?);");
	   $stmt->bind_param("sss",$receive1,$receive2,$note);
       if($stmt->execute()){
	         return true;
	   }else{
	         return false;
	   }
   }
  }