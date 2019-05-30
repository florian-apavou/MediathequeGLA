<?php
session_start();
$_SESSION['page_en_cours'] = "admin";
include "../php/includes.php";

$requete_reservation = "select m.id, m.nom, m.prenom, me.titre, me.auteur, r.dateDebut,  r.dateRetour, r.retour, r.emprunte, me.id as id_media, r.id as id_reservation
from reservation r
left outer join membre m on m.id = r.membre
left outer join media me on me.id = r.media
where r.retour = 0";
$search = $_REQUEST['search']??null;
if(isset($search) && $search != "")
{
  $requete_reservation .= "
    and (m.nom like \"%".$search."%\"
    or m.prenom like \"%".$search."%\"
    or me.auteur like \"%".$search."%\"
    or me.titre like \"%".$search."%\")";
}
$reservations = requete_tableau($requete_reservation);

$debut_table = "
<table class=\"table table-hover table-striped self-align-center\">
  <thead>
    <tr>
      <th scope=\"col\">
        Nom
      </th>
      <th scope=\"col\">
        Prenom
      </th>
      <th scope=\"col\">
        Titre
      </th>
      <th scope=\"col\">
        Auteur
      </th>
      <th scope=\"col\">
        Date d'emprunt
      </th>
      <th scope=\"col\">
        Date retour
      </th>
      <th scope=\"col\">
        Actions
      </th>
    </tr>
  </thead>
  <tbody>";

  $table_reservation_emprunte = "";
  $table_reservation_pas_emprunte = "";
  foreach($reservations as $reservation)
  {
    if($reservation['emprunte'] == 0)
    {
      $table_reservation_pas_emprunte .= "
        <tr>
            <td>
              ".$reservation["nom"]."
            </td>
            <td>
              ".$reservation["prenom"]."
            </td>
            <td>
              ".$reservation["titre"]."
            </td>
            <td>
              ".$reservation["auteur"]."
            </td>
            <td>
              ".$reservation["dateDebut"]."
            </td>
            <td>
              ".$reservation["dateRetour"]."
            </td>
            <td>
            <a id=\"rend_media_".$reservation['id_reservation']."\" onclick=\"rend_media('".$reservation['id_media']."', '".$reservation['id_reservation']."')\" class=\"btn btn-primary\" hidden>Récupérer le média</a>
            <a id=\"emprunte_media_".$reservation['id_reservation']."\" onclick=\"emprunte_media('".$reservation['id_media']."', '".$reservation['id_reservation']."')\" class=\"btn btn-warning\">Remettre le média</a>
          </td>
        </tr>";
    }
    elseif($reservation['emprunte'] == 1)
    {
      $table_reservation_emprunte .= "
        <tr>
            <td>
              ".$reservation["nom"]."
            </td>
            <td>
              ".$reservation["prenom"]."
            </td>
            <td>
              ".$reservation["titre"]."
            </td>
            <td>
              ".$reservation["auteur"]."
            </td>
            <td>
              ".$reservation["dateDebut"]."
            </td>
            <td>
              ".$reservation["dateRetour"]."
            </td>
            <td>
            <a id=\"rend_media_".$reservation['id_reservation']."\" onclick=\"rend_media('".$reservation['id_media']."', '".$reservation['id_reservation']."')\" class=\"btn btn-primary\">Récupérer le média</a>
            <a id=\"emprunte_media_".$reservation['id_reservation']."\" onclick=\"emprunte_media('".$reservation['id_media']."', '".$reservation['id_reservation']."')\" class=\"btn btn-warning\" hidden>Remettre le média</a>
          </td>
        </tr>";
    }
  }

?>

<div class="container">
  <h1>Gestion des Réservations</h1>
  <br>
  <fieldset>
    <legend>Recherche du Client</legend>
    <form method="get" action="gestReserv.php">
      <table>
        <tr>
          <td class="col-lg-6">
            <div class="input-group md-form form-sm form-2 pl-0">
              <input id="input_filtre_recherche" class="form-control my-0 py-1 lime-border" type="text" placeholder="Rechercher..." aria-label="Search" name="search" value="<?php echo(isset($_REQUEST['search'])?$_REQUEST['search']:"");?>">
            </div>
          </td>
          <td>
            <div class="input-group-append">
              <button class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i><span> Rechercher<span></button>
              </div>
            </td>
          </tr>
        </table>
      </form>
    </fieldset>
    <div>
    <legend>Remise des réservations</legend>
    <?php
            if($table_reservation_pas_emprunte != "")
            {
              echo $debut_table;
              echo $table_reservation_pas_emprunte;
              echo "
            </tbody>
          </table>";
            }
            else
            {
              echo "Aucune reservation non empruntée en cours";
            }?>
      </div>
    </br>
      <div>
      <legend>Retour des emprunts</legend>
      <?php
            if($table_reservation_emprunte != "")
            {

              echo $debut_table;
              echo $table_reservation_emprunte;
              echo "
            </tbody>
          </table>";
            }
            else
            {
              echo "Aucune emprunt en cours";
            }
          ?>
      </div>
  </div>
