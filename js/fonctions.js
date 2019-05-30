page_en_cours = "accueil";

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

function modifie_titre_media(id_media)
{
	nouvelle_val = $("#input_titre").val();
	$("#span_titre").text(nouvelle_val);
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "modifieMedia",
		media : id_media,
		colonne : "titre",
		val : nouvelle_val,
	}, function(data)
	{
    if(data == "ok")
		{
			console.log("valeur "+nouvelle_val+" bien modifiée");
		}
		else
		{
			console.log(data);
		}
  });
}

function modifie_auteur_media(id_media)
{
	nouvelle_val = $("#input_auteur").val();
	$("#span_auteur").text(nouvelle_val);
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "modifieMedia",
		media : id_media,
		colonne : "auteur",
		val : nouvelle_val,
	}, function(data)
	{
    if(data == "ok")
		{
			console.log("valeur "+nouvelle_val+" bien modifiée");
		}
		else
		{
			console.log(data);
		}
  });
}

function modifie_prix_media(id_media)
{
	nouvelle_val = $("#input_prix").val();
	$("#span_prix").text(nouvelle_val);
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "modifieMedia",
		media : id_media,
		colonne : "prix",
		val : nouvelle_val,
	}, function(data)
	{
    if(data == "ok")
		{
			console.log("valeur "+nouvelle_val+" bien modifiée");
		}
		else
		{
			console.log(data);
		}
  });
}

function modifie_nb_exemplaire_media(id_media)
{
	nouvelle_val = $("#input_nb_exemplaire").val();
	$("#span_nb_exemplaire").text(nouvelle_val);
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "modifieMedia",
		media : id_media,
		colonne : "nbExemplaire",
		val : nouvelle_val,
	}, function(data)
	{
    if(data == "ok")
		{
			console.log("valeur "+nouvelle_val+" bien modifiée");
		}
		else
		{
			console.log(data);
		}
  });
}

function supprime_media(id_media)
{
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "supprimeMedia",
		media : id_media,
	}, function(data)
	{
		if(data == "ok")
		{
			console.log("id_media bien supprimé");
			window.location.href = "../php/catalogue.php";
		}
		else
		{
			console.log(data);
		}
	});
}

function demande_notification(id_media, id_client)
{
	requete = "insert into notification...";
	update_bdd(requete);
}

function reserve_media(id_media)
{
	requete = "update table...";
	update_bdd(requete);
}

function rend_media(id_media)
{
	requete = "delete from...";
	update_bdd(requete);
}

function update_bdd(requete)
{
	$.post("../php/sauvegarde_modif_bdd.php", {requete: requete}, function(data)
	{
        // Tu affiches le contenu dans ta div
        console.log(data);
  });
}

function commenterMedia(id_media)
{
	commentaire = $("#msg").val();
	note = 0;
	if ($("#star-1").prop('checked')) {
		note = 1;
	}
	else if ($("#star-2").prop('checked')) {
		note = 2;
	}
	else if ($("#star-3").prop('checked')) {
		note = 3;
	}
	else if ($("#star-4").prop('checked')) {
		note = 4;
	}
	else if ($("#star-5").prop('checked')) {
		note = 5;
	}

	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "commenterMedia",
		commentaire : commentaire,
		media : id_media,
		note : note,
	}, function(data)
	{
    if(data == "ok")
		{
			$("#div_commentaire").empty().text("Votre commentaire a bien été pris en compte.");
		}
		else
		{
			console.log(data);
		}
  });
}
