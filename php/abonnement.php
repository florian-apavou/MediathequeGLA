<?php
include "../php/includes.php";
include "../php/fonctions.php";
include "../php/header.php";
 ?>
 <div class="sidebar list-group">
 	<a class=" list-group-item" href="account.php">Infos Générales</a>
 	<a class=" list-group-item" href="liste_reservations.php">Réservations</a>
 	<a class=" list-group-item" href="historique.php">Historique</a>
 	<a class="active list-group-item" href="#">Abonnement</a>
  <a class=" list-group-item" href="wishlist.php">Liste de souhait</a>
 </div>

<div class="content">
<div class="container">
  <h1>Abonnement</h1>
  <p>Grâce à un abonnement mensuel à la médiathèque Karine Le Marchand vous pouvez emprunter des livres, CD, DVD et revues sans payer les frais de location</p>
  <br>
  <h2>Votre Abonnement</h2>

  <!-- Si non abonné -->
  <p> Vous ne possédez actuellement pas d'abonnement. L'abonnement est de 15e/mois.</p>
  <button class="btn btn-primary">S'abonner</button>

  <br>

  <!-- Si abonné -->
  <p>Vous êtes actuellement abonné à la médiathèque Karine Lemarchand</p>
  <table class="table">
    <tr>
      <th>Date de début de l'abonnement: </th>
      <td></td>
    </tr>
    <tr>
      <th>Date de fin d'abonnement: </th>
      <td></td>
    </tr>
  </table>

  <button class="btn btn-primary">Renouveller votre abonnement</button>
  <button class="btn btn-danger">Résilier votre abonnement</button>

</div>
</div>
