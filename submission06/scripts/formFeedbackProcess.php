<?php
    session_start();
    $secure = $_SESSION['SECURE'];
    $origin = $_SESSION['ORIGIN'];

    if($secure != '!@$^%FDSSFDWQR@') {
        die('SECURE test failed.');
    }

    if($origin != "/~u26/submissions/submission03/pages/formFeedback.php") {
        die("ORIGIN test failed.");
    }

    function sanitized_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $salutation = $firstName = $lastName = $email = "";
    $phone = $subject = $message = ""; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Gets data from the form submission.
        $salutation = sanitized_input($_POST['salutation']);
        $firstName = sanitized_input($_POST['firstName']);
        $lastName = sanitized_input($_POST['lastName']);
        $email = sanitized_input($_POST['email']);
        $phone = empty($_POST['phone']) ? "Not given" : sanitized_input($_POST['phone']);
        $subject = sanitized_input($_POST['subject']);
        $message = sanitized_input($_POST['message']);

        // Checks if data has the proper format.
        if(!preg_match("/^[A-Z][A-Za-z \\'\\-]*$/", $firstName)) {
            die("Bad first name!");
        }
        if(!preg_match("/^[A-Z][A-Za-z \\'\\-]*$/", $lastName)) {
            die("Bad last name!");
        }
        if(!preg_match("/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$/", $email)) {
            die("Bad e-mail!");
        }
        if(!empty($_POST['phone']) && !preg_match("/^(\d{3}-)?\d{3}-\d{4}$/", $phone)) {
            die("Bad phone number!");
        }
    }

    // constructs the message to the business
    $messageToBusiness = 
        "From: $salutation $firstName $lastName\r\n" .
        "E-mail address: $email\r\n" .
        "Phone number: $phone\r\n" .
        "------------------------\r\n" .
        "Subject: $subject\r\n" . 
        "------------------------\r\n" . 
        "$message\r\n" . 
        "========================\r\n";

    // constructs the header to the business
    $headerToBusiness = "From: $email\r\n";

    // sends the email to the business 
    mail("u50@mail.cs.smu.ca", $subject, $messageToBusiness, $headerToBusiness);

    // constructs the email to the client
    $messageToClient = 
        "Dear $salutation $lastName:\r\n" . 
        "The following message was received from you by Molten Delights Pizzeria:\r\n" .
        "========================\r\n" . 
        $messageToBusiness .
        "Thank you for your interest and your feedback.\r\n" . 
        "From the folks at Molten Delights Pizzeria\r\n" . 
        "========================\r\n";

    // Let's the client know we will contact them if they requested the business to do so
    if(isset($_POST['reply'])) {
        $messageToClient .= "P.S. We will contact you shortly with more information."; 
    }

    // constructs the header to the business
    $headerToClinet = "From: u26@ps.cs.smu.ca\r\n";

    // sends the e-mail to the client
    mail($email, "Re: $subject", $messageToClient, $headerToClinet);

    // displays the clients message to the webpage
    $display = str_replace("\r\n", "\r\n<br>", $messageToClient);
    $display = 
        "<!DOCTYPE html>
        <html lang='en'>
            <head><meta charset='utf-8'><title>Your Message</title></head>
            <body><code>$display</code></body>
        </html>";
    echo $display;

    // stores the business email in a log file
    $logFile = fopen("../data/feedback.txt", "a") or die("ERROR: Could not open the log file.");
    fwrite($logFile, "Date reveived: ". date("jS \of F, Y \a\\t H:i:s\n")) or die("ERROR: Could not write message to the log file.");
    fwrite($logFile, $messageToBusiness . "\n") or die("ERROR: Could not write message to the log file.");
?>
