
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
            if ($nbrReservDate<4) {
                $reqRetraitTicket = $pdo->prepare("UPDATE users SET TICKET_SEMAINE = TICKET_SEMAINE - ?, TICKET_WE = TICKET_WE - ? WHERE IDUSER = ?");
                if($DateReservationFormat->format('w') == 0 || $DateReservationFormat->format('w') == 6) {
                    $reqNbTicketWe = $pdo->prepare('SELECT TICKET_WE FROM users WHERE IDUSER = ?');
                    $reqNbTicketWe->execute([$idUser]);
                    $resNbTicketWe = $reqNbTicketWe->fetch();
                    $nbTicketWe = $resNbTicketWe->TICKET_WE;
                    if ($nbTicketWe > 0) {
                    $reqRetraitTicket->execute([0,1, $idUser]);
                    $reqAjoutReserv = $pdo->prepare('INSERT INTO `suaps`.`reservation` (`IDRESERV`, `IDUSER`, `USE_IDUSER`, `DATEPREVU`, `DATERESERV`) VALUES (NULL, ?, NULL, ?, ?)');
                    $reqAjoutReserv->execute([$idUser, $DDay->format('d/m/Y'), $DateReservation]);
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
                    $reqRetraitTicket->execute([1,0, $idUser]);
                    $reqAjoutReserv = $pdo->prepare('INSERT INTO `suaps`.`reservation` (`IDRESERV`, `IDUSER`, `USE_IDUSER`, `DATEPREVU`, `DATERESERV`) VALUES (NULL, ?, NULL, ?, ?)');
                    $reqAjoutReserv->execute([$idUser, $DDay->format('d/m/Y'), $DateReservation]);
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
            <strong>ERREUR!</strong> Vous vous êtent déjà inscrit à cette date. Si vous voulez ajouter un invité, annulez puis recommencez votre inscription.
            </div>";
        }
    }
    $req= $pdo->prepare('SELECT * FROM users INNER JOIN reservation ON users.IDUSER = reservation.IDUSER');
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
                <?php $inscrit = 0; ?>
            <?php foreach($listResa as $key => $value): ?>
            <?php if($listResa[$key]->DATERESERV == $date->format('d/m/Y')): ?>

                <?php  if($listResa[$key]->IDUSER == $idUser) :?>
                    <?php $inscrit = 1; ?>
                <?php endif ?>
                <td><?=$listResa[$key]->PRENOM . " " . $listResa[$key]->NOM; ?></td>
            <?php $tdlist++; ?>
            <?php endif; ?>

            <?php endforeach; ?>
            <?php for ($j=4; $j>$tdlist; --$j): ?>
                <td></td>
            <?php endfor; ?>
            <?php if ($_SESSION['auth']->ADMIN == 0) :?>
                <form action="" method="post">
                    <?php if ($inscrit == 0) :?>
                        <?php if ($j == 4) :?>
                            <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">reserver</button></td>
                            <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">Inviter</button></td>

                        <?php else :?>
                            <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-primary">reserver</button></td>
                            <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">Inviter</button></td>
                        <?php endif ?>
                    <?php else :?>
                        <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-warning">Annuler</button></td>
                        <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-primary">Inviter</button></td>
                    <?php endif ?>
                </form>
            <?php else :?>
                <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-primary disabled">reserver</button></td>
                <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-default disabled">Inviter</button></td>


            <?php endif ?>

            </tr>
            <?php $date->modify('+ 1 day'); ?>
        <?php endfor; ?>
    </tbody>
</table>
