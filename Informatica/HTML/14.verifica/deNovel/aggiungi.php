<?php ob_start(); ?>
<?php
 require('db_connection.php');

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$data = $_POST['data'];
$num = '0000';

$query= "SELECT * FROM utenti ORDER BY id DESC";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
if ($count==0){
  $num = '0001';
}else{
  $row = mysqli_fetch_array($result);
  $num = substr($row['id'], 0, 4);
  $num++;
  while (strlen($num)<4){
    $num = '0'.$num;
  }
}
$cog = substr($cognome, 0, 3);
echo $num;
echo $cog;
$cod = $num . $cog;

$query = "INSERT INTO `utenti` (`nome`, `cognome`, `email`, `data`, `id`) VALUES ('$nome', '$cognome', '$email', '$data', '$cod')";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  header("location: index.php");
  exit();
?>
