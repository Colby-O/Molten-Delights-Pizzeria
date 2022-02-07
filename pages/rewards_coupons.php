<!-- rewards_coupons.php for Molten Delights Pizzeria Version 2 -->
<?php 
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
        <h3>Currently Available Coupons</h3>
        <p>
          Below you can find a list of our currently available coupons:
        </p>
        <ul>
          <li>Two large pizzas with 2 toppings for $20.00</li>
          <li>A large pizza with 2 toppings and a medium garlic fingers for $18.99</li>
          <li>A four toppings medium pizza for $11.00</li>
          <li>Save $5 when you make a purchase of $30 or more</li>
          <li>large pizza with 2 toppings and 10 chicken wings for $15.99</li>
          <li>A medium pizza with 2 toppings and a medium garlic fingers for $14.99</li>
          <li>A medium pizza with 2 toppings and 2L pop for $10.00</li>
          <li>Two large pizzas with 2 toppings, a medium garlic fingers and 10 chicken wings for $30.00</li>
        </ul>
      </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>