<!DOCTYPE html>
<!--Basic sign up form for new library members-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Become a member</title>
    </head>
    <body>
        <h1>Sign up to the Bookworms library</h1>
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>Search our Books</li>
            <li>Loan a Book</li>
            <li>Contact Us</li>
            <li>My Account</li>
        </ul>
        <br>
        <form action="newCustomerUploads.php" method="post" enctype="multipart/form-data">
        

            First Name: <input type="text" name="firstname" autofocus required pattern="[A-Za-z -]{1,50}" title="Alphabetical characters, spaces, and hyphens are accepted"/>
            <br>
            Second Name: <input type="text" name="secondname" pattern="[A-Za-z -]{1,50}" title="Alphabetical characters, spaces, and hyphens are accepted"/>
            <br>
            Last Name:   <input type="text" name="lastname" required pattern="[A-Za-z -]{1,50}" title="Alphabetical characters, spaces, and hyphens are accepted"/>
            <br>
            Address Line One:   <input type="text" name="addresslineone" required pattern="[A-Za-z 0-9]{1,50}"/>
            <br>
            Address Line Two:   <input type="text" name="addresslinetwo" pattern="[A-Za-z 0-9]{1,50}"/>
            <br>
            City:   <input type="text" name="city" required pattern="[A-Za-z ]{1,50}"/>
            <br>
            Post Code:   <input type="text" name="postcode" required pattern="[A-Za-z0-9 ]{3,8}"/>
            <br>
            Username: <input type="text" name="username" required pattern=^[a-zA-Z]{1}[a-zA-Z0-9-_\.]{5,19}$ title="Your username must begin with a letter, and may not contain special characters" placeholder="6-20 Characters"/>
            <br>
            Password: <input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
            <br><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
            Choose a display picture:
            <br>
            <input type="file" name="avatar"/>
            <input type="submit" value="Upload"/>
            <br>
            
            
        </form>
        
    </body>
</html>
