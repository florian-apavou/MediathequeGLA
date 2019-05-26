page_en_cours = "accueil";

function charge_conteneur_central(menu)
{
		menu = menu || page_en_cours || "accueil";
		$("#conteneur_central").load("../php/"+menu+".php");
}

function charge_catalogue(filtre_recherche, filtre_type, rechargement_filtre)
{
	filtre_recherche = filtre_recherche || $("#input_filtre_recherche").val();
	filtre_type = filtre_type || [];
	rechargement_filtre = rechargement_filtre || true;

	$("#div_filtre_type").find("input[type='checkbox']").each(function()
	{
		if(this.checked)
			filtre_type.push($(this).attr('id').split("_")[1]);
	});
	$("#tableau_catalogue").load("catalogue.php",
	{
		filtre_type : filtre_type,
		filtre_recherche : filtre_recherche,
		rechargement_filtre : rechargement_filtre,
	});
}

function afficheInfoMedia(id_media)
{
	$("#conteneur_central").load("../php/info_media.php",
	{
		id_media : id_media,
	});
}

function noteCommentaire(note)
{
	$("#span_note_commentaire").text(note+"/5");
}

function bascule_masque(id1 = null, id2 = null, id3 = null, id4 = null, id5 = null)
{
	if(id1 != null)
	{
		if($("#"+id1).attr("hidden"))
			$("#"+id1).removeAttr("hidden");
		else
			$("#"+id1).attr("hidden", "hidden");
	}
	if(id2 != null)
	{
		if($("#"+id2).attr("hidden"))
			$("#"+id2).removeAttr("hidden");
		else
			$("#"+id2).attr("hidden", "hidden");
	}
	if(id3 != null)
	{
		if($("#"+id3).attr("hidden"))
			$("#"+id3).removeAttr("hidden");
		else
			$("#"+id3).attr("hidden", "hidden");
	}
	if(id4 != null)
	{
		if($("#"+id4).attr("hidden"))
			$("#"+id4).removeAttr("hidden");
		else
			$("#"+id4).attr("hidden", "hidden");
	}
	if(id5 != null)
	{
		if($("#"+id5).attr("hidden"))
			$("#"+id5).removeAttr("hidden");
		else
			$("#"+id5).attr("hidden", "hidden");
	}
}

function modifie_titre(id)
{
	nouvelle_val = $("#input_titre").val();
	$("#span_titre").text(nouvelle_val);
	// On sauvegarde dans la bdd
}

function modifie_auteur(id)
{
	nouvelle_val = $("#input_auteur").val();
	$("#span_auteur").text(nouvelle_val);
	// On sauvegarde dans la bdd
}

function modifie_prix(id)
{
	nouvelle_val = $("#input_prix").val();
	$("#span_prix").text(nouvelle_val);
	// On sauvegarde dans la bdd
}

function modifie_nb_exemplaire(id)
{
	nouvelle_val = $("#input_nb_exemplaire").val();
	$("#span_nb_exemplaire").text(nouvelle_val);
	// On sauvegarde dans la bdd
}

function demande_notification(id)
{
	// On add dans la bdd
}

function recherche_catalogue()
{
	$("#conteneur_central").load("../php/catalogue.php", {
		filtre_recherche : $("#recherche_catalogue").val(),
		oui : "non",
	});
}
