<?php
    session_start();
    require 'inc/header.php';
    date_default_timezone_set('UTC');
    $date = new DateTime();

    $mois = $date->format('F');
    $jour= $date->format('d l');
?>

<h1>Votre compte</h1>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?=$_SESSION['auth']->PRENOM ." ".$_SESSION['auth']->NOM  ; ?></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li><?= $_SESSION['auth']->TYPE ?></li>
      <li>Tickets SEM : <?= $_SESSION['auth']->TICKET_SEMAINE ?> </li>
      <li>Tickets WE : <?= $_SESSION['auth']->TICKET_WE ?>  </li>
      <li>Parcours : <?= $_SESSION['auth']->NBPARCOURS ?>  </li>
      <li>Réservations : <?= $_SESSION['auth']->NBRESERVATION ?> </li>
      <li>Invitations : <?= $_SESSION['auth']->NBINVITATION ?>  </li>
    </ul>
  </div>
</div>


<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th><?= $mois; ?> </th>
      <th>Joueur 1</th>
      <th>Joueur 2</th>
      <th>Joueur 3</th>
      <th>Joueur 4</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < 15 ; $i++): ?>
    <tr>
      <td><?= $date->format('d l'); ?></td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <?php $date->modify('+ 1 day'); ?>
  <?php endfor; ?>
  </tbody>
</table>

<?php require 'inc/footer.php'; ?>
