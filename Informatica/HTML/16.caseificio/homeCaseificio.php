<?php
ob_start();
session_start();
if (!isset($_GET['idCaseificio'])) {
	header("Location:index.php");
	exit();
}
$_SESSION['idCaseificio']=$_GET['idCaseificio'];
require_once('db_connection.php');

$query = "SELECT * FROM ferroCaseificio WHERE codice='" . $_GET['idCaseificio'] . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$caseificio = mysqli_fetch_array($result);

$query = "SELECT * FROM ferroImmagine WHERE codice='" . $_GET['idCaseificio'] . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
<html>

<head>
	<meta charset="UTF-8">
	<title>Home caseificio</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<script>
$(document).ready(function() { //Esegue quando la pagina è caricata
	$("#infoCaseificio").click(function() {
		$("#menuOut").empty();

		$.ajax({
			url: "infoCaseificio.php",
			type: "GET",
			data: {
				rag: "<?php echo $caseificio['ragSociale']; ?>",
				iva: "<?php echo $caseificio['partIva']; ?>",
				tel: "<?php echo $caseificio['tel']; ?>",
				email: "<?php echo $caseificio['email']; ?>",
				proprietario: "<?php echo $caseificio['nomeProprietario']; ?>",
				indirizzo: "<?php echo $caseificio['indirizzo']; ?>"
			},
			success: function(data) {
				$("#menuOut").html(data);
			},
			error: function(jXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	$("#homeCaseificio").click(function() {
		$("#menuOut").empty();

		$.ajax({
			url: "homeCaseificio2.php",
			type: "GET",
			success: function(data) {
				$("#menuOut").html(data);
			},
			error: function(jXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

});
</script>

<body>
	<div id="header">
		<p class="header"><?php echo $caseificio['indirizzo']; ?></p>
	</div>

	<div id="menu">
		<div id="menuverticale">
			<a class="" href=index.php>Torna alla mappa</a>
			<a id="infoCaseificio">Info Caseificio</a>
			<a id="homeCaseificio">Home</a>
		</div>
	</div>
	<div id="menuOut">
		<div id="menuRes">
			<?php include "homeCaseificio2.php";
			?>
		</div>
	</body>

	</html>
