<?php
include_once('../model.param_access/param_permission.class.php');
if(isset($_GET['nomT']) && isset($_GET['option']) && isset($_GET['idPermi']) ){
            $perm = new permission();
            $perm->rechercher($_GET['idPermi']);

            if($_GET['option']=="ajouter"){
                $perm->setajouter();
            }else if($_GET['option']=="modifier"){
                $perm->setmodifier();
            }else if($_GET['option']=="afficher"){
                $perm->setafficher();
            }else if($_GET['option']=="supprimer"){
                $perm->setsupprimer();
            }
        }
        ?>
        <table class="table table-bordered table-striped table-condensed">
        
            <thead>
                <tr>
                    <th>N</th>
                    <th>Table</th>
                    <th>Afficher</th>
                    <th>Ajouter</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $permi = new permission();
                    $n=0;
                    foreach( $permi->selectionnerByIdGroupe($_GET['idGroupe'])  as $sel)
                    { 
                        $n++;
                ?>
                <tr>
                    <td><?=$n?></td>
                    <td><?=strtoupper($sel['nomTable'])?></td>
                    <?php
                        $lien = "../control.param_access/ctr_permission.php?idPermi=".$sel['idPermission']."& idGroupe=".$sel['idGroupe']."& nomT=".$sel['nomTable']."& option=";
                        $lien2 = "../control.param_access/ctr_permission.php?echeMod&idGroupe=".$sel['idGroupe'];
                        $vue = "#corps";
                    ?>
                    <td><input type="checkbox" onchange="<?=($_SESSION['param_permission_modifier']==1)?"Orientation('".$lien."afficher','".$vue."')":"Orientation('".$lien2."afficher','".$vue."'); alert('Vous n\'etes pas permis de faire la modification des permission')"?>" <?=($sel['afficher']==1)?"checked='checked'":"";?>/></td>
                    <td><input type="checkbox" onchange="<?=($_SESSION['param_permission_modifier']==1)?"Orientation('".$lien."ajouter','".$vue."')":"Orientation('".$lien2."ajouter','".$vue."'); alert('Vous n\'etes pas permis de faire la modification des permission')"?>" <?=($sel['ajouter']==1)?"checked='checked'":"";?>/></td>
                    <td><input type="checkbox" onchange="<?=($_SESSION['param_permission_modifier']==1)?"Orientation('".$lien."modifier','".$vue."')":"Orientation('".$lien2."modifier','".$vue."'); alert('Vous n\'etes pas permis de faire la modification des permission')"?>"  <?=($sel['modifier']==1)?"checked='checked'":"";?>/></td>
                    <td><input type="checkbox" onchange="<?=($_SESSION['param_permission_modifier']==1)?"Orientation('".$lien."supprimer','".$vue."')":"Orientation('".$lien2."supprimer','".$vue."'); alert('Vous n\'etes pas permis de faire la modification des permission')"?>" <?=($sel['supprimer']==1)?"checked='checked'":"";?>/></td>
                     <td><?=$sel['commentaire']?></td>


                </tr>
               <?php
                    }
               ?>
               
            </tbody>
        </table>
       
