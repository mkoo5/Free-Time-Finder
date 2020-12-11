# FindingCommonTimeBetweenStudents

CSC161 - Database Systems Final Project

Group 37
Collaborators: Linda Vasavong, Matthew Koo, Spencer Leonardi

Work Load Disribution Among Group Members;
Mathew Koo and Spencer Leonardi: Collaborated together on BCNF Normalization, creating and loading relations, and helped with testing.
Linda Vasavong: Programmed the web pages from relations and forms and helped with testing.

These links are not working anymore due to limited access to the class server.

Welcome page:
http://betaweb.csug.rochester.edu/~lvasavon/milestone3_website/welcome.html

View Students page:
http://betaweb.csug.rochester.edu/~lvasavon/milestone3_website/select_stu.php

View Activities page:
http://betaweb.csug.rochester.edu/~lvasavon/milestone3_website/select_activity.php

View Instructors page:
http://betaweb.csug.rochester.edu/~lvasavon/milestone3_website/select_instructor.php

View Courses page:
http://betaweb.csug.rochester.edu/~lvasavon/milestone3_website/select_course.php

Below are the dependencies for all of the tables in BCNF. We had 5 tables consisting of just
primary keys which are in bcnf since any dependencies they have involve prime attributes only.

Activity
- activityname+activityday -> starttime
- activityname+activityday -> endtime
- activity can meet on multiple days at different times so activityname and activityday combined
form the superkey

Activity is in BCNF because an activityname+activityday has a starttime, and also has an
endtime. No starttime contains all of a specific activityname or activityday, so it is not a primary
key. No endtime contains all of a specific activityname or activityday, so it is not a primary key.
No starttime depends on an endtime and vice versa, further proving that they are not primary
keys.
  
Student
- studentid -> firstname
- studentid -> enrollmentdate
- studentid -> gender
- studentid -> lastname
- studentid -> classyear
- studentid is a superkey

Student is in BCNF because there is one primary key that outlines a functional dependency, that
being studentid. Looking at the rest of the attributes in the table (ignoring studentid), none of
them functionally depend on each other, so there are no transitive dependencies present.
  
Course
- courseid -> coursename
- courseid -> days
- courseid -> starttime
- courseid -> endtime
- courseid -> yearoffered
- courseid -> season
- courseid -> instructorid
- courseid is a superkey

Course is in BCNF because there is one primary key that outlines a functional dependency, that
being courseid. Looking at the rest of the attributes in the table (ignoring coursetid), none of
them functionally depend on each other, so there are no transitive dependencies present.
  
Coursestaken
- courseid+studentid -> grade
- a combination of a particular student and a specific course that the student has taken together correspond to a grade, so courseid+student is a superkey

Coursestaken is in BCNF because there is one primary key that outlines a functional
dependency, that being courseid+studentid. Studentid, courseid, and studentid+courseid aren’t
functionally dependent on grade, so grade cannot be a part of the superkey. There are no
transitive dependencies present.
  
Instructor
- instructorid -> firstname
- instructorid -> lastname
- instructorid is a superkey

Instructor is in BCNF because there is one primary key that outlines a functional dependency,
that being instructorid. Firstname isn’t functionally dependent on lastname and vice versa, so
there can be no transitive dependency in this table.
