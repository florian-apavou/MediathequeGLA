<?php
session_start();
$_SESSION['page_en_cours'] = "info_media";
include "../php/includes.php";

//Debug :

$id_media = $_REQUEST['id']??null;

$requete_media = "select id, titre, auteur, nbExemplaire, prix, type, photo
from media
where id = ".$id_media;

$media = requete_tableau($requete_media)[0];

$requete_commentaires = "select c.id, c.message, m.nom, m.prenom, c.note
from commentaire c
left outer join membre m on m.id = c.membre
where c.media = ".$id_media;

$commentaires = requete_tableau($requete_commentaires);

if(isset($_SESSION['id_utilisateur'])){
  $requete = "select *
  from notification
  where membre = ".$_SESSION['id_utilisateur']."
  and media = ".$id_media;
  $deja_notifie = requete_tableau($requete) != [];
}
else $deja_notifie = true; 

$note_moyenne = 0;
$nb_commentaires = 0;
foreach($commentaires as $id => $commentaire)
{
  $note_moyenne += $commentaire['note'];
  $nb_commentaires ++;
}
$note_moyenne = $nb_commentaires == 0 ? "N/A" : $note_moyenne / $nb_commentaires;


?>

<div class="container">
  <div class="row">
    <div class="col-lg-4">
      <img src="../imgs/<?=$media["photo"]?>" class="img-thumbnail imgFM" alt="Responsive image">
    </div>
    <div class="col-lg-6">
      <div class="d-flex">
        <h1>Infos Pratiques</h1>
        <?php
        if(isset($_SESSION['rang']) && $_SESSION['rang'] == "gestMedia"){
          echo "<button class=\"btn btn-danger ml-auto\" onclick=\"supprime_media(".$id_media.")\">Supprimer ce média</button>";
        }
        ?>
      </div>
      <br>
      <table class="table table-hover self-align-center">
        <tbody>
          <tr>
            <th scope="row"><?= $media["type"]?></th>
            <td>
              <div>
                <span id="span_titre"><?= $media["titre"]?></span>

              </div>
            </td>
            <?php
            if(isset($_SESSION['rang']) && $_SESSION['rang'] != "client")
            echo "
            <td><input id=\"input_titre\" value=\"".$media["titre"]."\" hidden></input>
            <i id=\"pen_titre\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_titre', 'input_titre', 'pen_titre', 'check_titre')\"></i>
            <i id=\"check_titre\" class=\"fas fa-check\" onclick=\"bascule_masque('span_titre', 'input_titre', 'pen_titre', 'check_titre'); modifie_titre_media('".$id_media."')\" hidden></i></td>";
            ?>
          </tr>
          <tr>
            <th scope="row">Auteur</th>
            <td>
              <div>
                <span id="span_auteur"><?= $media["auteur"]?></span>
              </div>
            </td>
            <?php
            if(isset($_SESSION['rang']) && $_SESSION['rang'] != "client")
            echo "
            <td><input id=\"input_auteur\" value=\"".$media["auteur"]."\" hidden></input>
            <i id=\"pen_auteur\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_auteur', 'input_auteur', 'pen_auteur', 'check_auteur')\"></i>
            <i id=\"check_auteur\" class=\"fas fa-check\" onclick=\"bascule_masque('span_auteur', 'input_auteur', 'pen_auteur', 'check_auteur'); modifie_auteur_media('".$id_media."')\" hidden></i></td>";
            ?>
          </tr>
          <tr>
            <th scope="row">Prix</th>
            <td>
              <div>
                <span id="span_prix"><?= $media["prix"]?> euros</span>
              </div>
            </td>
            <?php
            if(isset($_SESSION['rang']) && $_SESSION['rang'] != "client")
            echo "
            <td><input type=\"number\" id=\"input_prix\" value=\"".$media["prix"]."\" hidden></input>
            <i id=\"pen_prix\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_prix', 'input_prix', 'pen_prix', 'check_prix')\"></i>
            <i id=\"check_prix\" class=\"fas fa-check\" onclick=\"bascule_masque('span_prix', 'input_prix', 'pen_prix', 'check_prix'); modifie_prix_media('".$id_media."')\" hidden></i></td>";
            ?>
          </tr>
          <tr>
            <th scope="row">Nombre d'exemplaire restant </th>
            <td>
              <div>
                <span id="span_nb_exemplaire"><?= $media["nbExemplaire"]?></span>
              </div>
            </td>
            <?php
            if(isset($_SESSION['rang']) && $_SESSION['rang'] != "client")
            echo "
            <td><input type=\"number\" id=\"input_nb_exemplaire\" value=\"".$media["nbExemplaire"]."\" hidden></input>
            <i id=\"pen_nb_exemplaire\" class=\"fas fa-pen\" onclick=\"bascule_masque('span_nb_exemplaire', 'input_nb_exemplaire', 'pen_nb_exemplaire', 'check_nb_exemplaire')\"></i>
            <i id=\"check_nb_exemplaire\" class=\"fas fa-check\" onclick=\"bascule_masque('span_nb_exemplaire', 'input_nb_exemplaire', 'pen_nb_exemplaire', 'check_nb_exemplaire'); modifie_nb_exemplaire_media('".$id_media."')\" hidden></i></td>";
            ?>
          </tr>
          <tr>
            <th scope="row">Note moyenne</th>
            <td>
              <div>
                <span id="span_note_moyenne"><?= $note_moyenne?></span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <?php
      if($media["nbExemplaire"] == 0 && !$deja_notifie)
      echo "
      <div>
      <button id=\"notif_bell\" onClick=\"demander_notification('".$id_media."'); bascule_masque('notif_bell')\" class=\"btn btn-info fas fa-bell\" title=\"Me notifier dès sa disponibilité\"> Me notifier dès sa disponiblité</button>
      </div>";
      ?>
    </div>
  </div>
  <br>
  <fieldset>
    <?php if(isset($_SESSION['id_utilisateur']))
    {?>
      <legend>Laisser un commentaire</legend>
      <div id="div_commentaire">
        <div>
          <textarea id="msg" class="form-control" name="message" placeholder="Insérez votre message..."></textarea>
        </div>
        <div class="d-flex">
          <div class="star-rating" id="div_star-rating">
            <input id="star-5" type="radio" name="rating" value="star-5">
            <label for="star-5" title="5 stars">
              <i id="i_star-5" class="active fa fa-star" aria-hidden="true"></i>
            </label>
            <input id="star-4" type="radio" name="rating" value="star-4">
            <label for="star-4" title="4 stars">
              <i id="i_star-4" class="active fa fa-star" aria-hidden="true"></i>
            </label>
            <input id="star-3" type="radio" name="rating" value="star-3">
            <label for="star-3" title="3 stars">
              <i id="i_star-3" class="active fa fa-star" aria-hidden="true"></i>
            </label>
            <input id="star-2" type="radio" name="rating" value="star-2">
            <label for="star-2" title="2 stars">
              <i id="i_star-2" class="active fa fa-star" aria-hidden="true"></i>
            </label>
            <input id="star-1" type="radio" name="rating" value="star-1">
            <label for="star-1" title="1 star">
              <i id="i_star-1" class="active fa fa-star" aria-hidden="true"></i>
            </label>
          </div>
          <button class="btn btn-primary my-3 ml-auto p-2 py-1" value="Envoyer" onclick="commenterMedia('<?= $id_media?>')">Envoyer</button>
        </div>
      </div>
      <?php
    } ?>
    <br>
    <fieldset>
      <legend>Commentaires</legend>
      <table class="table table-striped">
        <?php
        if($commentaires == [])
        {
          echo "Aucun commentaire... Soyez le premier à poster un commentaire sur ce média !";
        }
        else
        {
          foreach($commentaires as $commentaire)
          {
            echo "<tr>
            <td>".$commentaire['prenom']." ".$commentaire['nom']."</td>
            <td>".$commentaire['message']."</td><td>".$commentaire['note']."/5</td>
            </tr>";
          }
        }
        ?>
      </table>
    </fieldset>
  </div>

  <?php
  include "../php/footer.php";
  ?>
