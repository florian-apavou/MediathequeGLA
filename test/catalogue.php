<?php
include "../php/fonctions.php";
/*
*
*	GESTION DES VARIABLES ET ERREURS
*
*/

$erreur = false;
$msg_erreur = "Erreur";
$html = "";
$filtre_recherche = $_POST['filtre_recherche']??null;
$filtre_type = $_POST['filtre_type']??[];
$rechargement_filtre = (bool)($_POST['rechargement_filtre']??false);

if(isset($filtre_recherche) && !is_string($filtre_recherche))
{
  $erreur = true;
  $msg_erreur .= " - filtre recherche incorrect";
}

if(isset($filtre_type) && !is_array($filtre_type))
{
  $erreur = true;
  $msg_erreur .= " - filtre type incorrect";
}

if(!is_bool($rechargement_filtre))
{
  $erreur = true;
  $msg_erreur .= " - rechargement incorrect";
}

/*
*
*	GESTION DES VARIABLES ET ERREURS
*
*/

$requete_types_medias = "select *
from TypeMedia";
//$types_medias = requete_tableau($requete_types_medias);
$types_medias[0] = "Livre";
$types_medias[1] = "CD";
$types_medias[2] = "DVD";
$types_medias[3] = "Revue";

$requete_medias = "select *
from Média m";
if(isset($filtre_recherche))
$requete_medias .= "
where m.titre like \"%".$filtre_recherche."%\"";

//$medias = requete_tableau($requete_medias, "id");
$medias[0] = [
  "id" => 1,
  "titre" => "Le livre de la jungle",
  "auteur" => "Rudyard Kipling",
  "nb_exemplaire" => 3,
  "prix" => 5,
  "type" => "Livre",
];
$medias[1] = [
  "id" => 2,
  "titre" => "Comment c'est loin",
  "auteur" => "Les casseurs flowters",
  "nb_exemplaire" => 1,
  "prix" => 15,
  "type" => "DVD",
];
$medias[2] = [
  "id" => 3,
  "titre" => "Humain à l'eau",
  "auteur" => "Stromae",
  "nb_exemplaire" => 2,
  "prix" => 10,
  "type" => "CD",
];
$medias[3] = [
  "id" => 4,
  "titre" => "Bambi",
  "auteur" => "Bambo",
  "nb_exemplaire" => 0,
  "prix" => 5,
  "type" => "DVD",
];
$medias[4] = [
  "id" => 5,
  "titre" => "Les mystérieuses cités d'or",
  "auteur" => "Esteban",
  "nb_exemplaire" => 4,
  "prix" => 5,
  "type" => "DVD",
];
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

  <div class="container-fluid content-page">
    <h1>Catalogue</h1>
    <br>
    <fieldset>
      <legend>Recherche Avancée</legend>
      <form>
        <table class="table">
          <tr>
            <td class="col-lg-8">
              <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="input-group-text lime lighten-2" id="basic-text1" onclick="charge_catalogue()"><i class="fas fa-search text-grey"
                    aria-hidden="true"></i></button>
                  </div>
                </div>
              </td>
              <td>
                <div id="div_filtre_type">
                  <?php
                  foreach($types_medias as $id_media => $type_media)
                  {
                    $html .=
                    "<td><input onChange=\"charge_catalogue()\" type=\"checkbox\" id=\"input_".$id_media."\" name=\"".strtolower($type_media)."\" ".(in_array($id_media, $filtre_type)?"checked":"").">
                    <label for=\"".strtolower($type_media)."\">".$type_media."</label></td>";
                  }
                  echo $html;
                  ?>
                </div>
              </td>
            </tr>
          </table>
        </form>
      </fieldset>

      <div class="row justify-content-center">
      <?php
      $html = "";
        foreach($medias as $id_media => $media)
        {

          $html .= "<div class=\"card mx-2 my-2 thumb-post\" style=\"width: 18rem;\">
                  <img src=\"../imgs/LivreJungle.jpg\" class=\"card-img-top \" alt=\" Image \">
                  <div class=\"card-body\">
                    <h5 class=\"card-title\">".$media["titre"]."</h5>
                      <p class=\"card-text\">Auteur: ".$media["auteur"]."</p>
                      <a href=\"info_media.php?id=".$media["id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
                      </div>
                </div>";
          echo $html;
        }
      ?>
    </div>
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
