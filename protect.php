<?php 

if(!function_exists("protect")){
   function protect(){
     if(!isset($_SESSION))
     session_reset();
     
     if(!isset($_SESSION['nome'] ) || !is_numeric($_SESSION['nome'])){
       header("Location: ../index.php");
       
     }
   }
}

?>