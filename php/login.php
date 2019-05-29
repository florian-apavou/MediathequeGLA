<?php
$_SESSION['page_en_cours'] = "login";
include "../php/logIncludes.php";
// On redirige si déjà connecté
if(isset($_SESSION['id_utilisateur']))
  header('Location: index.php');




?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
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
<?php

if(isset($_POST['formulaire_envoye']))
{
	if($_POST['formulaire_envoye'] == "connexion"
		&& isset($_POST['connexion_email'])
		&& isset($_POST['connexion_password']))
	{// Connexion

		$bdd = mysqli_connect('localhost', 'root', '', 'mediatheque');
		$query = mysqli_prepare($bdd, 'SELECT id, mdp, type, prenom
        FROM membre WHERE mail = ?');
		mysqli_stmt_bind_param($query, 's', $_POST['connexion_email']);
    mysqli_stmt_execute($query);
    $data = $query->fetch();
		if($data['mdp'] == md5($_POST['connexion_password'])) // Acces OK !
		{
		    $_SESSION['id_utilisateur'] = $data['id'];
		    $_SESSION['rang'] = $data['type'];
		    $_SESSION['prenom'] = $data['prenom'];
		    $message = '<p>Bienvenue '.$data['prenom'].',
				vous êtes maintenant connecté!</p>
				<p>Cliquez <a href="./index.php">ici</a>
				pour revenir à la page d accueil</p>';
		}
		else // Acces pas OK !
		{
		    $message = '<p>Une erreur s\'est produite
		    pendant votre identification.<br /> Le mot de passe ou le pseudo
	            entré n\'est pas correcte.</p><p>Cliquez <a href="./login.php">ici</a>
		    pour revenir à la page précédente
		    <br /><br />Cliquez <a href="./index.php">ici</a>
		    pour revenir à la page d accueil</p>';
		}
		mysqli_close($bdd);
		echo $message;
	}
	elseif($_POST['formulaire_envoye'] == "inscription")
	{// Inscription

	}
}
else {
	?>
		<div class="row formsCo">
			<div id="connexion" class="col-lg-5 verticalLine my-3">
				<fieldset>
					<legend>Connexion</legend>
					<form method="post" action="login.php">
						<div class="form-group">
							<label for="connexion_email">Email</label>
							<input type="email" class="form-control" name="connexion_email" id="connexion_email" aria-describedby="emailHelp" placeholder="Entrer email" required>
							<small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre adresse email.</small>
						</div>
						<div class="form-group">
							<label for="connexion_password">Mot de Passe</label>
							<input type="password" class="form-control" name="connexion_password" id="connexion_password" placeholder="Mot de Passe" required>
						</div>
						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" name="connexion_remember_me" id="remember_me">
							<label class="form-check-label" for="connexion_remember_me">Se rappeler de moi</label>
						</div>
						<button type="submit" name="formulaire_envoye" value="connexion" class="btn btn-primary">Connexion</button>
					</form>
				</fieldset>
			</div>
			<div id="inscription" class="col-lg-7">
				<div>
					<fieldset>
						<legend>Inscription</legend>
						<form method="post" action="login.php">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inscription_email">Email*</label>
									<input type="email" class="form-control" name="inscription_email" id="inscription_email" placeholder="Email">
								</div>
								<div class="form-group col-md-6">
									<label for="inscription_password">Mot de Passe*</label>
									<input type="password" class="form-control" name="inscription_password" id="inscription_password" placeholder="Mot de Passe">
								</div>
							</div>
							<div class="form-group">
								<label for="inscription_adresse">Adresse*</label>
								<input type="text" class="form-control" name="inscription_adresse" id="inscription_adresse" placeholder="1234 Rue Dupont...">
							</div>
							<div class="form-group">
								<label for="inscription_complement_adresse">Complément d'Adresse</label>
								<input type="text" class="form-control" name="inscription_complement_adresse" id="inscription_complement_adresse" placeholder="Appartement, studio ou étage...">
							</div>
							<div class="form-row">
								<div class="form-group col-md-8">
									<label for="inscription_ville">Ville*</label>
									<input type="text" class="form-control" name="inscription_ville" id="inscription_ville">
								</div>
								<div class="form-group col-md-4">
									<label for="inscription_cp">Code Postal*</label>
									<input type="text" class="form-control" name="inscription_cp" id="inscription_cp">
								</div>
							</div>
							<button type="submit" name="formulaire_envoye" value="inscription" class="btn btn-primary">S'inscrire</button>
						</form>
					</fieldset>
				</div>
			</div>
		</div>
	<?php
}
?>
	</div>
</body>
