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
if($fonction_requete == "modifieMembre")
{
  $requete = "update membre
  set
  ".$_POST['colonne']." = \"".$_POST['val']."\"
  where id = ".$_SESSION['id_utilisateur'];

  if(mysqli_query($bdd, $requete))
      echo "ok";
  else
      echo $requete;
}
if($fonction_requete == "contactAdmin")
{
  $requete = "insert into contact (membre, objet, message) values (\"".$_SESSION['id_utilisateur']."\", \"".$_POST['objet']."\", \"".$_POST['message']."\")";
  if(mysqli_query($bdd, $requete))
      echo "ok";
  else
      echo $requete;
}
if($fonction_requete == "reserveMedia")
{
  if(isset($_POST['owner']) && $_POST['owner'] != ""
    && isset($_POST['cvv']) && $_POST['cvv'] != ""
    && isset($_POST['cardNumber']) && $_POST['cardNumber'] != ""
    && isset($_POST['mois']) && $_POST['mois'] != ""
    && isset($_POST['annee']) && $_POST['annee'] != "")
  {
    $date = getdate();
    $date_reservation = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);
    $date_retour_max = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);
    $duree_reservation = new DateInterval('P15D');
    $date_retour_max = $date_retour_max->add($duree_reservation);

    $requete = "insert into reservation (dateDebut, dateRetour, membre, media) values (\"".$date_reservation->format('Y-m-d')."\", \"".$date_retour_max->format('Y-m-d')."\", \"".$_SESSION['id_utilisateur']."\", \"".$_POST['media']."\")";

    if(mysqli_query($bdd, $requete))
        echo "ok";
    else
        echo $requete;
  }
  else
    echo "informations";
}
if($fonction_requete == "changeMdp")
{
  if($_POST['nouveau_mdp'] == $_POST['nouveau_mdp2'])
  {

		$requete = "select mdp
        from membre where id = ".$_SESSION['id_utilisateur'];

  	if($resultat = mysqli_query($bdd, $requete))
    {
  		while($row = mysqli_fetch_assoc($resultat))
  		{
  			$info_membre = $row;
  		}
    	mysqli_free_result($resultat);
      if($info_membre['mdp'] == $_POST['ancien_mdp'])
      {
        $requete = "update membre
        set mdp = \"".$_POST['nouveau_mdp']."\"
        where id = ".$_SESSION['id_utilisateur'];

        if(mysqli_query($bdd, $requete))
            echo "ok";
        else
            echo $requete;
      }
      else
        echo "ancien";
    }
  }
  else
    echo "nouveaux";
}


 ?>
