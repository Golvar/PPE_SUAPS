<?php require 'administrer.php' ?>
<br><br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">ADMINISTRATEUR</h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Nombre de Golfeur  : <?= $_SESSION['auth']->TICKET_SEMAINE ?> </li>
      <li>Nombre d'Administrateur : <?= $_SESSION['auth']->TICKET_WE ?>  </li>
      <li>Total des Tickets restants : <?= $_SESSION['auth']->NBPARCOURS ?>  </li>
      <li>Réservations en cours : <?= $_SESSION['auth']->NBRESERVATION ?> </li>
    </ul>
  </div>
</div>

<?php require 'inc/footer.php';?>
