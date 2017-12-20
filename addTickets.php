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



<? require 'footer.php'; ?>
