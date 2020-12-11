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
              <br>
              <br>
              <br>
              <br>
              <br>

<?php
require_once('db_setup.php');
$sql = "USE lvasavon_1;";
if ($conn->query($sql) === TRUE) {
   echo "using Database lvasavon_1";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
echo "HELLO";
$studentid1 = $_POST['studentid1'];
$studentid2 = $_POST['studentid2'];
$day = $_POST['day'];

$class1 = "SELECT * FROM Currentlytakes INNER JOIN Course WHERE studentid = $studentid1 AND courseday = '$day'";
$student1class = $conn->query($class1);
foreach($student1class as $row)
{
     echo "Id is ".$row['studentid']. "AN is ".$row['courseday']."<br>";
}

$class1 = "";
$class1 .= "SELECT starttime, endtime FROM Currentlytakes, Course ";
$class1 .= "WHERE Course.courseday = '$day' AND Currentlytakes.studentid = $studentid1 AND Currentlytakes.courseid = Course.courseid ";

$class2 = "";
$class2 .= "SELECT starttime, endtime FROM Currentlytakes, Course ";
$class2 .= "WHERE Currentlytakes.studentid = $studentid2 AND Currentlytakes.courseid = Course.courseid AND Course.courseday = '$day'";

$activ1 = "";
$activ1 .= "SELECT starttime, endtime FROM Activity, Participatesin ";
$activ1 .= "WHERE Participatesin.studentid = $studentid1 AND Activity.activityname = Participatesin.activityname AND Participatesin.activityday = '$day' AND Activity.activityday = '$day'";

$activ2 = "SELECT starttime, endtime FROM Activity, Participatesin ";
$activ2 .= "WHERE Participatesin.studentid = $studentid2 AND Activity.activityname = Participatesin.activityname AND Participatesin.activityday = '$day' AND Activity.activityday = '$day'";
echo "BYE";
$arr = array_fill(0, 288, 0);

/*$class1 = "SELECT Course.starttime, Course.endtime FROM Currentlytakes, Course 
WHERE Currentlytakes.studentid = $studentid1 AND Currentlytakes.courseid = Course.courseid
AND Course.courseday = '$day'";*/

/*$class2 = "SELECT Course.starttime, Course.endtime FROM Currentlytakes, Course 
WHERE Currentlytakes.studentid = $studentid2 AND Currentlytakes.courseid = Course.courseid
AND Course.courseday = '$day'";

$activ1 = "SELECT Activity.starttime, Activity.endtime FROM Activity, Participatesin
WHERE Participatesin.studentid = $studentid1 AND Activity.activityname = Participatesin.activityname
AND Participatesin.activityday = '$day' AND Activity.activityday = '$day'";

$activ2 = "SELECT Activity.starttime, Activity.endtime FROM Activity, Participatesin
WHERE Participatesin.studentid = $studentid2 AND Activity.activityname = Participatesin.activityname
AND Participatesin.activityday = '$day' AND Activity.activityday = '$day'";
echo "BYE";
$arr = array_fill(0, 288, 0);
*/

function get_minutes($time_string){
    $parts = explode(":", $time_string);
    $hours = intval($parts[0]);
    $minutes = intval($parts[1]);
    return $hours * 60 + $minutes;
}
echo get_minutes("03:20");

/*$student1class = $conn->query($class1);
foreach($student1class as $row)
{
     echo "Id is ".$row['starttime']. "AN is ".$row['endtime']."<br>";
}*/
while($row = mysql_fetch_array($student1class)){
    $starttime = $row['starttime'];
    $endtime = $row['endtime'];
    $startindex = get_minutes($starttime) / 5;
    $endindex = get_minutes($endtime) / 5;
    for($x = $startindex; $x < $endindex; $x++){
        $arr[$x] = 1;
    }
}

$student2class = mysql_query($class2);
while($row = mysql_fetch_array($student2class)){
    $starttime = $row['starttime'];
    $endtime = $row['endtime'];
    $startindex = get_minutes($starttime) / 5;
    $endindex = get_minutes($endtime) / 5;
    for($x = $startindex; $x < $endindex; $x++){
        $arr[$x] = 1;
    }
}

$student1activ = mysql_query($activ1);
while($row = mysql_fetch_array($student1activ)){
    $starttime = $row['starttime'];
    $endtime = $row['endtime'];
    $startindex = get_minutes($starttime) / 5;
    $endindex = get_minutes($endtime) / 5;
    for($x = $startindex; $x < $endindex; $x++){
        $arr[$x] = 1;
    }
}

$student2activ = mysql_query($activ2);
while($row = mysql_fetch_array($student2activ)){
    $starttime = $row['starttime'];
    $endtime = $row['endtime'];
    $startindex = get_minutes($starttime) / 5;
    $endindex = get_minutes($endtime) / 5;
    for($x = $startindex; $x < $endindex; $x++){
        $arr[$x] = 1;
    }
}

$count = 0;
$answer = array_fill(0, 288, 0);
$answerlength = 0;
for($i = 0; $i < 288; $i++){
    if($arr[$i] == 0){
        $x = i;
        while($i + 1 < 288 && $arr[$i + 1] == 0){
            $count++;
            $i++;
        }
        $start = $x;
        $startminutes = $start * 5;
        $starthours = floor($startminutes / 60);
        $startminutes = $startminutes - $starthours * 60;
        $end = $x + $count + 1;
        $endminutes = $end * 5;
        $endhours = floor($endminutes / 60);
        $endminutes = $endminutes - $endhours * 60;
        $shz = "";
        $smz = "";
        $ehz = "";
        $emz = "";
        if($starthours < 10){
            $shz = 0;
        }
        if($startminutes < 10){
            $smz = 0;
        }
        if($endhours < 10){
            $ehz = 0;
        }
        if($endminutes < 10){
            $emz = 0;
        }
        $answer[$answerlength] = "" . $shz . $starthours . ":" . $smz . $startminutes
        . " to " . $ehz . $endhours . ":" . $emz . $endminutes;
        $answerlength++;
        $count = 0;
    }
}
for($i = 0; $i < $answerlength; $i++){
    echo "hello";
    echo $answer[$i];
    echo "\r\n";
}

$conn->close();
?>  

</body>
</html>
