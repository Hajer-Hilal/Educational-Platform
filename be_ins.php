<?php
session_start();
$i_session=$_SESSION['id'];
include("config.php");
$sql1="SELECT id,Email FROM student ";
$result = mysqli_query($conn,$sql1 );
while($row = mysqli_fetch_array($result)) { 

if($i_session==$row['id'])
{
    $i=1;
    $id=$row['id'];
    $sql="UPDATE student SET type='$i' WHERE id=$id";
         $result=mysqli_query($conn, $sql);
         $_SESSION['ins']= $_SESSION['student'];
         $_SESSION['id_ins']=$id;
             echo '<script language="javascript">
        window.alert ("أصبحت الآن معلما..");
         window.location = "index.php";
         </script>';
         //header("location:index.php?ms= '$id' ");
}
}


?>