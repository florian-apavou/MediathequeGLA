<?php

include "../php/header.php";
include "../php/includes.php";
include "../php/fonctions.php";


//Debug :
$_SESSION['type_utilisateur'] = "Admin";

$id_media = $_REQUEST['id']-1??null;

//$media = requete_tableau($requete_media)[0];
$medias[0] = [
  "id" => 1,
  "titre" => "Le livre de la jungle",
  "auteur" => "Rudyard Kipling",
  "nb_exemplaire" => 3,
  "prix" => 5,
  "type" => "Livre",
  "photo" => "../imgs/LivreJungle.jpg",
];
$medias[1] = [
  "id" => 2,
  "titre" => "Comment c'est loin",
  "auteur" => "Les casseurs flowters",
  "nb_exemplaire" => 1,
  "prix" => 15,
  "type" => "DVD",
  "photo" => "../imgs/Caeurs-Flowters.jpg",
];
$medias[2] = [
  "id" => 3,
  "titre" => "Humain à l'eau",
  "auteur" => "Stromae",
  "nb_exemplaire" => 2,
  "prix" => 10,
  "type" => "CD",
  "photo" => "../imgs/racine_carre.jpg",
];
$medias[3] = [
  "id" => 4,
  "titre" => "Bambi",
  "auteur" => "Bambo",
  "nb_exemplaire" => 0,
  "prix" => 5,
  "type" => "DVD",
  "photo" => "../imgs/bambi.jpg",
];
$medias[4] = [
  "id" => 5,
  "titre" => "Les mystérieuses cités d'or",
  "auteur" => "Esteban",
  "nb_exemplaire" => 4,
  "prix" => 5,
  "type" => "DVD",
  "photo" => "../imgs/mysterieusecitedor.jpg",
];

$requete_commentaires = "select *
from Média m
left outer join Commentaire c on c.media = m.id
left outer join Client cl on cl.id = c.client
where m.id = ".$id_media;

//$commentaires = requete_tableau($requete_commentaires);
$commentaires[0] = ["commentaire" => "Très bon livre !","nom" => "Delpech","prenom" => "Michel","note" => 5];
$commentaires[1] = ["commentaire" => "Fin un peu décevante","nom" => "Ngijol","prenom" => "Thomas","note" => 2];
$commentaires[2] = ["commentaire" => "Mon fils a adoré","nom" => "Carmil","prenom" => "Sandrine","note" => 4];
$commentaires[3] = ["commentaire" => "Moyen","nom" => "Goodenough","prenom" => "David","note" => 3];
$commentaires[4] = ["commentaire" => "A la fin, le héros meurt !!!","nom" => "lheur","prenom" => "Spoï","note" => 1];


?>

<div class="container">
  <div class="row">
    <div class="col-lg-4">
      <img src="../imgs/<?=$medias[$id_media]["photo"]?>" class="img-thumbnail imgFM" alt="Responsive image">
    </div>
    <div class="col-lg-6">
      <h1>Infos Pratiques</h1>
      <br>
      <table class="table table-hover self-align-center">
        <tbody>
          <tr>
            <th scope="row"><?= $medias[$id_media]["type"]?></th>
            <td>
              <div>
                <span id="span_titre"><?= $medias[$id_media]["titre"]?></span>

              </div>
            </td>
            <?php
            if($_SESSION['type_utilisateur'] == "Admin" || $_SESSION['type_utilisateur'] == "Employe")
            echo "
            <td><input id=\"input_titre\" value=\"".$medias[$id_media]["titre"]."\" hidden></input>
            <i id=\"pen_titre\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_titre', 'input_titre', 'pen_titre', 'check_titre')\"></i>
            <i id=\"check_titre\" class=\"fas fa-check\" onclick=\"bascule_masque('span_titre', 'input_titre', 'pen_titre', 'check_titre'); modifie_titre('".$id_media."')\" hidden></i></td>";
            ?>
          </tr>
          <tr>
            <th scope="row">Auteur</th>
            <td>
              <div>
                <span id="span_auteur"><?= $medias[$id_media]["auteur"]?></span>
              </div>
            </td>
            <?php
            if($_SESSION['type_utilisateur'] == "Admin" || $_SESSION['type_utilisateur'] == "Employe")
            echo "
            <td><input id=\"input_auteur\" value=\"".$medias[$id_media]["auteur"]."\" hidden></input>
            <i id=\"pen_auteur\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_auteur', 'input_auteur', 'pen_auteur', 'check_auteur')\"></i>
            <i id=\"check_auteur\" class=\"fas fa-check\" onclick=\"bascule_masque('span_auteur', 'input_auteur', 'pen_auteur', 'check_auteur'); modifie_auteur('".$id_media."')\" hidden></i></td>";
            ?>
          </tr>
          <tr>
            <th scope="row">Prix</th>
            <td>
              <div>
                <span id="span_prix"><?= $medias[$id_media]["prix"]?> euros</span>
              </div>
            </td>
            <?php
            if($_SESSION['type_utilisateur'] == "Admin" || $_SESSION['type_utilisateur'] == "Employe")
            echo "
            <td><input type=\"number\" id=\"input_prix\" value=\"".$medias[$id_media]["prix"]."\" hidden></input>
            <i id=\"pen_prix\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_prix', 'input_prix', 'pen_prix', 'check_prix')\"></i>
            <i id=\"check_prix\" class=\"fas fa-check\" onclick=\"bascule_masque('span_prix', 'input_prix', 'pen_prix', 'check_prix'); modifie_prix('".$id_media."')\" hidden></i></td>";
            ?>
          </tr>
          <tr>
            <th scope="row">Nombre d'exemplaire restant </th>
            <td>
              <div>
                <span id="span_nb_exemplaire"><?= $medias[$id_media]["nb_exemplaire"]?></span>
              </div>
            </td>
            <?php
            if($_SESSION['type_utilisateur'] == "Admin" || $_SESSION['type_utilisateur'] == "Employe")
            echo "
            <td><input type=\"number\" id=\"input_nb_exemplaire\" value=\"".$medias[$id_media]["nb_exemplaire"]."\" hidden></input>
            <i id=\"pen_nb_exemplaire\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_nb_exemplaire', 'input_nb_exemplaire', 'pen_nb_exemplaire', 'check_nb_exemplaire')\"></i>
            <i id=\"check_nb_exemplaire\" class=\"fas fa-check\" onclick=\"bascule_masque('span_nb_exemplaire', 'input_nb_exemplaire', 'pen_nb_exemplaire', 'check_nb_exemplaire'); modifie_nb_exemplaire('".$id_media."')\" hidden></i></td>";
            ?>
          </tr>
        </tbody>
      </table>
      <?php
      if($medias[$id_media]["nb_exemplaire"] == 0)
      echo "
      <div>
      <button id=\"notif_bell\" onClick=\"demande_notification('".$id_media."'); bascule_masque('notif_bell')\" class=\"btn btn-info fas fa-bell\" title=\"Me notifier dès sa disponibilité\"></button>
      </div>";
      ?>
    </div>
  </div>
  <br>
  <fieldset>
    <legend>Laisser un commentaire</legend>
    <form action="#" method="post">
      <div>
        <textarea id="msg" class="form-control" name="message" placeholder="Insérez votre message..."></textarea>
      </div>
    <div class="d-flex">
      <div class="star-rating">
        <input id="star-5" type="radio" name="rating" value="star-5">
        <label for="star-5" title="5 stars">
          <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
        <input id="star-4" type="radio" name="rating" value="star-4">
        <label for="star-4" title="4 stars">
          <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
        <input id="star-3" type="radio" name="rating" value="star-3">
        <label for="star-3" title="3 stars">
          <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
        <input id="star-2" type="radio" name="rating" value="star-2">
        <label for="star-2" title="2 stars">
          <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
        <input id="star-1" type="radio" name="rating" value="star-1">
        <label for="star-1" title="1 star">
          <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
      </div>
      <button type="submit" class="btn btn-primary my-3 ml-auto p-2 py-1" value="Envoyer">Envoyer</button>
    </div>
  </form>
  <br>
  <fieldset>
    <legend>Commentaires</legend>
    <table class="table table-striped">
      <?php
      foreach($commentaires as $commentaire)
      {
        echo "<tr>
        <td>".$commentaire['prenom']." ".$commentaire['nom']."</td>
        <td>".$commentaire['commentaire']."</td><td>".$commentaire['note']."/5</td>
        </tr>";
      }
      ?>
    </table>
  </fieldset>
</div>

<?php
include "../php/footer.php";
?>
