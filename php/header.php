<!DOCTYPE html>
<html>
<head>
	<!-- Encoding Standard-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Médiathèque KLM</title>
</head>
<body>

	<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
		<a class="navbar-brand" href="index.php">Médiathèque Karine Le Marchand</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">

			<form class="form-inline ml-auto my-2 my-lg-0 mr-2">
				<div class="input-group">
					<input class="form-control my-0 py-1 lime-border"  name="search" type="text" placeholder="Rechercher..." aria-label="Rechercher dans le Catalogue">
					<div class="input-group-append">
						<button type="submit" class="input-group-text lime lighten-2" id="basic-text"><i class="fas fa-search text-grey"
							aria-hidden="true"></i></button>
						</div>
				</div>
				</form>

				<ul class="navbar-nav mt-2 mt-lg-0">
					<?php if(isset($_SESSION['id_utilisateur'])): ?>

						<?php
						if(isset($_SESSION['rang']) && $_SESSION['rang'] != "client")
						include "../php/buttonAdmin.php";
						?>

						<li class="bg-nav-inverse nav-item">
							<a class="nav-link btn btn-primary mx-1 my-1" href="account.php">
								<i class="fa fa-user-circle"></i>
								<span>Compte</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn btn-danger mx-1 my-1 px-2 py-2" href="deconnexion.php">
								<i class="fas fa-power-off"></i> <span>Déconnexion</span>
							</a>
						</li>
					<?php else: ?>
						<li class="bg-nav-inverse nav-item">
							<a class="nav-link btn btn-success mx-1 my-1" href="login.php">
								<i class="fa fa-user-circle"></i> <span>Connexion</span>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>

			<nav class="navbar navbar-expand-lg nav-end container-fluid d-flex justify-content-sm-center py-0 nav2">
				<button class="navbar-toggler navbar-light toggler-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse py-1" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto list-group" id="ul_menu_header">
						<li class="nav-item">
							<a id="menu-accueil" class="nav-link list-group-item <?php selected('accueil')?> px-5" href="index.php">Accueil <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a id="menu-catalogue" class="nav-link list-group-item <?php selected('catalogue')?> px-5" href="catalogue.php">Catalogue</a>
						</li>
						<li class="nav-item">
							<a id="menu-nouveautes" class="nav-link list-group-item <?php selected('nouveautes')?> px-5" href="nouveautes.php">Nouveautés</a>
						</li>
						<li class="nav-item" >
							<a id="menu-contact" class="nav-link list-group-item <?php selected('contact')?> px-5" href="contact.php">Contact</a>
						</li>
					</ul>
				</div>
			</nav>
			<br>
