CREATE TABLE Instructor
(
instructorid integer NOT NULL,
firstname varchar(45) NOT NULL,
lastname varchar(45) NOT NULL,
CONSTRAINT PK_Instructor PRIMARY KEY (instructorid)
);

CREATE TABLE Activity
(
activityname varchar(45) NOT NULL,
activityday varchar(45) NOT NULL,
starttime varchar(45) NOT NULL,
endtime varchar(45) NOT NULL,
CONSTRAINT PK_Activity PRIMARY KEY (activityday, activityname)
);

CREATE TABLE Course
(
courseid integer NOT NULL,
courseday varchar(45) NOT NULL,
coursename varchar(45) NOT NULL,
starttime varchar(45) NOT NULL,
endtime varchar(45) NOT NULL,
instructorid integer NOT NULL,
CONSTRAINT PK_Course PRIMARY KEY (courseid, courseday),
FOREIGN KEY (instructorid) REFERENCES Instructor(instructorid)
ON DELETE CASCADE
);

CREATE TABLE Student
(
studentid integer NOT NULL,
firstname varchar(45) NOT NULL,
enrollmentdate date NOT NULL,
gender varchar(45) NOT NULL,
lastname varchar(45) NOT NULL,
classyear integer NOT NULL,
CONSTRAINT PK_Student PRIMARY KEY (studentid)
);

CREATE TABLE Major
(
studentid integer NOT NULL,
major varchar(45) NOT NULL,
CONSTRAINT PK_Major PRIMARY KEY (major, studentid),
FOREIGN KEY (studentid) REFERENCES Student (studentid)
ON DELETE CASCADE
);

CREATE TABLE Minor
(
studentid integer NOT NULL,
minor varchar(45) NOT NULL,
CONSTRAINT PK_Minor PRIMARY KEY (minor, studentid),
FOREIGN KEY (studentid) REFERENCES Student (studentid)
ON DELETE CASCADE
);

CREATE TABLE Participatesin
(
studentid integer NOT NULL,
activityname varchar(45) NOT NULL,
activityday varchar(45) NOT NULL,
CONSTRAINT PK_Participatesin PRIMARY KEY (studentid, activityname, activityday),
FOREIGN KEY (studentid) REFERENCES Student (studentid)
ON DELETE CASCADE,
FOREIGN KEY (activityday, activityname) REFERENCES Activity (activityday, activityname)
ON DELETE CASCADE
);

CREATE TABLE Currentlytakes
(
studentid integer NOT NULL,
courseid integer NOT NULL,
courseday varchar(45) NOT NULL,
CONSTRAINT PK_Currentlytakes PRIMARY KEY (studentid, courseid, courseday),
FOREIGN KEY (studentid) REFERENCES Student (studentid)
ON DELETE CASCADE,
FOREIGN KEY (courseid, courseday) REFERENCES Course (courseid, courseday)
ON DELETE CASCADE
)











