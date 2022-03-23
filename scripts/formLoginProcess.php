<?php 
    /*
     * formLoginProcess.php for Version 4 of Molten Delights Pizzera.
     */

    session_start();
    if(isset($_SESSION["customer_id"])) {
        header("Location: ../pages/estore.php");
    }

    chdir("../");

    $_SESSION["POST_SAVE"] = $_POST;

    include("connectToDatabase.php");
    $query = "SELECT * FROM my_Customer WHERE login_name = '$_POST[loginName]'";
    $rowsWithMatchingLoginName = mysqli_query($db, $query);
    $numRecords = mysqli_num_rows($rowsWithMatchingLoginName);

    if ($numRecords == 0) {
            header("Location: ../pages/formLogin.php?retrying=true");
    }
    else if ($numRecords == 1) {
	$row = mysqli_fetch_array($rowsWithMatchingLoginName, MYSQLI_ASSOC);
	if (md5($_POST["loginPassword"]) == $row["login_password"]) {
            $_SESSION['customer_id'] = $row['customer_id'];
            $_SESSION['salutation'] = $row['salutation'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['middle_initial'] = $row['middle_initial'];
	    $_SESSION['last_name'] = $row['last_name'];
	    $previousPage = getenv("HTTP_REFERER");
	    header("Location: " . $previousPage);
	}
	else {
            header("Location: ../pages/formLogin.php?retrying=true");
	}
    }

    mysqli_close($db);
?>
