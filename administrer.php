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

    

    require 'inc/header.php';

?>

<h1>Administration</h1>
