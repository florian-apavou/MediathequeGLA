<?php
$titre = "contact";
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
  <form action="/ma-page-de-traitement" method="post">
    <div>
      <label for="objet">Objet du message</label>
      <input type='text' class="form-control" name="objet" placeholder="Objet du Message">
      <br>
      <label for="message">Message</label>
      <textarea id="msg" class="form-control" name="message" placeholder="Insérez votre message..."></textarea>
    </div>
    </br>
    <div>
      <input type="submit" class="btn btn-primary" value="Envoyer"></input>
    </div>
  </form>
</div>
