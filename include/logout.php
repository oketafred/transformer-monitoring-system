<?php 

    session_start();
    
    
    $_SESSION["username"] = null;
    $_SESSION["firstname"] = null;
    $_SESSION["lastname"] = null;
    $_SESSION["email"] = null;

    
    if(!isset($_SESSION["email"])){
        
       
        header("Location: ../index.php"); 
        
    }



 ?>