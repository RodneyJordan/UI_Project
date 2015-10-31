<?php session_start();
require_once 'login.php';

$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysqli_select_db($db_server, $db_database)
   or die("Unable to select database: " .mysql_error());

if(isset($_POST['fname']) || isset($_POST['lname']) || isset($_POST['email']) || isset($_POST['password'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $uid = $_SESSION['UID'];

  if($fname !== "") {
    $query = "UPDATE USER SET Fname='$fname' WHERE UID = '$uid'";
    $result = mysqli_query($db_server, $query);
    if(!$result) die ("Database access failed: " .mysql_error());
    $_SESSION["Fname"] = $fname;
  }
  if($lname !== "") {
    $query = "UPDATE USER SET Lname='$lname' WHERE UID = '$uid'";
    $result = mysqli_query($db_server, $query);
    if(!$result) die ("Database access failed: " .mysql_error());
    $_SESSION["Lname"] = $lname;
  }
  if($email !== "") {
    $query = "UPDATE USER SET UserName='$email' WHERE UID = '$uid'";
    $result = mysqli_query($db_server, $query);
    if(!$result) die ("Database access failed: " .mysql_error());
    $_SESSION["UserName"] = $email;
  }
  if($password !== "") {
    $query = "UPDATE USER SET Password='$password' WHERE UID = '$uid'";
    $result = mysqli_query($db_server, $query);
    if(!$result) die ("Database access failed: " .mysql_error());
  }
  header("Location: profile.php");
}
?>
