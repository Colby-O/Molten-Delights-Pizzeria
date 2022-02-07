<!-- banner.html-->
<?php
  $_SERVER['CONTEXT_DOCUMENT_ROOT'] = ".";
?>
<div class="w3-half">
  <img src="images/logo.png" alt="Picture of our logo" id="logo">
</div>

<div class="w3-half w3-container">
  <div class="w3-container">
    <div class="w3-right-align">
      <h4>Welcome!</h4>
      <h6 id="datetime">
        <?php include("scripts/time.php") ?>
      </h6>
      <a title="Not yet active" href="pages/sorry.php" class="w3-button w3-round w3-orange w3-hover-deep-orange">Click here to log in</a>
    </div>
    <br>
    <div class="w3-left-align quote">
        <i id="quote-container">
          <?php include("scripts/get_quote.php") ?>
        </i>
    </div>
  </div>
</div>