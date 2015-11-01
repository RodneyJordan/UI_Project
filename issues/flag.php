<?php session_start();
require_once '../login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysqli_select_db($db_server, $db_database)
   or die("Unable to select database: " .mysql_error());

if(isset($_POST['Title'])) {
  $origin = $_POST['page'];
  $title = $_POST['Title'];
  $state = $_POST['State'];
  $user = $_POST['User'];
  $user_html = $_POST['User_HTML'];
  $url = $_POST['URL'];
  $label_url = $_POST['Labels_URL'];
  $comments_url = $_POST['Comments_URL'];
  $html_url = $_POST['HTML_URL'];
  $id = $_POST['Id'];
  $body = $_POST['Body'];
  $uid = $_SESSION['UID'];
  $avatar_url = $_POST['Avatar_URL'];
  $title = str_replace("'", "[mysinglequote]", $title);
  $title = str_replace("`", "[backtick]", $title);
  $body = str_replace("'", "[mysinglequote]", $body);
  $body = str_replace("`", "[backtick]", $body);

  $query = "INSERT INTO ISSUES(UID, Origin, Title, State, User, User_HTML,
    URL, Labels_URL, Comments_URL, HTML_URL, Id, Body, Avatar_URL)
    VALUES('$uid', '$origin', '$title', '$state', '$user', '$user_html', '$url',
    '$label_url', '$comments_url', '$html_url', '$id', '$body', '$avatar_url')";
  $result = mysqli_query($db_server, $query);
  if(!$result) die ("Database access failed: " .mysqli_error($db_server));
  else {
    //$_SESSION["flagSet"] = true;
    header("Location: " .$origin);
    exit();
    //echo "seems to have worked...";
  }
}
?>
