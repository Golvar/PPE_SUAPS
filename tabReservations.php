<?php

    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    if(!empty($_POST['reserver'])){
        $idUser = $_SESSION['auth']->IDUSER;
        $DateReservation = $_POST['reserver'];

        $reqVerifDoublon = $pdo->prepare('SELECT * FROM reservation WHERE DATERESERV = ? AND IDUSER = ?');
        $reqVerifDoublon->execute([$DateReservation,$idUser]);
        $doublon = $reqVerifDoublon->fetch();

        $reqLesReservDate = $pdo->prepare('SELECT * FROM reservation WHERE DATERESERV = ?');
        $reqLesReservDate->execute([$DateReservation]);

        $nbrReservDate = count($reqLesReservDate->fetchAll());

        if (!$doublon) {
            if ($nbrReservDate<4) {
                $req = $pdo->prepare('INSERT INTO `suaps`.`reservation` (`IDRESERV`, `IDUSER`, `USE_IDUSER`, `DATEPREVU`, `DATERESERV`) VALUES (NULL, ?, NULL, ?, ?)');
                $req->execute([$idUser, $DDay->format('d/m/Y'), $DateReservation]);
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

    $req= $pdo->prepare('SELECT NOM, DATERESERV FROM users INNER JOIN reservation ON users.IDUSER = reservation.IDUSER');
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
            <?php foreach($listResa as $key => $value): ?>
            <?php if($listResa[$key]->DATERESERV == $date->format('d/m/Y')): ?>
                <td><?=$listResa[$key]->NOM; ?></td>
            <?php $tdlist++; ?>
            <?php endif; ?>

            <?php endforeach; ?>
            <?php for ($j=4; $j>$tdlist; --$j): ?>
                <td></td>
            <?php endfor; ?>
            <?php if ($_SESSION['auth']->ADMIN == 0) :?>
                <form action="" method="post">
                    <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-primary">reserver</button></td>
                </form>
            <?php else :?>
                <td><button type="submit" name="reserver" value=<?= $date->format('d/m/Y') ?> class="btn btn-primary disabled">reserver</button></td>
            <?php endif ?>

            </tr>
            <?php $date->modify('+ 1 day'); ?>
        <?php endfor; ?>
    </tbody>
</table>
