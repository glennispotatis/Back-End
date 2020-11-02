<? // student profile
/*

Step 1 : 10% of the Grade
Once a student signs in via the login page, start a session. Store the relevant parameters in the session, such as :
1. username
2. name
3. surname
4. loginStatus, should be TRUE if login was successful
5. ip address
6. useragent


Step 2 : 35% of the Grade
Display a message that welcomes the user and Show his/her details in a Table(or any other formatted way).
Details to show:
1. Name, Surname, Birthdate 
2. StudentID
3. Courses he/she has taken.(display only the Course ID and Course Name). 
Hint : While name and surname information can be retrieved from the Session itself,
The employeeID will need to be retrieved from the Database, consider adding a public static method in the Student class, that returns the StudentID and Birthdate, while taking the username as parameter. 
Next, create an object of the class Student, with the Student, name, surname and Birthdate. You can now retrieve the courses this particular student has taken, through a method in the Student class that reads data from the courses table in the database. (You will have to define this class method, for eg, you may call it retrieveCoursesTaken() ).

Step 3 : 20% of the Grade
Display in table, the list of courses taken by this student
The columns headers should be Course Code, Course Name, Credits, Year taken, Semester Taken, Grade. 
You could follow a similar example as in Assignment 1. 

Step 4 : 25% of the Grade
Display another table with column headers: GPA, Total Credits, Status, where you display the relevant computed values. 
Again, you could follow the example in Assignment 1. 

Step 5 : 10% of the Grade
Last but crucial step, add logout button, which when clicked will destroy the session set in login.php(Step 1) including the session cookie. 
After destroying the session, redirect the user to the login.php page. HINT : use the php header function. 


Requirement for passing : 75%
This DOES NOT mean that some steps may be excluded. All steps are mandatory, but I dont expect all of them to work flawlessly. 


*/



?>