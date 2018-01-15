<?php
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    if(!empty($_POST['reserver'])){
        require 'reserver.php';
    }
    if (!empty($_POST['annuler'])) {
        require 'annuler.php';
    }

    $req= $pdo->prepare('SELECT * FROM users INNER JOIN reservation ON users.IDUSER = reservation.IDUSER AND reservation.annuler = 0');
    $req->execute();
    $listResa = $req->fetchAll();

    if(!empty($_POST['inviter'])){
        require 'inviter.php';
    }

    if(!empty($_POST['inviteAnule'])){
        require 'inviter.php';
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
