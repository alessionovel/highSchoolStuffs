<?php ob_start();
session_start() ?>
<?php
require "db_connection.php";

$query = "SELECT * FROM novelclienti WHERE username='" . $_REQUEST['username_bar'] . "'";
$result = mysqli_query($conn, $query);

if ($result->num_rows == 0) {
    $query = "INSERT INTO novelclienti (username,password,indirizzo,civico) VALUES ('" . $_REQUEST['username_bar'] . "','" . $_REQUEST['password_bar'] . "',
    '" . $_REQUEST['indirizzo_bar'] . "','" . $_REQUEST['civico_bar'] . "')";

    if (mysqli_query($conn, $query)) {
        echo "POG";
    } else {
        echo "ERRORE";
    }
} else {
    echo "<strong>C'è già un account registrato con questo username</strong>";
}
?>