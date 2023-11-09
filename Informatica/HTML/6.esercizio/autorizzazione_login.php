<?php ob_start(); ?>
<?php
 require('db_connect.php');

if (isset($_POST['user']) and isset($_POST['pass'])){

// Assigning POST values to variables.
$username = $_POST['user'];
$password = $_POST['pass'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($count == 1){

  //echo "Login Credentials verified";
  //echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
  if($row['ruolo']=="user"||$row['ruolo']=="admin"){
    if($row['ruolo']=="user"){require('homeuser.php');
    }else{require('admin.php');}
  }else{
    require('altri.php');
  }

}else{
  //echo "Login fallito";
  //echo "<script type='text/javascript'>alert('Username e Password Errate')</script>";
  require('login.php');

  //echo "Invalid Login Credentials";
}
/*if ($row['username'] == $username && $row['password'] == $password) {
      echo "Login con successo !!! Benvenuto ".$row[username];
    } else {
      echo "Login fallito";
    }*/
}
?>
