<?php  //admin profile page
/*
 
Step 1 : 25 % of the Grade
Add a static method in the User class that creates the admin account, 
You can name it createAdmin for example. 
The method should insert a new entry in the 'users' table of the database with the following hardcoded values:
username = 'admin'
role = 0
password = '0admin0';
Remember to hash the password before adding it to the database. 
In the login page : before any other statements, 
1. Call the static function for creating an admin account. 
2. Set a cookie that stores information about whether the admin account has been created. For eg, a cookie with name 'adminCreated' and value 1 can be created. 
3. Check if the cookie above exists, if it does, display that admin account is already created. Else, do step 1 and 2. 

Step 2 : 15% of the Grade
Create a form that allows to upload different type of csv files, to their respective databases. Check the format of the input files and their corresponding tables in the database to understand the structure. 

The form should have 2 fields and 1 button:
1. A radio type of input for file type, where file type can be either Student, Course, Employee or Course Taken. 
2. An input of type file for selecting your file. 
3. An upload button, which basically uploads the file. 

Step 3 : 15% of the Grade
Rearrange the input file in an associative array, use already available functions. 
And populate the respective class objects and upload the data to the databases. 
This step is fairly straight forward. Use the test.php file provided to understand how the classes work. 

Step 4 : 15% of the Grade. This is relatively easy, use available functions. 
Display the data in the databases in their respective tables :
1. Students Table
2. Employees Table
3. Courses Table
4. Courses Taken Table. 

Step 5 : 15% of the Grade
Add a delete functionality in the tables to allow the admin user to delete entries. 
For eg, you could add an additional column with a checkbox inside. 
Upon clicking on a delete button, if the checkbox next to an entry is selected, the latter is deleted and the display tables are updated.
This is just a suggestion, you can find another way to do this. 

Step 6 : 15% of the Grade
Last but crucial step, add logout button, which when clicked will destroy the session set in login.php including the session cookie. 
After destroying the session, redirect the user to the login.php page. HINT : use the php header function. 
Ofcourse, this means that you should also create that session along with relevant parameters in the login.php page to test if your logout button works as it should. 
Note that when the user signs in login.php, a session is usually set to prevent the same user from having to log in multiple times when navigating to the same page. 


Requirement for passing : 75%
This DOES NOT mean that some steps may be excluded. All steps are mandatory, but I dont expect all of them to work flawlessly. 
 
 
*/

?>