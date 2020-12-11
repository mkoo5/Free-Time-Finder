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
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
    <div class="container" style="margin-top:50px">
         <br><br>
         <div class="row">
               <div class="col-md-4">
                     <h1>Hi</h1>
               </div>
               <div class="col-md-8">
                     <h1>Hi</h1>
               </div>
               <div class="col-md-4">
                     <h1>Hi</h1>
               </div>
        </div>
    </div>

<!---<h1> Welcome to lvasavon_1 Database </h1>-->

<!---<ul>
<li><a href="select_stu.php">View Students</a></li>
<li><a href="select_activity.php">View Activities</a></li>
<li><a href="select_instructor.php">View Instructors</a></li>
<li><a href="select_course.php">View Courses</a></li>
<li><a href="add_stu.html">Add Student</a></li>
<li><a href="del_stu.html">Remove Student</a></li>
<li><a href="find_stu.html">Find Student</a></li>
</ul>-->
</body>
</html>
