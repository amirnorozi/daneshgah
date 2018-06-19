<?php

include_once('dbc.php');

$test=$_GET['nomreid'];
if(isset($_POST['nomreJadid'])){
    $nomre=$_POST['nomreJadid'];
$upldate=$connection->prepare("UPDATE nomreha SET nomre='$nomre' WHERE id='$test'");
$upldate->execute();
}
  
    $prepared=$connection->prepare("select * from nomreha where id='$test'");
    $prepared->execute();
  //  $datAa=$prepared->fetch()
    
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش نمرات دانشجو ها</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="main">
            <div class="header">
            <h1>به پنل ویرایش نمره خوش آمدید</h1>
            </div>
            <div class="container">
            <div class="nav_right">
                        <a href="./login.php">بازگشت به صفحه ورود</a>
                        <a href="etelaat.php">نمایش مشخصات شما</a>
                        <a href="./index.php">مشاهده نمره ها</a>
                </div>
                <div class="tables">
                <div class="diccc">
                <table id="table">
                       <tr>
                      
                     
                       
                        <th>نمره قبلی </th>
                        <th>نمره جدید</th> 
                        <th>تایید</th>
                        
                    </tr> 
                    <tr>
                        <?php
                   while($data=$prepared->fetch()){
                    echo "<form action='' method='post'>";
                    echo "<tr><td>";
                    echo $data['nomre'];
                    echo "</td><td>";
                   echo "<input type='text' name='nomreJadid'";
                   echo "</td><td>";
                   echo "<input type='submit' value='ثبت' name='submit'>";
                    echo "</td></tr></form>";
                   }
                   ?>
                    </tr>

                </table>
                </div> </div>
            </div>
    </div>
</body>
</html>


