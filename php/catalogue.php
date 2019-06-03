<?php
session_start();
$_SESSION['page_en_cours'] = "catalogue";
include "../php/includes.php";

$html = "";
$filtre_recherche = $_GET['search']??null;
if($filtre_recherche == "")
  unset($filtre_recherche);

$filtres_type = [];
if(isset($_GET['Livre']))
  $filtres_type[] = "\"Livre\"";
if(isset($_GET['CD']))
  $filtres_type[] = "\"CD\"";
if(isset($_GET['DVD']))
  $filtres_type[] = "\"DVD\"";
if(isset($_GET['Revue']))
  $filtres_type[] = "\"Revue\"";

$requete_medias = "select id, titre, auteur, nbExemplaire, prix, type, photo
from media
where 1=1";

if(isset($filtre_recherche))
  $requete_medias .= "
    and titre like \"%".$filtre_recherche."%\"
    or auteur like  \"%".$filtre_recherche."%\"";

if($filtres_type != [])
  $requete_medias .= "
    and type in (".implode(', ', $filtres_type).")";

$medias = requete_tableau($requete_medias, "id");
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
              <input id="input_filtre_recherche" class="form-control my-0 py-1 lime-border" type="text" placeholder="Rechercher par titre ou auteur..." aria-label="Search" name="search" value="<?= $filtre_recherche??""?>">
            </div>
          </td>
          <td>
            <div id="div_filtre_type">
              <td>
                <input type="checkbox" id="input_livre" name="Livre" <?php echo(in_array("\"Livre\"", $filtres_type)?"checked":"")?>>
                <label for="Livre">Livre</label>
              </td>
              <td>
                <input type="checkbox" id="input_cd" name="CD" <?php echo(in_array("\"CD\"", $filtres_type)?"checked":"")?>>
                <label for="CD">CD</label>
              </td>
              <td>
                <input type="checkbox" id="input_dvd" name="DVD" <?php echo(in_array("\"DVD\"", $filtres_type)?"checked":"")?>>
                <label for="DVD">DVD</label>
              </td>
              <td>
                <input type="checkbox" id="input_revue" name="Revue" <?php echo(in_array("\"Revue\"", $filtres_type)?"checked":"")?>>
                <label for="Revue">Revue</label>
              </td>
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
  if($medias == [])
  {
    echo "<div>Aucun résultat pour cette recherche...</div>";
  }
  else {
    foreach($medias as $id_media => $media)
    {
      if(isset($_SESSION['id_utilisateur']))
      {
        $requete = "select *
        from notification
        where membre = ".$_SESSION['id_utilisateur']."
        and media = ".$media['id'];
        $deja_notifie = requete_tableau($requete) != [];
      }

      $html = "";
      $html .= "<div class=\"card mx-2 my-2 thumb-post\" style=\"width: 18rem;\">
      <img src=\"../imgs/".$media["photo"]."\" class=\"card-img-top \" alt=\" Image \">
      <div class=\"card-body\">
      <h5 class=\"card-title\">".$media["titre"]."</h5>
      <p class=\"card-text\">Auteur: ".$media["auteur"]."</p>
      <form method=\"post\" action=\"reservation.php\">
      <input type=\"hidden\" name=\"idMed\" value=\"".$media["id"]."\">
      <a href=\"info_media.php?id=".$media["id"]."\" class=\"btn btn-primary mr-1 my-1\">Plus d'infos</a>";

      if($media["nbExemplaire"]>0){
        $html .= "
        <a href=\"reservation.php?id=".$media["id"]."\" class=\"btn btn-primary my-1\">Réserver</a>
        </form>
        </div>
        </div>";
      }
      else {
        $html .= "<button class=\"btn btn-danger my-1\" disabled>Indisponible</button>";
        if(isset($_SESSION['id_utilisateur']) && !$deja_notifie)
          $html .= "
            <a id=\"notif_bell_".$media['id']."\" onClick=\"demander_notification('".$media['id']."'); bascule_masque('notif_bell_".$media['id']."')\" class=\"btn btn-info fas fa-bell\" title=\"Me notifier dès sa disponibilité\"></a>";
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
