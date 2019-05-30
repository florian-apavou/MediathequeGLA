<?php
session_start();
$_SESSION['page_en_cours'] = "admin";
include "../php/includes.php";
?>

<div class="container">
  <div class="row">
    <a class="btn btn-success gestReservBox col-lg-5 mx-1 my-1 d-flex justify-content-center align-items-center" href="gestReserv.php"><i class="fas fa-calendar-alt fa-5x mx-2"></i><span>Gestion des réservations</span></a>
    <a class="btn btn-info contactBox col-lg-5 mx-1 my-1 d-flex justify-content-center align-items-center" href="messagesClients.php"><i class="fas fa-address-book fa-5x mx-2"></i><span>Messages Clients</span></a>
  </div>
  <div class="row">
    <a class="btn btn-primary gestClientBox col-lg-5 mx-1 my-1 d-flex justify-content-center align-items-center <?php if(isset($_SESSION['rang']) && $_SESSION['rang'] == "gestMedia"){echo " disabled ";} ?>" href="gestClients.php" ><i class="fas fa-address-book fa-5x mx-2"></i><span>Gestion des comptes Clients</span></a>
    <a class="btn btn-secondary gestMediaBox col-lg-5 mx-1 my-1 d-flex justify-content-center align-items-center  <?php if(isset($_SESSION['rang']) && $_SESSION['rang'] == "gestClient"){echo " disabled ";} ?>" href="gestMedias.php"><i class="fas fa-book fa-5x mx-2"></i><span>Ajout de Médias</span></a>
      <a class="btn btn-warning gestMediaBox col-lg-10 mx-1 my-1 d-flex justify-content-center align-items-center" href=""><i class="fas fa-book fa-5x mx-2"></i><span>Gestion Notifications</span></a>
  </div>
  <!-- ajouter disabled en fonction du rang -->

</div>
