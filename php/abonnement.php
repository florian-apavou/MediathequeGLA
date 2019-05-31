<?php
session_start();
$_SESSION['page_en_cours'] = "abonnement";
include "../php/includes.php";

$requete_abo = "select id, dateDebut, dateFin, membre
from abonnement
where membre = ".$_SESSION['id_utilisateur']." ";
$result = requete_tableau($requete_abo);
if(!empty($result)){
  $abonne = true;
  foreach ($result as $abonnement) {
    $deb = $abonnement["dateDebut"];
    $fin = $abonnement["dateFin"];
    $deb = date("j F Y", strtotime($deb));
    $fin = date("j F Y", strtotime($fin));
  }
}
else {
  $abonne = false;
}

?>
<div class="sidebar list-group">
  <a class=" list-group-item" href="account.php">Infos Générales</a>
  <a class=" list-group-item" href="liste_reservations.php">Réservations</a>
  <a class=" list-group-item" href="historique.php">Historique</a>
  <a class="active list-group-item" href="#">Abonnement</a>
  <a class=" list-group-item" href="wishlist.php">Notifications</a>
</div>

<div class="content">
  <div class="container">
    <h1>Abonnement</h1>
    <p>Grâce à un abonnement mensuel à la médiathèque Karine Le Marchand vous pouvez emprunter des livres, CD, DVD et revues sans payer les frais de location</p>
    <br>
    <h2>Votre Abonnement</h2>

    <!-- Si non abonné -->
    <?php
    if($abonne){
      echo "<p>Vous êtes actuellement abonné à la médiathèque Karine Lemarchand</p>
      <table class=\"table\">
        <tr>
          <th>Date de début de l'abonnement: </th>
          <td>".$deb."</td>
        </tr>
        <tr>
          <th>Date de fin d'abonnement: </th>
          <td>".$fin."</td>
        </tr>
      </table>";
    }
    else{
      echo "<p> Vous ne possédez actuellement pas d'abonnement. L'abonnement est de 15e/mois.</p>
      <a href=\"souscription.php\" class=\"btn btn-primary\">S'abonner</a>";
    }
    ?>


    <br>

    <!-- Si abonné -->


  </div>
</div>
