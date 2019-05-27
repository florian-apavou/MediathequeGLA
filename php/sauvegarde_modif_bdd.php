<?php

  $action = $_POST['action'];
  $elem_requete = explode('_', $action);
  if(sizeof($elem_requete) > 3) // nb min pour faire une modif bdd
  {
    $table = $elem_requete[0];
    $and = [];
    array_shift($elem_requete);
    while(sizeof($elem_requete) > 2)
    {
      $and[$elem_requete[0]] = $elem_requete[1];
      // On dépile les 2 premières val du tableau
      array_shift($elem_requete);
      array_shift($elem_requete);
    }
    $elem_modifie = $elem_requete[0];
    $val_modifie = $elem_requete[1];
  }

  $requete = "update ".$table."
  set ".$elem_modifie." = '".$val_modifie."'
  where 1 = 1";
  foreach($and as $col => $val)
  {
    $requete .= "
    and ".$col." = '".$val."'
    ";
  }
  echo($requete);
  // On lance la requete

 ?>
