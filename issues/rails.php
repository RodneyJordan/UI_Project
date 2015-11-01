<?php
  session_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Ruby on Rails</title>
      <link rel="stylesheet" href="../css2/foundation.css">
      <link rel="stylesheet" href="../css/app.css">
      <script src="../js/vendor/modernizr.js"></script>
   </head>
   <body>
    <body>

      <script src="../js/vendor/jquery.js"></script>
      <script src="../js/foundation/foundation.js"></script>
      <script src="../js/foundation/foundation.reveal.js"></script>

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
            echo "<li class=\"right\"><a href=\"../profile.php\"><img style=\"height:42px; width:42px;\"src=\"../{$_SESSION['Avatar']}\"></a></li>";
            ?>
            <li class="right"><a href="../signout.php">Sign Out</a></li>
          </ul>
        </section>
      </nav>
      <div class="row">
        <div class="large-12 columns">
          <div class="panel">
            <h1>Ruby on Rails</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <div class="icon-bar four-up">
            <a class="item" href="../profile.php">
              <img src="../img/svgs/fi-home.svg" >
              <label>Home</label>
            </a>
            <a class="item" href="rails_flagged.php">
              <img src="../img/svgs/fi-flag.svg" >
              <label>Flagged</label>
            </a>
            <a class="item" href="https://github.com/rails/rails">
              <img src="../img/svgs/fi-social-github.svg" >
              <label>Git Repo</label>
            </a>
            <a class="item" href="http://rubyonrails.org/">
              <img src="../img/svgs/fi-link.svg" >
              <label>Rails Homepage</label>
            </a>
          </div>
        </div>
      </div>

      <div class="row">


        <div class="large-3 columns ">
          <div class="panel">
            <?php
              echo "<a href=\"../profile.php\"><img src=\"../{$_SESSION['Avatar']}\"/></a>"
            ?>
            <h5><a href="../profile.php"><?= $_SESSION['Fname']?> <?= $_SESSION['Lname']?></a></h5>

          </div>
        </div>



        <div id="issues" class="large-9 columns">

          <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
          <script src="../js/foundation/foundation.js"></script>
          <script src="../js/foundation/foundation.reveal.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.2/underscore-min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone-localstorage.js/1.1.16/backbone.localStorage-min.js"></script>

          <script type="text/template" id="issueTemplate">
          <div class="row issue">
            <div class="large-2 columns small-3"><img class="th avatar-thumbnail" src="<%= user.avatar_url %>"></div>
            <div class="large-10 columns">
              <ul class="inline-list">
                <li><strong>Issue: &#35;<%= number %></strong></li>
                <li><strong><%= title %></strong></li>
              </ul>
              <a href="<%= user.html_url %>">&#64;<%= user.login %></a>
               <%= getLabels(labels) %>
            <p><%= shortenTo140(body) %></p>
            <a href="#" class="button tiny" data-reveal-id="issue-detail-modal-<%= id %>">Full Details</a>
              </div>
              </div>
              <div id="issue-detail-modal-<%= id %>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

            <img class="th avatar-thumbnail" src="<%= user.avatar_url %>"> says: <h4 id="modalTitle"><%= title %></h4>
               <p class="lead subheader">Issue &#35;<%= number %> | <a href="<%= user.html_url %>">&#64;<%= user.login %></a><%= getLabels(labels) %></p>
               <p class="full-detail"><%= body %></p>
               <form action="flag.php" method="post">
                 <input type="hidden" name="Title" value="<%= title %>">
                 <input type="hidden" name="State" value="<%= state %>">
                 <input type="hidden" name="User" value="<%= user.login %>">
                 <input type="hidden" name="User_HTML" value="<%= user.html_url %>">
                 <input type="hidden" name="URL" value="<%= url %>">
                 <input type="hidden" name="Labels_URL" value="<%= labels_url %>">
                 <input type="hidden" name="Comments_URL" value="<%= comments_url %>">
                 <input type="hidden" name="HTML_URL" value="<%= html_url %>">
                 <input type="hidden" name="Id" value="<%= number %>">
                 <input type="hidden" name="Body" value="<%= body %>">
                 <input type="hidden" name="Avatar_URL" value="<%= user.avatar_url %>">
                 <input type="hidden" name="page" value="rails.php">
                 <input type="submit" class="button tiny" value="Flag">
               </form>
               <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
          <hr/>
          </script>

      </div>




      <footer class="row">
        <div class="large-12 columns">
          <hr/>
          <div class="row">
            <div class="large-5 columns">
              <p>© Copyright no one at all. Go to town.</p>
            </div>
          </div>
        </div>
      </footer>

      <!-- BACKBONE code -->
      <script>
         var Issue = Backbone.Model.extend();

         var IssueList = Backbone.Collection.extend({
            model: Issue,
            url: 'https://api.github.com/repos/rails/rails/issues'
         });

         var issues = new IssueList();

         var IssueView = Backbone.View.extend({
            el: "#issues",
            template: _.template($('#issueTemplate').html()),
            render: function(eventName){
               _.each(this.model.models, function(issue){
                  var issueTemplate = this.template(issue.toJSON());
                  $(this.el).append(issueTemplate);
               }, this);

               return this;
            }
         });

         var issuesView = new IssueView({model: issues});
         issues.fetch({
            success: function(){
               console.log("JSON FETCH SUCCESS", issues.toJSON());
               issuesView.render();
               $(document).ready(function(){
                   $(document).foundation();
               });
            },
            error: function(){ console.log("There was an error fetching")}
         });

         function shortenTo140(stringy){
             var i = 140;
             var short = stringy;
             do{
                 short = stringy.substring(0,i);
                 i--;
             }while(i > 0 && short.charAt(i) != " ");

             return short;
         }

         function getLabels(labels){
            var html = "";
            for(i = 0; i < labels.length; i++) {
              //html = "&nbsp;|&nbsp;<span class=\"info label\"> " + html.concat(labels[i].name);
              html = html.concat("&nbsp;|&nbsp;<span class=\"info label\" style=\"background-color:#");
              html = html.concat(labels[i].color);
              html = html.concat("\">");
              html = html.concat(labels[i].name);
              html = html.concat(" </span>");
            }
               return html;
         }
      </script>
      <!-- END BACKBONE code -->
   </body>
</html>
