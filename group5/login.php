<?php
 session_start();
 require_once './include/dbcon.php';


 try{
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["login"])){
        if(empty($_POST["Email"]) || empty($_POST["PassWord"])){
            $message = '<label>All fields are required<label>';
    }else{
        $pdoQuery = "SELECT * FROM usertb_account WHERE Email=:Email";
        $pdoResult = $pdoConnect->prepare($pdoQuery);
        $pdoResult->execute(['Email'=>$_POST["Email"]]);
        
        $user = $pdoResult->fetch();
        
        if($user && password_verify($_POST["PassWord"], $user["PassWord"])){
            $_SESSION["Email"] = $_POST["Email"];

            if($user["usertype"] == "0"){
              $loggedInUser = $_SESSION["Email"];
              $pdoQuery = "INSERT INTO `audit_trail`(`action`,`user`)VALUES('User logged in',:user)";
              $pdoResult = $pdoConnect->prepare($pdoQuery);
              $pdoResult->execute([':user' => $loggedInUser]);
              header("location:customer/dashboard.php");
            }
        }else{
            $message = "<label>Incorrect Username or Password<label>";
        }
        }
            }
    }catch(PDOException $error){
        $message = $error->getMessage();
    }
    ?>
    
<!DOCTYPE html>
<html>
    <head>
        <title>CRM login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    </head>
<body>
        <?php
        if (isset($message)) {
            echo '<div class="message">' . $message . '</div>';
        }
        ?>
        <div class="main">        
            
            <input type="checkbox" id="chk" aria-hidden="true">
            
            <div class="signup">
                <form method="post">
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="Email" placeholder="Email">
                    <input type="password" name="PassWord" placeholder="Password">
                    <button name="login">Login</button>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()", 0);
            window.onunload=function(){null;}
        </script>
</body>
</html>