<?php session_start();
require_once 'login.php';
$_SESSION["emptyEmail"] = false;
$_SESSION["emptyPassword"] = false;
$_SESSION["invalidEntry"] = false;
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysqli_select_db($db_server, $db_database)
   or die("Unable to select database: " .mysql_error());

if(isset($_POST['email']) && isset($_POST['password'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   if($email == "") {
      $_SESSION["emptyEmail"] = True;
      header("Location: sign_in.php");
      exit();
   }
   elseif($password == "") {
     $_SESSION["emptyPassword"] = True;
     //echo $email;
     $_SESSION["enteredEmail"] = $email;
     header("Location: sign_in.php");
     exit();
   }

   $query = "SELECT * FROM USER WHERE UserName = '$email' and Password = '$password'";
   $result = mysqli_query($db_server, $query);
   $_SESSION["emptyEmail"] = false;
   $_SESSION["emptyPassword"] = false;
   if(!$result) die ("Database access failed: " .mysql_error());
   //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   if (mysqli_num_rows($result) < 1) {
      $_SESSION["invalidEntry"] = true;
      header("Location: sign_in.php");
      exit();
   }
   else {
     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
     $_SESSION["UserName"] = $row["UserName"];
     $_SESSION["Fname"] = $row["Fname"];
     $_SESSION["Lname"] = $row["Lname"];
     $_SESSION["UID"] = $row["UID"];
     header("Location: profile.php"); /* Redirect browser */
     exit();
   }
   //echo "New record created successfully.";
}

?>
