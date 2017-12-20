<?php

require_once 'inc/db.php';

$req= $pdo->prepare('SELECT NOM, DATERESERV FROM users INNER JOIN reserver ON users.IDUSER = reserver.IDUSER');
$req->execute();

$listResa = $req->fetchAll();

var_dump($listResa);
 ?>


<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th><?= $mois; ?> </th>
      <th>Joueur 1</th>
      <th>Joueur 2</th>
      <th>Joueur 3</th>
      <th>Joueur 4</th>
      <th>Reservation</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < 15 ; $i++): ?>
    <?php if($date->format('j')==1): ?>
      </tbody>
        <thead>
          <tr>
            <th><?=$date->format('F') ?></th>
          </tr>
        </thead>
      <tbody>
    <?php endif; ?>
      <?php if($date->format('w') == 0 || $date->format('w') == 6): ?>
      <tr class="danger">
      <?php else : ?>
      <tr>
      <?php endif;?>
      <td><?= $date->format('d l'); ?></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><button type="" name="button" class="btn btn-primary">Réserver</button></td>
    </tr>
    <?php $date->modify('+ 1 day'); ?>
  <?php endfor; ?>
  </tbody>
</table>
