<?php
session_start();
$_SESSION['page_en_cours'] = "reservation";
include "../php/includes.php";

$requete = "select id, type, titre, auteur, prix
from media
where id = ".$_REQUEST['id'];

$media = requete_tableau($requete)[0];

$date = getdate();
$date_reservation = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);
$date_retour_max = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);
$duree_reservation = new DateInterval('P15D');
$date_retour_max = $date_retour_max->add($duree_reservation);

if(!isset($_SESSION['id_utilisateur']))
  echo "header('Location: login.php')";

$requete_abo = "select id
from abonnement
where membre = ".$_SESSION['id_utilisateur'];
$abonne = requete_tableau($requete_abo) != [];

$requete_reservations = "select *
from reservation
where membre = ".$_SESSION['id_utilisateur']."
and retour = 0";
$reservations = requete_tableau($requete_reservations);

$nb_reservations = 0;
$retard = false;
foreach($reservations as $id => $reservation)
{
  $dateRetourMax = date_create_from_format('Y-m-j', $reservation['dateRetour']);
  $nb_reservations++;
  if($dateRetourMax < $date_reservation)
  {
    $retard = true;
  }
}
$peut_reserver = !$retard && $nb_reservations < 4;


?>

<div class="container centered-div">
  <h2>Réservation</h2>
  <br>
  <?php
  if(!$peut_reserver)
  {
    echo "Vous ne pouvez réserver un nouveau média - ";
    if($retard && $nb_reservations >= 4)
    {//En retard et nb reservation max
      echo "vous êtes en retard sur le rendu d'une réservation et vous avez atteint la limite de réservations simultanées disponible.";
    }
    elseif(!$retard && $nb_reservations >= 4)
    {//nb reservation max
      echo "vous avez atteint la limite de réservations simultanées disponible.";
    }
    else
    {//en retard
      echo "vous êtes en retard sur le rendu d'une réservation.";
    }
  }
  else
  {
  ?>
   <fieldset>
     <legend>Information sur votre réservation</legend>
     <table class="table">
       <tr>
         <th scope="row">
           <label><?= $media['type']?> à réserver:
           </th>
           <td>
           </label><?= $media['titre']?>
         </td>
       </tr>
       <tr>
         <th scope="row">
           <label>Date de réservation :
           </th>
           <td>
           </label><?= $date_reservation->format('d/m/Y')?>
         </td>
       </tr>
       <tr>
         <th scope="row">
           <label>Date de retour :
           </th>
           <td>
           </label><?= $date_retour_max->format('d/m/Y')?>
         </td>
       </tr>
       <tr>
         <th scope="row">
           <label>Tarif : </label>
         </th>
         <td>
           <?= $media['prix']?> euros
         </td>
       </tr>
     </table>
   </fieldset>
   <fieldset>
     <legend>Informations de Paiement</legend>
     <div class="creditCardForm">
       <div class="payment">
         <div class="row">
           <div class="form-group owner col-lg-9">
             <label for="owner">Propriétaire</label>
             <input type="text" class="form-control" id="owner">
           </div>
           <div class="form-group CVV col-lg-3">
             <label for="cvv">CVV</label>
             <input type="text" class="form-control" id="cvv">
           </div>
         </div>
         <div class="row">
           <div class="form-group col" id="card-number-field">
             <label for="cardNumber">Numéro de carte</label>
             <input type="text" class="form-control" id="cardNumber">
           </div>
         </div>
         <div class="row">
           <div class="form-group col-lg-9" id="expiration-date">
             <label>Date d'expiration</label>
             <br>
             <select id="mois">
               <option value="01">Janvier</option>
               <option value="02">Février </option>
               <option value="03">Mars</option>
               <option value="04">Avril</option>
               <option value="05">Mai</option>
               <option value="06">Juin</option>
               <option value="07">Juillet</option>
               <option value="08">Août</option>
               <option value="09">Septembre</option>
               <option value="10">Octobre</option>
               <option value="11">Novembre</option>
               <option value="12">Décembre</option>
             </select>
             <select id="annee">
               <option value="2019"> 2019</option>
               <option value="2020"> 2020</option>
               <option value="2021"> 2021</option>
               <option value="2022"> 2022</option>
               <option value="2023"> 2023</option>
               <option value="2024"> 2024</option>
               <option value="2025"> 2025</option>
               <option value="2026"> 2026</option>
             </select>
           </div>
           <div class="form-group col-lg-3" id="credit_cards">
             <img src="../imgs/visa.jpg" id="visa">
             <img src="../imgs/mastercard.png" id="mastercard">
             <img src="../imgs/amex.png" id="amex">
           </div>
         </div>
         <div class="form-group" id="pay-now">
           <button id="btn_reserver" class="btn btn-primary" onclick="reserve_media('<?= $media['id']?>')">Payer et réserver</button>
         </div>
         <div id="div_success"></div>
       </div>
     </div>
   </fieldset>
   <?php
  }
   ?>
</div>
<?php
include "../php/footer.php";
?>
