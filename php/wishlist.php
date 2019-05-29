<?php
include "../php/includes.php";
include "../php/fonctions.php";
include "../php/header.php";
?>
<div class="sidebar list-group">
  <a class=" list-group-item" href="account.php">Infos Générales</a>
  <a class=" list-group-item" href="liste_reservations.php">Réservations</a>
  <a class=" list-group-item" href="historique.php">Historique</a>
  <a class=" list-group-item" href="abonnement.php">Abonnement</a>
  <a class="active list-group-item" href="#">Notifications</a>
</div>

<div class="content">
  <div class="container">

    <!-- Action (Plus d'infos et Ne plus suivre), mettre class="table-success" sur lignes où les médias disponible atm -->
    <div class="row">
      <div class="col-lg-12">
        <h1>Vos Notifications</h1>
        <br>
        <table class="table table-hover table-striped self-align-center">
          <thead>
            <tr>
              <th scope="col">
                Type
              </th>
              <th scope="col">
                Titre
              </th>
              <th scope="col">
                Auteur
              </th>
              <th scope="col">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <br>
      </div>
    </div>


  </div>
</div>
