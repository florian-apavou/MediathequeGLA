<?php

include "../php/fonctions.php";

//Debug :
$_SESSION['type_utilisateur'] = "Admin";

$erreur = false;
$msg_erreur = "Erreur";
$html = "";
$id_media = $_POST['id_media']??null;

if(!isset($id_media))
{
  $erreur = true;
  $msg_erreur .= " - media manquant";
}

if(!$erreur)
{
  $requete_media = "select *
  from Média m
  where m.id = ".$id_media;
}

//$media = requete_tableau($requete_media)[0];
$media = [
  'photo' => "LivreJungle.jpg",
  'titre' => "Le livre de la jungle",
  'auteur' => 'Rudyard Kipling',
  "nb_exemplaire" => 3,
  "prix" => 5,
  "type" => "Livre",
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

<!DOCTYPE html>
<html lang=fr dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <script type="text/javascript" src="../js/fonctions.js"></script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Font Awesome, Google Font -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="../css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
  $(document).ready(function(){
    $('#content').load("nav.html");
  });
  </script>

</head>
<body>

  <div id="content"></div>

  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <img src="../imgs/<?=$media["photo"]?>" class="img-thumbnail imgFM" alt="Responsive image">
      </div>
      <div class="col-lg-6">
        <h1>Infos Pratiques</h1>
        <br>
        <table class="table table-hover self-align-center">
          <tbody>
            <tr>
              <th scope="row"><?= $media["type"]?></th>
              <td>
                <div>
                <span id="span_titre"><?= $media["titre"]?></span>
                <?php
                if($_SESSION['type_utilisateur'] == "Admin" || $_SESSION['type_utilisateur'] == "Employe")
                echo "
                <input id=\"input_titre\" value=\"".$media["titre"]."\" hidden></input>
                <i id=\"pen_titre\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_titre', 'input_titre', 'pen_titre', 'check_titre')\"></i>
                <i id=\"check_titre\" class=\"fas fa-check\" onclick=\"bascule_masque('span_titre', 'input_titre', 'pen_titre', 'check_titre'); modifie_titre('".$id_media."')\" hidden></i>";
                ?>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">Auteur</th>
              <td>
                <div>
                <span id="span_auteur"><?= $media["auteur"]?></span>
                <?php
                if($_SESSION['type_utilisateur'] == "Admin" || $_SESSION['type_utilisateur'] == "Employe")
                echo "
                <input id=\"input_auteur\" value=\"".$media["auteur"]."\" hidden></input>
                <i id=\"pen_auteur\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_auteur', 'input_auteur', 'pen_auteur', 'check_auteur')\"></i>
                <i id=\"check_auteur\" class=\"fas fa-check\" onclick=\"bascule_masque('span_auteur', 'input_auteur', 'pen_auteur', 'check_auteur'); modifie_auteur('".$id_media."')\" hidden></i>";
                ?>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">Prix</th>
              <td>
                <span id="span_prix"><?= $media["prix"]?></span>
                <?php
                if($_SESSION['type_utilisateur'] == "Admin" || $_SESSION['type_utilisateur'] == "Employe")
                echo "
                <input type=\"number\" id=\"input_prix\" value=\"".$media["prix"]."\" hidden></input><span> euros</span>
                <i id=\"pen_prix\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_prix', 'input_prix', 'pen_prix', 'check_prix')\"></i>
                <i id=\"check_prix\" class=\"fas fa-check\" onclick=\"bascule_masque('span_prix', 'input_prix', 'pen_prix', 'check_prix'); modifie_prix('".$id_media."')\" hidden></i>";
                else
                echo "<span> euros</span>";
                ?>
                </div>
              </td>
            </tr>
            <tr>
              <th scope="row">Nombre d'exemplaire restant </th>
              <td>
                <span id="span_nb_exemplaire"><?= $media["nb_exemplaire"]?></span>
                <?php
                if($_SESSION['type_utilisateur'] == "Admin" || $_SESSION['type_utilisateur'] == "Employe")
                echo "
                <input type=\"number\" id=\"input_nb_exemplaire\" value=\"".$media["nb_exemplaire"]."\" hidden></input>
                <i id=\"pen_nb_exemplaire\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_nb_exemplaire', 'input_nb_exemplaire', 'pen_nb_exemplaire', 'check_nb_exemplaire')\"></i>
                <i id=\"check_nb_exemplaire\" class=\"fas fa-check\" onclick=\"bascule_masque('span_nb_exemplaire', 'input_nb_exemplaire', 'pen_nb_exemplaire', 'check_nb_exemplaire'); modifie_nb_exemplaire('".$id_media."')\" hidden></i>";
                ?>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
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



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
  crossorigin="anonymous"></script>
</body>
</html>
