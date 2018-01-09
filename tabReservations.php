<?php

require_once 'inc/db.php';
require_once 'inc/functions.php';
if(!empty($_POST['reserver'])){

  $idUser = $_SESSION['auth']->IDUSER;
  $DateReservation = $_POST['reserver'];

  $req = $pdo->prepare('INSERT INTO `suaps`.`reservation` (`IDRESERV`, `IDUSER`, `USE_IDUSER`, `DATEPREVU`, `DATERESERV`) VALUES (NULL, ?, NULL, ?, ?)');
  $req->execute([$idUser, $DDay->format('d/m/Y'), $DateReservation]);
}


$req= $pdo->prepare('SELECT NOM, DATERESERV FROM users INNER JOIN reservation ON users.IDUSER = reservation.IDUSER');
$req->execute();
$listResa = $req->fetchAll();

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
      <?php $tdlist=0; ?>
      <td><?= $date->format('d l'); ?></td>
      <?php foreach($listResa as $key => $value): ?>
        <?php if($listResa[$key]->DATERESERV == $date->format('d/m/Y')): ?>
          <td><?=$listResa[$key]->NOM; ?></td>
          <?php $tdlist++; ?>
        <?php endif; ?>

      <?php endforeach; ?>
      <?php for ($j=4; $j>$tdlist; --$j): ?>
        <td></td>
      <?php endfor; ?>
        <form action="" method="post">
            <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-primary">reserver</button></td>
        </form>
    </tr>
    <?php $date->modify('+ 1 day'); ?>
  <?php endfor; ?>
  </tbody>
</table>
