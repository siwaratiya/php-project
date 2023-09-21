<?php
$lang=$_POST['lang'];
$domaine= $_POST['domaine'];
$specialite= $_POST['specialite'];
$nom=$_POST['nom'];
$cin=$_POST['cin'];
$ddn=$_POST['ddn'];
$age=$_POST['age'];
$moy=$_POST['moy'];
$choix=$_POST['choix'];
$entretien=$_POST['h'];
$prenom=$_POST['prenom'];
$mail=$_POST['adresse'];
$pass=$_POST['pwd'];
ini_set("display_errors",0);error_reporting(0);
$cn=mysql_connect("localhost","root");
mysql_select_db("mariem",$cn); 
       
         if (isset($_POST['add']))
                              
           if($nom=='' || $prenom=='' || $lang=='' || $domaine=='' || $specialite=='' || $cin=='' || $ddn=='' || $age=='' || $choix=='' || $entretien=='' || $mail=='' || $pass=='' || $moy=='')
          {
         echo '<body onLoad="alert(\'Il faut remplir tous les champs\')">';
                               echo '<meta http-equiv="refresh" content="0;URL=inscription.htm">';
           
          }
         
         else
         {
          $rqt="INSERT INTO `condidats`(`cin`, `nom`, `prenom`, `age`, `date`, `niveau`, `moyenne`, `specialite`, `domaine`, `langue`, `email`, `entretien`, `pwd`) VALUES ('".$cin."','".$nom."','".$prenom."','".$age."','".$date."','".$choix."','".$moy."','".$specialite."','".$domaine."','".$lang."','".$mail."','".$entretien."','".$pass."')";
           
          mysql_query($rqt);
           
            echo '<body onLoad="alert(\'Ajout effectuée...\')">';
          echo '<meta http-equiv="refresh" content="0;URL=inscription.htm">';
          mysql_close();
               }

?>
</table>