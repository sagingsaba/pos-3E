<?php
		session_start();
       require_once '../include/dbcon.php';
    
        $Email = $_SESSION["Email"];
    if($_SESSION["Email"]){
		try{
            $pdoQuery = "SELECT * FROM usertb_account WHERE Email=:Email";
            $pdoResult = $pdoConnect->prepare($pdoQuery);
            $pdoResult->execute(['Email'=> $Email]);
            $user = $pdoResult->fetch();
        }catch(PDOException $error){
            echo $error->getMessage();
            exit;
        }
	}else{
		header("location:../login.php");
	}
?>
