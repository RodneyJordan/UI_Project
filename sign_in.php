<?php
  session_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Open Source Community</title>
      <link rel="stylesheet" href="css2/foundation.css">
   </head>
   <body>
      <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
          <li class="name">
            <h1><a href="#">Open Source Community</a></h1>
          </li>
           <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right">
            <li class="right"><a href="create_account.html">Create Account</a></li>
            <li class="right"><a href="sign_in.html">Sign In</a></li>
          </ul>
        </section>
      </nav>
         <div class="row">
            <div class="large-12 columns">
               <br><br><br><br><br><br><br><br>
            </div>
         </div>
         <div class="row">
        <div class="large-6 columns">
        <div id="slider">
          <img src="img/appleComputer.jpg"/>
        </div>

        <hr/>
        </div>
        <div class="large-6 columns">
           <form id="signin" action="signin.php" method="post">
               <fieldset>
                  <legend>Sign In</legend>
                     <label>E-Mail
                     <?php
                        if($_SESSION["emptyEmail"] == true) {
                         echo "<input name=\"email\" type=\"text\" placeholder=\"E-Mail\">";
                         echo "<small class=\"error\">Must enter an E-Mail Address</small>";
                        }
                        elseif($_SESSION["emptyPassword"] == true) {
                          echo "<input name=\"email\" type=\"text\" value=\"{$_SESSION["enteredEmail"]}\">";
                        }
                        else {
                          echo "<input name=\"email\" type=\"text\" placeholder=\"E-Mail\">";
                        }
                     ?>
                </label>
                <label>Password
                   <input name="password" type="password" placeholder="Password">
                   <?php
                      if($_SESSION["emptyPassword"] == true) {
                       echo "<small class=\"error\">Must enter a password.</small>";
                      }
                   ?>
                   <?php
                      if($_SESSION["invalidEntry"] == true) {
                       echo "<small class=\"error\">E-Mail or Password is invalid.</small>";
                      }
                   ?>
                </label>
                <label>
                   <input type="submit" class="button expand" value="Sign In">
                </label>
              </fieldset>
            </form>
        </div>
      </div>

    <div class="row">
        <div class="large-12 columns">

          <div class="panel">
            <h4>Problems signing in?</h4>

            <div class="row">
              <div class="large-9 columns">
                <p>Contact us anytime.</p>
              </div>
              <div class="large-3 columns">
                <a href="#" class="radius button right">Contact Us</a>
              </div>
            </div>
          </div>

        </div>
      </div>



      <footer class="row">
        <div class="large-12 columns">
          <hr/>
          <div class="row">
            <div class="large-6 columns">
              <p>Copyright no one at all.</p>
            </div>
          </div>
        </div>
      </footer>
   </body>
</html>
