<?php
$_SESSION['page_en_cours'] = "catalogue";
include "../php/includes.php";

$html = "";
$filtre_recherche = $_GET['search']??null;
$filtre_type = $_GET['filtre_type']??[];
$rechargement_filtre = (bool)($_GET['rechargement_filtre']??false);

$requete_types_medias = "select *
from TypeMedia";
//$types_medias = requete_tableau($requete_types_medias);
$types_medias = [];
$types_medias[0] = "Livre";
$types_medias[1] = "CD";
$types_medias[2] = "DVD";
$types_medias[3] = "Revue";

$requete_medias = "select numMedia, titre, auteur, nb_exemplaire, prix, type, photo
from media m";
if(isset($filtre_recherche))
$requete_medias .= "
where m.titre like \"%".$filtre_recherche."%\"";
$medias = requete_tableau($requete_medias, "numMedia");
var_dump($requete_medias);
var_dump($medias);
?>

<div class="container-fluid content-page">
  <h1>Catalogue</h1>
  <br>
  <fieldset>
    <legend>Recherche Avancée</legend>
    <form method="get" action="catalogue.php">
      <table class="table">
        <tr>
          <td class="col-lg-6">
            <div class="input-group md-form form-sm form-2 pl-0">
              <input id="input_filtre_recherche" class="form-control my-0 py-1 lime-border" type="text" placeholder="Rechercher..." aria-label="Search" name="search" value="<?= $filtre_recherche?>">
            </div>
          </td>
          <td>
            <div id="div_filtre_type">
              <?php
              foreach($types_medias as $id_media => $type_media)
              {
                $html .=
                "<td>
                  <input type=\"checkbox\" id=\"input_".$id_media."\" name=\"".strtolower($type_media)."\" ".(in_array($id_media, $filtre_type)?"checked":"").">
                  <label for=\"".strtolower($type_media)."\">".$type_media."</label>
                </td>";
              }
              echo $html;
              ?>
            </div>
          </td>
          <td class="col-lg-3">
            <div class="input-group-append">
              <button class="input-group-text lime lighten-2" id="basic-text1"><span>Rechercher <i class="fas fa-search text-grey"
                aria-hidden="true"></i><span></button>
            </div>
          </td>
        </tr>
      </table>
    </form>
  </fieldset>

<div class="row justify-content-center">
  <?php
  if(empty($media))
  {
    echo "<div>Aucun résultat pour cette recherche...</div>";
  }
  else {
    foreach($medias as $id_media => $media)
    {
      $html = "";
      $html .= "<div class=\"card mx-2 my-2 thumb-post\" style=\"width: 18rem;\">
      <img src=\"".$media["photo"]."\" class=\"card-img-top \" alt=\" Image \">
      <div class=\"card-body\">
      <h5 class=\"card-title\">".$media["titre"]."</h5>
      <p class=\"card-text\">Auteur: ".$media["auteur"]."</p>
      <form method=\"post\" action=\"reservation.php\">
      <input type=\"hidden\" name=\"idMed\" value=\"".$media["id"]."\">
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
  }
  ?>
  </div>
</div>

<?php
include "../php/footer.php";
?>
