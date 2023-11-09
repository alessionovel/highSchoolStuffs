<?php ob_start();
session_start() ?>
<?php
require "db_connection.php";

$query = "SELECT * FROM novelclienti WHERE username='" . $_REQUEST['username_bar'] . "' AND password='" . $_REQUEST['password_bar'] . "'";
$result = mysqli_query($conn, $query);

if ($result->num_rows == 1) {
    $res = $result->fetch_assoc();
    $_SESSION['username'] = $res['username'];
    echo "POG";
} else {
    echo "<strong>LE CREDENZIALI SONO SBAGLIATE</strong>";
}
?>