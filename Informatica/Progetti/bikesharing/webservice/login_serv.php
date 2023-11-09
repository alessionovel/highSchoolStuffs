<?php
session_start();
require '../db_connection.php';
$error = 0;

if (isset($_REQUEST['cf'])) {
  $_SESSION['cf']=$_REQUEST['cf'];
}else{

  if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $query = "SELECT cf, email, nome, cognome, password FROM gruppoCutente WHERE email = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $stmt->bind_result($cf, $email, $nome, $cognome, $passwordInDB);
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num == 1) {
      while ($stmt->fetch()) {
        if (password_verify($password, $passwordInDB)) {        //verifica se la password cryptata nel database associata all'email è uguale alla passord cryptata inserita al momento del login
          $updates = array(
            "nome"   => $nome,
            "cognome" => $cognome,
            "email" => $email,
            "cf" => $cf,
            "risultato" => (0)
          );
        }
        else {
          $error = -1; //password errata
        }
      }
    } else {
      $error = -2; //mail non presente
    }
  } else {
    $error = -3; //credenziali non inserite
  }
  if ($error != 0) {
    $updates = array(
      "risultato" => ($error)
    );
  }
  $arr[0] = array_map('utf8_encode', $updates);

  echo json_encode($arr[0]);

}
