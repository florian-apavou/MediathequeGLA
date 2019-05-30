<?php
session_start();
$_SESSION['page_en_cours'] = "contact";
include "../php/includes.php";
?>

<div class="container">
  <h1>Formulaire de contact</h1>
  <div>
    Ici, vous pouvez contacter un administrateur du site. Proposez des idées d'amélioration, d'ajouts de médias à nos stocks ou, tout simplement, ce que vous pensez de notre site internet.
  </div>
  </br>
  <hr>
  </br>
  <div>
    <label for="objet">Objet du message</label>
    <input id="objet_contact" type='text' class="form-control" name="objet" placeholder="Objet du Message">
    <br>
    <label for="message">Message</label>
    <textarea id="message_contact" class="form-control" name="message" placeholder="Insérez votre message..."></textarea>
  </div>
  </br>
  <div>
    <input id="btn_envoyer" class="btn btn-primary" value="Envoyer" onclick="contactAdmin()"></input>
    <input id="btn_success" class="btn btn-success" value="Bien envoyé" hidden></input>
  </div>
</div>
