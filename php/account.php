<?php
  $_SESSION['page_en_cours'] = "";
  include "../php/includes.php";
  include "../php/fonctions.php";
  include "../php/header.php";
?>

<div class="sidebar list-group">
	<a class="active list-group-item" href="#">Infos Générales</a>
	<a class=" list-group-item" href="liste_reservations.php">Réservations</a>
	<a class=" list-group-item" href="historique.php">Historique</a>
	<a class=" list-group-item" href="abonnement.php">Abonnement</a>
</div>

<!-- Page content -->
<div class="content">
	<div class="container">
		<fieldset class="d-flex">
			<legend>Informations Générales</legend>
			<table class="table table-striped">
				<tr>
					<th>Nom:</th>
					<td></td>
					<th>Prénom:</th>
					<td></td>
				</tr>
				<tr>
					<th>Email:</th>
					<td></td>
					<th>Mot de Passe:</th>
					<td></td>
				</tr>
				<tr>
					<th>Adresse 1:</th>
					<td colspan="2"></td>
				</tr>
				<tr>
					<th>Adresse 2:</th>
					<td colspan="2"></td>
				</tr>
				<tr>
					<th>Ville:</th>
					<td></td>
					<th>Code Postal:</th>
					<td></td>
				</tr>
			</table>
		</fieldset>
	</div>
</div>
<?php
include "../php/footer.php";
?>
