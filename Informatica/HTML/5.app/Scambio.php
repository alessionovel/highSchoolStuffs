<?php ob_start(); ?>

<?php	
	$con = mysqli_connect("localhost","root","","login");
	$sql = "SELECT * FROM dati WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
	$rec = mysqli_query($con,$sql);
	$num = mysqli_num_rows($rec);
	if ($num!=0){
		while($array=mysqli_fetch_array($rec)){
			echo "Ciao "  ,$array['username'], " con password " ,$array['password'];
		}
	}else{
		echo "Credenziali errate";
		//header("Location:index.html");
		//exit();
	}
	//$username = $_POST['username'];
	//$password = $_POST['password'];
	//echo "Ciao ".$username ." con password " .$password;
?>