<?php
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    if(!empty($_POST['reserver'])){
        $DateReservation = $_POST['reserver'];
        $reqVerifDoublon = $pdo->prepare('SELECT * FROM reservation WHERE DATERESERV = ? AND IDUSER = ?');
        $reqVerifDoublon->execute([$DateReservation,$idUser]);
        $doublon = $reqVerifDoublon->fetch();
        $reqLesReservDate = $pdo->prepare('SELECT * FROM reservation WHERE DATERESERV = ?');
        $reqLesReservDate->execute([$DateReservation]);
        $DateReservationFormat = DateTime::createFromFormat('d/m/Y', $DateReservation);
        $nbrReservDate = count($reqLesReservDate->fetchAll());
        if (!$doublon) {
            if ($nbrReservDate < 4) {
                $reqRetraitTicket = $pdo->prepare("UPDATE users SET TICKET_SEMAINE = TICKET_SEMAINE - ?, TICKET_WE = TICKET_WE - ?, NBRESERVATION = NBRESERVATION + ? WHERE IDUSER = ?");
                if($DateReservationFormat->format('w') == 0 || $DateReservationFormat->format('w') == 6) {
                    $reqNbTicketWe = $pdo->prepare('SELECT TICKET_WE FROM users WHERE IDUSER = ?');
                    $reqNbTicketWe->execute([$idUser]);
                    $resNbTicketWe = $reqNbTicketWe->fetch();
                    $nbTicketWe = $resNbTicketWe->TICKET_WE;
                    if ($nbTicketWe > 0) {
                    $reqRetraitTicket->execute([0,1,1, $idUser]);
                    $reqAjoutReserv = $pdo->prepare('INSERT INTO `suaps`.`reservation` (`IDRESERV`, `IDUSER`, `USE_IDUSER`, `DATEPREVU`, `DATERESERV`) VALUES (NULL, ?, NULL, ?, ?)');
                    $reqAjoutReserv->execute([$idUser, $DDay->format('d/m/Y'), $DateReservation]);
                    header('Location: account.php');
                    }else {
                        echo "<div class='alert alert-dismissible alert-danger'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>ERREUR!</strong> Vous n'avez plus de ticket week-end.
                        </div>";
                    }
                }else {
                    $reqNbTicketSe = $pdo->prepare('SELECT TICKET_SEMAINE FROM users WHERE IDUSER = ?');
                    $reqNbTicketSe->execute([$idUser]);
                    $resNbTicketSe = $reqNbTicketSe->fetch();
                    $nbTicketSe = $resNbTicketSe->TICKET_SEMAINE;
                    if ($nbTicketSe > 0) {
                    $reqRetraitTicket->execute([1,0,1, $idUser]);
                    $reqAjoutReserv = $pdo->prepare('INSERT INTO `suaps`.`reservation` (`IDRESERV`, `IDUSER`, `USE_IDUSER`, `DATEPREVU`, `DATERESERV`) VALUES (NULL, ?, NULL, ?, ?)');
                    $reqAjoutReserv->execute([$idUser, $DDay->format('d/m/Y'), $DateReservation]);
                    header('Location: account.php');
                    }else {
                        echo "<div class='alert alert-dismissible alert-danger'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>ERREUR!</strong> Vous n'avez plus de ticket semaine.
                        </div>";
                    }
                }
            }else {
                echo "<div class='alert alert-dismissible alert-danger'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>ERREUR!</strong> 4 personnes ce sont déjà inscrite. Selectionnez une autre date.
                </div>";
            }
        }else {
            echo "<div class='alert alert-dismissible alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>ERREUR!</strong> Vous êtes déjà inscrit à cette date. Si vous voulez ajouter un invité, annulez puis recommencez votre inscription.
            </div>";
        }
    }
    if (!empty($_POST['annuler'])) {
        $dateAnnulation = $_POST['annuler'];
        $reqAnnulation = $pdo->prepare('DELETE FROM reservation WHERE DATERESERV = ? AND IDUSER = ?');
        $reqAnnulation->execute([$dateAnnulation, $idUser]);
        $DateReservationFormat = DateTime::createFromFormat('d/m/Y', $dateAnnulation);
        $reqRecreditéTicket = $pdo->prepare("UPDATE users SET TICKET_SEMAINE = TICKET_SEMAINE + ?, TICKET_WE = TICKET_WE + ?, NBRESERVATION = NBRESERVATION - ? WHERE IDUSER = ?");
        if($DateReservationFormat->format('w') == 0 || $DateReservationFormat->format('w') == 6) {
            $reqRecreditéTicket->execute([0,1,1, $idUser]);
        }else {
            $reqRecreditéTicket->execute([1,0,1, $idUser]);
        }
        header('Location: account.php');
    }
    $req= $pdo->prepare('SELECT * FROM users INNER JOIN reservation ON users.IDUSER = reservation.IDUSER');
    $req->execute();
    $listResa = $req->fetchAll();
    if(!empty($_POST['inviter'])){
        $dateInvitation = $_POST['inviter'];
        $reqInvitation = $pdo->prepare("UPDATE reservation SET USE_IDUSER = ? WHERE IDUSER = ? AND DATERESERV = ?");
        $reqInvitation->execute([$idInvite,$idUser,$dateInvitation]);
        $DateReservationFormat = DateTime::createFromFormat('d/m/Y', $dateInvitation);
        $reSousTicketInvit = $pdo->prepare("UPDATE users SET TICKET_SEMAINE = TICKET_SEMAINE - ?, TICKET_WE = TICKET_WE - ?, NBINVITATION = NBINVITATION + ? WHERE IDUSER = ?");
        if($DateReservationFormat->format('w') == 0 || $DateReservationFormat->format('w') == 6) {
            $reSousTicketInvit->execute([0,1,1, $idUser]);
        }else {
            $reSousTicketInvit->execute([1,0,1, $idUser]);
        }
        header('Location: account.php');
    }
    if(!empty($_POST['inviteAnule'])){
        $dateInvitation = $_POST['inviteAnule'];
        $reqInvitation = $pdo->prepare("UPDATE reservation SET USE_IDUSER = ? WHERE IDUSER = ? AND DATERESERV = ?");
        $reqInvitation->execute([null,$idUser,$dateInvitation]);
        $DateReservationFormat = DateTime::createFromFormat('d/m/Y', $dateInvitation);
        $reqRecrediteTicketInvit = $pdo->prepare("UPDATE users SET TICKET_SEMAINE = TICKET_SEMAINE + ?, TICKET_WE = TICKET_WE + ?, NBINVITATION = NBINVITATION - ? WHERE IDUSER = ?");
        if($DateReservationFormat->format('w') == 0 || $DateReservationFormat->format('w') == 6) {
            $reqRecrediteTicketInvit->execute([0,1,1, $idUser]);
        }else {
            $reqRecrediteTicketInvit->execute([1,0,1, $idUser]);
        }
        header('Location: account.php');
    }
    if(!empty($_POST['dejainvite'])){
        echo "<div class='alert alert-dismissible alert-danger'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>ERREUR!</strong> Un autre joueur vous a déjà invité. Pour annuler votre présence rapprochez vous de ce joueur.
        </div>";
    }
?>



<table class="table table-striped table-hover ">
    <thead>
        <tr>
            <th><?= $tabMoisFr[$mois]; ?> </th>
            <th>Joueur 1</th>
            <th>Joueur 2</th>
            <th>Joueur 3</th>
            <th>Joueur 4</th>
            <th>Reservation</th>
            <th>Invitation</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i=0; $i < 15 ; $i++): ?>
            <?php if($date->format('j')==1): ?>
    </tbody>
        <thead>
            <tr>
                <th><?= $tabMoisFr[$date->format('n')] ?></th>
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
                <td><?= $date->format('d') . " " . $tabJourFr[$date->format('w')]; ?></td>
                <?php
                $inscrit = 0;
                $invite = 0;
                $dejaInvite = 0;
                $dejaInscrit = 0;
                 ?>
            <?php foreach($listResa as $key => $value): ?>
            <?php if($listResa[$key]->DATERESERV == $date->format('d/m/Y')): ?>
                <?php if ($listResa[$key]->IDUSER == $idInvite || $listResa[$key]->USE_IDUSER == $idInvite) {
                    $dejaInscrit = 1;
                }?>
                <?php  if($listResa[$key]->IDUSER == $idUser) :?>
                    <?php $inscrit = 1; ?>
                <?php endif ?>
                <td><?=substr($listResa[$key]->PRENOM,0,1) . ". " . $listResa[$key]->NOM; ?></td>

                <?php if (!empty($listResa[$key]->USE_IDUSER)) :?>
                    <?php
                    $reqInvit= $pdo->prepare('SELECT * FROM users WHERE IDUSER = ?');
                    $reqInvit->execute([$listResa[$key]->USE_IDUSER]);
                    $ResaInvit = $reqInvit->fetch();
                    if (($listResa[$key]->IDUSER == $idUser)) {
                        $invite = $listResa[$key]->USE_IDUSER;
                    }elseif (($listResa[$key]->USE_IDUSER == $idUser)) {
                        $dejaInvite = 1;
                    }
                    ?>
                    <td><FONT COLOR="#FF0000"><?=substr($ResaInvit->PRENOM,0,1) . ". " . $ResaInvit->NOM; ?></font></td>
                    <?php $tdlist++; ?>
                <?php endif ?>

            <?php $tdlist++; ?>
            <?php endif; ?>

            <?php endforeach; ?>
            <?php for ($j=4; $j>$tdlist; --$j): ?>
                <td></td>
            <?php endfor; ?>
            <?php if ($_SESSION['auth']->ADMIN == 0) :?>

                    <?php if ($inscrit == 0) :?>
                        <?php if ($j == 4) :?>
                            <form action="" method="post">
                                <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">reserver</button></td>
                            </form>
                                <td><button type="submit" name="inviter" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">Inviter</button></td>
                        <?php else :?>
                            <?php if ($dejaInvite == 1) :?>
                                <form action="" method="post">
                                    <td><button type="submit" name="dejainvite" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">reserver</button></td>
                                </form>
                            <?php else :?>
                            <form action="" method="post">
                                <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-primary">reserver</button></td>
                            </form>
                        <?php endif ?>
                            <?php if ($invite == 0) :?>
                                <td><button type="submit" name="inviter" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">Inviter</button></td>
                            <?php else :?>
                                <form action="" method="post">
                                    <td><button type="submit" name="inviteAnule" value=<?= $date->format('d/m/Y') ?> class="btn btn-warning">Annuler</button></td>
                                </form>
                            <?php endif ?>
                        <?php endif ?>
                    <?php else :?>
                        <form action="" method="post">
                            <td><button type="submit" name="annuler" value=<?= $date->format('d/m/Y') ?> class="btn btn-warning">Annuler</button></td>
                        </form>
                        <?php if ($j == 4) :?>
                            <?php if ($invite == 0) :?>
                                <td><button type="submit" name="inviter" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">Inviter</button></td>
                            <?php else :?>
                                <form action="" method="post">
                                    <td><button type="submit" name="inviteAnule" value=<?= $date->format('d/m/Y') ?> class="btn btn-warning">Annuler</button></td>
                                </form>
                            <?php endif ?>
                        <?php else :?>
                            <?php if ($invite == 0) :?>
                                <?php if ($dejaInscrit == 0) :?>
                                    <form action="" method="post">
                                        <td><button type="submit" name="inviter" value=<?= $date->format('d/m/Y') ?> class="btn btn-primary">Inviter</button></td>
                                    </form>
                                <?php else :?>
                                    <form action="" method="post">
                                        <td><button type="submit" name="inviterDejaInscrit" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">Inviter</button></td>
                                    </form>
                                <?php endif ?>
                            <?php else :?>
                                <form action="" method="post">
                                    <td><button type="submit" name="inviteAnule" value=<?= $date->format('d/m/Y') ?> class="btn btn-warning">Annuler</button></td>
                                </form>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endif ?>
            <?php else :?>
                <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-primary disabled">reserver</button></td>
                <td><button type="submit" name="inviter" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">Inviter</button></td>


            <?php endif ?>

            </tr>
            <?php $date->modify('+ 1 day'); ?>
        <?php endfor; ?>
    </tbody>
</table>
