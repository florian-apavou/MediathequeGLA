<!DOCTYPE html>
<html>
<head>
    <!-- Encoding Standard-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Accueil</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Font Awesome, Google Font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

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
                <div class="mt-2 p-2 menu-web">
                    <a href="index.html">Accueil</a>
                </div>
                <div class="mt-2 p-2 menu-web">
                    <a href="#">Catalogue</a>
                </div>
                <div class="mt-2 p-2 menu-web">
                    <a href="#">Nouveautés</a>
                </div>
                <div class="mt-2 p-2 menu-web">
                    <a href="#">Infos Pratiques</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="container">
        <!-- Insérer code HTML, etc. ici -->
<?php
	include "../php/fonctions.php";
	include "../js/fonctions.js";

	/*
	*
	*	GESTION DES VARIABLES ET ERREURS
	*
	*/

	$erreur = false;
	$msg_erreur = "Erreur";
	$html = "";
	$filtre_recherche = $_POST['filtre_recherche']??null;
	$filtre_type = $_POST['filtre_type']??[];
	$rechargement_filtre = (bool)($_POST['rechargement_filtre']??false);

	if(isset($filtre_recherche) && !is_string($filtre_recherche))
	{
		$erreur = true;
		$msg_erreur .= " - filtre recherche incorrect";
	}

	if(isset($filtre_type) && !is_array($filtre_type))
	{
		$erreur = true;
		$msg_erreur .= " - filtre type incorrect";
	}

	if(!is_bool($rechargement_filtre))
	{
		$erreur = true;
		$msg_erreur .= " - rechargement incorrect";
	}

	/*
	*
	*	GESTION DES VARIABLES ET ERREURS
	*
	*/

	if(!$erreur)
	{
		if(!$rechargement_filtre)
		{
			$html .= "<fieldset>
				<div id=\"div_filtre_recherche\">
					<label>Rechercher un média : </label>
					<input id=\"input_filtre_recherche\" type=\"text\" name=\"test\"></input>
					<button onClick=\"charge_catalogue()\">Image loupe</button>
				</div>
				<div id=\"div_filtre_type\">";

			$requete_types_medias = "select *
			from TypeMedia";
			//$types_medias = requete_tableau($requete_types_medias);
			$types_medias[0] = "Livre";
			$types_medias[1] = "CD";
			$types_medias[2] = "DVD";
			$types_medias[3] = "Revue";

			foreach($types_medias as $id_media => $type_media)
			{
				$html .=
					"<input onChange=\"charge_catalogue()\" type=\"checkbox\" id=\"input_".$id_media."\" name=\"".strtolower($type_media)."\" ".(in_array($id_media, $filtre_type)?"checked":"").">
					<label for=\"".strtolower($type_media)."\">".$type_media."</label>";
			}
			$html .= "
					</div>
				</fieldset>
				</br>
				<fieldset>
					<div id=\"tableau_catalogue\">";
		}
		$requete_medias = "select *
		from Média m";
		if(isset($filtre_recherche))
			$requete_medias .= "
			where m.titre like \"%".$filtre_recherche."%\"";

		//$medias = requete_tableau($requete_medias, "id");
		$medias[0] = [
			"id" => 1,
			"titre" => "Le livre de la jungle",
			"nb_exemplaire" => 3,
			"prix" => 5,
			"type" => "Livre",
		];
		$medias[1] = [
			"id" => 2,
			"titre" => "Comment c'est loin",
			"nb_exemplaire" => 1,
			"prix" => 15,
			"type" => "DVD",
		];
		$medias[2] = [
			"id" => 3,
			"titre" => "Humain à l'eau",
			"nb_exemplaire" => 2,
			"prix" => 10,
			"type" => "CD",
		];
		$medias[3] = [
			"id" => 4,
			"titre" => "Bambi",
			"nb_exemplaire" => 0,
			"prix" => 5,
			"type" => "DVD",
		];
		$medias[4] = [
			"id" => 5,
			"titre" => "Les mystérieuses cités d'or",
			"nb_exemplaire" => 4,
			"prix" => 5,
			"type" => "DVD",
		];
		$html .= "
			<table>
			    <thead>
			        <tr>
			            <th>ID</th>
			            <th>Titre</th>
			            <th>Exemplaires libres</th>
			            <th>Prix</th>
			            <th>Type</th>
			            <th>Action</th>
			        </tr>
			    </thead>
			    <tbody>";

		foreach($medias as $id_media => $media)
		{
			$html .= "<tr>
				<td>".$media["id"]."</td>
				<td>".$media["titre"]."</td>
				<td>".$media["nb_exemplaire"]."</td>
				<td>".$media["prix"]."</td>
				<td>".$media["type"]."</td>
				<td onClick=reserveMedia(\"".$id_media."\")>Réserver</td>
			</tr>";
		}

		$html .= "
			    </tbody>
			</table>";
		if(!$rechargement_filtre)
		{
			$html .= "</div></fieldset>";
		}
		echobr($html);
	}
	else
		echobr($msg_erreur);
?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>
</body>
</html>
