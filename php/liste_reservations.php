<?php
session_start();
$_SESSION['page_en_cours'] = "liste_reservations";
include "../php/includes.php";
$_SESSION['type_utilisateur'] = "Admin";

if($_SESSION['type_utilisateur'] != "Admin")
header('Location: login.php');


$requete_reservations = "select m.id as media_id, titre, auteur, type, dateDebut, dateRetour, membre, prix
from reservation r, media m
where r.retour = 0
and r.membre =".$_SESSION["id_utilisateur"]."
and r.media = m.id";
$result  = requete_tableau($requete_reservations);

$tableau_en_cours = "";
$date = getdate();
$date = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);

foreach($result as $reservation)
{
  $tableau_en_cours .= "
  <tr".($date < $reservation['dateRetour']?"":" class=\"table-danger\"").">
  <td>
  ".$reservation["type"]."
  </td>
  <td>
  ".$reservation["titre"]."
  </td>
  <td>
  ".$reservation["auteur"]."
  </td>
  <td>
  ".date('d/m/Y', strtotime($reservation["dateDebut"]))."
  </td>
  <td>
  ".date('d/m/Y', strtotime($reservation['dateRetour']))."
  </td>
  <td>
  ".$reservation["prix"]."
  </td>
  <td>
  <a href=\"info_media.php?id=".$reservation["media_id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
  </td>
  </tr>";
}

?>

<div class="sidebar list-group">
  <a class=" list-group-item" href="account.php">Infos Générales</a>
  <a class="active list-group-item" href="#">Réservations</a>
  <a class=" list-group-item" href="historique.php">Historique</a>
  <a class=" list-group-item" href="abonnement.php">Abonnement</a>
  <a class=" list-group-item" href="wishlist.php">Notifications</a>
</div>

<div class="content">
  <div class="container ">
    <div class="row">
      <div class="col-lg-12">
        <h1>Réservations en cours</h1>
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
                Date réservation
              </th>
              <th scope="col">
                Date retour max
              </th>
              <th scope="col">
                Prix
              </th>
              <th scope="col">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?= $tableau_en_cours?>
          </tbody>
        </table>
        <br>
      </div>
    </div>
  </div>
</div>


<?php
include "../php/footer.php";
?>
