<!-- catalog.php for Molten Delights Pizzeria Version 5 -->
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
	<h4>
          Items Available in Your Chosen Category &nbsp;&nbsp;&nbsp;&nbsp;
          <a class="w3-button w3-orange w3-hover-deep-orange w3-round w3-small" href="pages/catalog.php">Return to category list</a>
	</h4>

	<?php include("scripts/categoryProcess.php"); ?>

      </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>
