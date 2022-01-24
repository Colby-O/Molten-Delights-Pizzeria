<!-- rewards_faq.php for Molten Delights Pizzeria Version 1 -->
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
        <h3>Frequently Asked Questions About Our Reward Program</h3>
        <p>
          Below are some frequently asked questions about our 
          rewards porgram:
        </p>

        <div class="w3-dropdown-hover w3-block">
          <div class="w3-hover-orange w3-border w3-border-orange"> 
            <button class="w3-button w3-hover-orange">
              Can I earn points on multiple orders per day?
            </button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-sand"> 
              <p>
                Yes, you can earn points on any order you make that has a value of
                $10 or more.
              </p>
            </div>
          </div>
        </div>

        <br>
        <br>
        <div class="w3-dropdown-hover w3-block">
          <div class="w3-hover-orange w3-border w3-border-orange"> 
            <button class="w3-button w3-hover-orange">
              Does the reward points expire?
            </button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-sand"> 
              <p>
                No, the reward points do not expire. 
              </p>
            </div>
          </div>
        </div>

        <br>
        <br>
        <div class="w3-dropdown-hover w3-block">
          <div class="w3-hover-orange w3-border w3-border-orange"> 
            <button class="w3-button w3-hover-orange">
              Do I need an account to get reward points and/or use coupons?
            </button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-sand"> 
              <p>
                Yes, you need an account inorder to make a purchase so by
                proxy you need an account to use coupons and collect 
                reward points.
              </p>
            </div>
          </div>
        </div>

        <br>
        <br>

        <div class="w3-dropdown-hover w3-block">
          <div class="w3-hover-orange w3-border w3-border-orange"> 
            <button class="w3-button w3-hover-orange">
              Can I use more than one coupon on a single purchase?
            </button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-sand"> 
              <p>
                No, you can only use a single coupon per purchase.
              </p>
            </div>
          </div>
        </div>

        <br>
        <br>

        <div class="w3-dropdown-hover w3-block">
          <div class="w3-hover-orange w3-border w3-border-orange"> 
            <button class="w3-button w3-hover-orange">
              How can I apply a coupon to my purchase?
            </button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-sand"> 
              <p>
                You can select the coupon you want to use at the checkout.
              </p>
            </div>
          </div>
        </div>

        <br>
        <br>

        <div class="w3-dropdown-hover w3-block">
          <div class="w3-hover-orange w3-border w3-border-orange"> 
            <button class="w3-button w3-hover-orange">
              When do the coupons get updated.
            </button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-sand"> 
              <p>
                The coupons get update in irregular intervals. Once we feel like
                the coupons are getting old we will swap them out.
              </p>
            </div>
          </div>
        </div>

      <br>
      <br>

      <p> 
        If you have any further you can reach out to us at our phone number listed on 
        Our Locations page <a href="./pages/locations.php">here</a> or,
        <br>
        you can submit feedback <a title="Not yet active" href="./pages/sorry.php">here</a> 
        and we can update the FAQ's page.
      </p>
      </article>
    </div>
  </main>

  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>