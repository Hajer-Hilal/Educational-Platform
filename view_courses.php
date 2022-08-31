<?php
 if(isset($_GET['id_courses']))
 {
    $id_course=$_GET['id_course'];
 }
  



?>
<html>
    <head>
        <!-- <link rel="stylesheet" href="css/stylecourses.css"> -->
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <?php
                    $i=1;
                    $id_course=$_GET['id_course'];
                    require_once "config.php";
                    $sql = "SELECT * FROM lectures where id_courses = '$id_course'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Title</th>";
                                    echo "<th>des</th>";
                                    echo "<th>file</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                          
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $i++ . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                       
                                        echo "<td>" . $row['file'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                   
        ?>
           </tbody>
                    </table>
                </div>
                <!-- END OF TABLE -->

    </body>
</html>
