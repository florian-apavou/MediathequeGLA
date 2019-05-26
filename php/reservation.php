<?php
  include '../php/fonctions.php';
  $media['type'] = "CD";
  $media['titre'] = "XEU";
  $media['auteur'] = "Vald";
  $media['prix'] = 5;
  $date = getdate();
  $date_reservation = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);
  $date_retour_max = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);
  $duree_reservation = new DateInterval('P15D');
  $date_retour_max = $date_retour_max->add($duree_reservation);

  $connecte = true;
  if(!$connecte)
    echo "header('Location: login.php')";
?>

<div>
  Réservation
  <hr>
  <label><?= $media['type']?> à réserver : </label><?= $media['titre']?></br>
  <label>Date de réservation : </label><?= $date_reservation->format('d/m/Y')?></br>
  <label>Date de réservation : </label><?= $date_retour_max->format('d/m/Y')?></br>
  <label>Tarif : </label><?= $media['prix']?> euros</br></br>
  <button>Payer et réserver</button>
</div>