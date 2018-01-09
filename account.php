<?php
    session_start();
    if(empty($_SESSION['auth'])){
      $_SESSION['flash']['danger']= "Vous n'avez pas accés à cette page !";
      header('Location: login.php');
  }
    require 'inc/header.php';
    require_once 'inc/db.php';
    date_default_timezone_set('UTC');
    $DDay = new DateTime();
    $date = new DateTime();

    $mois = $date->format('F');
    $weekend = $date->format('w');

    $req = $pdo->prepare('SELECT * FROM users WHERE ADMIN = 0');

    $req->execute();
    $golfeur = $req->fetchAll();
    $jour= $date->format('d l');
?>

<h1>Votre compte</h1>
<div class="col-lg-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Informations personnelles</h3>
      </div>
      <div class="panel-body">
        <ul>
          <li>Prénom : <?= $_SESSION['auth']->PRENOM ?></li>
          <li>Nom : <?= $_SESSION['auth']->NOM ?> </li>
          <li>Type : <?= $_SESSION['auth']->TYPE ?>  </li>
          <li>Mail : <?= $_SESSION['auth']->MAIL ?>  </li>
          <li>Téléphone : <?= $_SESSION['auth']->TELEPHONE ?> </li>
        </ul>
      </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Progression Golfeur</h3>
      </div>
      <div class="panel-body">
        <ul>
          <li>Tickets SEM : <?= $_SESSION['auth']->TICKET_SEMAINE ?> </li>
          <li>Tickets WE : <?= $_SESSION['auth']->TICKET_WE ?>  </li>
          <li>Parcours : <?= $_SESSION['auth']->NBPARCOURS ?>  </li>
          <li>Réservations : <?= $_SESSION['auth']->NBRESERVATION ?> </li>
          <li>Invitations : <?= $_SESSION['auth']->NBINVITATION ?>  </li>
        </ul>
      </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Joueur Invité</h3>
      </div>
      <div class="panel-body">
          <div class="from-group">
            <label for="">Invité : </label>
            <select class="form-control" name="golfeur">
              <?php for ($i=0; $i < sizeof($golfeur); $i++): ?>
              <option  value=i><?= $golfeur[$i]->NOM . " " . $golfeur[$i]->PRENOM ?></option>
            <?php endfor; ?>
            </select>
          </div>
          <div class="text-center">
              <a href="#" class="btn btn-default" style="margin-top:10px;">Valider</a>
          </div>
      </div>
    </div>
</div>


<?php require 'tabReservations.php'; ?>


<?php require 'inc/footer.php'; ?>
