<?php
session_start();
$_SESSION['page_en_cours'] = "admin";
include "../php/includes.php";



$requete_reservation = "select m.id, nom, prenom, titre, auteur, datedebut,dateretour,retour
from reservation r,membre m,media me
where m.id = r.membre
And r.media = me.id";
$reservation = requete_tableau($requete_reservation);

$debut_table = "
<table class=\"table table-hover table-striped self-align-center\">
  <thead>
    <tr>
      <th scope=\"col\">
        Id
      </th>
      <th scope=\"col\">
        Nom
      </th>
      <th scope=\"col\">
        Prenom
      </th>
      <th scope=\"col\">
        Titre media
      </th>
      <th scope=\"col\">
        Auteur
      </th>
      <th scope=\"col\">
        Date Emprunt
      </th>
      <th scope=\"col\">
        Date Retour
      </th>
      <th scope=\"col\">
      Retour
      </th>
      <th scope=\"col\">
      Action
      </th>
    </tr>
  </thead>
  <tbody>";
?>

<div class="container">
  <h1>Gestion des Réservations</h1>
  <br>
  <fieldset>
    <legend>Recherche du Client</legend>
    <form method="get" action="#">
      <table>
        <tr>
          <td class="col-lg-6">
            <div class="input-group md-form form-sm form-2 pl-0">
              <input id="input_filtre_recherche" class="form-control my-0 py-1 lime-border" type="text" placeholder="Rechercher..." aria-label="Search" name="search" value="">
            </div>
          </td>
          <td>
            <div class="input-group-append">
              <button class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i><span> Rechercher<span></button>
              </div>
            </td>
          </tr>
        </table>
      </form>
    </fieldset>

    <?php
            if($reservation != [])
            {
              echo $debut_table;
              foreach($reservation as $resa)
              {
                echo "
                  <tr>
                      <td>
                        ".$resa["id"]."
                      </td>
                      <td>
                        ".$resa["nom"]."
                      </td>
                      <td>
                        ".$resa["prenom"]."
                      </td>
                      <td>
                        ".$resa["titre"]."
                      </td>
                      <td>
                        ".$resa["auteur"]."
                      </td>
                      <td>
                        ".$resa["datedebut"]."
                      </td>
                      <td>
                        ".$resa["dateretour"]."
                      </td>
                      <td>
                        ".$resa["retour"]."
                      </td>
                      <td>
                      <a href=\"gestReserv.php?id=".$resa["id"]."\" class=\"btn btn-primary\">Rendre</a>
                    </td>
                  </tr>";
              }
            }
            else
            {
              echo "Aucune reservation presente";
            }
          ?>
        </tbody>
      </table>
  </div>
