<?php
  session_start();
  function shortenTo140($bodyToShorten) {
    $i = 140;
    $body = $bodyToShorten;
    do{
        $body = substr($bodyToShorten, 0, $i);
        $i--;
    }while($i > 0 && $body{$i} != " ");

    return $body;
  }

  function labels($row) {
    $label = "&nbsp;|&nbsp;<span class=\"info label\" style=\"background-color:#";
    $label = $label .$row['Label1_Color'];
    $label = $label . "\">";
    $label = $label . $row['Label1_Name'];
    $label = $label . " </span>";
    $label = $label . "&nbsp;|&nbsp;<span class=\"info label\" style=\"background-color:#";
    $label = $label .$row['Label2_Color'];
    $label = $label . "\">";
    $label = $label . $row['Label2_Name'];
    $label = $label . " </span>";
    $label = $label . "&nbsp;|&nbsp;<span class=\"info label\" style=\"background-color:#";
    $label = $label .$row['Label3_Color'];
    $label = $label . "\">";
    $label = $label . $row['Label3_Name'];
    $label = $label . " </span>";
  }
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
            echo "<li class=\"right\"><a href=\"profile.php\"><img style=\"height:42px; width:42px;\"src=\"{$_SESSION['Avatar']}\"></a></li>";
            ?>
            <li class="right"><a href="signout.php">Sign Out</a></li>
          </ul>
        </section>
      </nav>
       <div class="row">
        <div class="large-12 columns">
          <div class="panel">
            <?php
              echo "<h1>{$_SESSION["Fname"]}"." ". "{$_SESSION["Lname"]}</h1>";
            ?>
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
              echo "<a href=\"#\"><img src=\"{$_SESSION['Avatar']}\"/></a>";
              echo "<h5><a href=\"#\">{$_SESSION['Fname']} {$_SESSION['Lname']}</a></h5>";
            ?>
              <div class="section-container vertical-nav" data-section data-options="deep_linking: false; one_up: true">
              <section class="section">
                <h5 class="title"><a href="update_profile.php">Update Profile</a></h5>
              </section>
            </div>

          </div>
        </div>
          <div id="issues" class="large-9 columns">
          <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
          <script src="js/foundation/foundation.js"></script>
          <script src="js/foundation/foundation.reveal.js"></script>

          <?php
          require_once 'login.php';

          $db_server = mysqli_connect($db_hostname, $db_username, $db_password);
          if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
          mysqli_select_db($db_server, $db_database)
             or die("Unable to select database: " .mysql_error());

          $query = "SELECT * FROM ISSUES WHERE UID = '{$_SESSION["UID"]}'";
          $result = mysqli_query($db_server, $query);
          if($result) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $body = str_replace("[mysinglequote]", "'", $row['Body']);
              $body = str_replace("[backtick]", "`", $body);
              ?>
              <div class="row issue">
              <div class="large-2 columns small-3"><img class="th avatar-thumbnail" src="<?= $row['Avatar_URL'] ?>"></div>
              <div class="large-10 columns">
                <ul class="inline-list">
                  <li><strong>Issue: &#35;<?php echo $row['Id'];?></strong></li>
                  <li><strong><?php echo $row['Title']; ?></strong></li>
                </ul>
                <ul class="inline-list">
                  <li><strong><a href="<?= $row['HTML_URL']?>">Comments on GitHub</a></strong></li>
                  <li><strong>Issue State: <?php echo $row['State'];?></strong></li>
                </ul>
                <a href="<?= $row['User_HTML']?>">
                  &#64;<?= $row['User']?>
                </a>
                  <p><?= shortenTo140($body); ?></p>
                  <form action="remove.php" method="post">
                    <a href="#" class="button tiny" data-reveal-id="issue-detail-modal-<?= $row['IID']?>">Full Details</a>
                    <input type="hidden" name="IID" value="<?= $row['IID']?>">
                    <input type="submit" class="button tiny" value="Remove Issue">
                  </form>
                </div>
              </div>
                <div id="issue-detail-modal-<?= $row['IID']?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

              <img class="th avatar-thumbnail" src="<?= $row['Avatar_URL'] ?>"> says: <h4 id="modalTitle"><?= $row['Title']?></h4>
                 <p class="lead subheader">Issue &#35;<?= $row['Id']?> | <a href="<?= $row['User_HTML']?>">&#64;<?= $row['User'] ?></a></p>
                 <p class="full-detail"><?= $body ?></p>
                 <a class="close-reveal-modal" aria-label="Close">&#215;</a>
              </div>
              <hr/>
              <?php
            }
          }
          ?>
          </div>

      <footer class="row">
        <div class="large-12 columns">
          <hr/>
          <div class="row">
            <div class="large-5 columns">
              <p>Copyright no one at all.</p>
        </div>
      </footer>
   </body>
   <script>
    $(document).foundation();
  </script>
</html>
