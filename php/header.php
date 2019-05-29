<!DOCTYPE html>
<html>
<head>
	<!-- Encoding Standard-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Médiathèque KLM</title>
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg row" id="navbar-content">

		<!-- Colonne Icone -->
		<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
			<!-- Logo Navbar -->
			<a class="navbar-brand" href="index.php">Médiathèque <br> Karine <br> Lemarchand</a>
		</div>


		<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 d-flex row">

			<!-- Colonne Recherche -->
			<div class="col-lg-8 col-sm-12">
				<form method="GET" action="catalogue.php">
					<div class="form-group">
						<div class="input-group md-form form-sm form-2 pl-0">
							<input class="form-control my-0 py-1 lime-border"  name="search" type="text" placeholder="Rechercher..." aria-label="Rechercher dans le Catalogue">
							<div class="input-group-append">
								<button type="submit" class="input-group-text lime lighten-2" id="basic-text"><i class="fas fa-search text-grey"
									aria-hidden="true"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<!-- Colonne Compte -->
				<div class="col-lg-4 col-sm-12 d-flex justify-content-sm-center">
					<ul class="nav navbar-nav ml-lg-auto pl-lg-0 align-items-center">
						<?php
								if(isset($_SESSION['rang']) && $_SESSION['rang'] != "client")
						 			include "../php/buttonAdmin.php";
								if(isset($_SESSION['id_utilisateur']))
								{
									echo "
									<li class=\"bg-nav-inverse\">
										<a class=\"btn btn-primary mx-1 my-1\" href=\"account.php\">
											<i class=\"fa fa-user-circle\"></i>
											<span>Mon Compte</span>
										</a>
									</li>
									<li>
										<a class=\"btn btn-danger mx-1 my-1 px-2 py-2\" href=\"deconnexion.php\">
											<i class=\"fas fa-power-off\"><span></span></i>
										</a>
									</li>";
								}
								else
								{
									echo "
									<li class=\"bg-nav-inverse\">
										<a class=\"btn btn-success mx-1 my-1\" href=\"login.php\">
											<i class=\"fa fa-user-circle\"></i>
											<span>Connexion</span>
										</a>
									</li>";
								}?>
					</ul>
				</div>
			</div>
		</nav>

		<nav class="navbar navbar-expand-lg nav-end container-fluid d-flex justify-content-sm-center py-0 nav2">
			<button class="navbar-toggler navbar-light toggler-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
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
