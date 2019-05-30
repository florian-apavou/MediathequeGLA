<?php
session_start();
$_SESSION['page_en_cours'] = "admin";
include "../php/includes.php";

$search = $_REQUEST['search']??null;
$requete = "select *
from membre";

$search = $_REQUEST['search']??null;
if(isset($search) && $search != "")
{
  $requete .= "
    where (nom like \"%".$search."%\"
    or prenom like \"%".$search."%\"
    or id = \"".$search."\")";
}
$membres = requete_tableau($requete);

$types = ["client", "gestClient", "gestMedia", "administrateur"];

?>
<div class="container">
  <h1>Gestion des Clients</h1>
  <br>
  <fieldset>
    <legend>Recherche du Client</legend>
    <form method="get" action="#">
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

    <table class="table">
      <tr>
        <th>ID Client</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Type</th>
      </tr>
      <tbody>
        <?php
        if($membres == [])
        {
          echo "<div>Aucun résultat pour cette recherche...</div>";
        }
        else
        {
          foreach($membres as $membre)
          {
            echo "
            <tr>
              <td>
                ".$membre['id']."
              </td>
              <td>
                ".$membre['nom']."
              </td>
              <td>
                ".$membre['prenom']."
              </td>
              <td>
                <select id=\"select_type_".$membre['id']."\" onchange=\"modifieTypeMembre('".$membre['id']."')\">
                  <option value=\"client\"".($membre['type']=='client'?" selected":"").">Client</option>
                  <option value=\"gestClient\"".($membre['type']=='gestClient'?" selected":"").">Gestionnaire client</option>
                  <option value=\"gestMedia\"".($membre['type']=='gestMedia'?" selected":"").">Gestionnaire media</option>
                  <option value=\"administrateur\"".($membre['type']=='administrateur'?" selected":"").">Administrateur</option>
                </select>
              </td>
            </tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
