<?php 
session_start();
var_dump($_SESSION);
if(empty($_SESSION['id_joueur'])) { header('Location: http://localhost/war2200/index.php'); }
?>
<html>

   <head>
      <meta charset="utf-8" />
   </head>
   
   <body>

<p>Vous êtes actuellement sur la page caserne --> en construction</p>
<a href="include/login.php?id_log=3">Se déconnecter </a>
   </body>
</html>