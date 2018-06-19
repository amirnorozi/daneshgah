<?php
session_start();
include_once('dbc.php');
if(isset($_POST['submit'])){
try{
   $username=$_POST['username'];
   $password=$_POST['password'];
$prepared=$connection->prepare("select * from users where username='$username' && password='$password'");
$prepared->execute();
$data=$prepared->fetch();
if($data>0){

    $_SESSION["psnum"]=$data["psnum"];
    if(isset($_SESSION["psnum"])){
       if($data['role']==1){
            header('Location:index.php');
            exit();
       }else{
        header('Location:index2.php');
        exit();
   }
       
        }
    
}else{
    header('Location:login.php?err=passwordOrUsernameIncorect');
        exit();
}

}catch(PDOException $e){

echo $e->getMessage();

}
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به سامانه</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="main_login">
            <div class="header">
            <h1>ورود به سامانه</h1>
            </div>
            <div class="container_login">
              <div id="forml">
              <form action="" method="POST" >
                  <h1>نام کاربری </h1>
                  <input type="text" name="username">
                  <h1>رمز ورود </h1>
                  <input type="password" name="password">
                  <input type="submit" name="submit" id="submit" value="ورود">
              </form>
              
              </div>
            </div>
            <p><?php
            if(isset($_GET["err"])){
    echo "نام کاربری و یا رمز عبور صحیح نمیباشد";
            }
            
            
            ?></p>
    </div>
</body>
</html>