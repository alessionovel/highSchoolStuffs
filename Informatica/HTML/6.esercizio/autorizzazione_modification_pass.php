<?php ob_start(); ?>
<?php
 require('db_connect.php');

/*if (isset($_POST['pass'])){

// Assigning POST values to variables.
$password = $_POST['pass'];

// CHECK FOR THE RECORD FROM TABLE
$query ="UPDATE `users` SET `matricola`=[$password] WHERE password='$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);*/


  //echo "Login Credentials verified";
  //echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
  require('homeuser.php');
/*if ($row['username'] == $username && $row['password'] == $password) {
      echo "Login con successo !!! Benvenuto ".$row[username];
    } else {
      echo "Login fallito";
    }*/
//}
?>
