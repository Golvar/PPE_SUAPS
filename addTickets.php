<?php require 'administrer.php';
require_once 'inc/db.php';
$req = $pdo->prepare('SELECT * FROM users WHERE ADMIN = 0');

$req->execute();
$golfeur = $req->fetchAll();
 ?>
<br>
<div class="from-group">
  <label for="">Golfeur : </label>
  <select class="form-control" name="golfeur">
    <?php for ($i=0; $i < sizeof($golfeur); $i++): ?>
    <option  value=i><?= $golfeur[$i]->NOM . " " . $golfeur[$i]->PRENOM ?></option>
  <?php endfor; ?>
  </select>
</div>
<br>

    <label for="">Nombre de ticket semaine à créditer : </label>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option1" autocomplete="off" checked> 0
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option1" autocomplete="off" checked> 1
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option2" autocomplete="off"> 2
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option3" autocomplete="off"> 3
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option1" autocomplete="off" checked> 4
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option2" autocomplete="off"> 5
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option3" autocomplete="off"> 6
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option1" autocomplete="off" checked> 7
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option2" autocomplete="off"> 8
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option3" autocomplete="off"> 9
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option1" autocomplete="off" checked> 10
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option2" autocomplete="off"> 11
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option3" autocomplete="off"> 12
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option1" autocomplete="off" checked> 13
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option2" autocomplete="off"> 14
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option3" autocomplete="off"> 15
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option1" autocomplete="off" checked> 16
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option2" autocomplete="off"> 17
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option3" autocomplete="off"> 18
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option1" autocomplete="off" checked> 19
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option2" autocomplete="off"> 20
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option3" autocomplete="off"> 21
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option1" autocomplete="off" checked> 22
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option2" autocomplete="off"> 23
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketSe" id="option3" autocomplete="off"> 24
            </label>
        </div>


  <br><br>
      <label for="">Nombre de ticket Weekend à créditer : </label>
      <br>
      <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" value='1' autocomplete="off" checked> 0
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 1
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 2
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 3
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 4
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 5
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 6
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 7
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 8
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 9
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 10
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 11
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 12
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 13
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 14
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 15
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 16
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 17
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 18
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 19
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 20
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 21
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 22
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 23
          </label>
          <label class="btn btn-primary">
              <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 24
          </label>
      </div>
  </div>
  <br>



<?php require 'inc/footer.php';?>
