<?php
require_once 'login.php';
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysqli_select_db($db_server, $db_database)
   or die("Unable to select database: " .mysql_error());

if(isset($_POST['email']) && isset($_POST['password'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $avatar = "img/default-user.png";
   echo $avatar;

   $query = "INSERT INTO USER(UserName, Password, Fname, Lname, Avatar) VALUES('$email', '$password', '$firstname', '$lastname', '$avatar')";
   $result = mysqli_query($db_server, $query);
   if(!$result) die ("Database access failed: " .mysqli_error($db_server));
   header("Location: profile.php");
}

?>
