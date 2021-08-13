<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    <title>Registration form</title>
</head>
<script type="text/javascript" src="registrationFormValidation.js"></script>
<body>
    <h1>Registration form</h1>

    <?php
    //define("filepath", "user-info.json");

    require 'DbInsert.php';

    $fname = $lname = $gender = $dob = $religion = $presentAddress = $permanentAddress = $phone = $email = $websiteLink = $username = $password = "";
    $usernameErr = $passwordErr = $fnameErr = $lnameErr = $genderErr = $dobErr = $religionErr = $phoneErr = $emailErr = "";
    $successMessage = $errorMessage = "";
    $flag = false;
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = $_POST['userName'];
        $password = $_POST['password'];
        $position = $_POST['position'];

        if (empty($username)) {
            $userNameErr = "User name cannot be empty!";
            $flag = true;
        }
        if (empty($password)) {
            $passwordErr = "password cannot be empty!";
            $flag = true;
        }
        if (empty($fname)) {
            $fnameErr = "first name cannot be empty!";
            $flag = true;
        }
        if (empty($lname)) {
            $lnameErr = "last name cannot be empty!";
            $flag = true;
        }
        if (empty($gender)) {
            $genderErr = "gender cannot be empty!";
            $flag = true;
        }
        if (empty($dob)) {
            $dobErr = "date of birth cannot be empty!";
            $flag = true;
        }
        if (empty($religion)) {
            $religionErr = "religion cannot be empty!";
            $flag = true;
        }
        if (empty($phone)) {
            $phoneErr = "phone cannot be empty!";
            $flag = true;
        }
        if (empty($email)) {
            $emailErr = "email cannot be empty!";
            $flag = true;
        }

        if (!$flag) {
            if (strlen($username) > 10) {
                $userNameErr = "Username cannot be more than 10 characters!";
                $flag = true;
            }
            if (strlen($password) > 8) {
                $passwordErr = "password cannot be more than 8 characters!";
                $flag = true;
            }
            if (!$flag) {
                $username = test_input($userName);
                $password = test_input($password);
                $fname = test_input($fname);
                $lname = test_input($lname);
                $gender = test_input($gender);
                $dob = test_input($dob);
                $religion = test_input($religion);
                $phone = test_input($phone);
                $email = test_input($email);


                // $data = array("username" => $userName, "password" => $password, "position" => $position);
                // $data_encode = json_encode($data);
                $result1 = register($userName,  $position, $fname, $lname, $gender, $dob, $religion, $phone, $email); //write($data_encode);
                if ($result1) {
                    $successMessage = "Signup Successfully.";
                } else {
                    $errorMessage = "Error while signing up!";
                }
            }
        }
    }

    // function write($content)
    // {
    //     $resource = fopen(filepath, "a");
    //     $fw = fwrite($resource, $content . "\n");
    //     fclose($resource);
    //     return $fw;
    // }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="registrationForm">
        <fieldset>
            <legend>Basic Information</legend>
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname"> <br><br>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname"> <br><br>
            <label for="gender">Gender:</label>

            <label for="male-gender">
                <input type="radio" id="male" name="gender" value="male">
                Male
            </label>    
            
            <label for="male-gender">
                <input type="radio" id="female" name="gender" value="female">
                Female
            </label> 

            <br><br>

            <label for="dob">Date of birth:</label>
            <input type="date" id="dob" name="dob"><br> <br>
            <label for="religion">Religion:</label>
            <select name="religion" id="religion">
                <option value="" selected="selected">--none</option>
                <option value="islam">Islam</option>
                <option value="hinduism">Hinduism</option>
                <option value="christianity">Christianity</option>
                <option value="buddhism">Buddhism</option>
            </select>

        </fieldset>

        <fieldset>
            <legend>Contact Information</legend>
            <label for="presentAddress">Present Address:</label>
            <textarea name="presentAddress" id="presentAddress" cols="30" rows="10"></textarea> <br> <br>
            <label for="permanentAddress">Permanent Address:</label>
            <textarea name="permanentAddress" id="permanentAddress" cols="30" rows="10"></textarea> <br> <br>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone"> <br> <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"> <br> <br>
            <label for="websiteLink">Personal Website Link</label>
            <input type="url" id="websiteLink" name="websiteLink">
        </fieldset>

        <fieldset>
            <legend>Account Information</legend>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"> <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"> <br><br>
        </fieldset>

        <div class="buttonDiv">
        <button class="pure-material-button-contained" type="button" id="myBtn">VALIDATE </button>
        <button class="pure-material-button-contained" type="submit" id="phpBtn">SIGN UP </button>
        </div>

    </form>

</body>

</html>