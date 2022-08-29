
<?php
session_start();
include("config.php");
$id_ins=$_GET['id_ins'];
    $sql="SELECT id,Email,type FROM student WHERE id='$id_ins'";
    $result = mysqli_query($conn,$sql );
while($row = mysqli_fetch_array($result)) { 		
  
   if( $row['type']!=1 )
   {
    echo 'لا يمكنك الدخول';
    header('location:index.php');
    exit;

   }
}


?>



<!DOCTYPE html>
<html>
<body>
<h2>Add info courses</h2>
<form action="addcourses.php?id_ins=<?php echo $_GET['id_ins'] ; ?>"  method="post">
  <label for="fname">title courses: </label>
  <input type="text" id="fname" name="title" value="John">
  <br><br>
  <label for="courses">Choose a Course level:</label>
  <select name="level" id="courses">
      <option value="Beginner">Beginner</option>
      <option value="Intermediate">Intermediate</option>
      <option value="Advanced">Advanced</option>
  </select><br> <br>
  <input type="submit" name="infocourses" value="Submit">
</form> 
</body>
</html>