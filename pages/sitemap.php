<!--sitemap.php for Molten Delights Pizzeria Version 1-->
<?php 
  chdir("../");
  include("./common/document_head.html"); 
?>
<body class="body w3-auto">
  <header class="w3-container">
    <div class="w3-pannel w3-border w3-border-black w3-sand">
      <?php include("./common/banner.html") ?>
      <?php include("./common/menus.html") ?>
    </div>
  </header>

  <main class="w3-container">
    <div class="w3-container w3-border-left w3-border-right w3-border-black w3-sand"> 
      <div class="w3-half w3-border w3-border-black">
        <ul class="w3-ul">
          <li>
            <h4 class="w3-wide">
              <a href="./index.php">Home</a>
            </h4>
          </li>
        </ul>

        <ul class="w3-ul w3-border-top w3-border-black"> 
          <li>
            <h4 class="w3-wide">e-store</h4>
          </li>

          <li>
            <a href="./pages/estore.php">e-store Options</a>
          </li>

          <li>
            <a title ="Not yet active" href="./pages/sorry.php">Product Catalog</a>
          </li>

          <li>
          <a title ="Not yet active" href="./pages/sorry.php">Register</a>
          </li>

          <li>
           <a title ="Not yet active" href="./pages/sorry.php">Login</a>
         </li>

          <li>
            <a title ="Not yet active" href="./pages/sorry.php">Shopping Cart</a>
          </li>

          <li>
            <a title ="Not yet active" href="./pages/sorry.php">Checkout</a>
          </li>

          <li>
            <a title ="Not yet active" href="./pages/sorry.php">Logout</a>
          </li>
        </ul>
      </div>

      <div class="w3-half w3-border w3-border-black"> 
        <ul class="w3-ul"> 
          <li> 
            <h4 class="w3-wide">Rewards</h4>
          </li>

          <li>
            <a href="./pages/rewards_about.php">About</a>
          </li>

          <li>
            <a href="./pages/rewards_coupons.php">Coupons</a>
          </li>

          <li>
            <a href="./pages/rewards_faq.php">FAQ's</a>
          </li>

          <li>
            <a title="Not yet active" href="./pages/sorry.php">Your Rewards</a>
          </li>
        </ul>

        <ul class="w3-ul w3-border-top w3-border-black"> 
          <li>
            <h4 class="w3-wide">About Us</h4>
          </li>

          <li>
            <a href="./pages/vision.php">Vision and Mission</a>
          </li>

          <li>
            <a href="./pages/locations.php">Our Locations</a>
          </li>

          <li>
            <a title="Not yet active" href="./pages/sorry.php">Tell Us What You Think</a>
          </li>
        </ul>

        <ul class="w3-ul w3-border-top w3-border-black"> 
          <li> 
            <h4 class="w3-wide">
              <a href="./pages/sitemap.php">Site Map</a>
            </h4>
          </li>
        </ul>
      </div>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>