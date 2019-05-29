<?php

function requete_tableau($requete, $ligne = null)
{
	$bdd = mysqli_connect('localhost', 'root', '', 'mediatheque');
	if (mysqli_connect_errno()) {
		return [];
	}
	$tableau = [];
	if($resultat = mysqli_query($bdd, $requete))
    {

			while($row = mysqli_fetch_assoc($resultat))
			{
				$tableau[] = $row;
			}
    	mysqli_free_result($resultat);
    }
	mysqli_close($bdd);
	return $tableau;
}

function echobr($var_a_afficher)
{
	if(is_array($var_a_afficher))
	{
		foreach($var_a_afficher as $id => $affiche)
		{
			echobr($id." => ".$affiche."&nbsp;");
		}
		echo("</br>");
	}
	else
		echo($var_a_afficher);
}

function selected($page)
{
	if(isset($_SESSION['page_en_cours']) && $_SESSION['page_en_cours'] == $page)
		echo "active";
}

?>
