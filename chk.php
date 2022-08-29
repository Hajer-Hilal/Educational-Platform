<?php
session_start();
include("config.php");
if($_SERVER['REQUEST_METHOD']=='POST')
{  
    if(isset($_POST['register']))
    {
        $f_name=strip_tags($_POST['fname']);
        $l_name=strip_tags($_POST['l_name']);
        $pass=strip_tags($_POST['pass']);
        $gender=strip_tags($_POST['Gender']);
        $phone=strip_tags($_POST['phone']);
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
        $email=strip_tags($_POST['email']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);

        $sql="SELECT id,Email FROM student ";
        $result = mysqli_query($conn,$sql );
            while($row = mysqli_fetch_array($result)) { 		
               if( $row['Email']==$email )
               {
                header('location:register.php?msg=The account already exists ');
                exit;
               }
            }
               $sql="INSERT INTO `student` (`FirstName`, `LastName`, `phone`, `Email`, `Password`, `Gender`)
               VALUES ('$f_name', '$l_name', '$phone', '$email', '$pass', '$gender')";
               $result=mysqli_query($conn, $sql);
               $_SESSION['student']=$f_name;
               header('location:index.php?msg1= Account successfully created   ');
               exit;
     }
     else{
        header('location:register.php?msg=Enter the email correctly ');
     }
    }




    else if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $sql="SELECT email,password FROM admin_login ";
        $result = mysqli_query($conn,$sql );
        $row = mysqli_fetch_array($result);
        if($row['email']==  $email )
        {
            $_SESSION['admin']='admin';
            header('location:index.php');
        }
        $var=0;
        $sql="SELECT id,Email,Password,FirstName,LastName FROM student ";
        $result = mysqli_query($conn,$sql );
	while($row = mysqli_fetch_array($result)) { 		
	
       if( $row['Email']==$email && $row['Password']== $pass)
       {
        $_SESSION['student']= $row['FirstName'];
        $_SESSION['id']= $row['id'];
        header('location:index.php');
        echo 'wellcom :' .$row['FirstName'];
        $var=1;
        break;
       }
    }
     if($var!=1)
{
    echo 'no find';
}	
    }
}
    



?>