<?php
session_start();
unset($_SESSION['id_utilisateur']);
unset($_SESSION['rang']);
unset($_SESSION['prenom']);
session_destroy();
header('Location: index.php');
//header("Location: http://localhost/MediathequeGLA/php/index.php");
?>
