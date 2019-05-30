<?php
session_start();
$_SESSION['page_en_cours'] = "admin";
include "../php/includes.php";
?>

<div class="container">
  <h1>Ajout de Médias</h1>
  <p class="font-italic text-muted">Pour supprimer un média, utiliser la page d'information du média</p>

  <form>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputTitre">Titre</label>
        <input type="text" class="form-control" id="inputTitre" placeholder="Titre du média">
      </div>
      <div class="form-group col-md-6">
        <label for="inputAuteur">Auteur</label>
        <input type="text" class="form-control" id="inputAuteur" placeholder="Auteur du média">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="inputType">Type</label>
        <select id="inputType" class="form-control">
          <option selected>Livre</option>
          <option>CD</option>
          <option>DVD</option>
          <option>Revue</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputNbExemp">Nombre d'exemplaire</label>
        <input type="number" class="form-control" id="inputNbExemp">
      </div>
      <div class="form-group col-md-2">
        <label for="inputPrix">Prix</label>
        <input type="number" class="form-control" id="inputPrix">
      </div>
      <div class="form-group col-md-6">
          <label for="inputFile">Choisir Photo</label>
          <div class="w-100"></div>
          <input type="file" id="inputFile">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </form>

</div>
