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

function modifieMembre(colonne)
{
	nouvelle_val = $("#input_"+colonne).val();
	$("#span_"+colonne).text(nouvelle_val);
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "modifieMembre",
		colonne : colonne,
		val : nouvelle_val,
	}, function(data)
	{
    if(data == "ok")
		{
			console.log("nouveau "+colonne+" = "+nouvelle_val);
		}
		else
		{
			console.log(data);
		}
  });
}

function changeMdp()
{
	ancien_mdp = $("#ancien_mdp").val();
	nouveau_mdp = $("#nouveau_mdp").val();
	nouveau_mdp2 = $("#nouveau_mdp2").val();
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "changeMdp",
		ancien_mdp : ancien_mdp,
		nouveau_mdp : nouveau_mdp,
		nouveau_mdp2 : nouveau_mdp2,
	}, function(data)
	{
    if(data == "ok")
		{
			$("#result_changeMdp").text("Le mot de passe a bien été changé");
		}
		else if(data == "nouveaux")
		{
			$("#result_changeMdp").text("Le nouveau mot de passe doit être le même que sa confirmation");
		}
		else if(data == "ancien")
		{
			$("#result_changeMdp").text("L'ancien mot de passe doit être correct");
		}
		else
		{
			console.log("erreur");
		}
  });
}

function demander_notification(id_media)
{
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "demander_notification",
		media : id_media,
	}, function(data)
	{
    if(data == "ok")
		{
			bascule_masque("notif_danger", "notif_info");
		}
		else
		{
			console.log(data);
		}
  });
}

function annuler_notification(id_media)
{
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "annuler_notification",
		media : id_media,
	}, function(data)
	{
    if(data == "ok")
		{
			bascule_masque("notif_danger", "notif_info");
		}
    else if(data == "id")
		{
			console.log("pas cet id");
		}
		else
		{
			console.log(data);
		}
  });
}

function reserve_media(id_media)
{
	owner = $("#owner").val();
	cvv = $("#cvv").val();
	cardNumber = $("#cardNumber").val();
	mois = $("#mois").val();
	annee = $("#annee").val();

	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "reserveMedia",
		media : id_media,
		owner : owner,
		cvv : cvv,
		cardNumber : cardNumber,
		mois : mois,
		annee : annee,
	}, function(data)
	{
    if(data == "ok")
		{
		bascule_masque("btn_success");
			$("#btn_success").text("Le média a bien été réservé, vous pouvez désormais aller le récupèrer à la Médiathèque.");
			bascule_masque("btn_reserver");
			reduit_nbExemplaire(id_media);
		}
    else if(data == "informations")
		{
		bascule_masque("btn_erreur");
			$("#btn_erreur").text("Veuillez remplir toutes les informations");
		}
    else if(data == "nb")
		{
			bascule_masque("btn_reserver");
			bascule_masque("btn_erreur");
			$("#btn_erreur").text("Ce média n'est plus disponible");
		}
		else
		{
			console.log(data);
		}
  });
}

function reduit_nbExemplaire(id_media)
{
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "reduit_nbExemplaire",
		media : id_media,
	}, function(data)
	{
    if(data == "ok")
		{
			console.log("nb exemplaire réduit");
		}
		else
		{
			console.log(data);
		}
  });
}

function augmente_nbExemplaire(id_media, success)
{
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "augmente_nbExemplaire",
		media : id_media,
	}, function(data)
	{
    if(data == "ok")
		{
			console.log("nb exemplaire augmenté");
			success();
		}
		else
		{
			console.log(data);
		}
  });
}

function traiterContact(id_contact)
{
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "traiterContact",
		contact : id_contact,
	}, function(data)
	{
    if(data == "ok")
		{
			bascule_masque("traite", "non_traite");
		}
		else
		{
			console.log(data);
		}
  });
}

function nontraiterContact(id_contact)
{
	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "nontraiterContact",
		contact : id_contact,
	}, function(data)
	{
    if(data == "ok")
		{
			bascule_masque("traite", "non_traite");
		}
		else
		{
			console.log(data);
		}
  });
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

function contactAdmin()
{
	objet = $("#objet_contact").val();
	message = $("#message_contact").val();

	$.post("../php/sauvegarde_modif_bdd.php",
	{
		fonction_requete : "contactAdmin",
		objet : objet,
		message : message,
	}, function(data)
	{
    if(data == "ok")
		{
			bascule_masque("btn_envoyer", "btn_success");
		}
		else
		{
			console.log(data);
		}
  });
}
