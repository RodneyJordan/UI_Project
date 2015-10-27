<?php session_start();
require_once 'login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysqli_select_db($db_server, $db_database)
   or die("Unable to select database: " .mysql_error());

if(isset($_POST['IID'])) {
  $iid = $_POST['IID'];

  $query = "DELETE FROM ISSUES WHERE IID = '$iid'";
  $result = mysqli_query($db_server, $query);
  if(!$result) die ("Database access failed: " .mysqli_error($db_server));
  else {
    header("Location: profile.php");
    exit();
  }
}
?>
