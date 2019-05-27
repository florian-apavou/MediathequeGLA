<?php

  include "../php/header.php";
  include "../php/includes.php";
  include "../php/fonctions.php";


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
      <textarea id="msg" class="form-control" name="message" placeholder="Insérez votre message..."></textarea>
    </div>
    </br>
    <div>
      <input type="submit" class="btn btn-primary" value="Envoyer"></input>
    </div>
  </form>
</div>
