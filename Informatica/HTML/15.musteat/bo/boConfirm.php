<?php ob_start();
session_start();
//print_r($_REQUEST); 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btnYes').click(function() {
            but = <?php echo $_REQUEST['but'] ?>;
            $.ajax({
                url: '<?php echo $_REQUEST['toLink'] ?>',
                type: "POST",
                data: {
                    but: but
                },
                success: function(data) {
                    $("#conferma_ok").html(data);
                },
                error: function(jXHR, textStatus, errorThrown) {
                    alert(errorThrown + "banana");
                }
            });
        });
        $('#btnNo').click(function() {
            $('#confirmBody').html("");
        });
    });
</script>
<?php
//echo $_REQUEST['but'];
?>
</br>
<div id="confirmBox">
    <strong><?php echo $_REQUEST['command'] . " " . $_REQUEST['nome'] ?></br>Sei sicuro di voler continuare?</strong>
    <?php if (isset($_REQUEST['warn'])) { ?>
        </br> </br>
        <p><strong style="color:red"><?php if (isset($_REQUEST['warn'])) echo $_REQUEST['warn'] ?></strong></p>
    <?php
    }
    ?>
    </br>
    <button id="btnYes" class="btnConf">SI</button>
    <button id="btnNo" class="btnConf">NO</button>
</div>
</br>
<div id="conferma_ok"></div>