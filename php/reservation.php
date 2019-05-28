<?php
include "../php/header.php";
include "../php/includes.php";
include "../php/fonctions.php";
?>

<script type="text/javascript" src="../js/fonctions.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<?php
$media['id'] = $_REQUEST['idMed'];
$media['type'] = "CD";
$media['titre'] = "XEU";
$media['auteur'] = "Vald";
$media['prix'] = 5;
$date = getdate();
$date_reservation = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);
$date_retour_max = new DateTime($date['year'].'/'.$date['mon'].'/'.$date['mday']);
$duree_reservation = new DateInterval('P15D');
$date_retour_max = $date_retour_max->add($duree_reservation);

$connecte = true;
if(!$connecte)
echo "header('Location: login.php')";
?>

<div class="container centered-div">
  <h2>Réservation</h2>
  <br>
  <fieldset>
    <legend>Information sur votre réservation</legend>
    <table class="table">
      <tr>
        <th scope="row">
          <label><?= $media['type']?> à réserver:
          </th>
          <td>
          </label><?= $media['titre']?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label>Date de réservation :
          </th>
          <td>
          </label><?= $date_reservation->format('d/m/Y')?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label>Date de retour :
          </th>
          <td>
          </label><?= $date_retour_max->format('d/m/Y')?>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label>Tarif : </label>
        </th>
        <td>
          <?= $media['prix']?> euros
        </td>
      </tr>
    </table>
  </fieldset>
  <hr>
  <fieldset>
    <legend>Informations de Paiement</legend>
    <div class="creditCardForm">
      <div class="payment">
        <form >
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
              <input type="text" class="form-control" id="cardNumber">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-9" id="expiration-date">
              <label>Daye d'expiration</label>
              <br>
              <select>
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
              <select>
                <option value="16"> 2019</option>
                <option value="17"> 2020</option>
                <option value="18"> 2021</option>
                <option value="19"> 2022</option>
                <option value="20"> 2023</option>
                <option value="21"> 2024</option>
              </select>
            </div>
            <div class="form-group col-lg-3" id="credit_cards">
              <img src="../imgs/visa.jpg" id="visa">
              <img src="../imgs/mastercard.png" id="mastercard">
              <img src="../imgs/amex.png" id="amex">
            </div>
          </div>

          <div class="form-group" id="pay-now">
            <button class="btn btn-primary" onclick="reserve_media('<?= $media['id']?>')">Payer et réserver</button>
          </div>
        </form>
      </div>
    </div>


  </fieldset>
</div>

<?php
include "../php/footer.php";
?>
