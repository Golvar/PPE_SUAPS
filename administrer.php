<?php
    session_start();
    if(empty($_SESSION['auth']->ADMIN)){
      $_SESSION['flash']['danger']= "Vous n'avez pas accés à cette page !";
      if(!empty($_SESSION['auth'])){
        header('location: account.php');
      }else{
      header('Location: login.php');
      }
    }

    if(!empty($_POST)){
      require_once 'inc/db.php';

      $req = $pdo->prepare("INSERT INTO users SET NOM = ?, PRENOM = ?, USERNAME = ?, TYPE = ?, ADMIN = ?, PASSWORD = ?");
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      if(empty($_POST['admin'])){
        $admin = 0;
      }else {
        $admin=1;
      }
      $req->execute([$_POST['nom'], $_POST['prenom'], $_POST['username'], $_POST['type'], $admin, $password]);

    }

    require 'inc/header.php';

?>

<h1>Ajouter un compte</h1>

<form action="" method="POST">

  <div class="from-group">
    <label for="">Prénom : </label>
    <input type="text" name="prenom" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Nom : </label>
    <input type="text" name="nom" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Nom d'utilisateur : </label>
    <input type="text" name="username" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Type : </label>
    <input type="text" name="type" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Mail : </label>
    <input type="text" name="mail" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Téléphone : </label>
    <input type="text" name="phone" class="form-control" required>
  </div>
  <br>
  <div class="from-group">
    <label for="">Mot de passe : </label>
    <input type="text" name="password" class="form-control" required>
  </div>
  <br>
  <div class="from-check">
    <label ><input type="checkbox"  name="admin" class="form-check-input" value="1"> Admin</label>
  </div>
  <button type="submit" name="button" class="btn btn-primary">Enregistrer</button>
  <br>
</form>
<?php require 'inc/footer.php';?>
