<?php

 alert("Logout successful");

 function alert($msg) {
     echo "<script type='text/javascript'>alert('$msg');</script>";
 }
    // echo '<script language="javascript">
    // window.alert ("Logout successful");
    // window.location = "index.php";
    // </script>';
    sleep(3);
    header('location:index.php?msg=Logout successful');
  
    session_start();
    session_destroy();
    
?>