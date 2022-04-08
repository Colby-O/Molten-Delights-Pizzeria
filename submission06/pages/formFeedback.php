<!-- formFeedback.php for Molten Delights Pizzeria Version 3 -->
<?php 
  session_start();
  $_SESSION['SECURE'] = '!@$^%FDSSFDWQR@';
  $_SESSION['ORIGIN'] = $_SERVER['PHP_SELF'];

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
            <h3 class="w3-center">Feedback Form ... Tell Us What You Think, or Ask Us a Question</h3>
            <p class="w3-text-red w3-center">Each * denotes a required field.</p>
	    <form id="myForm" action="scripts/formFeedbackProcess.php" method="post">
                <div class="w3-row">
                    <div class="w3-third w3-wide w3-container">
                        <h4>Salutation:<span class="w3-text-red">*</span></h4>
                    </div>
                    <div class="w3-twothird w3-container">
                        <p>
                            <select name="salutation" required>
                                <option value selected disabled hidden>Choose one</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Dr.">Dr.</option>
                            </select>
                        </p>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-third w3-wide w3-container"> 
                        <h4>First Name:<span class="w3-text-red">*</span></h4>
                    </div>
                    <div class="w3-twothird w3-container">
                        <p>
                            <input type="text" name="firstName" required title="Initial capital, spaces, hyphens and apostrophes allowed." style="width: 100%;" pattern="^[A-Z][A-Za-z '-]*">
                        </p>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-third w3-wide w3-container"> 
                        <h4>Last Name:<span class="w3-text-red">*</span></h4>
                    </div>
                    <div class="w3-twothird w3-container">
                        <p>
                            <input type="text" name="lastName" required title="Initial capital, spaces, hyphens and apostrophes allowed." style="width: 100%;" pattern="^[A-Z][A-Za-z '-]*">
                        </p>                        
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-third w3-wide w3-container"> 
                        <h4>E-mail Address:<span class="w3-text-red">*</span></h4>
                    </div>
                    <div class="w3-twothird w3-container">
                        <p>
                            <input type="text" name="email" required title="x@y.z x and y alphnumeric, . or -, z 2 or 3 letters" style="width: 100%;" pattern="\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})">
                        </p>                        
                    </div>                    
                </div>   
                <div class="w3-row">
                    <div class="w3-third w3-wide w3-container"> 
                        <h4>Phone Number:</h4>
                    </div>
                    <div class="w3-twothird w3-container">
                        <p>
                            <input type="text" name="phone" title="xxx-yyy-zzzz, area code xxx- optional" style="width: 100%;" pattern="^(\d{3}-)?\d{3}-\d{4}">
                        </p>                        
                    </div>                    
                </div>  
                <div class="w3-row">
                    <div class="w3-third w3-wide w3-container"> 
                        <h4>Subject:<span class="w3-text-red">*</span></h4>
                    </div>
                    <div class="w3-twothird w3-container">
                        <p>
                            <input type="text" name="subject" required style="width: 100%;">
                        </p>                        
                    </div>                    
                </div>                
                <div class="w3-row">
                    <div class="w3-third w3-wide w3-container"> 
                        <h4>Comments:<span class="w3-text-red">*</span></h4>
                    </div>
                    <div class="w3-twothird w3-container">
                        <p>
                            <textarea name="message" rows="6" required style="width: 100%;"></textarea>
                        </p>                        
                    </div>                    
                </div>                
                <div class="w3-row">
                    <div class="w3-third w3-wide w3-container"> 
                        <p>&nbsp;</p>
                    </div>
                    <div class="w3-twothird w3-container">
                        <h6>
                            Please check if you would like us to get back to you: 
                            <input type="checkbox" name="reply">
                        </h6>
                    </div>                    
                </div>
                <div class="w3-row">
                    <div class="w3-third w3-wide w3-container"> 
                        <p>&nbsp;</p>
                    </div>
                    <div class="w3-twothird w3-container">
                        <p>
                            <input type="submit" value="Send Feedback">
                            <input type="reset" value="Reset Form">
                        </p>
                    </div>                    
                </div>
            </form>
          </article>
      </div>
  </main>
  <footer class="w3-container">
    <?php include("./common/footer.html") ?>
  </footer>
</body>
</html>
