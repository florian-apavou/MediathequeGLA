<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Connexion</title>

	<?php
	include "../php/includes.php";
	include "../php/fonctions.php";
	?>
</head>
<body>
	<div class="navbar navbar-expand-lg" id="navbar-content">

		<!-- Colonne Icone -->
		<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
			<!-- Logo Navbar -->
			<a class="navbar-brand" href="index.php">Médiathèque <br> Karine <br> Lemarchand</a>
		</div>
	</div>


	<div class="container">
		<div class="row formsCo">
			<div id="connexion" class="col-lg-5 verticalLine">
				<fieldset>
					<legend>Connexion</legend>
					<form>
						<div class="form-group">
							<label for="inputEmail1">Email</label>
							<input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="Entrer email" required>
							<small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre adresse email.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Mot de Passe</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de Passe" required>
						</div>
						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Se rappeler de moi</label>
						</div>
						<button type="submit" class="btn btn-primary">Connexion</button>
					</form>
				</fieldset>
			</div>
			<div id="inscription" class="col-lg-7">
				<div>
					<fieldset>
						<legend>Inscription</legend>
						<form>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">Email</label>
									<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Mot de Passe</label>
									<input type="password" class="form-control" id="inputPassword4" placeholder="Mot de Passe">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress">Adresse</label>
								<input type="text" class="form-control" id="inputAddress" placeholder="1234 Rue Dupont...">
							</div>
							<div class="form-group">
								<label for="inputAddress2">Adresse 2</label>
								<input type="text" class="form-control" id="inputAddress2" placeholder="Appartement, studio ou étage...">
							</div>
							<div class="form-row">
								<div class="form-group col-md-8">
									<label for="inputCity">Ville</label>
									<input type="text" class="form-control" id="inputCity">
								</div>
								<div class="form-group col-md-4">
									<label for="inputZip">Code Postal</label>
									<input type="text" class="form-control" id="inputZip">
								</div>
							</div>
							<button type="submit" class="btn btn-primary">S'inscrire</button>
						</form>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</body>
