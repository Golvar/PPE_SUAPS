<?php
$reqNbReservEnCours = $pdo->prepare('SELECT COUNT(IDRESERV) AS nbReserv FROM reservation WHERE IDUSER = ? AND DATERESERV >= ?AND ANNULER = 0');
$reqNbReservEnCours->execute([$idUser, $DDay->format('d/m/Y')]);

$nbReserv = (int) $reqNbReservEnCours->fetch()->nbReserv;

if ($nbReserv < 2) {

    $DateReservation = $_POST['reserver'];
    $reqVerifDoublon = $pdo->prepare('SELECT * FROM reservation WHERE DATERESERV = ? AND IDUSER = ? AND ANNULER = 0');
    $reqVerifDoublon->execute([$DateReservation,$idUser]);
    $doublon = $reqVerifDoublon->fetch();
    $reqLesReservDate = $pdo->prepare('SELECT * FROM reservation WHERE DATERESERV = ? AND ANNULER = 0');
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
    }else {
        echo "<div class='alert alert-dismissible alert-danger'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>ERREUR!</strong> Vous avez déjà 2 reservations en cours.
        </div>";
    }


?>
