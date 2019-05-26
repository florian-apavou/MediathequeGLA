<?php
include "../php/fonctions.php";
include "../php/includes.php";
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Encoding Standard-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Accueil</title>

</head>
<body>

	<!-- Navbar -->
	<div class="navbar navbar-expand-lg" id="navbar-content">

		<!-- Colonne Icone -->
		<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
			<!-- Logo Navbar -->
			<a class="navbar-brand" href="index.html">Médiathèque <br> Karine <br> Lemarchand</a>

			<!-- Définition Bouton Collapse -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>


		<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
			<div class="navbar-collapse collapse">

				<!-- Colonne Recherche -->
				<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 bg-nav-inverse">
					<div class="form-group">
						<div class="input-group">
							<form method="GET" class="navbar-form" role="search">
								<input class="form-control mr-sm-2" type="search" placeholder="Rechercher..." aria-label="Rechercher dans le Catalogue">
							</form>
							<div class="input-group-btn">
								<button class="btn btn-link btn-search" data-toggle="tooltip" title-data-placement="bottom" data-original-title='Lancer la recherche'>
									<i class="fa fa-search"></i>
								</button>
								<a class="btn btn-link" href="#">
									<i class="fa fa-search-plus"></i>
									<span class="hidden-sm hidden-xs"> Recherche Avancée</span>
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Colonne Compte -->
				<div class="col-lg-5 col-xs-12 d-flex">
					<!-- Liste des boutons dispo. Ajouter <li> pour plus d'options-->
					<ul class="nav navbar-nav ml-auto p-2">
						<li class="bg-nav-inverse">
							<a href="login.html">
								<i class="fa fa-user-circle"></i>
								<span> Connexion</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--
		<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
		<li>
		<a href="#">Accueil</a>
	</li>
	<li>
	<a href="#">Catalogue</a>
</li>
<li>
<a href="#">Nouveautés</a>
</li>
<li>
<a href="#">Infos Pratiques</a>
</li>
</ul>
</div>
-->
<!-- Menu sous navbar -->
</div>
<div class="container-fluid">
	<div class="d-flex align-content-stretch flex-wrap">
		<div class="mt-2 p-2 menu-web" onClick="charge_conteneur_central('accueil');">
			Accueil
		</div>
		<div class="mt-2 p-2 menu-web" onClick="charge_conteneur_central('catalogue');">
			Catalogue
		</div>
		<div class="mt-2 p-2 menu-web" onClick="charge_conteneur_central('nouveautes');">
			Nouveautés
		</div>
		<div class="mt-2 p-2 menu-web" onClick="charge_conteneur_central('infos_pratiques');">
			Infos Pratiques
		</div>
	</div>
</div>
<hr>