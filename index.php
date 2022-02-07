<!-- index.php for Molten Delights Pizzeria Version 2 -->
<?php include("./common/document_head.html"); ?>
<body class="body w3-auto" onload="carousel()">
  <header class="w3-container">
    <div class="w3-pannel w3-border w3-border-black w3-sand">
      <?php include("common/banner.php") ?>
      <?php include("common/menus.html") ?>
    </div>
  </header>

  <main class="w3-container">
    <div class="w3-container w3-border-left w3-border-right w3-border-black w3-sand" style="padding-right: 0">
      <article class="w3-half">
        <h3>You've come to Molten Delights Pizzeria!</h3>
        <p>
          Founded in 2022, Molten Delights Pizzeria was created 
          to provided our customers with the finest pizzas and 
          deep fried dishes available. We strive for perfection 
          in each dish we perpare, We serve a large variety of
          different dishes ranging from chicken wings to our
          signature pizzas.
        </p>
        <p>
          If you enjoy molten hot pizzas and other deep fried 
          delights that will make your mouth water, you've 
          come to the right place ... check out our e-store 
          to see the various dishes we serve!
        </p>
      </article>

      <?php include("resources/images_and_labels.html") ?>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("common/footer.html") ?>
  </footer>
</body>
</html>

