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

      $req = $pdo->prepare("INSERT INTO users SET NOM = ?, PRENOM = ?, USERNAME = ?,TYPE=?, ADMIN = ?, MAIL = ?, TELEPHONE = ?,  PASSWORD = ?");
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      if ($_POST['admin']) {
        $type= 'Administrateur';
      }elseif($_POST['admin']==0) {
        $type='Golfeur';
      }else {
        $type='Invité';
      }

      $req->execute([$_POST['nom'], $_POST['prenom'], $_POST['username'],$type, $_POST['admin'], $_POST['mail'], $_POST['phone'],  $password]);

    }

    require 'inc/header.php';

?>

<h1>Administration</h1>
