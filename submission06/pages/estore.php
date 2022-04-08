<!-- estore.php for Molten Delights Pizzeria Version 2 -->
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
        <h3>Welcome to our e-store ... thanks for visiting.</h3>
        <p>
          We have a large variety of different dishes to choose from. 
          For your shopping and browsing convenience, please choose
          one of the following links:
        </p>
        <ul>
          <li>
            To browse our exciting menu 
            <a href="./pages/catalog.php">click here</a>.
          </li>

          <li>
            ready to purchase and already have a username and password?
            <br> 
            To log in to our e-store and begin ordering 
            <a href="./pages/formLogin.php">click here</a>. 
          </li>

          <li>
            Need to register for our e-store so you can make purchases?
            <br>
            To register (you only need to do it once)
            <a href="./pages/formRegistration.php">click here</a>.
          </li>

          <li>
            Trying to log in as a different user? 
            <br>
            You must first
            <a href="./pages/logout.php">click here to log out</a>.
          </li>
        </ul>
      </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>
