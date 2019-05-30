<?php
session_start();


$bdd = mysqli_connect('localhost', 'root', '', 'mediatheque');

$fonction_requete = $_POST['fonction_requete'];

if($fonction_requete == "commenterMedia")
{
  $requete = "insert into commentaire (message, membre, media, note) values (\"".$_POST['commentaire']."\", \"".$_SESSION['id_utilisateur']."\", \"".$_POST['media']."\", \"".$_POST['note']."\")";

  if(mysqli_query($bdd, $requete))
      echo "ok";
  else
      echo $requete;

}
if($fonction_requete == "modifieMedia")
{
  $requete = "update media
  set
  ".$_POST['colonne']." = \"".$_POST['val']."\"
  where id = ".$_POST['media'];

  if(mysqli_query($bdd, $requete))
      echo "ok";
  else
      echo $requete;
}

if($fonction_requete == "supprimeMedia")
{
  $requete = "delete from media
  where id = ".$_POST['media'];

  if(mysqli_query($bdd, $requete))
      echo "ok";
  else
      echo $requete;
}


 ?>
