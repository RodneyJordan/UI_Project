// Code that is not in use.

<?php session_start();
require_once 'login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysqli_select_db($db_server, $db_database)
   or die("Unable to select database: " .mysql_error());

if(isset($_SESSION['UID'])) {
  $query = "SELECT * FROM ISSUES WHERE UID = '{$_SESSION["UID"]}'";
  $result = mysqli_query($db_server, $query) or die("Error in Selecting " . mysqli_error($db_server));

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  json_encode($row);

  mysqli_close($db_server);

  $current = "<!DOCTYPE html>\n";
  $current .= "<html>\n";
  $current .= "<head>\n";
  $current .= "</head>\n";
  $current .= "<body>\n";
  foreach ($row as &$value) {
    $current .= $value;
    $current .= "\n";
  }
  $current .= "</body>\n";
  $current .= "</html>\n";
}
?>
<a class="item">
  <img src="../img/svgs/fi-share.svg" >
  <label>Share</label>
</a>

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
