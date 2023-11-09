<?php ob_start();
session_start() ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#addCatBody').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    $("#form_output").html(data);
                    $("#addCat_bar").empty;
                },
                error: function(jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
    });
</script>
<form class="inputBox" method="post" action="boAddCatForm.php" id="addCatBody" onClick="">
    </br>
    <input class="inputBar" type="text" id="addCat_bar" name="addCat_bar" required value="" placeholder="nome categoria" />
    </br>
    <input class="inputSub" type="submit" id="submit_addcat_bar" name="submit_addcat_bar" value="Inserisci" />
    </br> </br>
</form>
<div id="form_output"></div>