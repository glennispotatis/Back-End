<?php // employee profile
/*

Step 1 : 10% of the Grade
Once an employee signs in via the login page, start a session. Store the relevant parameters in the session, such as :
1. username
2. name
3. surname
4. loginStatus, should be TRUE if login was successful
5. ip address
6. useragent

Step 2 : 35% of the Grade
Display a message that welcomes the user and Show his/her details in a Table(or any other formatted way).
Details to show:
1. Name, Surname 
2. EmployeeID
3. Courses he/she is assigned to.(display only the Course ID and Course Name). 
Hint : While name and surname information can be retrieved from the Session itself,
The employeeID will need to be retrieved from the Database, consider adding a public static method in the Employee class, that returns the EmployeeID, while taking the username as parameter. 
Next, create an object of the class Employee, with the EmployeeID, name and surname. You can now retrieve the courses this particular employee is assigned to, through a method in the Employee class that reads data from the courses table in the database. (You will have to define this class method, for eg, you may call it retrieveCoursesAssigned() ).
 

Step 3 : 15% of the Grade

Display in seperate Tables, the list of students taking each of the assigned course. 
1 Table per assigned course.
Consider adding another public method to the Employee class that returns an array of students given a course code as parameter. 

Step 4 : 30 % of the Grade
Create a simple form(or forms, 1 form for each table) to modify the grade of a particular student. 
For eg, the form can include
1. A select type of input, which populates the Name of each student for a specific course(Note that while it may display the name of the student, it is better that it returns the StudentID in the value.) 
2. A select type of input, which allows to select a grade from A-F. 
3. An update button, which when clicked will execute the update MySQL command on that specific courseTaken entry. 
HINT : consider adding another public method in the employee class to do this. You may call define it as such : updateStudentGrade($CourseCode,$StudentID,$newGrade), it will update the specific entry matching the courseCode and StudentID with the new grade. 

Step 5 : 10% of the Grade
Last but crucial step, add logout button, which when clicked will destroy the session set in login.php(Step 1) including the session cookie. 
After destroying the session, redirect the user to the login.php page. HINT : use the php header function. 


Requirement for passing : 75%
This DOES NOT mean that some steps may be excluded. All steps are mandatory, but I dont expect all of them to work flawlessly. 


*/

?>