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
      <div class="col-lg-12">
        <h1>Vos Notifications</h1>
        <br>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">
                Titre
              </th>
              <th scope="col">
                Auteur
              </th>
              <th scope="col" class="d-flex justify-content-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Ch'uis pas rassurer</td>
              <td>Zambla</td>
              <td class="d-flex justify-content-center">
                <button class="btn btn-primary mx-1">Accéder au média</button>
                <button class="btn btn-danger mx-1">Ne plus suivre</button>
              </td>
            </tr>
            <tr class="table-success">
              <td>B2O vs 272727 Arrrrrh</td>
              <td>Baba</td>
              <td class="d-flex justify-content-center">
                <button class="btn btn-primary mx-1">Accéder au média</button>
                <button class="btn btn-danger mx-1">Ne plus suivre</button>
              </td>
            </tr>
          </tbody>
        </table>
        <br>
      </div>


  </div>
</div>
