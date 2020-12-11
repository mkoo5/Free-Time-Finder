<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <SCRIPT language=Javascript>
      
            function isNumberKey(evt)
            {
               var charCode = (evt.which) ? evt.which : event.keyCode
               if (charCode > 31 && (charCode < 48 || charCode > 57))
                  return false;
       
               return true;
            }
            
         </SCRIPT>
   </head>
    
    <body>
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">HELLO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="add_stu.html">Add Student</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="add_course.html">Add Course</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="del_stu.html">Delete Student</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="find_stu.html">Find Students</a>
                       </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View Tables
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="select_stu.php">Students</a>
                        <a class="dropdown-item" href="select_activity.php">Activities</a>
                        <a class="dropdown-item" href="select_instructor.php">Instructors</a>
                        <a class="dropdown-item" href="select_course.php">Courses</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>

<?php
require_once('db_setup.php');
$sql = "USE lvasavon_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database lvasavon_1";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$sql = "SELECT * FROM Instructor";
$result = $conn->query($sql);
if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
         <th>instructorid</th>
         <th>firstname</th>
         <th>lastname</th>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
          <td><?php echo $row['instructorid']?></td>
          <td><?php echo $row['firstname']?></td>
          <td><?php echo $row['lastname']?></td>
      </tr>

<?php
}
}
else {
echo "Nothing to display";
}
?>

    </table>

<?php
$conn->close();
?>  

</body>
</html>
