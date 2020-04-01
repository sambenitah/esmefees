<?php
   
   require_once('header.php');

   $login = $_POST['login'];
   $password = $_POST['password'];
   
   if(isset($login) && isset($password)) {
      $requser = $bdd->prepare("SELECT * FROM visiteur WHERE login = ? AND mdp = ?");
      $requser->execute(array($login, $password));
      $userexist = $requser->rowCount();
   
      if($userexist == 1) {
         $userinfo = $requser->fetch(PDO::FETCH_BOTH);
         $_SESSION['user'] = $userinfo;
         header("Location: recap.php");

      } else {
         $_SESSION['error'] = "Mauvais login ou mot de passe !";
         header("Location: login.php");
      }
   } else {
      $_SESSION['error'] = "Tous les champs doivent être complétés !";
      header("Location: login.php");
   }
?>