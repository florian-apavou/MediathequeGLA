<?php
session_start();
$_SESSION['page_en_cours'] = "reservation";
include "../php/includes.php";

if(!isset($_SESSION['id_utilisateur']))
  echo "header('Location: login.php')";

  $date_debut = new DateTime();
  $date_fin = clone $date_debut;
  $date_fin -> add(new DateInterval("P1M"));

  $dated = $date_debut->format('d-m-Y');
  $datef = $date_fin->format('d-m-Y');

  if (count($_POST)) {
    $requete = "insert into abonnement (dateDebut, dateFin, membre) values ('".$date_debut->format('Y-m-d')."','".$date_fin->format('Y-m-d')."',".$_SESSION["id_utilisateur"].") ";
    souscription($requete);
    ?>
    <div class="container centered-div">
      <h2>Souscription</h2>
      <br>
      <h4 class="text-align p-5">Votre abonnement a été pris en compte !</h4>
    </div>
    <?php
  }
  else {
?>
<form action method="post">
<div class="container centered-div">
  <h2>Souscription</h2>
  <br>
   <fieldset>
     <legend>Information sur votre réservation</legend>
     <table class="table">
       <tr>
         <th scope="row">
           <label>Souscription:
           </th>
           <td>
           </label>1mois d'abonnement
         </td>
       </tr>
       <tr>
         <th scope="row">
           <label>Date de début :
           </th>
           <td>
           </label><?php echo $dated; ?>
         </td>
       </tr>
       <tr>
         <th scope="row">
           <label>Date de fin :
           </th>
           <td>
           </label><?php echo $datef; ?>
         </td>
       </tr>
       <tr>
         <th scope="row">
           <label>Tarif : </label>
         </th>
         <td>
           15 euros
         </td>
       </tr>
     </table>
   </fieldset>
   <fieldset>
     <legend>Informations de Paiement</legend>
     <div class="creditCardForm">
       <div class="payment">
         <div class="row">
           <div class="form-group owner col-lg-9">
             <label for="owner">Propriétaire</label>
             <input type="text" class="form-control" id="owner">
           </div>
           <div class="form-group CVV col-lg-3">
             <label for="cvv">CVV</label>
             <input type="text" class="form-control" id="cvv">
           </div>
         </div>
         <div class="row">
           <div class="form-group col" id="card-number-field">
             <label for="cardNumber">Numéro de carte</label>
             <input type="text" name="cb" class="form-control" id="cardNumber">
           </div>
         </div>
         <div class="row">
           <div class="form-group col-lg-9" id="expiration-date">
             <label>Date d'expiration</label>
             <br>
             <select id="mois">
               <option value="01">Janvier</option>
               <option value="02">Février </option>
               <option value="03">Mars</option>
               <option value="04">Avril</option>
               <option value="05">Mai</option>
               <option value="06">Juin</option>
               <option value="07">Juillet</option>
               <option value="08">Août</option>
               <option value="09">Septembre</option>
               <option value="10">Octobre</option>
               <option value="11">Novembre</option>
               <option value="12">Décembre</option>
             </select>
             <select id="annee">
               <option value="2019"> 2019</option>
               <option value="2020"> 2020</option>
               <option value="2021"> 2021</option>
               <option value="2022"> 2022</option>
               <option value="2023"> 2023</option>
               <option value="2024"> 2024</option>
               <option value="2025"> 2025</option>
               <option value="2026"> 2026</option>
             </select>
           </div>
           <div class="form-group col-lg-3" id="credit_cards">
             <img src="../imgs/visa.jpg" id="visa">
             <img src="../imgs/mastercard.png" id="mastercard">
             <img src="../imgs/amex.png" id="amex">
           </div>
         </div>
         <div class="form-group" id="pay-now">
           <button id="btn_reserver" class="btn btn-primary">Payer et réserver</button>
         </div>
         <btn id="btn_success" class="btn btn-success" disabled hidden></div>
         <btn id="btn_erreur" class="btn btn-danger" disabled hidden></div>
       </div>
     </div>
   </fieldset>
</div>
</form>
<?php
}
include "../php/footer.php";
?>
