<?php
$titre = "nouveautes";
include "../php/includes.php";

$_SESSION['type_utilisateur'] = "Admin";
$_SESSION['id_utilisateur'] = "22";

$requete_nouveautes = "select *... 5 MAX dernier id order by desc id";

//$nouveautes = requete_tableau($requete_nouveautes)[0];
$nouveautes[0] = [
  'id' => 0,
  'type' => "Livre",
  'titre' => "Le livre de la jungle",
  'auteur' => 'Rudyard Kipling',
  "nb_exemplaire" => 5,
  "prix" => 5,
];
$nouveautes[1] = [
  'id' => 1,
  "type" => "DVD",
  "titre" => "Comment c'est loin",
  "auteur" => "Les casseurs flowters",
  "nb_exemplaire" => 3,
  "prix" => 15,
];
$nouveautes[2] = [
  'id' => 2,
  "type" => "CD",
  "titre" => "Humain à l'eau",
  "auteur" => "Stromae",
  "nb_exemplaire" => 5,
  "prix" => 10,
];
$nouveautes[3] = [
  'id' => 3,
  "type" => "DVD",
  "titre" => "Bambi",
  "auteur" => "Bambo",
  "nb_exemplaire" => 2,
  "prix" => 5,
];
$nouveautes[4] = [
  'id' => 4,
  "type" => "DVD",
  "titre" => "Les mystérieuses cités d'or",
  "auteur" => "Esteban",
  "nb_exemplaire" => 10,
  "prix" => 5,
];
?>

<div class="sidebar list-group">
  <a class=" list-group-item" href="account.php">Infos Générales</a>
  <a class=" list-group-item" href="liste_reservations.php">Réservations</a>
  <a class="active list-group-item" href="historique.php">Historique</a>
  <a class=" list-group-item" href="abonnement.php">Abonnement</a>
</div>
<div class="content">
  <div class="container">
      <h1>Derniers ajouts</h1>
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
              Nombre d'exemplaires
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
          <tr>
              <td>
                <?=$nouveautes[0]["type"]?>
              </td>
              <td>
                <?=$nouveautes[0]["titre"]?>
              </td>
              <td>
                <?=$nouveautes[0]["auteur"]?>
              </td>
              <td>
                <?=$nouveautes[0]["nb_exemplaire"]?>
              </td>
              <td>
                <?=$nouveautes[0]["prix"]?>
              </td>
              <td>
                <a href="info_media.php?id=<?=$nouveautes[0]["id"]?>" class="btn btn-primary">Plus d'infos</a>
              </td>
          </tr>
          <tr>
              <td>
                <?=$nouveautes[1]["type"]?>
              </td>
              <td>
                <?=$nouveautes[1]["titre"]?>
              </td>
              <td>
                <?=$nouveautes[1]["auteur"]?>
              </td>
              <td>
                <?=$nouveautes[1]["nb_exemplaire"]?>
              </td>
              <td>
                <?=$nouveautes[1]["prix"]?>
              </td>
              <td>
                <a href="info_media.php?id=<?=$nouveautes[0]["id"]?>" class="btn btn-primary">Plus d'infos</a>
              </td>
          </tr>
          <tr>
              <td>
                <?=$nouveautes[2]["type"]?>
              </td>
              <td>
                <?=$nouveautes[2]["titre"]?>
              </td>
              <td>
                <?=$nouveautes[2]["auteur"]?>
              </td>
              <td>
                <?=$nouveautes[2]["nb_exemplaire"]?>
              </td>
              <td>
                <?=$nouveautes[2]["prix"]?>
              </td>
              <td>
                <a href="info_media.php?id=<?=$nouveautes[0]["id"]?>" class="btn btn-primary">Plus d'infos</a>
              </td>
          </tr>
          <tr>
              <td>
                <?=$nouveautes[3]["type"]?>
              </td>
              <td>
                <?=$nouveautes[3]["titre"]?>
              </td>
              <td>
                <?=$nouveautes[3]["auteur"]?>
              </td>
              <td>
                <?=$nouveautes[3]["nb_exemplaire"]?>
              </td>
              <td>
                <?=$nouveautes[3]["prix"]?>
              </td>
              <td>
                <a href="info_media.php?id=<?=$nouveautes[0]["id"]?>" class="btn btn-primary">Plus d'infos</a>
              </td>
          </tr>
          <tr>
              <td>
                <?=$nouveautes[4]["type"]?>
              </td>
              <td>
                <?=$nouveautes[4]["titre"]?>
              </td>
              <td>
                <?=$nouveautes[4]["auteur"]?>
              </td>
              <td>
                <?=$nouveautes[4]["nb_exemplaire"]?>
              </td>
              <td>
                <?=$nouveautes[4]["prix"]?>
              </td>
              <td>
                <a href="info_media.php?id=<?=$nouveautes[0]["id"]?>" class="btn btn-primary">Plus d'infos</a>
              </td>
          </tr>
        </tbody>
      </table>
  </div>
</div>

<?php
  include "../php/footer.php";
 ?>
