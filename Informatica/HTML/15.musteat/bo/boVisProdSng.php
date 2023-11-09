<?php ob_start();
session_start()
?>
<?php
require "connectDb.php";
$query = "SELECT * FROM novelprodotti WHERE idProd=" . $_REQUEST['but'] . "";
$result = mysqli_query($mysqli, $query);
while ($array = $result->fetch_assoc()) {
?>
    </br>
    <div class="inputBox"> </br>
        <p><?php echo $array['nome']; ?></p>
        <p><?php echo $array['descrizione']; ?></p>
        <img src="../<?php echo $array['img']; ?>" width="150" height="150">
        <p><?php echo $array['prezzo']; ?>€</p>
        </br>
    </div>
<?php
}
?>