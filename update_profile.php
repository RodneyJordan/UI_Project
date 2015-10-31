<?php session_start();
?>
<!DOCTYPE html>
<html>
   <head>
     <?php
      echo "<title>Profile - {$_SESSION["Fname"]} {$_SESSION["Lname"]}</title>";
     ?>
     <link rel="stylesheet" href="css2/foundation.css">
      <link rel="stylesheet" href="css/app.css">
      <script src="js/vendor/modernizr.js"></script>
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
            <?php
            echo "<li class=\"right\"><a href=\"#\"><img src=\"{$_SESSION['Avatar']}\" alt=\"\" height=\"42\" width=\"42\"></a></li>";
            ?>
            <li class="right"><a href="signout.php">Sign Out</a></li>
          </ul>
        </section>
      </nav>
       <div class="row">
        <div class="large-12 columns">
          <div class="panel">
            <h1><?= $_SESSION['Fname']?> <?= $_SESSION['Lname']?></h1>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="large-12 columns">
          <div class="icon-bar eight-up">
            <a class="item" href="issues/golang.php">
              <label>Go Language</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/scala.php">
              <label>Scala</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/foundation.php">
              <label>Foundation</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/rails.php">
              <label>Ruby on Rails</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/dancer.php">
              <label>Perl Dancer</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/angular.php">
              <label>AngularJS</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/pyramid.php">
              <label>Pyramid</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/grails.php">
              <label>GRails</label>
            </a>
          </div>
        </div>
      </div>

      <div class="row">


        <div class="large-3 columns ">
          <div class="panel">
            <?php
              echo "<a href=\"#\"><img src=\"{$_SESSION['Avatar']}\"/></a>"
            ?>
            <h5><a href="profile.php"><?= $_SESSION['Fname']?> <?= $_SESSION['Lname']?></a></h5>

          </div>
        </div>



        <div class="large-9 columns">
          <form id="account" action="updateprofile.php" method="post">
              <fieldset>
                 <legend>Update Account</legend>
                 <label>First Name
                   <input name="fname" type="text" placeholder="<?= $_SESSION['Fname']?>">
               </label>
               <label>Last Name
                   <input name="lname" type="text" placeholder="<?= $_SESSION['Lname']?>">
               </label>
                    <label>E-Mail
                    <input name="email" id="email" type="text" placeholder="<?= $_SESSION['Email']?>">
               </label>
               <label>Password
                  <input name="password" id="password" type="password" placeholder="Password">
               </label>
               <label>
                  <input type="submit" class="button expand" value="Update Profile">
               </label>
             </fieldset>
           </form>
        </div>

      </div>

      <footer class="row">
        <div class="large-12 columns">
          <hr/>
          <div class="row">
            <div class="large-5 columns">
              <p>© Copyright no one at all. Go to town.</p>
            </div>
            <div class="large-7 columns">
              <ul class="inline-list right">
                <li><a href="#">Section 1</a></li>
                <li><a href="#">Section 2</a></li>
                <li><a href="#">Section 3</a></li>
                <li><a href="#">Section 4</a></li>
                <li><a href="#">Section 5</a></li>
                <li><a href="#">Section 6</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <?php
        $uploaddir = 'img';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['avatar']);

        //echo '<pre>';
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo "Possible file upload attack!\n";
        }

        echo 'Here is some more debugging info:';
        print_r($_FILES);

        print "</pre>";

      ?>
   </body>
</html>
