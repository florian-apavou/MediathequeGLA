<?php
include "../php/header.php";
include "../php/includes.php";
include "../php/fonctions.php";
/*
*
*	GESTION DES VARIABLES ET ERREURS
*
*/

$erreur = false;
$msg_erreur = "Erreur";
$html = "";
$filtre_recherche = $_POST['filtre_recherche']??$_GET['search']??null;
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
?>
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
              <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Rechercher..." aria-label="Search" value="<?= $filtre_recherche?>">
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

      foreach($medias as $id_media => $media)
      {
        $html = "";
        $html .= "<div class=\"card mx-2 my-2 thumb-post\" style=\"width: 18rem;\">
        <img src=\"".$media["photo"]."\" class=\"card-img-top \" alt=\" Image \">
        <div class=\"card-body\">
        <h5 class=\"card-title\">".$media["titre"]."</h5>
        <p class=\"card-text\">Auteur: ".$media["auteur"]."</p>
        <form method=\"POST\" action=\"reservation.php\"><input type=\"hidden\" name=\"id\" id=\"hiddenField\" value=\"".$media["id"]."\">
        <a href=\"info_media.php?id=".$media["id"]."\" class=\"btn btn-primary mr-1 my-1\">Plus d'infos</a>";

        if($media["nb_exemplaire"]>0){
          $html .= "<button type=\"submit\" class=\"btn btn-primary my-1\">Réserver</button>
          </form>
          </div>
          </div>";
        }
        else {
          $html .= "<button class=\"btn btn-danger my-1\" disabled>Indisponible</button>";
          if(/*connecte && pas encore dans les notifiés*/true)
            $html .= "
              <a id=\"notif_bell\" onClick=\"demande_notification('".$id_media."'); bascule_masque('notif_bell')\" class=\"btn btn-info fas fa-bell\" title=\"Me notifier dès sa disponibilité\"></a>";
          $html .= "
          </form>
          </div>
          </div>";
        }

        echo $html;
      }
      ?>
    </div>
  </div>

  <?php
  include "../php/footer.php";
  ?>
