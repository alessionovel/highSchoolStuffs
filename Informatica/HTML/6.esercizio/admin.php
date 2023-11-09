<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
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
      <li class="header_menu_item"><a href="#Registrazione">Registrazione</a></li>
      <li class="header_menu_item"><a href="#Eliminazione">Eliminazone</a></li>
      <li class="header_menu_item"><a href="#Modifica">Modifica</a></li>
      <li class="header_menu_item"><a href="#Lista">Lista</a></li>
      <li class="header_menu_item"><a href="login.php">Login</a></li>
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
      <a name="Registrazione"></a>
      <div class="card_copy">
        <h1>Registrazione</h1>
        <form method="post" action="autorizzazione_register.php" onsubmit="return controllo()" align="center">

          <input type="text" name="matricola" id="matricola" placeholder="Matricola"/><br>
          <input type="text" name="user" id="user" placeholder="Username"/><br>
          <input type="password" name="pass" id="pass" placeholder="Password"/><br>
          <input type="text" name="name" id="name" placeholder="Nome"/><br>
          <input type="radio" name="ruolo" id="admin" value="admin">
          <label for="admin">admin</label><br>
          <input type="radio" name="ruolo" id="user" value="user">
          <label for="user">user</label><br>
          <input type="radio" name="ruolo" id="sportello" value="sportello">
          <label for="sportello">sportello</label><br>
          <input type="radio" name="ruolo" id="impiegato" value="impiegato">
          <label for="impiegato">impiegato</label><br>
          <input type="radio" name="ruolo" id="capo" value="capo">
          <label for="capo">capo</label><br><br>
          <input type="submit" name="submit" value="Invia"/>
          <input type="reset" name="reset" value="Reset"/>

        </form>
      </div>
    </div>

    <div class="card">
      <a name="Eliminazione"></a>
      <div class="card_copy">
        <h1>Eliminazione</h1>
        <form method="post" action="autorizzazione_delete.php" onsubmit="return controllo()" align="center">

          <input type="text" name="matricola" id="matricola" placeholder="Matricola"/><br>
          <input type="text" name="user" id="user" placeholder="Username"/><br>
          <input type="password" name="pass" id="pass" placeholder="Password"/><br>
          <input type="submit" name="submit" value="Invia"/>
          <input type="reset" name="reset" value="Reset"/>

        </form>
      </div>
    </div>

  </section>


  <section class="cards clearfix">
    <div class="card">
      <a name="Modifica"></a>
      <div class="card_copy">
        <h1>Modifica</h1>
        <form method="post" action="autorizzazione_modification.php" onsubmit="return controllo()" align="center">

          <p>Conferma dati</p>
          <input type="text" name="matricola" id="matricola" placeholder="Matricola"/><br>
          <input type="text" name="user" id="user" placeholder="Username"/><br>
          <input type="password" name="pass" id="pass" placeholder="Password"/><br><br>
          <p>Modifica i dati che preferisci</p>
          <p1>(se si vuole lasciare un dato invariato, basta lasciare la casella vuota)</p1>
          <input type="text" name="matricola" id="matricola" placeholder="Matricola"/><br>
          <input type="text" name="user" id="user" placeholder="Username"/><br>
          <input type="password" name="pass" id="pass" placeholder="Password"/><br>
          <input type="text" name="nome" id="nome" placeholder="Nome"/><br>
          <input type="radio" name="ruolo" id="admin" value="admin">
          <label for="admin">admin</label><br>
          <input type="radio" name="ruolo" id="user" value="user">
          <label for="user">user</label><br><br>
          <input type="submit" name="submit" value="Invia"/>
          <input type="reset" name="reset" value="Reset"/>

        </form>
      </div>
    </div>

    <div class="card">
      <a name="Lista"></a>
      <div class="card_copy">
        <h1>Lista</h1>

        <?php

        require('db_connect.php');

        $query = "SELECT * FROM `users`";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $numcampi = mysqli_num_fields($result);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        echo "<table style='width:100%''><tr>";
        /*for ($i=0; $i < $numcampi; $i++){
        //echo "<tr><td>".$row['password']."</td></tr>";
        echo '<th>'.mysql_field_name($result, $i).'</th>';
      }*/
      echo "<th>Matricola</th><th>Username</th><th>Nome</th><th>Ruolo</th>";
      echo "</tr>";

      echo "<tr><td>".$row['matricola']."</td><td>".$row['username']."</td><td>".$row['nome']."</td><td>".$row['ruolo']."</td></tr>";
      while( $row = mysqli_fetch_assoc( $result ) ){
        echo "<tr><td>".$row['matricola']."</td><td>".$row['username']."</td><td>".$row['nome']."</td><td>".$row['ruolo']."</td></tr>";
      }
      echo "</table>";

      ?>

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
