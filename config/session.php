<?php
    session_start(); 
    if(!isset($_SESSION)) 
    {  
        header('Location: login.php');
    }else{
        $_GRUP_KONSUMEN = 3;
    	if(isset($_SESSION['group'])){
    		if($_SESSION['group'] == $_GRUP_KONSUMEN)
    		{
                session_destroy();
    			header('Location: ../login.php');
    		} 
    	}else{
    		header('Location:login.php');
    	}
    }
?>