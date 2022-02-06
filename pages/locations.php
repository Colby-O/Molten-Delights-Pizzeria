<!-- locations.php for Molten Delights Pizzeria Version 1 -->
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
        <h3>Our Locations</h3>
        <p>
          As our company grows, we hope to expand world wide, so eventually
          we will provide here a list of all our store locations. Each location
          will be accompanied by contact infomation for that location and a 
          link to a map showing you how to find us at that location.
        </p>

        <p>
            In the meantime, here are a few details (just address and telephone number) 
            for our current (and only) location, should you wish to drop by:
        </p>

        <p>
            Molten Delights Pizzeria, inc.
            <br>
            1234 Main Street
            <br>
            Halifax, NS
            <br>
            Canada B3H 8X8
            <br>
            Tel: 902.423.1234
        </p>
      </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>