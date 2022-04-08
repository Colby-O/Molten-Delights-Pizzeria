<!-- checkout.php for Molten Delights Pizzeria Version 6 -->
<?php
  session_start();
  if (!preg_match('/shoppingCart.php/', $_SERVER['HTTP_REFERER'])) {
      header("Location: shoppingCart.php?productID=view");
      exit(0);
  }
  $customerID = $_SESSION['customer_id'];

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
      <article class="w3-container w3-border-left w3-border-right w3-border-black w3-sand">
          <?php include("scripts/checkoutProcess.php"); ?>
      </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>
