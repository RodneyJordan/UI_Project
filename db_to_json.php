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
