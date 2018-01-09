<?php require 'administrer.php';
require_once 'inc/db.php';


$req = $pdo->prepare('SELECT * FROM users WHERE ADMIN = 0');


$req->execute();
$golfeur = $req->fetchAll();
 ?>

<?php if (!empty($_POST)) :?>
    <?php
    require_once 'inc/db.php';
    $reqTicketSem = $pdo->prepare("SELECT TICKET_SEMAINE FROM users WHERE IDUSER = ?");
    $reqTicketSem->execute([$golfeur[$_POST['golfeur']]->IDUSER]);

    $ticketSemExist = $reqTicketSem->fetch();

    $reqTicketWe = $pdo->prepare("SELECT TICKET_WE FROM users WHERE IDUSER = ?");
    $reqTicketWe->execute([$golfeur[$_POST['golfeur']]->IDUSER]);

    $ticketWeExist = $reqTicketWe->fetch();

    $req = $pdo->prepare("UPDATE users SET TICKET_SEMAINE = ?, TICKET_WE = ? WHERE IDUSER = ?");
    $req->execute([$_POST['ticketSe'] + $ticketSemExist->TICKET_SEMAINE, $_POST['ticketWe'] + $ticketWeExist->TICKET_WE, $golfeur[$_POST['golfeur']]->IDUSER]);
    ?>

    <div class="alert alert-success">
        <?= $_POST['ticketSe'] . " tickets semaine et "  . $_POST['ticketWe'] . " titckets weekend on été crédités à " . $golfeur[$_POST['golfeur']]->PRENOM . " " . $golfeur[$_POST['golfeur']]->NOM  ?>
    </div>
<?php endif; ?>

<br>
<form action="" method="POST">
<div class="from-group">
  <label for="">Golfeur : </label>
  <select class="form-control" name="golfeur">
    <?php for ($i=0; $i < sizeof($golfeur); $i++): ?>
    <option  value='<?= $i?>'><?= $golfeur[$i]->NOM . " " . $golfeur[$i]->PRENOM ?></option>
  <?php endfor; ?>
  </select>
</div>
<br>


    <label for="">Nombre de ticket semaine à créditer : </label>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe" value= 0 autocomplete="on" checked="checked"> 0
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe" value= 1 autocomplete="off"> 1
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 2 autocomplete="off"> 2
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 3 autocomplete="off"> 3
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 4 autocomplete="off"> 4
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 5 autocomplete="off"> 5
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 6 autocomplete="off"> 6
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 7 autocomplete="off"> 7
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 8 autocomplete="off"> 8
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 9 autocomplete="off"> 9
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 10 autocomplete="off"> 10
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe" value= 11 autocomplete="off"> 11
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 12 autocomplete="off"> 12
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 13 autocomplete="off"> 13
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 14 autocomplete="off"> 14
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 15 autocomplete="off"> 15
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 16 autocomplete="off"> 16
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 17 autocomplete="off"> 17
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 18 autocomplete="off"> 18
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 19 autocomplete="off"> 19
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 20 autocomplete="off"> 20
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 21 autocomplete="off"> 21
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 22 autocomplete="off"> 22
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 23 autocomplete="off"> 23
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 24 autocomplete="off"> 24
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="ticketSe"  value= 25 autocomplete="off"> 25
        </label>
    </div>

        <br><br>
        <label for="">Nombre de ticket Weekend à créditer : </label>
        <br>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" value= 0 autocomplete="on" checked="checked"> 0
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" value= 1 autocomplete="off"> 1
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 2 autocomplete="off"> 2
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 3 autocomplete="off"> 3
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 4 autocomplete="off"> 4
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 5 autocomplete="off"> 5
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 6 autocomplete="off"> 6
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 7 autocomplete="off"> 7
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 8 autocomplete="off"> 8
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 9 autocomplete="off"> 9
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 10 autocomplete="off"> 10
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" value= 11 autocomplete="off"> 11
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 12 autocomplete="off"> 12
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 13 autocomplete="off"> 13
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 14 autocomplete="off"> 14
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 15 autocomplete="off"> 15
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 16 autocomplete="off"> 16
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 17 autocomplete="off"> 17
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 18 autocomplete="off"> 18
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 19 autocomplete="off"> 19
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 20 autocomplete="off"> 20
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 21 autocomplete="off"> 21
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 22 autocomplete="off"> 22
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 23 autocomplete="off"> 23
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 24 autocomplete="off"> 24
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe"  value= 25 autocomplete="off"> 25
            </label>
        </div>
        <br><br><br><br>
        <button type="submit" class="btn btn-primary center-block">Ajout des tickets</button>
    </label>
</form>
<br>



<?php require 'inc/footer.php';?>
