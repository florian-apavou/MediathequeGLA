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
