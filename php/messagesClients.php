<?php
session_start();
if(!isset($_SESSION['id_utilisateur']) || $_SESSION['rang'] == "client")
  header('Location: login.php');
$_SESSION['page_en_cours'] = "admin";
include "../php/includes.php";

$search = $_REQUEST['search']??null;

$requete = "select m.id, m.nom, m.prenom, m.mail, c.id as idc, c.objet, c.message, c.traite
from contact c
left outer join membre m on m.id = c.membre
where 1=1";

if(isset($search) && $search != "")
{
  $requete .= "
    and (m.nom like \"%".$search."%\"
    or m.prenom like \"%".$search."%\"
    or m.id = \"".$search."\")";
}
if(isset($_REQUEST['traite']) && !isset($_REQUEST['nontraite']))
{
  $requete .= "
    and traite = 1";
}
if(!isset($_REQUEST['traite']) && isset($_REQUEST['nontraite']))
{
  $requete .= "
    and traite = 0";
}
$requete .= "
  order by c.id desc";

$contacts = requete_tableau($requete);

$table_contacts = "";
foreach($contacts as $id => $contact)
{
    $table_contacts .= "
      <tr>
          <td>
            ".$contact["id"]."
          </td>
          <td>
            ".$contact["nom"]."
          </td>
          <td>
            ".$contact["prenom"]."
          </td>
          <td>
            ".$contact["mail"]."
          </td>
          <td>
            ".$contact["objet"]."
          </td>
          <td>
            ".$contact["message"]."
          </td>
          <td>
            ".($contact['traite'] == 0?"
            <a id=\"traite_".$contact['idc']."\" onclick=\"traiterContact(".$contact['idc'].")\" class=\"btn btn-primary\">Considérer comme traité</a>
            <a id=\"non_traite_".$contact['idc']."\" onclick=\"nontraiterContact(".$contact['idc'].")\" class=\"btn btn-danger\" hidden>Considérer comme non-traité</a>
            ":
            "
            <a id=\"traite_".$contact['idc']."\" onclick=\"traiterContact(".$contact['idc'].")\" class=\"btn btn-primary\" hidden>Considérer comme traité</a>
            <a id=\"non_traite_".$contact['idc']."\" onclick=\"nontraiterContact(".$contact['idc'].")\" class=\"btn btn-danger\">Considérer comme non-traité</a>
            ")."
          </td>
      </tr>";
}
?>
<div class="container">
  <h1>Gestion des messages clients</h1>
  <br>
  <fieldset>
    <legend>Recherche du Client</legend>
    <form method="get" action="messagesClients.php">
      <table>
        <tr>
          <td class="col-lg-8">
            <div class="input-group md-form form-sm form-2 pl-0">
              <input id="input_filtre_recherche" class="form-control my-0 py-1 lime-border" type="text" placeholder="Rechercher..." aria-label="Search" name="search" value="">
            </div>
          </td>
          <td class="col-lg-2">
            <input type="checkbox" id="input_traite" name="traite" <?php echo(isset($_REQUEST['traite'])?"checked":"")?>>
            <label for="input_traite">Traités</label>
          </td>
          <td class="col-lg-2">
            <input type="checkbox" id="input_nontraite" name="nontraite" <?php echo(isset($_REQUEST['nontraite'])?"checked":"")?>>
            <label for="input_nontraite">Non traités</label>
          </td>
          <td class="col-lg-2">
            <div class="input-group-append">
              <button class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i><span> Rechercher<span></button>
            </div>
          </td>
        </tr>
      </table>
    </form>
  </fieldset>
  <?php
  if($table_contacts == "")
  {
    echo "Aucun résultat pour cette recherche...";
  }
  else
  {?>
  <table class="table">
    <tr>
      <th>ID Client</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Mail</th>
      <th>Objet</th>
      <th>Message</th>
      <th>Actions</th>
    </tr>
    <?= $table_contacts?>
  </table>
  <?php
}?>
</div>
