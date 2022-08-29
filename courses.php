<?php
 echo '<a href="index.php">home</a>';
session_start();
include("config.php");
$i=$_GET['id'];
    $sql="SELECT id,Email,type FROM student WHERE id='$i'";
    $result = mysqli_query($conn,$sql );
while($row = mysqli_fetch_array($result)) { 		

$id=$row['id'];
   if( $row['type']!=1 )
   {
    echo 'لا يمكنك الدخول';
    header('location:index.php');
    exit;

   }
}


   if(isset($_SESSION['student']))
   {
        echo 'wellcom '.$_SESSION['student'];
   }
   else{
    echo '<script language="javascript">
    window.alert ("قم بتسجيل الدخول أولا");
    </script>';
    header('location:index.php');
   }



?>