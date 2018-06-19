<?php
session_start();
include_once('dbc.php');
if(isset($_SESSION['psnum'])){
    $shomareostad=$_SESSION['psnum'];
    $prepared=$connection->prepare("select * from nomreha where ostad='$shomareostad'");
    $prepared->execute();
  //  $datAa=$prepared->fetch()
    
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نمایش نمرات دانشجو ها</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="main">
            <div class="header">
            <h1>به پنل اساتید خوش آمدید</h1>
            </div>
            <div class="container">
                <div class="nav_right">
                        <a href="./login.php">بازگشت به صفحه ورود</a>
                        <a href="./etelaat.php">نمایش مشخصات شما</a>
                        <a href="./index.php">مشاهده نمره ها</a>
                </div>
                <div class="tables">
                <div class="diccc">
                <table id="table">
                       <tr>
                      
                     
                       
                        <th>نمره</th>
                        <th>نام درس</th> 
                          <th>نام استاد</th> 
                          <th>نام دانشجو</th>
                    </tr> 
                    <tr>
                        <?php
                   while($data=$prepared->fetch()){

                    echo "<tr><td><a href=editnomre.php?nomreid=".$data['id'].">";
                    echo $data['nomre'];
                    echo "</a></td><td>";
                    echo $data['namedars'];
                    echo "</td><td>";
                    echo $data['nameostad'];
                    echo "</td><td>";
                    echo $data['namedanshjo'];
                    echo "</td></tr>";
                   }
                   ?>
                    </tr>

                </table>
                </div> </div>
            </div>
    </div>
</body>
</html>


<?php
}else{


    header('Location:login.php?fristLogin');
    exit();
}?>