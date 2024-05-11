<?php
include_once("../modele/publication.class.php");
if (isset($_POST['sub'])) {
    $resumeP = htmlspecialchars($_POST['resumeP']);
    $detailP = htmlspecialchars($_POST['detailP']);
    

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');

    $path  = "../images2/";
  
    if (is_dir($path) == false) {
      mkdir($path);
    }

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
  

    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
  
    $final_image = rand(1000, 1000000) . $img;
  

    if (in_array($ext, $valid_extensions)) {
      $path = $path . strtolower($final_image);
  
      if (move_uploaded_file($tmp, $path)) {
        if(publication::ajouter($resumeP,$path,$detailP,1)){
            header("location:../vue/index.php");
        }else{
                echo "ENREGISTREMENT ECHOUE";
        }
        
      }
    } else {
      echo 'EXTENSION NON VALIDE';
    }
}


