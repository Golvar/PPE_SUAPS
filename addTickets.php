<?php require 'administrer.php';
require_once 'inc/db.php';
$req = $pdo->prepare('SELECT * FROM users WHERE ADMIN = 0');

$req->execute();
$golfeur = $req->fetchAll();
 ?>
<br>
<div class="from-group">
  <label for="">Golfeur : </label>
  <select class="form-control" name="golfeur">
    <?php for ($i=0; $i < sizeof($golfeur); $i++): ?>
    <option  value=i><?= $golfeur[$i]->NOM . " " . $golfeur[$i]->PRENOM ?></option>
  <?php endfor; ?>
  </select>
</div>
<br>

<form action="" method="POST">
    <label for="">Nombre de ticket semaine à créditer : </label>
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" name="ticketSe" class="btn btn-primary" value = 0>0</button>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" name="ticketSe" class="btn btn-primary" value = 1>1</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 2>2</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 3>3</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 4>4</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 5>5</button>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" name="ticketSe" class="btn btn-primary" value = 6>6</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 7>7</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 8>8</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 9>9</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 10>10</button>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" name="ticketSe" class="btn btn-primary" value = 11>11</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 12>12</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 13>13</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 14>14</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 15>15</button>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" name="ticketSe" class="btn btn-primary" value = 16>16</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 17>17</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 18>18</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 19>19</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 20>20</button>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" name="ticketSe" class="btn btn-primary" value = 21>21</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 22>22</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 23>23</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 24>24</button>
                <button type="button" name="ticketSe" class="btn btn-primary" value = 25>25</button>
            </div>
        </div>

        <br><br>
        <label for="">Nombre de ticket Weekend à créditer : </label>
        <br>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" value='1' autocomplete="off" checked> 0
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 1
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 2
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 3
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 4
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 5
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 6
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 7
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 8
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 9
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 10
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 11
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 12
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 13
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 14
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 15
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 16
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 17
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 18
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 19
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 20
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 21
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option1" autocomplete="off" checked> 22
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option2" autocomplete="off"> 23
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 24
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="ticketWe" id="option3" autocomplete="off"> 25
            </label>
        </div>
        <br><br><br><br>
        <button type="submit" class="btn btn-primary center-block">Ajout des tickets</button>
    </label>
</form>
<br>



<?php require 'inc/footer.php';?>
