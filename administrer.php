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

      $req = $pdo->prepare("INSERT INTO users SET NOM = ?, PRENOM = ?, USERNAME = ?, ADMIN = ?, PASSWORD = ?");
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

      $req->execute([$_POST['nom'], $_POST['prenom'], $_POST['username'], $_POST['admin'],  $password]);

    }

    require 'inc/header.php';

?>

<h1>Administration</h1>

<div class="btn-group btn-group-justified">
  <a href="addPlayer.php"class="btn btn-primary">Ajouter un Joueur</a>
  <a href="addTickets.php" class="btn btn-primary ">Ajouter des tickets </a>
  <a href="stats.php" class="btn btn-primary">Statistiques</a>
</div>
