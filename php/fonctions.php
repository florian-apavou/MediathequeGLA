<?php

function requete_tableau($requete, $ligne = null)
{
	$db = mysql_connect('localhost', 'login', 'password');
	mysql_select_db('nom_de_la_base',$db);
	$req = mysql_query($requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
	$tableau = [];
	while($data = mysql_fetch_assoc($req))
    {
    	if($ligne != null && isset($data[$ligne]))
    	{ // Si une ligne est envoyée en parametre et qu'elle existe, on la met en index
    		$tableau[$ligne] = $data;
    	}
    	else
    		$tableau[] = $data;
    }
	mysql_close();

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
	$_SESSION['page_en_cours'] = $_SESSION['page_en_cours']??"accueil";
	if($_SESSION['page_en_cours'] == $page)
		echo "&nbsp;active";
}

?>
