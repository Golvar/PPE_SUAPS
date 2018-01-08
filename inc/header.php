<?php
  if(session_status() == PHP_SESSION_NONE){
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Suaps</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/app.css" rel="stylesheet">

    <script src="js/jquery.js"></script>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="js/bootstrap.min.js"></script>

  </head>

  <body>

    <div class="navbar navbar-default">
      <div class="navbar-inner">
        <div class="container">
          <a class ="navbar-brand" href="account.php">Suaps</a>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

              <?php if (isset($_SESSION['auth'])):?>
                <li><a href="help.php">Aide</a></li>
                <li><a href="help.php">Contact</a></li>
                <li><a href="logout.php">Deconnexion</a></li>
                <?php if ($_SESSION['auth']->ADMIN == 1):?>
                  <li class="dropdown"><a href="administrer.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administration<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="addPlayer.php">Ajouter un joueur</a></li>
                      <li><a href="addTickets.php">Ajouter des tickets</a></li>
                      <li><a href="stats.php">Statistiques</a></li>
                    </ul>
                  </li>
                <?php endif; ?>
              <?php else : ?>
              <li><a href="login.php">Se connecter</a></li>
              <li><a href="#contact">Contact</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
   </div>


    <div class="container">


    <?php if(isset($_SESSION['flash'])): ?>
      <?php  foreach($_SESSION['flash'] as $type => $message): ?>

        <div class="alert alert-<?= $type ?>">
          <?= $message; ?>
        </div>
      <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
