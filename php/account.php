<?php
session_start();
$_SESSION['page_en_cours'] = "account";
if(!isset($_SESSION['id_utilisateur']))
  header('Location: login.php');
include "../php/includes.php";


$requete_compte = "select nom, prenom, dateNaissance, mail, mdp, telephone, adresse, adresseComplement, ville, codePostal
from membre
where id = ".$_SESSION['id_utilisateur']." ";
$compte = requete_tableau($requete_compte)[0];
?>

<div class="sidebar list-group">
  <a class="active list-group-item" href="#">Infos Générales</a>
  <a class=" list-group-item" href="liste_reservations.php">Réservations</a>
  <a class=" list-group-item" href="historique.php">Historique</a>
  <a class=" list-group-item" href="abonnement.php">Abonnement</a>
  <a class=" list-group-item" href="wishlist.php">Notifications</a>
</div>

<!-- Page content -->
<div class="content">
  <div class="container">
    <fieldset class="d-flex">
      <legend>Informations Générales</legend>
      <table class="table table-striped">
        <tr  class="row col-md-12">
          <th class="col-md-1">Nom:</th>
          <td class="col-md-4">
            <span id="span_nom"><?= $compte["nom"]?></span>
            <input type="text" id="input_nom" value="<?= $compte["nom"]?>" hidden></input>
          </td>
          <td class="col-md-1">
            <i id="pen_nom" class="fas fa-pen" onclick="bascule_masque('span_nom', 'input_nom', 'pen_nom', 'check_nom')"></i>
            <i id="check_nom" class="fas fa-check btn btn-success" onclick="bascule_masque('span_nom', 'input_nom', 'pen_nom', 'check_nom'); modifieMembre('nom')" hidden></i>
          </td>
          <th class="col-md-1">Prénom:</th>
          <td class="col-md-4">
            <span id="span_prenom"><?= $compte["prenom"]?></span>
            <input type="text" id="input_prenom" value="<?= $compte["prenom"]?>" hidden></input>
          </td>
          <td class="col-md-1">
            <i id="pen_prenom" class="fas fa-pen" onclick="bascule_masque('span_prenom', 'input_prenom', 'pen_prenom', 'check_prenom')"></i>
            <i id="check_prenom" class="fas fa-check btn btn-success" onclick="bascule_masque('span_prenom', 'input_prenom', 'pen_prenom', 'check_prenom'); modifieMembre('prenom')" hidden></i>
          </td>
        </tr>
        <tr class="row col-md-12">
          <th class="col-md-1">Email:</th>
          <td class="col-md-4">
            <span id="span_mail"><?= $compte["mail"]?></span>
            <input type="text" id="input_mail" value="<?= $compte["mail"]?>" hidden></input>
          </td>
          <td class="col-md-1">
            <i id="pen_mail" class="fas fa-pen btn" onclick="bascule_masque('span_mail', 'input_mail', 'pen_mail', 'check_mail')"></i>
            <i id="check_mail" class="fas fa-check btn btn-success" onclick="bascule_masque('span_mail', 'input_mail', 'pen_mail', 'check_mail'); modifieMembre('mail')" hidden></i>
          </td>
          <th class="col-md-3">Date de Naissance:</th>
          <td class="col-md-2">
            <span id="span_dateNaissance"><?= $compte["dateNaissance"]?></span>
            <input type="text" id="input_dateNaissance" value="<?= $compte["dateNaissance"]?>" hidden></input>
          </td>
          <td class="col-md-1">
            <i id="pen_dateNaissance" class="fas fa-pen" onclick="bascule_masque('span_dateNaissance', 'input_dateNaissance', 'pen_dateNaissance', 'check_dateNaissance')"></i>
            <i id="check_dateNaissance" class="fas fa-check btn btn-success" onclick="bascule_masque('span_dateNaissance', 'input_dateNaissance', 'pen_dateNaissance', 'check_dateNaissance'); modifieMembre('dateNaissance')" hidden></i>
          </td>
        </tr>
        <tr class="row col-md-12">
          <th class="col-md-2">Adresse:</th>
          <td colspan="2" class="col-md-9">
            <span id="span_adresse"><?= $compte["adresse"]?></span>
            <input type="text" id="input_adresse" value="<?= $compte["adresse"]?>" hidden></input>
          </td>
          <td class="col-md-1">
            <i id="pen_adresse" class="fas fa-pen" onclick="bascule_masque('span_adresse', 'input_adresse', 'pen_adresse', 'check_adresse')"></i>
            <i id="check_adresse" class="fas fa-check btn btn-success" onclick="bascule_masque('span_adresse', 'input_adresse', 'pen_adresse', 'check_adresse'); modifieMembre('adresse')" hidden></i>
          </td>
        </tr>
        <tr class="row col-md-12">
          <th class="col-md-3">Complément d'adresse:</th>
          <td colspan="2" class="col-md-8">
            <span id="span_adresseComplement"><?= $compte["adresseComplement"]?></span>
            <input type="text" id="input_adresseComplement" value="<?= $compte["adresseComplement"]?>" hidden></input>
          </td>
          <td class="col-md-1">
            <i id="pen_adresseComplement" class="fas fa-pen" onclick="bascule_masque('span_adresseComplement', 'input_adresseComplement', 'pen_adresseComplement', 'check_adresseComplement')"></i>
            <i id="check_adresseComplement" class="fas fa-check btn btn-success" onclick="bascule_masque('span_adresseComplement', 'input_adresseComplement', 'pen_adresseComplement', 'check_adresseComplement'); modifieMembre('adresseComplement')" hidden></i>
          </td>
        </tr>
        <tr class="row col-md-12">
          <th class="col-md-1">Ville:</th>
          <td class="col-md-4">
            <span id="span_ville"><?= $compte["ville"]?></span>
            <input type="text" id="input_ville" value="<?= $compte["ville"]?>" hidden></input>
          </td>
          <td class="col-md-1">
            <i id="pen_ville" class="fas fa-pen" onclick="bascule_masque('span_ville', 'input_ville', 'pen_ville', 'check_ville')"></i>
            <i id="check_ville" class="fas fa-check btn btn-success" onclick="bascule_masque('span_ville', 'input_ville', 'pen_ville', 'check_ville'); modifieMembre('ville')" hidden></i>
          </td>
          <th class="col-md-2">Code Postal:</th>
          <td class="col-md-3">
            <span id="span_codePostal"><?= $compte["codePostal"]?></span>
            <input type="text" id="input_codePostal" value="<?= $compte["codePostal"]?>" hidden></input>
          </td>
          <td class="col-md-1">
            <i id="pen_codePostal" class="fas fa-pen" onclick="bascule_masque('span_codePostal', 'input_codePostal', 'pen_codePostal', 'check_codePostal')"></i>
            <i id="check_codePostal" class="fas fa-check btn btn-success" onclick="bascule_masque('span_codePostal', 'input_codePostal', 'pen_codePostal', 'check_codePostal'); modifieMembre('codePostal')" hidden></i>
          </td>
        </tr>
        <tr class="row col-md-12">
          <th class="col-md-1">Téléphone: </th>
          <td class="col-md-4">
            <span id="span_telephone"><?= $compte["telephone"]?></span>
            <input type="text" id="input_telephone" value="<?= $compte["telephone"]?>" hidden></input>
          </td>
          <td class="col-md-1">
            <i id="pen_telephone" class="fas fa-pen" onclick="bascule_masque('span_telephone', 'input_telephone', 'pen_telephone', 'check_telephone')"></i>
            <i id="check_telephone" class="fas fa-check btn btn-success" onclick="bascule_masque('span_telephone', 'input_telephone', 'pen_telephone', 'check_telephone'); modifieMembre('telephone')" hidden></i>
          </td>
        </tr>
      </table>
    </fieldset>
    </br>
    <fieldset>
        <legend>Changer votre mot de passe : </legend>
        <table class="table">
          <tr>
            <div id="div_ancien_mdp">
            <td><label for='ancien_mdp'>Ancien mot de passe: </label></td>
            <td><input class="form-control" type="password" id="ancien_mdp" name="ancien_mdp"></input></td>
            </div>
          </tr>
          <tr>
            <div id="div_nouveau_mdp">
            <td><label for='nouveau_mdp'>Nouveau mot de passe: </label></td>
            <td><input class="form-control" type="password" id="nouveau_mdp" name="nouveau_mdp"></input></td>
            </div>
          </tr>
          <tr>
            <div id="div_nouveau_mdp2">
            <td><label for='nouveau_mdp2'>Confirmez votre nouveau mot de passe: </label></td>
            <td><input class="form-control" type="password" id="nouveau_mdp2" name="nouveau_mdp2"></input></td>
            </div>
          </tr>
        </table>
        <button class="btn btn-success" id="btn_changement_mdp" onclick="changeMdp()">Confirmer</button>
        <div id="result_changeMdp"></div>
      </div>
    </fieldset>
  </div>
</div>
<?php
include "../php/footer.php";
?>
