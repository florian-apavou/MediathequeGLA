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
  'type' => "Livre",
  'titre' => "Le livre de la jungle",
  'auteur' => 'Rudyard Kipling',
  "date_reservation" => new DateTime("2019/04/12"),
  "date_retour" => new DateTime("2019/04/25"),
  "prix" => 5,
];
$medias_histo[1] = [
  "type" => "DVD",
  "titre" => "Comment c'est loin",
  "auteur" => "Les casseurs flowters",
  "date_reservation" => new DateTime("2018/12/24"),
  "date_retour" => new DateTime("2019/01/8"),
  "prix" => 15,
];
$medias_histo[2] = [
  "type" => "CD",
  "titre" => "Humain à l'eau",
  "auteur" => "Stromae",
  "date_reservation" => new DateTime("2019/01/12"),
  "date_retour" => new DateTime("2019/01/13"),
  "prix" => 10,
];
$medias_histo[3] = [
  "type" => "DVD",
  "titre" => "Bambi",
  "auteur" => "Bambo",
  "date_reservation" => new DateTime("2019/02/27"),
  "date_retour" => new DateTime("2019/03/09"),
  "prix" => 5,
];
$medias_histo[4] = [
  "type" => "DVD",
  "titre" => "Les mystérieuses cités d'or",
  "auteur" => "Esteban",
  "date_reservation" => new DateTime("2017/08/13"),
  "date_retour" => new DateTime("2017/08/26"),
  "prix" => 5,
];

$medias_en_cours[0] = [
  'type' => "DVD",
  'titre' => "YMCA 4ever",
  'auteur' => 'YMCA',
  "date_reservation" => new DateTime("2019/05/24"),
  "date_retour_max" => new DateTime("2019/06/09"),
  "prix" => 5,
];
$medias_en_cours[1] = [
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
      </tr>";
}

?>



<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <br>
      <h1>Réservations en cours</h1>
      <br>
      <table class="table table-hover self-align-center">
        <thead>
          <tr>
            <td>
              Type
            </td>
            <td>
              Titre
            </td>
            <td>
              Auteur
            </td>
            <td>
              Date réservation
            </td>
            <td>
              Date retour max
            </td>
            <td>
              Prix
            </td>
          </tr>
        </thead>
        <tbody>
          <?= $tableau_en_cours?>
        </tbody>
      </table>
      <br>
      <hr>
      <br>
      <h1>Historique</h1>
      <br>
      <table class="table table-hover self-align-center">
        <thead>
          <tr>
            <td>
              Type
            </td>
            <td>
              Titre
            </td>
            <td>
              Auteur
            </td>
            <td>
              Date réservation
            </td>
            <td>
              Date retour
            </td>
            <td>
              Prix
            </td>
          </tr>
        </thead>
        <tbody>
          <?= $tableau_histo?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?php
  include "../php/footer.php";
 ?>
