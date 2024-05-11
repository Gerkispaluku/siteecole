
<?php 
    include_once('enteteDoc.php');
?>
<!--  ---------------------------------------------- -->
<form id="frm_pub" class="frm" action="../controleur/ctr_publication.php" method="post" enctype="multipart/form-data">
    <label for="resumeP"> Resume</label>
    <textarea id="resumeP" name="resumeP" class="textarea"> </textarea>
    <br>
    <label form="imageP">Image Preface</label>
    <input name="image" type="file" class="form-control">
    <br>
    <label for="detailP"></label>
    <textarea id="detailP" name="detailP" class="textarea" ></textarea>
    <input type="submit" id="sub" name="sub" class="btn-success btn-xs" value="Enregistrer"  >
</form>

<?php
    include_once('piedDoc.php');
?>





<!-- <script>
    $(document).ready(function(e) {
        $("#frmUtis").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "../control.param_access/ctr_utilisateur.php?ajouterU=true&idGroupe=" + $("#groupe1").val(),
                type: "POST",
                data: new FormData(this),
                // data: $(form).serializeArray(),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                   
                },
                success: function(data) {
                 
                },
               
            });
        }));
    });
</script> -->