<?php

if(isset($_GET["id_course"]) ){
    require_once "config.php";
    $id_courses=$_GET['id_course'];
    $sql1 = "DELETE FROM lectures WHERE id_courses = '$id_courses'";
    mysqli_query($conn, $sql1);
    $sql = "DELETE FROM courses WHERE id = '$id_courses'";
    if (mysqli_query($conn, $sql)) {
        header("location: dashbord_ins.php");
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    }
?>
