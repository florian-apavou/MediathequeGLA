<?php
session_start();
$_SESSION['page_en_cours'] = "accueil";
include "../php/includes.php";
?>
<div class="container">
  <h1 class="text-center">Bienvenue à la médiathèque Karine Le Marchand</h1>
  <br>
  <p class="text-center">
    Présente depuis 2019, l’e-médiathèque Karine Lemarchand vous redonnera le sourire. 
	Ouverte à tous, la médiathèque a pour vocation de mettre à portée de main 
	toute une offre culturelle sous forme d’ouvrages, de documents audiovisuels et autres. 
	Avec une interface épuré et facile d’utilisation, 
	la réservation de documents n’as jamais été aussi simple et rapide. 
	</p>

</br>
</div>

<?php
include "../php/footer.php";
?>
