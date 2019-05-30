<?php
session_start();
$_SESSION['page_en_cours'] = "admin";
include "../php/includes.php";



if(isset($_POST['titre']))
{
  $target_dir = "../imgs/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 4;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["file"]["tmp_name"]);
      echo 7;
  if($check !== false) // Est une image
      $uploadOk = 1;
  else  // Pas une image
    $uploadOk = 0;
  if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
  {
    $bdd = mysqli_connect('localhost', 'root', '', 'mediatheque');
    $requete = "insert into media (auteur, prix, type, nbExemplaire, titre, photo) values (\"".$_POST['auteur']."\", \"".$_POST['prix']."\", \"".$_POST['type']."\", \"".$_POST['nbExemplaire']."\", \"".$_POST['titre']."\", \"".basename($_FILES["file"]["name"])."\")";

    if(mysqli_query($bdd, $requete))
        echo "Le média a bien été ajouté.";
    else
        echo $requete;
  }
  else
  {
    echo "Erreur lors de l'upload";
  }
}
?>

<div class="container">
  <h1>Ajout d'un Média</h1>
  <p class="font-italic text-muted">Pour supprimer un média, utiliser la page d'information du média</p>

  <form method="post" action="gestMedias.php" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputTitre">Titre</label>
        <input type="text" name="titre" class="form-control" id="inputTitre" placeholder="Titre du média">
      </div>
      <div class="form-group col-md-6">
        <label for="inputAuteur">Auteur</label>
        <input type="text" name="auteur" class="form-control" id="inputAuteur" placeholder="Auteur du média">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="inputType">Type</label>
        <select id="inputType" name="type" class="form-control">
          <option selected>Livre</option>
          <option>CD</option>
          <option>DVD</option>
          <option>Revue</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputNbExemp">Nombre d'exemplaire</label>
        <input type="number" name="nbExemplaire" class="form-control" id="inputNbExemp">
      </div>
      <div class="form-group col-md-2">
        <label for="inputPrix">Prix</label>
        <input type="number" name="prix" class="form-control" id="inputPrix">
      </div>
      <div class="form-group col-md-6">
          <label for="file">Choisir Photo</label>
          <div class="w-100"></div>
          <input type="file" name="file" id="file">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </form>

</div>
