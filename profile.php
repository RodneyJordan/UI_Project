<?php
  session_start();
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
            <li class="right"><a href="#"><img src="img/avatar.png" alt="" height="42" width="42"></a></li>
            <li class="right"><a href="#">Sign Out</a></li>
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
            <a class="item" href="issues/golang.html">
              <label>Go Language</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/scala.html">
              <label>Scala</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/foundation.html">
              <label>Foundation</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/rails.html">
              <label>Ruby on Rails</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/dancer.html">
              <label>Perl Dancer</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/angular.php">
              <label>AngularJS</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/pyramid.html">
              <label>Pyramid</label>
            </a>
            <a style="height: 82px;" class="item" href="issues/grails.html">
              <label>GRails</label>
            </a>
          </div>
        </div>
      </div>

      <div class="row">


        <div class="large-3 columns ">
          <div class="panel">
            <a href="#"><img src="img/avatar.png"/></a>
            <h5><a href="#">Your Name</a></h5>
              <div class="section-container vertical-nav" data-section data-options="deep_linking: false; one_up: true">
              <section class="section">
                <h5 class="title"><a href="#">Section 1</a></h5>
              </section>
              <section class="section">
                <h5 class="title"><a href="#">Section 2</a></h5>
              </section>
              <section class="section">
                <h5 class="title"><a href="#">Section 3</a></h5>
              </section>
              <section class="section">
                <h5 class="title"><a href="#">Section 4</a></h5>
              </section>
              <section class="section">
                <h5 class="title"><a href="#">Section 5</a></h5>
              </section>
              <section class="section">
                <h5 class="title"><a href="#">Section 6</a></h5>
              </section>
            </div>

          </div>
        </div>



        <div class="row issue">
          <?php
          require_once 'login.php';

          $db_server = mysqli_connect($db_hostname, $db_username, $db_password);
          if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
          mysqli_select_db($db_server, $db_database)
             or die("Unable to select database: " .mysql_error());

          $query = "SELECT * FROM ISSUES WHERE UID = '{$_SESSION["UID"]}";
          $result = mysqli_query($db_server, $query);
          if($result) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              ?>
              <div class="large-2 columns small-3"><img class="th avatar-thumbnail" src="<?php $row['avatar_url']?>"></div>
              <div class="large-10 columns">
                <ul class="inline-list">
                  <li><strong>Issue: &#35;<?php $row['number']?></strong></li>
                  <li><strong>fucking shit bitch</strong></li>
                </ul>
                <a href="<%= user.html_url %>">&#64;<%= user.login %></a>
                 <%= getLabels(labels.url) %>
              <p><%= shortenTo140(body) %></p>
              <a href="#" class="button tiny" data-reveal-id="issue-detail-modal-<%= id %>">Full Details</a>
                </div>
                </div>
                <div id="issue-detail-modal-<%= id %>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

              <img class="th avatar-thumbnail" src="<%= user.avatar_url %>"> says: <h4 id="modalTitle"><%= title %></h4>
                 <p class="lead subheader">Issue &#35;<%= number %> | <a href="<%= user.html_url %>">&#64;<%= user.login %></a><%= getLabels(labels) %></p>
                 <p class="full-detail"><%= body %></p>
                 <a href="flag.php" class="button tiny">Flag</a>
                 <a class="close-reveal-modal" aria-label="Close">&#215;</a>
              </div>
              <hr/>
              <?php
            }
          }
          else {
          }
          ?>


          <div class="row">
            <div class="large-2 columns small-3"><img src="http://placehold.it/80x80&text=[img]"/></div>
            <div class="large-10 columns">
              <p><strong>Some Person said:</strong> Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
              <ul class="inline-list">
                <li><a href="">Reply</a></li>
                <li><a href="">Share</a></li>
              </ul>
            </div>
          </div>


          <hr/>


          <div class="row">
            <div class="large-2 columns small-3"><img src="http://placehold.it/80x80&text=[img]"/></div>
            <div class="large-10 columns">
              <p><strong>Some Person said:</strong> Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
              <ul class="inline-list">
                <li><a href="">Reply</a></li>
                <li><a href="">Share</a></li>
              </ul>


              <h6>2 Comments</h6>
              <div class="row">
                <div class="large-2 columns small-3"><img src="http://placehold.it/50x50&text=[img]"/></div>
                <div class="large-10 columns"><p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit</p></div>
              </div>
            </div>
          </div>


        </div>



        <aside class="large-3 columns hide-for-small">
          <p><img src="http://placehold.it/300x440&text=[ad]"/></p>
          <p><img src="http://placehold.it/300x440&text=[ad]"/></p>
        </aside>

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
   </body>
</html>
