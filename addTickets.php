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
        <br>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> 1
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="options" id="option2" autocomplete="off"> 2
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="options" id="option3" autocomplete="off"> 3
            </label>
        </div>

  <br>
  <div class="col-lg-10">
      <label for="">Nombre de ticket Weekend à créditer : </label>
      <select class="form-control" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
    </select>
  </div>
  <br>



<?php require 'inc/footer.php';?>
