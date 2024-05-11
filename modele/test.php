<?php
include_once('sexe.class.php');
$sexe = new sexe();
// echo $sexe->getIdSexe();
// echo $sexe->getNomSexe();

// $sexe->ajouterSexe('MASCULIN');
// $sexe->modifSexe(1,'AUCUN');
// $sexe->ajouterSexe('MASCULIN');
// $sexe->ajouterSexe('FEMININ');
$listeSexe = $sexe->listeSexe();
// $sexe->supSexe(24);
// $listeSexe = $sexe->rechercheSexe('mascu');
echo count($listeSexe);
print_r($listeSexe);
//  foreach ($listeSexe as $sel) {
//     echo $sel['idSexe'].":".$sel['nomSexe'];
//  }


