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
$courseid = $_POST['courseid'];
$coursename = $_POST['coursename'];
$yearoffered = $_POST['yearoffered'];
$season = $_POST['season'];
$instructorid= $_POST['instructorid'];

$courseday1 = $_POST['courseday1'];
$courseday2 = $_POST['courseday2'];
$courseday3 = $_POST['courseday3'];
$starttime1 = $_POST['starttime1'];
$starttime2 = $_POST['starttime2'];
$starttime3 = $_POST['starttime3'];
$endtime1 = $_POST['endtime1'];
$endtime2 = $_POST['endtime2'];
$endtime3 = $_POST['endtime3'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$sqlcoursecheck = "SELECT * FROM Course where courseid = $courseid AND (courseday = $courseday1 OR courseday = $courseday2 OR courseday = $courseday3);";
$coursecheckresult = $conn->query($sqlcoursecheck);

if($coursecheckresult->num_rows > 0)
{
    echo "Cannot add course to table Course because the courseid you entered already exists!\n";
}
else
{
    $sqlinstructorcheck = "SELECT * FROM Instructor where instructorid = $instructorid;";
    $instructorcheckresult = $conn->query($sqlinstructorcheck);
    if($instructorcheckresult->num_rows > 0)
    {
        echo "Cannot add instructor to table Instructor because the instructorid you entered already exists!\n";
    }
    else 
    {
        $sql5 = "INSERT INTO Instructor values ($instructorid, '$firstname', '$lastname');";
        $result5 = $conn->query($sql5);
        if ($result5 === TRUE) {
            echo "New record for table Instructor created successfully\n";
        } else {
             echo "Error: " . $sql5 . "<br>" . $conn->error;
        } 
    }
    $sql1 = "INSERT INTO Course values ($courseid, '$courseday1', '$coursename', '$starttime1', '$endtime1', '$instructorid');";
    $result1 = $conn->query($sql1);
    if ($result1 === TRUE) {
        echo "New record for table Course created successfully\n";
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    } 
    if((!empty($courseday2)) && (!empty($starttime2)) && (!empty($endtime2)))
    {
        $sql2 = "INSERT INTO Course values ($courseid, '$courseday2', '$coursename', '$starttime2', '$endtime2', '$instructorid');";
        $result2 = $conn->query($sql2);
        if ($result2 === TRUE) {
            echo "New record for table Course created successfully\n";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        } 
    }
    if((!empty($courseday3)) && (!empty($starttime3)) && (!empty($endtime3)))
    {
        $sql3 = "INSERT INTO Course values ($courseid, '$courseday3', '$coursename', '$starttime3', '$endtime3', '$instructorid');";
        $result3 = $conn->query($sql3);
        if ($result3 === TRUE) {
            echo "New record for table Coursetime created successfully\n";
        } else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
        } 
    }

}
/*
*/

$conn->close();
?> 

</body>
</html>