<!-- shoppingCart.php for Molten Delights Pizzeria Version 6 -->
<?php
  session_start();
  $customerID = isset($_SESSION["customer_id"]) ? $_SESSION['customer_id'] : "";
  $productID = $_GET["productID"];
  if ($customerID == "") {
    $_SESSION["purchasePending"] = $productID;
    header("Location: formLogin.php");
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
      <article class="w3-container w3-border-left w3-border-right w3-border-black w3-sand">
          <h4 class="w3-center"><strong>Your Shopping Cart</strong></h4>
          <?php include("scripts/shoppingCartProcess.php"); ?>
      </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>
