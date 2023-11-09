<?php
ob_start();
session_start(); ?>
<div id="menuRes">
    <div class="infoBody corpo">
        </br></br></br></br>
        <div class="descBox">
            <p> <?php echo $_REQUEST['descrizione']; ?></p>
        </div>
        </br></br>
        <div class="descBox" style="width:80%">
            <img class="imgBox" src="<?php echo $_REQUEST['img'] ?>">
        </div>
        </br></br>
        <div class="descBox">
            <p> <?php echo $_REQUEST['via']; ?></p>
        </div>
    </div>
</div>