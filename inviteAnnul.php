<?php
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
?>
