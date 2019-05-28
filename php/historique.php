<?php

$_SESSION['type_utilisateur'] = "Admin";
$_SESSION['id_utilisateur'] = "22";

if(!isset($_SESSION['id_utilisateur']))
  header('Location: login.php');

  include "../php/header.php";
  include "../php/includes.php";
  include "../php/fonctions.php";


//Debug :


$requete_histo = "select *
from historique h
left outer join media m on m.id = h.media
where h.id_client = ".$_SESSION['id_utilisateur'];

//$medias = requete_tableau($requete_histo)[0];
$medias_histo[0] = [
  'id' => 0,
  'type' => "Livre",
  'titre' => "Le livre de la jungle",
  'auteur' => 'Rudyard Kipling',
  "date_reservation" => new DateTime("2019/04/12"),
  "date_retour" => new DateTime("2019/04/25"),
  "prix" => 5,
];
$medias_histo[1] = [
  'id' => 1,
  "type" => "DVD",
  "titre" => "Comment c'est loin",
  "auteur" => "Les casseurs flowters",
  "date_reservation" => new DateTime("2018/12/24"),
  "date_retour" => new DateTime("2019/01/8"),
  "prix" => 15,
];
$medias_histo[2] = [
  'id' => 2,
  "type" => "CD",
  "titre" => "Humain à l'eau",
  "auteur" => "Stromae",
  "date_reservation" => new DateTime("2019/01/12"),
  "date_retour" => new DateTime("2019/01/13"),
  "prix" => 10,
];
$medias_histo[3] = [
  'id' => 3,
  "type" => "DVD",
  "titre" => "Bambi",
  "auteur" => "Bambo",
  "date_reservation" => new DateTime("2019/02/27"),
  "date_retour" => new DateTime("2019/03/09"),
  "prix" => 5,
];
$medias_histo[4] = [
  'id' => 4,
  "type" => "DVD",
  "titre" => "Les mystérieuses cités d'or",
  "auteur" => "Esteban",
  "date_reservation" => new DateTime("2017/08/13"),
  "date_retour" => new DateTime("2017/08/26"),
  "prix" => 5,
];

$medias_en_cours[0] = [
  'id' => 5,
  'type' => "DVD",
  'titre' => "YMCA 4ever",
  'auteur' => 'YMCA',
  "date_reservation" => new DateTime("2019/05/24"),
  "date_retour_max" => new DateTime("2019/06/09"),
  "prix" => 5,
];
$medias_en_cours[1] = [
  'id' => 6,
  "type" => "DVD",
  "titre" => "La belle et la bête",
  "auteur" => "Disney",
  "date_reservation" => new DateTime("2019/05/10"),
  "date_retour_max" => new DateTime("2019/05/25"),
  "prix" => 15,
];

$tableau_histo = "";
foreach($medias_histo as $id => $media)
{
    $tableau_histo .= "
      <tr>
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
            ".$media["date_retour"]->format('d/m/Y')."
          </td>
          <td>
            ".$media["prix"]."
          </td>
          <td>
            <a href=\"info_media.php?id=".$media["id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
          </td>
      </tr>";
}

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
  <a class=" list-group-item" href="liste_reservations.php">Réservations</a>
  <a class="active list-group-item" href="historique.php">Historique</a>
  <a class=" list-group-item" href="abonnement.php">Abonnement</a>
</div>

<div class="container">
      <h1>Historique</h1>
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
              Date retour
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
          <?= $tableau_histo?>
        </tbody>
      </table>
  </div>
</div>



<?php
  include "../php/footer.php";
 ?>
