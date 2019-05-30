<?php
session_start();
$_SESSION['page_en_cours'] = "historique";
include "../php/includes.php";

if(!isset($_SESSION['id_utilisateur']))
  header('Location: login.php');

$requete_histo = "select m.id, m.type, m.titre, m.auteur, r.dateDebut, r.dateRetour
from reservation r
  left outer join media m on m.id = r.media
where r.retour = 1
and r.membre = ".$_SESSION['id_utilisateur'];

$medias = requete_tableau($requete_histo);

$tableau_histo = "";
foreach($medias as $id => $media)
{
    $media["dateDebut"] = date_create_from_format('Y-m-j', $media['dateDebut']);
    $media["dateRetour"] = date_create_from_format('Y-m-j', $media['dateRetour']);

    $tableau_histo .= "
      <tr>
          <td>
            ".$media["type"]."
          </td>
          <td>
            ".$media["titre"]."
          </td>
          <td>
            ".$media["auteur"]."
          </td>
          <td>
            ".$media["dateDebut"]->format('d/m/Y')."
          </td>
          <td>
            ".$media["dateRetour"]->format('d/m/Y')."
          </td>
          <td>
            <a href=\"info_media.php?id=".$media["id"]."\" class=\"btn btn-primary\">Plus d'infos</a>
          </td>
      </tr>";
}
?>

<div class="sidebar list-group">
  <a class=" list-group-item" href="account.php">Infos Générales</a>
  <a class=" list-group-item" href="liste_reservations.php">Réservations</a>
  <a class="active list-group-item" href="#">Historique</a>
  <a class=" list-group-item" href="abonnement.php">Abonnement</a>
  <a class=" list-group-item" href="wishlist.php">Notifications</a>
</div>
<div class="content">
<div class="container">
      <h1>Historique</h1>
      <?php
        if($medias == [])
        {
          echo "Vous n'avez aucun élément dans votre historique jusqu'à maintenant";
        }
        else
        {
          ?>
       <table class="table table-hover table-striped self-align-center">
         <thead>
           <tr>
             <th scope="col">
               Type
             </th>
             <th scope="col">
               Titre
             </th>
             <th scope="col">
               Auteur
             </th>
             <th scope="col">
               Date réservation
             </th>
             <th scope="col">
               Date retour
             </th>
             <th scope="col">
               Action
             </th>
           </tr>
         </thead>
         <tbody>
           <?= $tableau_histo?>
         </tbody>
       </table>
     <?php
   }?>
  </div>
</div>
</div>


<?php
  include "../php/footer.php";
 ?>
