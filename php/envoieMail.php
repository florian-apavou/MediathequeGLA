<?php
session_start();
include "../php/fonctions.php";
$mail = $_POST['mail'];
$notification = $_POST['notification'];
$prenom = $_POST['prenom'];
$titre = $_POST['titre'];
$media = $_POST['media'];

$message_txt = "Bonjour ".addslashes($prenom)." !

Le média que vous attendiez tant, ".addslashes($titre)." est enfin disponible et prêt à être réservé directement sur http://localhost/EMediatheque/MediathequeGLA/php/reservation.php?id=".$media."

L'équipe de la médiathèque KLM";

$boundary = "-----=".md5(rand());
$sujet = addslashes($titre)." n'attend plus que vous";

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

$header = "From: \"MediathequeKLM\"<mediatheque.klm@gmail.com>".$passage_ligne;
$header .= "Reply-to: \"MediathequeKLM\" <mediatheque.klm@gmail.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========

//=====Envoi de l'e-mail.
if(mail($mail,$sujet,$message,$header))
  echo "ok";
else
  echo "nok";


?>
