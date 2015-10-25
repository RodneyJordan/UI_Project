<?php session_start();
require_once 'login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysqli_select_db($db_server, $db_database)
   or die("Unable to select database: " .mysql_error());

if(isset($_POST['Title'])) {
  $title = $_POST['Title'];
  $state = $_POST['State'];
  $url = $_POST['URL'];
  $label_url = $_POST['Labels_URL'];
  $comments_url = $_POST['Comments_URL'];
  $html_url = $_POST['HTML_URL'];
  $id = $_POST['Id'];
  $body = $_POST['Body'];
  $page = $_POST['page'];

  $query = "INSERT INTO ISSUES(Title, State, URL, Labels_URL, Comments_URL, HTML_URL, Id, Body)
    VALUES('$title', '$state', '$url', '$label_url', '$comments_url', '$html_url', '$id', '$body')";
  $result = mysqli_query($db_server, $query);
  if(!$result) die ("Database access failed: " .mysql_error());
  else {
    $_SESSION["flagSet"] = true;
    header("Location: " .$page);
    exit();
  }
}
?>
