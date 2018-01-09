<?php
    session_start();
    require 'inc/header.php';
    date_default_timezone_set('UTC');
    $DDay = new DateTime();
    $date = new DateTime();

    $mois = $date->format('F');
    $weekend = $date->format('w');
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

<?php require 'tabReservations.php'; ?>


<?php require 'inc/footer.php'; ?>
