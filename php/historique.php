<?php

  include "../php/header.php";
  include "../php/includes.php";
  include "../php/fonctions.php";


//Debug :
$_SESSION['type_utilisateur'] = "Admin";
$_SESSION['id_utilisateur'] = "22";

$requete_histo = "select *
from historique h
left outer join media m on m.id = h.media
where h.id_client = ".$_SESSION['id_utilisateur'];

//$medias = requete_tableau($requete_histo)[0];
$medias[0] = [
  'type' => "Livre",
  'titre' => "Le livre de la jungle",
  'auteur' => 'Rudyard Kipling',
  "date_reservation" => new DateTime("2019/04/12"),
  "date_retour" => new DateTime("2019/04/25"),
  "prix" => 5,
];
$medias[1] = [
  "type" => "DVD",
  "titre" => "Comment c'est loin",
  "auteur" => "Les casseurs flowters",
  "date_reservation" => new DateTime("2018/12/24"),
  "date_retour" => new DateTime("2019/01/8"),
  "prix" => 15,
];
$medias[2] = [
  "type" => "CD",
  "titre" => "Humain à l'eau",
  "auteur" => "Stromae",
  "date_reservation" => new DateTime("2019/01/12"),
  "date_retour" => new DateTime("2019/01/13"),
  "prix" => 10,
];
$medias[3] = [
  "type" => "DVD",
  "titre" => "Bambi",
  "auteur" => "Bambo",
  "date_reservation" => new DateTime("2019/02/27"),
  "date_retour" => new DateTime("2019/03/09"),
  "prix" => 5,
];
$medias[4] = [
  "type" => "DVD",
  "titre" => "Les mystérieuses cités d'or",
  "auteur" => "Esteban",
  "date_reservation" => new DateTime("2017/08/13"),
  "date_retour" => new DateTime("2017/08/26"),
  "prix" => 5,
];

$tableau_histo = "";
foreach($medias as $id => $media)
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

?>



<div class="container">
  <div class="row">
    <div class="col-lg-12">
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
