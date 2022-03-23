<!-- logout.php for Molten Delights Pizzeria Version 4 -->
<?php
  session_start();
  $wasLoggedIn = isset($_SESSION['customer_id']) ? true : false;
  if($wasLoggedIn) { 
    session_unset();
    session_destroy();
  }

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
	  <h4>Logout</h4>
          <?php
          if($wasLoggedIn) echo 
	  '<p>
	    Thank you for visiting our e-store.
            <br>
            You have successfully logged out.
          </p>

	  <p>
            If you wish to log back in, <a href="pages/formLogin.php">click here</a>.
	  </p>

	  <p>
	    To browse our product catalog, <a title="Not yet active" href="pages/sorry.php">click here</a>.
	 </p>';

          else echo
	  '<p>
	    Thank you for visiting Molten Delights Pizzeria. You have not yet logged in.
          </p>

	  <p>
            If you wish to log in, <a href="pages/formLogin.php">click here</a>.
	  </p>

	  <p>
	    Or you can browse our product catalog without logging in by <a title="Not yet active" href="pages/sorry.php">clicking here</a>.
	 </p>';
         ?>
        </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>
