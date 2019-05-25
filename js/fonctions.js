
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
<script>

function charge_catalogue()
{
	filtre_recherche = $("#input_filtre_recherche").val();
	filtre_type = [];
	$("#div_filtre_type").find("input[type='checkbox']").each(function(){
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

</script>
