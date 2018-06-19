<?php
try{
$connection=new PDO("mysql:host=localhost;dbname=daneshgah;charset=utf8","root","");

}catch(PDOException $e){
echo "cant connect to database .... ".$e;
}



