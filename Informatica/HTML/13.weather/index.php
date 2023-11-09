<form>
<select name="citta" id="citta">
  <option value="trieste">Trieste</option>
  <option value="madrid">Madrid</option>
  <option value="newyork">New York</option>
  <option value="losangeles">Los Angeles</option>
</select>
<input type="submit" value="Cerca">
</form>
<?php
if (isset($_GET['citta'])){
  $request = "http://api.openweathermap.org/data/2.5/weather?q=".$_GET['citta']."&appid=ba2b48268843d9e2e4cd6c8ccb454e9a";
  $response = file_get_contents($request);
  $jsonobj = json_decode($response);
  print_r($jsonobj);
}
 ?>
