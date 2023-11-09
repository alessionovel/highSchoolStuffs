<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>User</title>
  <link rel="stylesheet" href="style.css">
  <style>

  table {border-collapse: collapse;width: 100%;}
  th, td {text-align: left;padding: 15px;}
  th {background-color: #4CAF50;color: white;}
  tr:nth-child(even) {background-color: #f2f2f2;}

  </style>
</head>
<body leftmargin="0" topmargin="0">

  <header class="header clearfix">
    <ul class="header_menu" >
      <li class="header_menu_item"><a href="#Modifica">Modifica</a></li>
      <li class="header_menu_item"><a href="login.php">Logout</a></li>
    </ul>
  </header>

  <section class="cover">
    <div class="cover_filter"> </div>
    <div class="cover_caption">
      <div class="cover_caption_copy" align="center">
        <h1>Web Site</h1>
        <h4>by Bytyqi</h4>
      </div>
    </div>

  </section>

  <section class="cards clearfix">
    <div class="card">
      <a name="Modifica"></a>
      <div class="card_copy">
        <h1>Modifica Password</h1>
        <form method="post" action="autorizzazione_modification_pass.php" onsubmit="return controllo()" align="center">

          <input type="password" name="pass" id="pass" placeholder="Password"/><br><br>
          <input type="submit" name="submit" value="Invia"/>
          <input type="reset" name="reset" value="Reset"/>

        </form>
      </div>
    </div>

</section>

<section class="banner clearfix">

  <div class="banner_image" ></div>
  <div class="banner_copy">
    <div class="banner_copy_text">
      <h2>Pagina realizzata con: HTML, CSS, Javascript & PHP</h2><br><br><br><br><br>
    </div>
  </div>

</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>
