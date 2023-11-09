<?php
ob_start();
session_start();

$cat = $_GET['cat'];
require_once('db_connection.php');

$query = "SELECT * FROM novelcategorie WHERE idCat='$cat'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$categoria = mysqli_fetch_array($result);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		<?php
		$query2 = "SELECT * FROM novelprodotti WHERE idCat='$cat'";
		$result2 = mysqli_query($conn, $query2);

		while ($array2 = $result2->fetch_assoc()) {
		?>
			$("#add<?php echo $array2['idProd'] ?>").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					url: "aggiungicarrello.php",
					type: "POST",
					data: $(this).serialize(),
					success: function(data) {
						$("#div<?php echo $array2['idProd'] ?>").html("</br><strong>Hai aggiunto questo prodotto al carrello</strong>");
						setTimeout(function() {
							$("#div<?php echo $array2['idProd'] ?>").empty();
						}, 1000);
					},
					error: function(jXHR, textStatus, errorThrown) {
						alert(errorThrown);
					}
				});
			})
		<?php
		}
		?>
	});
</script>


<div id="menuRes">
	<div class="infoBody corpo">

		<?php
		$query = "SELECT * FROM novelprodotti WHERE idCat='$cat'";
		$result = mysqli_query($conn, $query);

		while ($array = $result->fetch_assoc()) {
		?>
			<div id="articolo">
				<span class="nomeProd"><?php echo $array['nome'] ?> € <?php echo number_format($array['prezzo'], 2) ?></span></br>
				</br>
				<img src="<?php echo $array['img'] ?>" width="150" height="150" />
				<form id="add<?php echo $array['idProd'] ?>" method="POST">
					</br>
					<span><strong>Quantità:</strong></span><input type="text" id="qt<?php echo $array['idProd'] ?>" name="quantita" value="1" size="5" /></br>
					<span>(<?php echo $array['descrizione']; ?>)</span></br>
					<input type="hidden" name="id" value="<?php echo $array['idProd'] ?>" />

					<input class="inputSub" type="submit" name="compra" value="Aggiungi al carrello" /></br>
					<div><span id="div<?php echo $array['idProd'] ?>"></span></div>
				</form>
			</div>
		<?php
		}
		?>
	</div>
</div>