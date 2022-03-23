<?php
/*
 * formRegistrationProcess.php for Molten Delgihts Pizzera Version 4
 */

require("connectToDatabase.php");

$salutation = $firstName = $middleInitial = $lastName = "";
$gender = $email = $phone = $street = $city = $region = "";
$postalCode = $loginName = $password1 = $password2 = "";

function sanitized_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

function emailAlreadyExist($db, $email) {
    $query = "SELECT * FROM my_Customer WHERE email = '$email'";
    $customers = mysqli_query($db, $query);
    $numOfRows = 0;
    if ($customers) {
        $numOfRows = mysqli_num_rows($customers);
    }

    return ($numOfRows > 0) ? true : false;
}

function getUniqueLoginName($db, $loginName) {
    $uniqueLoginName = $loginName;
    $query = "SELECT * FROM my_Customer WHERE login_name = '$uniqueLoginName'";
    $customers = mysqli_query($db, $query);

    $numOfRows = 0;
    if($customers) {
       $numOfRows = mysqli_num_rows($customers); 
    }

    if ($numOfRows != 0) {
        $i = 0;
	do {
            $i++;
	    $uniqueLoginName = $loginName . $i;
            $query = "SELECT * FROM my_Customer WHERE login_name = '$uniqueLoginName'";
            $customers = mysqli_query($db, $query);

            if($customers) {
                $numOfRows = mysqli_num_rows($customers); 
            }
            else {
                $numOfRows = 0;
           }
       } while($numOfRows != 0);

    }
    return $uniqueLoginName;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $salutation = sanitized_input($_POST["salutation"]);
    $firstName = sanitized_input($_POST["firstName"]);
    $middleInitial = sanitized_input($_POST["middleInitial"]);
    $lastName = sanitized_input($_POST["lastName"]);
    $gender = sanitized_input($_POST["gender"]);
    $email = sanitized_input($_POST["email"]);
    $phone = sanitized_input($_POST["phone"]);
    $street = sanitized_input($_POST["street"]);
    $city = sanitized_input($_POST["city"]);
    $region = sanitized_input($_POST["region"]);
    $postalCode = sanitized_input($_POST["postalCode"]);
    $loginName = sanitized_input($_POST["loginName"]);
    $password1 = sanitized_input($_POST["password1"]);
    $password2 = sanitized_input($_POST["password2"]);

    if (!preg_match("/^[A-Z][A-Za-z '-]*$/", $firstName)) {
        die("Bad first name!");
    }
    if (!empty($_POST["middleInitial"]) && !preg_match("/^[A-Z](\.)?$/", $middleInitial)) {
        die("Bad middle initial!");
    }
    if (!preg_match("/^[A-Z][A-Za-z '-]*$/", $lastName)) {
        die("Bad last name!");
    }
    if (!preg_match("/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$/", $email)) {
        die("Bad e-mail!");
    }
    if (!empty($_POST["phone"]) && !preg_match("/^((\d{3}-)?\d{3}-\d{4})|\(\d{3}\)\d{3}-\d{4}$/", $phone)) {
        die("Bad phone number!");
    }
    if(empty($_POST["street"])) {
        die("Missing street!");
    }
    if(empty($_POST["city"])) {
        die("Missing city!");
    }
    if(!preg_match("/^[A-Z]{2}$/",$region)) {
        die("Bad region!");
    }
    if(!empty($_POST["postalCode"]) && !preg_match("/^[A-Z]\d[A-Z] ?\d[A-Z]\d$/",$postalCode)) {
        die("Bad postal code!");
    }
    if(!preg_match("/^[A-Za-z][A-Za-z0-9]{5,14}$/",$loginName)) {
        die("Bad login name!");
    }
    if(!preg_match("/^(?=.*\d)(?=.*[@^_+=[\]:])(?=.*[A-Z])(?=.*[a-z])\S{8,15}$/",$password1)) {
        die("Bad first password!");
    }
    if(!preg_match("/^(?=.*\d)(?=.*[@^_+=[\]:])(?=.*[A-Z])(?=.*[a-z])\S{8,15}$/",$password2)) {
        die("Bad second password!");
    }

}

if (emailAlreadyExist($db, $_POST['email'])) {
    echo 
    "
	<h3> 
            Sorry, but your e-mail address is already registered in our database.
            To register, you must use a different e-mail address.
       </h3>
    ";
}
else if ($_POST["password1"] != $_POST["password2"]) {
    echo 
    "
	<h3> 
            Sorry, but the passwords you entered do not match.
            Your attempt to register has failed. Please try agian.
       </h3>
    ";
}
else {
    $loginDateTime = date("Y-m-d h:i:s");
    $loginPassword = md5($_POST["password1"]);
    $uniqueLoginName = getUniqueLoginName($db, $_POST["loginName"]);
    if($uniqueLoginName != $_POST["loginName"]) {
        echo 
        "
            <h3>
                Your preferred login name already exists. So we have 
                assigned '$uniqueLoginName' as your login name.
            </h3>
        ";
    }
    $firstName = str_replace("'", "\'", $firstName);
    $lastName = str_replace("'", "\'", $lastName);
    $query = "INSERT INTO my_Customer
    (
        salutation, first_name, middle_initial, last_name, gender,
        email, phone, street, city, region, postal_code,
        date_time, login_name, login_password
    )
    VALUES
    (
        '$salutation', '$firstName', '$middleInitial', '$lastName', '$gender',
	'$email', '$phone', '$street', '$city', '$region', '$postalCode',
	'$loginDateTime', '$uniqueLoginName', '$loginPassword'
    );";
    
    if (mysqli_query($db, $query)) {
        echo
	"
            <h3>
                Thank you for registering with Molten Delights Pizzeria. <br>
                Your login username for our website is '$uniqueLoginName'.<br>
                Remember to record the password you supplied in a safe place. <br>
                To log in and start shopping in our e-store please 
                <a href='pages/formLogin.php'>click here</a>.
            </h3>
        ";
    } else {
        echo 
        "
            <h3>
                Unable to register: 
	    </h3>   
        " . mysqli_error($db) . " Error: #". mysqli_errno($db);
    }

    mysqli_close($db);
}

?>
