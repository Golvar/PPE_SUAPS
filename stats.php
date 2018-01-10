<?php require 'administrer.php';

require_once 'inc/db.php';
  $req = $pdo->prepare('SELECT * FROM users');
  $req->execute();
  $allUsers=$req->fetchAll();

  $nombreUsers = count($allUsers);

?>
<br><br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Administration</h3>
  </div>
<div class="panel-body">
  <ul>
    <li>Nombre de golfeur  : <?= $nombreUsers ?> </li>
    <li>Nombre d'invité  : <?= $nombreUsers ?>  </li>
  </ul>
</div>
</div>

  <?php foreach ($allUsers as $key => $value): ?>
      <div class="col-lg-4">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?= $allUsers[$key]->PRENOM . " ". $allUsers[$key]->NOM ?></h3>
            </div>
          <div class="panel-body">
            <ul>
                <li>Type  : <?= $allUsers[$key]->TYPE ?> </li>
                <li>Tickets SEM  : <?= $allUsers[$key]->TICKET_SEMAINE ?> </li>
                <li>Tickets WE  : <?= $allUsers[$key]->TICKET_WE ?>  </li>
                <li>Parcours : <?=  $allUsers[$key]->NBPARCOURS ?>  </li>
                <li>Réservations : <?=  $allUsers[$key]->NBRESERVATION ?> </li>
            </ul>
          </div>
        </div>
    </div>
  <?php endforeach; ?>


<?php require 'inc/footer.php';?>
