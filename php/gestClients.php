<?php
session_start();
$_SESSION['page_en_cours'] = "admin";
include "../php/includes.php";
?>
<div class="container">
  <h1>Gestion des Clients</h1>
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

    <table class="table">
      <tr>
        <th>ID Client</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Abonné</th>
        <th>Action</th>
        <th>Suppression Client</th>
      </tr>
    </table>
  </div>
