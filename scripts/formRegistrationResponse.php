<!-- formRegistrationResponse.php for Molten Delights Pizzeria Version 4 -->
<?php
  session_start();
  
  chdir("../");
  include("./common/document_head.html"); 
?>

<body class="body w3-auto">
  <header class="w3-container">
    <div class="w3-pannel w3-border w3-border-black w3-sand">
      <?php include("./common/banner.php") ?>
      <?php include("./common/menus.html") ?>
    </div>
  </header>

  <main class="w3-container">
     <div class="w3-container w3-border-left w3-border-right w3-border-black w3-sand">
	<article>
          <?php
            $_SESSION["POST_SAVE"] = $_POST;
	    include("./scripts/formRegistrationProcess.php");
          ?>
        </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>

