<?php
session_start();


if(!empty($_POST['username']) && !empty($_POST['password'])){
  require_once 'inc/db.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $req->execute(['username' => $_POST['username']]);

    $user = $req->fetch();
    if($user == null){
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }elseif(password_verify($_POST['password'], $user->PASSWORD)){
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
        header('Location: account.php');
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }

}?>

<?php require 'inc/header.php'; ?>

<h1>Se connecter </h1>
  <form action="" method="POST">
    <div class="from-group">
      <label for="">Nom de compte : </label>
      <input type="text" name="username" class="form-control" required>
    </div>
    <br>
    <div class="from-group">
      <label for="">Mot de passe : </label>
      <input type="password" name="password" class="form-control" required>
    </div>
  <br>
    <button type="submit" name="button" class="btn btn-primary">Se connecter</button>
  </form>
<?php require 'inc/footer.php'; ?>
