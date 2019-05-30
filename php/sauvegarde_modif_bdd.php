<?php


$bdd = mysqli_connect('localhost', 'root', '', 'mediatheque');

$fonction_requete = $_POST['fonction_requete'];

if($fonction_requete == "commenterMedia")
{
  $requete = "insert into 'commentaire' ('message', 'membre', 'media', 'note') values (\"".$_POST['commentaire'].""\", \"".$_SESSION['id_utilisateur'].""\", \"".$_POST['media'].""\", \"".$_POST['note'].""\")";

  if(mysqli_query($bdd, $requete))
      echo "Bien insérée";
  else
      echo "Erreur";

}



 ?>
