<?php
 include "config.php";
 if(isset($_GET['id_ins']))
 {
    $id_ins=$_GET['id_ins'];
 }
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
    if(isset($_POST['infocourses']))
    {
    $title= $_POST['title'];
    $level= $_POST['level'];
    echo $title;
    $sql="INSERT INTO `courses` (`title`, `level`,`id_instroctor`)
    VALUES ('$title', '$level','$id_ins')";
     $result = mysqli_query($conn,$sql);
 
    
    //$lastid=9;
     //$lastid = mysqli_insert_id($conn);
    
 }
 $lastid=0;
 $sql1 = "SELECT * FROM courses";
$result = mysqli_query($conn,$sql1 );
while($row = mysqli_fetch_array($result)) { 
    $lastid=$row['id'];
}

 if(isset($_POST['datacourses']))
 {
   
  if(isset($_GET['id_c']))
  {
   $id_c=$_GET['id_c'];
  }
  $title=$_POST['title'];
  $des=$_POST['des'];
  $file=$_POST['file'];
  $sql="INSERT INTO `lectures` (`title`, `description`,`file`,`id_courses`)
  VALUES ('$title', '$des','$file','$id_c')";
   $result = mysqli_query($conn,$sql);

 }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="css/stylecourses.css">
    </head>
    <body>
    <main> 
  <form action='addcourses.php?id_c=<?php echo $lastid ?>' method="post">
    <div>
      <label for="name">Title Lectures</label>
      <input id="name" type="text" name='title' />
    </div>
   
    <div class="full-width">
      <label for="message">Describtion</label>
      <textarea name="des" id="message"></textarea>
    </div>
    <div>
      <fieldset>
        <legend>add file : </legend>
        <input type="file" name="file"  />
      
      </fieldset>
    </div>
    
   
    <div class="full-width">
      <input type="submit"  name="datacourses" value="Add"/>
      <button type="reset">Clear Form</button>
    </div>
  </form>
</main>
    </body>
</html>




 
<!-- <!DOCTYPE html>
<html>
 
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
 
<body>
    <div id="content">
        <form method="POST" action="uploads.php" enctype="multipart/form-data">
            <div class="form-group">
                <label>ادخل صورة</label>
                <input class="form-control" type="file" name="uploadImage" value="" accept=".png,.jpg,.jpeg" />
            </div>
            <label>ادخل ملف</label>
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value=""  accept=".pdf,.docx" />
            </div> 
            <label>ادخل فيديو</label>
            <div class="form-group">
                <input class="form-control" type="file" name="uploadVideo" value=""  accept=".mp4" />
            </div> 

            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
   
</body>
 
</html> -->