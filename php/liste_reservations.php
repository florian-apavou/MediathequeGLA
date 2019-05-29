<?php
$_SESSION['page_en_cours'] = "";
include "../php/includes.php";
include "../php/fonctions.php";
include "../php/header.php";
$_SESSION['type_utilisateur'] = "Admin";

if($_SESSION['type_utilisateur'] != "Admin")
header('Location: login.php');

include "../php/includes.php";
include "../php/fonctions.php";
include "../php/header.php";


//Debug :


$requete_reservations = "select *
from reservation r
where r.rendu = 0";

//$medias_en_cours = requete_tableau($requete_reservations);
$medias_en_cours[0] = [
  'id' => 5,
  'client' => "Tom",
  'type' => "DVD",
  'titre' => "YMCA 4ever",
  'auteur' => 'YMCA',
  "date_reservation" => new DateTime("2019/05/24"),
  "date_retour_max" => new DateTime("2019/06/09"),
  "prix" => 5,
];
$medias_en_cours[1] = [
  'id' => 6,
  'client' => "Tom",
  "type" => "DVD",
  "titre" => "La belle et la bête",
  "auteur" => "Disney",
  "date_reservation" => new DateTime("2019/05/10"),
  "date_retour_max" => new DateTime("2019/05/25"),
  "prix" => 15,
];
$medias_en_cours[2] = [
  'id' => 5,
  'client' => "Jean",
  'type' => "DVD",
  'titre' => "Macarena",
  'auteur' => 'Damso',
  "date_reservation" => new DateTime("2019/05/20"),
  "date_retour_max" => new DateTime("2019/06/05"),
  "prix" => 5,
];
$medias_en_cours[3] = [
  'id' => 6,
  'client' => "Gérard",
  "type" => "CD",
  "titre" => "Stupvirus",
  "auteur" => "Stupeflip",
  "date_reservation" => new DateTime("2019/05/18"),
  "date_retour_max" => new DateTime("2019/05/2"),
  "prix" => 15,
];
$medias_en_cours[4] = [
  'id' => 5,
  'client' => "Gérard",
  'type' => "Livre",
  'titre' => "Ce qu'un président ne devrait pas dire",
  'auteur' => 'François Hollande',
  "date_reservation" => new DateTime("2019/05/22"),
  "date_retour_max" => new DateTime("2019/06/07"),
  "prix" => 5,
];
$medias_en_cours[5] = [
  'id' => 6,
  'client' => "Lucie",
  "type" => "DVD",
  "titre" => "Lulu la fourmi",
  "auteur" => "Disney",
  "date_reservation" => new DateTime("2019/05/10"),
  "date_retour_max" => new DateTime("2019/05/25"),
  "prix" => 15,
];
$medias_en_cours[6] = [
  'id' => 5,
  'client' => "Emma",
  'type' => "CD",
  'titre' => "Never say never",
  'auteur' => 'Justin Bieber',
  "date_reservation" => new DateTime("2019/01/24"),
  "date_retour_max" => new DateTime("2019/02/09"),
  "prix" => 5,
];
$medias_en_cours[7] = [
  'id' => 6,
  'client' => "Kamel",
  "type" => "DVD",
  "titre" => "La danse",
  "auteur" => "Kamel Ouali",
  "date_reservation" => new DateTime("2019/02/10"),
  "date_retour_max" => new DateTime("2019/02/25"),
  "prix" => 15,
];

$tableau_en_cours = "";
$date = getdate();
$date = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);

foreach($medias_en_cours as $id => $media)
{
  $tableau_en_cours .= "
  <tr".($date < $media['date_retour_max']?"":" class=\"table-danger\"").">
  <td>
  ".$media["type"]."
  </td>
  <td>
  ".$media["titre"]."
  </td>
  <td>
  ".$media["auteur"]."
  </td>
  <td>
  ".$media["date_reservation"]->format('d/m/Y')."
  </td>
  <td>
  ".$media['date_retour_max']->format('d/m/Y')."
  </td>
  <td>
  ".$media["prix"]."
  </td>
  <td>
  <a href=\"info_media.php?id=".$media["id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
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
