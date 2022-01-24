<!-- rewards_about.php for Molten Delights Pizzeria Version 1 -->
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
      <article>
        <h3>About Our Rewards Program</h3>
        <p>
          One of our primary focuses is to save you money and at 
          Molten Delights Pizzeria we have various way you can save.
          Below we outline two ways you can save at Molten Delights 
          Pizzeria:
        </p>
        <ul>
          <li> 
            <h4>Rewards</h4>
            <ul>
              <li>
                <p>
                  Everytime you place an order with us that has a commutative value
                  of $10 or more you will be given 1 point. You can save these
                  points inorder to get free items for your future orders! You 
                  can view how many points you need to get an item on our menu for 
                  free in the e-store. 
                </p>
              </li>
              <li>
                <p>   
                  You view your current points count by 
                  <a title="Not yet active" href="./pages/sorry.php">clicking here</a>.
                </p>
              </li>
            </ul>
          </li>
          <li>
            <h4>Coupons</h4>
            <ul>
              <li>
                <p>
                  We offers various coupons that changes from time to time that can 
                  save you money on your purchase. The coupons can be selected
                  at the checkout inorder to apply the discount to your order.
                </p>
              </li>
              <li>
                <p>
                  You can see the coupons we currently have available by
                  <a href="./pages/rewards_coupons.php">clicking here</a>.
                </p>
              </li>
            </ul>
          </li>
        </ul>
        <p>
          You can refer to our FAQ's page if you have any further questions by
          <a href="./pages/rewards_faq.php">clicking here</a>.
        </p>
      </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>