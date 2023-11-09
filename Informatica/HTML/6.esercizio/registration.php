<html>
<head>
<meta charset="UTF-8">
<title>Sistemi Operativi</title>
<link rel="stylesheet" href="stylelogin.css">
<script>

	function controllo(){

		var matricola = document.getElementById("matricola").value;
		if(matricola.length<1){
			alert("Inserisci la Matricola");
			return false;
		}
		var username = document.getElementById("user").value;
		if(username.length<1){
			alert("Inserisci lo Username");
			return false;
		}
		var password = document.getElementById("pass").value;
		if(password.length<1){
			alert("Inserisci la Password");
			return false;
		}
		var nome = document.getElementById("name").value;
		if(nome.length<1){
			alert("Inserisci il Nome");
			return false;
		}

		return true;
	}

</script>

</head>
<body leftmargin="0" topmargin="0">


	<section class="header">
	 <div class="header_filter"> </div>
	  <div class="header_caption">
	   <div class="header_caption_copy" align="center">
	      <h1>Sistemi Operativi</h1>
		  <h2>S.O.</h2>
	    </div>
	  </div>
	</section>



	<div class="menucorpo clearfix">
	<a name="menu">
	<header class="menu clearfix">
	  <a href="" class="menu_logo"></a>
	  <ul class="menu_menu" >
	  <li class="menu_menu_item"><a href="login.php">Login</a></li>
		<li class="menu_menu_item"><a href="#Registrazione">Registrazione</a></li>
	  </ul>
 	</header>
	</a>



	<div class="corpo clearfix" align=center>

		<div class="corpo_login ">
<a name="Registrazione"></a>
      <h1>Registrazione</h1>
      <form method="post" action="autorizzazione_registrazione_login.php" onsubmit="return controllo()" align="center">

        <input type="text" name="matricola" id="matricola" placeholder="Matricola"/><br>
        <input type="text" name="user" id="user" placeholder="Username"/><br>
        <input type="password" name="pass" id="pass" placeholder="Password"/><br>
        <input type="text" name="name" id="name" placeholder="Nome"/><br>
        <input type="submit" name="submit" value="Invia"/>
        <input type="reset" name="reset" value="Reset"/>
      </form>

		</div>
	</div>
	</div>



	<section class="banner clearfix">
	  <div class="banner_image" ></div>
	  <div class="banner_copy">
		 <div class="banner_copy_text">
		  <h2></h2>
		 </div>
		 </div>
	</section>



</body>
</html>
