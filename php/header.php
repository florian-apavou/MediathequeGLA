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
	<div class="navbar navbar-expand-lg header" id="navbar-content">

	  <!-- Colonne Icone -->
	  <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
	    <!-- Logo Navbar -->
	    <a class="navbar-brand" href="index.php">Médiathèque <br> Karine <br> Lemarchand</a>

	    <!-- Définition Bouton Collapse -->
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	  </div>


	  <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
	    <div class="navbar-collapse collapse">

	      <!-- Colonne Recherche -->
	      <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 bg-nav-inverse">
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
	        <div class="col-lg-5 col-xs-12 d-flex">
	          <!-- Liste des boutons dispo. Ajouter <li> pour plus d'options-->
	          <ul class="nav navbar-nav ml-auto p-2">
	            <li class="bg-nav-inverse">
	              <a href="login.php">
	                <i class="fa fa-user-circle"></i>
	                <span> Mon Compte</span>
	              </a>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </div>


	  </div>
	  <div class="container-fluid">
	    <div class="d-flex align-content-stretch flex-wrap">
	      <div class="mt-2 p-2 menu-web">
	        <a href="index.php">Accueil</a>
	      </div>
	      <div class="mt-2 p-2 menu-web">
	        <a href="catalogue.php">Catalogue</a>
	      </div>
	      <div class="mt-2 p-2 menu-web">
	        <a href="#">Nouveautés</a>
	      </div>
	      <div class="mt-2 p-2 menu-web">
	        <a href="#">Contacts</a>
	      </div>
	      <div class="mt-2 p-2 menu-web">
	        <a href="historique.php">Historique</a>
	      </div>
	    </div>
	  </div>
	  <hr>
