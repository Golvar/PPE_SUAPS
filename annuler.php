<?php
$dateAnnulation = $_POST['annuler'];

$reqUnInvite = $pdo->prepare('SELECT USE_IDUSER FROM reservation WHERE IDUSER = ? AND DATERESERV = ?');
$reqUnInvite->execute([$idUser, $dateAnnulation]);
$unInvite = $reqUnInvite->fetch();

$reqAnnulation = $pdo->prepare('UPDATE reservation SET ANNULER= ? WHERE DATERESERV = ? AND IDUSER = ?');
$reqAnnulation->execute([1,$dateAnnulation, $idUser]);
$DateReservationFormat = DateTime::createFromFormat('d/m/Y', $dateAnnulation);
$reqRecreditéTicket = $pdo->prepare("UPDATE users SET TICKET_SEMAINE = TICKET_SEMAINE + ?, TICKET_WE = TICKET_WE + ?, NBRESERVATION = NBRESERVATION - ? WHERE IDUSER = ?");
if ((int)$DDay->diff($DateReservationFormat)->format('%R%a') >= 2) {
    if($DateReservationFormat->format('w') == 0 || $DateReservationFormat->format('w') == 6) {
        if (!empty($unInvite->USE_IDUSER)) {
            $reqRecreditéTicket->execute([0,2,1, $idUser]);
        }else {
            $reqRecreditéTicket->execute([0,1,1, $idUser]);
        }

    }else {
        if (!empty($unInvite->USE_IDUSER)) {
            $reqRecreditéTicket->execute([2,0,1, $idUser]);
        }else {
            $reqRecreditéTicket->execute([1,0,1, $idUser]);
        }
    }
}else {
    $reqRecreditéTicket->execute([0,0,1, $idUser]);
}
header('Location: account.php');
?>
