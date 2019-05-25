function charge_conteneur_central(menu)
{
		menu = menu || "accueil";
		if(menu == "accueil")
		{
			console.log("accueil");
			$("#conteneur_central").load("../php/accueil.php");
		}
		if(menu == "catalogue")
		{
			console.log("catalogue");
			$("#conteneur_central").load("../php/catalogue.php");
		}
		if(menu == "nouveautes")
		{
			console.log("nouveautes");
			$("#conteneur_central").load("../php/nouveautes.php");
		}
		if(menu == "infos_pratiques")
		{
			console.log("infos_pratiques");
			$("#conteneur_central").load("../php/infos_pratiques.php");
		}
}

function charge_catalogue()
{
	filtre_recherche = $("#input_filtre_recherche").val();
	filtre_type = [];
	$("#div_filtre_type").find("input[type='checkbox']").each(function()
	{
		if(this.checked)
			filtre_type.push($(this).attr('id').split("_")[1]);
	});
	$("#tableau_catalogue").load("catalogue.php",
	{
		filtre_type : filtre_type,
		filtre_recherche : filtre_recherche,
		rechargement_filtre : true,
	});
}

function reserveMedia(id_media)
{

}
