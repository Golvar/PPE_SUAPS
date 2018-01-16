
<?php
    session_start();
    if(empty($_SESSION['auth'])){
      $_SESSION['flash']['danger']= "Vous n'avez pas accés à cette page !";
      header('Location: login.php');
  }
require 'inc/header.php';
require 'inc/db.php';
date_default_timezone_set('UTC');
$DDay = new DateTime();
$date = new DateTime();
$mois = $date->format('n');
$weekend = $date->format('w');
// Tableau pour les traductions française des DATE
$tabMoisFr = array(1 => 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
$tabJourFr = array(0 => 'Dimache', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi' );
$req = $pdo->prepare('SELECT * FROM users WHERE ADMIN = 0');
$req->execute();
$golfeur = $req->fetchAll();
$jour= $date->format('d l');
$idUser = $_SESSION['auth']->IDUSER;

$reqNbParcours = $pdo->prepare('SELECT COUNT(IDRESERV) AS nbParcours FROM reservation WHERE IDUSER = ? AND DATERESERV < ? ');
$reqNbParcours->execute([$idUser, $DDay->format('d/m/Y')]);
$nbParcours =(int) $reqNbParcours->fetch()->nbParcours;

$reqAjoutNBParcours = $pdo->prepare('UPDATE users SET NBPARCOURS = ? WHERE IDUSER = ?');
$reqAjoutNBParcours->execute([$nbParcours,$idUser]);

$req = $pdo->prepare('SELECT * FROM users WHERE IDUSER = :iduser');
$req->execute(['iduser' => $idUser]);
$user = $req->fetch();

$reqNbAnnulation = $pdo->prepare('SELECT COUNT(IDRESERV) AS nbAnnul FROM reservation  WHERE IDUSER = ? AND ANNULER =1');
$reqNbAnnulation->execute([$idUser]);
$nbAnnulation = (int) $reqNbAnnulation->fetch()->nbAnnul;


if(!empty($_POST['validerInvite'])){
    $_SESSION['auth']->idInvite = $_POST['golfeur'];
}
?>

<h1>Golf de la Wantzenau</h1>
<div class="row">
<div class="col-lg-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Informations personnelles</h3>
      </div>
      <div class="panel-body">
        <ul>
          <li>Prénom : <?= $user->PRENOM ?></li>
          <li>Nom : <?= $user->NOM ?> </li>
          <li>Type : <?= $user->TYPE ?>  </li>
          <li>Mail : <?= $user->MAIL ?>  </li>
          <li>Téléphone : <?= $user->TELEPHONE ?> </li>
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
          <li>Tickets SEM : <?= $user->TICKET_SEMAINE ?> </li>
          <li>Tickets WE : <?= $user->TICKET_WE ?>  </li>
          <li>Parcours : <?= $user->NBPARCOURS ?>  </li>
          <li>Réservations : <?= $user->NBRESERVATION ?> </li>
          <li>Invitations : <?= $user->NBINVITATION ?>  </li>
          <li>Annulations : <?= $nbAnnulation ?></li>
        </ul>
      </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">Joueur Invité</h3>
      </div>
      <div class="panel-body">
          <div class="from-group">
              <?php
              $reqSelNomInvit = $pdo->prepare('SELECT NOM, PRENOM, IDUSER FROM users WHERE IDUSER = ?');
              $reqSelNomInvit->execute([$_SESSION['auth']->idInvite ]);
              $result = $reqSelNomInvit->fetch();
              ?>
            <label for="">Invité : (selectionné : <?= $result->PRENOM . " " . $result->NOM ?>)</label>
            <form action="" method="post">
                <select class="form-control" name="golfeur">
              <?php for ($i=0; $i < sizeof($golfeur); $i++): ?>
                <?php if($result->IDUSER == $golfeur[$i]->IDUSER) :?>
                  <option value= <?= $golfeur[$i]->IDUSER ?> selected> <?= $golfeur[$i]->NOM . " " . $golfeur[$i]->PRENOM ?> </option>
                <?php else :?>
                  <option value= <?= $golfeur[$i]->IDUSER ?> > <?= $golfeur[$i]->NOM . " " . $golfeur[$i]->PRENOM ?> </option>
                <?php endif; ?>

            <?php endfor; ?>
            </select>

          </div>
          <div class="text-center">
              <button type="submit" name="validerInvite" value = 1 class="btn btn-primary" style="margin-top:10px" >Selectionner</button>
          </div>
          </form>
      </div>
    </div>
</div>
</div>

<?php require 'tabReservations.php'; ?>

<?php require 'inc/footer.php'; ?>
