<?php
session_start();
include_once('dbc.php');
if(isset($_SESSION['psnum'])){
    $shomareostad=$_SESSION['psnum'];
    $prepared=$connection->prepare("select * from moshakhasat where psnum='$shomareostad'");
    $prepared->execute();
  //  $datAa=$prepared->fetch()
    
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> نمایش مشخصات استاد</title>
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
                <table id="tablee">
                       <tr>
                      
                     
                       
                       <th>نام</th>
                        <th>نام خانوادگی </th> 
                        <th>تاریخ تولد  </th> 
                        <th>شماره تلف همراه </th> 
                        <th>آدرس ایمیل </th> 
                        <th>نام پدر </th> 
                        <th>شماره پرسنلی </th> 
                        
                         
                    </tr> 
                    <tr>
                        <?php
                   while($data=$prepared->fetch()){
                    							
                    echo "<tr><td>";
                    echo $data['name'];
                    echo "</td><td>";
                    echo $data['lname'];
                    echo "</td><td>";
                    echo $data['tavalod'];
                    echo "</td><td>";
                    echo $data['mobile'];
                    echo "</td><td>";
                    echo $data['email'];
                    echo "</td><td>";
                    echo $data['pedar'];
                    echo "</td><td>";
                   echo $data['psnum'];
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