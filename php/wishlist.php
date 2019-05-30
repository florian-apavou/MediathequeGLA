<?php
session_start();
$_SESSION['page_en_cours'] = "wishlist";
include "../php/includes.php";

if(!isset($_SESSION['id_utilisateur']))
  header('Location: login.php');

$requete_wishlist = "select *
from notification n
left outer join membre m on n.membre = m.id
left outer join media med on n.media = med.id
where n.membre = ".$_SESSION['id_utilisateur'];

$wishlist = requete_tableau($requete_wishlist);

$tableau_wishlist = "";
foreach($wishlist as $id => $media)
{
    $tableau_wishlist .= "
      <tr>
          <td>
            ".$media["titre"]."
          </td>
          <td>
            ".$media["auteur"]."
          </td>
          <td>
            <a href=\"info_media.php?id=".$media["id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
            <a id=\"notif_danger\" class=\"btn btn-danger\" onclick=\"annuler_notification('".$media["id"]."')\">Ne plus suivre</a>
            <a id=\"notif_info\" class=\"btn btn-info\" onclick=\"demander_notification('".$media["id"]."')\" hidden><i class=\"fas fa-bell\"></i> Suivre à nouveau</a>
          </td>
      </tr>";
}
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
            <?= $tableau_wishlist?>
          </tbody>
        </table>
        <br>
      </div>


  </div>
</div>
