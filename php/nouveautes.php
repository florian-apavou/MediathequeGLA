<?php
session_start();
$_SESSION['page_en_cours'] = "nouveautes";
include "../php/includes.php";


$requete_nouveautes_livre = "select id, type, titre, auteur, nbExemplaire, prix
from media
where type = 'Livre'
order by id desc
limit 5";
$nouveautes_livre = requete_tableau($requete_nouveautes_livre);

$requete_nouveautes_dvd = "select id, type, titre, auteur, nbExemplaire, prix
from media
where type = 'DVD'
order by id desc
limit 5";
$nouveautes_dvd = requete_tableau($requete_nouveautes_dvd);

$requete_nouveautes_cd = "select id, type, titre, auteur, nbExemplaire, prix
from media
where type = 'CD'
order by id desc
limit 5";
$nouveautes_cd = requete_tableau($requete_nouveautes_cd);

$requete_nouveautes_revue = "select id, type, titre, auteur, nbExemplaire, prix
from media
where type = 'Revue'
order by id desc
limit 5";
$nouveautes_revue = requete_tableau($requete_nouveautes_revue);

$debut_table = "
<table class=\"table table-hover table-striped self-align-center\">
  <thead>
    <tr>
      <th scope=\"col\">
        Type
      </th>
      <th scope=\"col\">
        Titre
      </th>
      <th scope=\"col\">
        Auteur
      </th>
      <th scope=\"col\">
        Nombre d'exemplaires
      </th>
      <th scope=\"col\">
        Prix
      </th>
      <th scope=\"col\">
        Action
      </th>
    </tr>
  </thead>
  <tbody>";

?>

  <div class="container">
      <h1>Derniers ajouts</h1>
      <hr>
      </br>
      <h2>Derniers livre</h2>
          <?php
            if($nouveautes_livre != [])
            {
              echo $debut_table;
              foreach($nouveautes_livre as $livre)
              {
                echo "
                  <tr>
                      <td>
                        ".$livre["type"]."
                      </td>
                      <td>
                        ".$livre["titre"]."
                      </td>
                      <td>
                        ".$livre["auteur"]."
                      </td>
                      <td>
                        ".$livre["nbExemplaire"]."
                      </td>
                      <td>
                        ".$livre["prix"]."
                      </td>
                      <td>
                        <a href=\"info_media.php?id=".$livre["id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
                      </td>
                  </tr>";
              }
            }
            else
            {
              echo "Aucun livre ajouté...";
            }
          ?>
        </tbody>
      </table>
      </br>
      </br>
      <h2>Derniers DVD</h2>
          <?php
            if($nouveautes_dvd != [])
            {
              echo $debut_table;
              foreach($nouveautes_dvd as $dvd)
              {
                echo "
                  <tr>
                      <td>
                        ".$dvd["type"]."
                      </td>
                      <td>
                        ".$dvd["titre"]."
                      </td>
                      <td>
                        ".$dvd["auteur"]."
                      </td>
                      <td>
                        ".$dvd["nbExemplaire"]."
                      </td>
                      <td>
                        ".$dvd["prix"]."
                      </td>
                      <td>
                        <a href=\"info_media.php?id=".$dvd["id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
                      </td>
                  </tr>";
              }
            }
            else
            {
              echo "Aucun DVD ajouté...";
            }
          ?>
        </tbody>
      </table>
      </br>
      </br>
      <h2>Derniers CD</h2>
          <?php
            if($nouveautes_cd != [])
            {
              echo $debut_table;
              foreach($nouveautes_cd as $cd)
              {
                echo "
                  <tr>
                      <td>
                        ".$cd["type"]."
                      </td>
                      <td>
                        ".$cd["titre"]."
                      </td>
                      <td>
                        ".$cd["auteur"]."
                      </td>
                      <td>
                        ".$cd["nbExemplaire"]."
                      </td>
                      <td>
                        ".$cd["prix"]."
                      </td>
                      <td>
                        <a href=\"info_media.php?id=".$cd["id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
                      </td>
                  </tr>";
              }
            }
            else
            {
              echo "Aucun CD ajouté...";
            }
          ?>
        </tbody>
      </table>
      </br>
      </br>
      <h2>Dernières revues</h2>
          <?php
            if($nouveautes_revue != [])
            {
              echo $debut_table;
              foreach($nouveautes_revue as $revue)
              {
                echo "
                  <tr>
                      <td>
                        ".$revue["type"]."
                      </td>
                      <td>
                        ".$revue["titre"]."
                      </td>
                      <td>
                        ".$revue["auteur"]."
                      </td>
                      <td>
                        ".$revue["nbExemplaire"]."
                      </td>
                      <td>
                        ".$revue["prix"]."
                      </td>
                      <td>
                        <a href=\"info_media.php?id=".$revue["id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
                      </td>
                  </tr>";
              }
            }
            else
            {
              echo "Aucune revue ajoutée...";
            }
          ?>
        </tbody>
      </table>
  </div>

<?php
  include "../php/footer.php";
 ?>
