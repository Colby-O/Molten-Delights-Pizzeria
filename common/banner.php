<!-- banner.html-->
<?php
  if (session_status() === PHP_SESSION_NONE)
    session_start();
  $loggedIn = isset($_SESSION["customer_id"]) ? true : false;

  $_SERVER['CONTEXT_DOCUMENT_ROOT'] = ".";
?>
<div class="w3-half">
  <img src="images/logo.png" alt="Picture of our logo" id="logo">
</div>

<div class="w3-half w3-container">
  <div class="w3-container">
    <div class="w3-right-align">
      <?php
        if($loggedIn) {
           $firstName = $_SESSION["first_name"];
	   $middleInitial = $_SESSION["middle_initial"];
	   $lastName = $_SESSION["last_name"];
	   $salutation = $_SESSION["salutation"];

           echo "<h5>$salutation $firstName $middleInitial $lastName ... Welcome, $firstName!</h5>";
	}
        else {
          echo "<h5>Welcome!</h5>";
        }
      ?>
      <h6 id="datetime">
        <?php include("scripts/time.php") ?>
      </h6>
      <a <?php echo "href=pages/" . ($loggedIn ? "logout.php" : "formLogin.php"); ?> class="w3-button w3-round w3-orange w3-hover-deep-orange"><?php echo "Click here to log " . ($loggedIn ? "out" : "in"); ?></a>
    </div>
    <br>
    <div class="w3-left-align quote">
        <i id="quote-container">
          <?php include("scripts/get_quote_from_mongodb.php") ?>
        </i>
    </div>
  </div>
</div>
