<?php
session_start();
if(!isset($_SESSION['id_utilisateur']) || $_SESSION['rang'] == "client")
  header('Location: login.php');
$_SESSION['page_en_cours'] = "admin";
include "../php/includes.php";

$requete = "select me.nbExemplaire, m.mail, m.nom, m.prenom, me.titre, me.auteur, m.id as id_membre, me.id as id_media, n.id
from notification n
left outer join membre m on m.id = n.membre
left outer join media me on me.id = n.media";

$search = $_REQUEST['search']??null;
if(isset($search) && $search != "")
{
  $requete .= "
    where (m.nom like \"%".$search."%\"
    or m.prenom like \"%".$search."%\"
    or me.auteur like \"%".$search."%\"
    or me.titre like \"%".$search."%\")";
}
$notifications = requete_tableau($requete);

$table_notif_a_envoyer = "";
$table_notif_pas_a_envoyer = "";
foreach($notifications as $notification)
{
  if($notification['nbExemplaire'] > 0)
  {// A envoyer
    $table_notif_a_envoyer .= "
      <tr>
          <td>
            ".$notification["nom"]."
          </td>
          <td>
            ".$notification["prenom"]."
          </td>
          <td>
            ".$notification["mail"]."
          </td>
          <td>
            ".$notification["titre"]."
          </td>
          <td>
            ".$notification["auteur"]."
          </td>
          <td>
          <a id=\"notif_".$notification['id']."\" onclick=\"notifieMembre('".$notification['id']."', '".$notification['mail']."', '".addslashes($notification['prenom'])."', '".addslashes($notification['titre'])."', '".$notification['id_media']."')\" class=\"btn btn-primary\">Envoyer le mail de notification</a>
          <a id=\"success_".$notification['id']."\" class=\"btn btn-success\" hidden>Le mail a bien été envoyé</a>
        </td>
      </tr>";
  }
  else
  {
    $table_notif_pas_a_envoyer .= "
      <tr>
          <td>
            ".$notification["nom"]."
          </td>
          <td>
            ".$notification["prenom"]."
          </td>
          <td>
            ".$notification["mail"]."
          </td>
          <td>
            ".$notification["titre"]."
          </td>
          <td>
            ".$notification["auteur"]."
          </td>
          <td>
          </td>
      </tr>";
  }
}

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
          Mail
        </th>
        <th scope=\"col\">
          Titre
        </th>
        <th scope=\"col\">
          Auteur
        </th>
        <th scope=\"col\">
          Actions
        </th>
      </tr>
    </thead>
    <tbody>";
?>



<div class="container">
  <h1>Gestion des Notifications</h1>
  <br>
  <fieldset>
    <legend>Liste des notifications</legend>
    <form method="get" action="gestNotif.php">
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
    <legend>Notifications envoyables</legend>
    <?php
            if($table_notif_a_envoyer != "")
            {
              echo $debut_table;
              echo $table_notif_a_envoyer;
              echo "
            </tbody>
          </table>";
            }
            else
            {
              echo "Aucune notification envoyable";
            }?>
      </div>
    </br>
      <div>
      <legend>Notifications non-envoyables</legend>
      <?php
            if($table_notif_pas_a_envoyer != "")
            {

              echo $debut_table;
              echo $table_notif_pas_a_envoyer;
              echo "
            </tbody>
          </table>";
            }
            else
            {
              echo "Aucune notification non-envoyable";
            }
          ?>
      </div>
  </div>
