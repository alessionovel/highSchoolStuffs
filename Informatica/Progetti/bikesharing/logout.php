<?php ob_start() ?>
<?php
session_start();
session_destroy();
header("location:index.php?#stazione-0");
?>
