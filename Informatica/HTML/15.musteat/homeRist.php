<?php
ob_start();
session_start();
if (!isset($_GET['idRist'])) {
	header("Location:index.php");
	exit();
}
if (isset($_SESSION['id'])) {
	if ($_SESSION['id'] != $_GET['idRist']) {
		session_destroy();
		session_start();
		$_SESSION['id'] = $_GET['idRist'];
	}
} else {
	$_SESSION['id'] = $_GET['idRist'];
}
require_once('db_connection.php');

$query = "SELECT * FROM novelristoranti WHERE idRist='" . $_SESSION['id'] . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

$ristorante = mysqli_fetch_array($result);
?>
<html>

<head>
	<meta charset="UTF-8">
	<title>Menù ristorante</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<script>
	$(document).ready(function() { //Esegue quando la pagina è caricata
		$("#infoRistA").click(function() {
			$("#menuOut").empty();

			$.ajax({
				url: "infoRist.php",
				type: "GET",
				data: {
					descrizione: "<?php echo $ristorante['descrizione']; ?>",
					img: "<?php echo $ristorante['img']; ?>",
					via: "<?php echo $ristorante['via']; ?>"
				},
				success: function(data) {
					$("#menuOut").html(data);
				},
				error: function(jXHR, textStatus, errorThrown) {
					alert(errorThrown);
				}
			});
		});
		$("#carrelloBut").click(function() {
			$("#menuOut").empty();
			$("#menuOut").load("carrello.php");
		});
		<?php
		$query = "SELECT * FROM novelcategorie WHERE idRist='" . $_SESSION['id'] . "' ORDER BY nome";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		while ($array = $result->fetch_assoc()) {
		?>
			$("#cat<?php echo $array['idCat'] ?>").click(function() {
				cat = <?php echo $array['idCat'] ?>;
				$.ajax({
					url: "selezionacategoria.php",
					type: "GET",
					data: {
						cat: cat
					},
					success: function(data) {
						$("#menuOut").html(data);
					},
					error: function(jXHR, textStatus, errorThrown) {
						alert(errorThrown);
					}
				});

			});
		<?php
		}
		?>

	});
</script>

<body>
	<div id="header">
		<p class="header"><?php echo $ristorante['nome']; ?></p>
	</div>

	<div id="menu">
		<div id="menuverticale">
			<a class="" href=index.php>Torna alla mappa</a>
			<?php
			$query = "SELECT * FROM novelcategorie WHERE idRist='" . $_SESSION['id'] . "' ORDER BY nome";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

			while ($array = $result->fetch_assoc()) {
			?>
				<a id="cat<?php echo $array['idCat'] ?>"><?php echo $array['nome'] ?></a>
			<?php
			}

			?>
			<a id="infoRistA">Info Ristorante</a>
			<a style="border-bottom:none;" id="carrelloBut">Carrello</a>
		</div>
	</div>
	<div id="menuOut">
		<div id="menuRes">
			<div class="infoBody corpo">
				</br></br></br></br>
				<div class="descBox">
					<p> <?php echo $ristorante['descrizione'] . "<br/>"; ?></p>
				</div>
				</br></br>
				<div class="descBox" style="width:80%">
					<img class="imgBox" src="<?php echo $ristorante['img'] ?>">
				</div>
				</br></br>
				<div class="descBox">
					<p> <?php echo $ristorante['via'] . "<br/>"; ?></p>
				</div>
			</div>
		</div>
	</div>
</body>

</html>