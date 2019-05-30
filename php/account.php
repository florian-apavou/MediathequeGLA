<?php
session_start();
$_SESSION['page_en_cours'] = "account";
if(!isset($_SESSION['id_utilisateur']))
  header('Location: login.php');
include "../php/includes.php";


$requete_compte = "select nom, prenom, dateNaissance, mail, mdp, telephone, adresse, adresseComplement, ville, codePostal
from membre
where id = ".$_SESSION['id_utilisateur']." ";
$compte = requete_tableau($requete_compte);

foreach($compte as $user){
  $nom = $user["nom"];
  $prenom = $user["prenom"];
  $mail = $user["mail"];
  $naissance = $user["dateNaissance"];
  $adresse = $user["adresse"];
  $adresse2 = $user["adresseComplement"];
  $ville = $user["ville"];
  $cp = $user["codePostal"];
}
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
					<th class="col-md-2">Nom:</th>
					<td  class="col-md-4"><?= $nom ?></td>
					<th class="col-md-2">Prénom:</th>
					<td class="col-md-4"><?= $prenom ?></td>
				</tr>
				<tr class="row col-md-12">
					<th class="col-md-2">Email:</th>
					<td class="col-md-4"><?= $mail ?></td>
					<th class="col-md-3">Date de Naissance:</th>
					<td class="col-md-3"><?= $naissance ?></td>
				</tr>
				<tr class="row col-md-12">
					<th class="col-md-2">Adresse 1:</th>
					<td colspan="2" class="col-md-10"><?= $adresse ?></td>
				</tr>
				<tr class="row col-md-12">
					<th class="col-md-3">Complément d'adresse:</th>
					<td colspan="2" class="col-md-9"> <?= $adresse2 ?></td>
				</tr>
				<tr class="row col-md-12">
					<th class="col-md-2">Ville:</th>
					<td class="col-md-4"><?= $ville ?></td>
					<th class="col-md-2">Code Postal:</th>
					<td class="col-md-4"><?= $cp ?></td>
				</tr>
			</table>
		</fieldset>
	</div>
</div>
<?php
include "../php/footer.php";
?>
