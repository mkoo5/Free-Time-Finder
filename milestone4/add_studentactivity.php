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
$studentid = $_POST['studentid'];
$activityname = $_POST['activityname'];
$activityday = $_POST['activityday'];
$sqlactivitycheck = "SELECT * FROM Participatesin where studentid = $studentid AND activityname = '$activityname' AND activityday = '$activityday'";
$activityresult = $conn->query($sqlactivitycheck);
/*foreach($activityresult as $row)
{
     echo "Id is ".$row['studentid']. "AN is ".$row['activityname']. "AD is ".$row['activityday']."<br>";
}*/
if($activityresult->num_rows > 0)
{
    echo "Cannot insert activity in table Participatesin because the activity you entered is what you are already participating in!";
}
else
{
    $sqlactivityexist = "SELECT * FROM Activity where activityname = '$activityname' AND activityday = '$activityday'";
    $activityexistresult = $conn->query($sqlactivityexist);
    /*foreach($activityexistresult as $row)
    {
      echo "AN is ".$row['activityname']. "AD is ".$row['activityday']."<br>";
    }*/
    if($activityexistresult->num_rows > 0)
    {
        $sqlactivityfinalcheck = "INSERT INTO Participatesin values ($studentid, '$activityname', '$activityday');";
        $result = $conn->query($sqlactivityfinalcheck);
        if ($result) {
            echo "New record created successfully in table Participatesin!";
        } else {
            echo "Error: " . $sqlactivityfinalcheck . "<br>" . $conn->error;
        } 
    }
    else
    {
        echo "Cannot insert activity in Table Participatesin because the activity you entered does not exist in table Activity!";
    }
}


$conn->close();
?>

</body>
</html>
