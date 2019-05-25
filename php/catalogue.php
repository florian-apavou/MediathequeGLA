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
