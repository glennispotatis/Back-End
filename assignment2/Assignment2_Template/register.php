<?php //Registration Page. 

/*
Here you should create a form for user registration : which is basically just updating their password from a defaulted value to their custom one. 

Step 1 : 20% of the Grade
The form should have 3 input fields and 1 button :
1. username // note that a user that is allowed to register on the system will already have a predefined username that is generated when their details are added to the database by the admin. 

2. New password // their new password, check that the length of the input password is atleast 8 characters long. 

3. Confirm password // the user should type the same password in here. The new password will be updated only if the input password field and confirm password field matches. 

4. A register button. Upon click, should send the data to the backend for validation and updating the user details. 

Step 2 : 40% of the Grade
Validation :
1. Should check that no fields are left empty.
2. 'New Password' and 'Confirm Password' fields should match.
3. Check if this username exists in the 'users' table in the database. 
    Add a method to the User class to check if the input username exists. 
    If the username does not exist, display a message telling the user:
    "The entered username does not exist on the system. Contact the administrator."
4. ONLY IF the username exists in the 'users' table in the database, then update      the user entry on the database, with the new password. 
   Add another method to the User class to do this. You may call it, updateUserPassword. 
    
Step 3 : 20% of the Grade
If the validation check is passed, the form should disappear, in its place
display: 
    1. A status message to alert the user that the step was successful 
    2. A link that redirects the user to the login page, where they can login to their profile page.
    The profile page should retrieve this specific user's username automatically. So they only have to enter their new password to login. 
    HINT : check how to append data to URL using the HTTP GET.
    Show that this particular steps works, by echoing the correct username on the Login page. 
    
If validation check is not passed, display the relevant error message and 
the same registration form for the user to try again.
    
Step 4 : 10 % of the Grade
The relevant security steps should be taken: 
1. user input sanitization on the username
2. password hashing for the password. 


Requirement for passing : 75 % 
This DOES NOT mean that some steps may be excluded. All steps are mandatory, but I dont expect all of them to work flawlessly. 

*/

?>