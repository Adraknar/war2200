<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <title>Our Game</title>
		<link rel="stylesheet" href="css/design.css" type="text/css" /> 
    </head>

<body>
    
<div class="login-page">
  <div class="form">
  
   <?php if(isset($_GET['inscription'])){?>	

	<form class="register-form" action="include/login.php?id_log=2" method="post">
      <input type="text" placeholder="Pseudo" name="username_ins"/>
      <input type="password" placeholder="mot de passe"  required name="password_ins"/>
      <input type="email" placeholder="adresse e-mail" name="mail_ins"/>
      <button type="submit">S'inscrire</button>
      <p class="message">Déjà inscrit ? <a href="index.php">Connectez-vous !</a></p>
    </form>
  </div>
</div>
  <?php } else{ ?>
    <form class="login-form" action="include/login.php?id_log=1" method="post">
      <input type="text" placeholder="Pseudo" name="username"/>
      <input type="password" placeholder="mot de passe" name="password"/>
      <button type="submit">Se connecter</button>
      <p class="message">Pas encore inscrit? <a href="index.php?inscription">Rejoignez-nous !</a></p>
    </form>
  <?php } ?>
        <!-- Corps de la page -->
		
		
     	<div id="error_load">
	        <?php if(isset($_GET['error'])){
				
				$error_id = $_GET['error'];
				
				switch ($error_id) // on indique sur quelle variable on travaille
                        { 
                            case 1: // dans le cas où $note vaut 0
                                echo "<p>Pseudo ou mot de passe invalide !</p>";
                            break;
                            
                            case 2: // dans le cas où $note vaut 5
                                echo "<p>Le pseudo ou l'adresse e-mail est déjà prise.</p>";
                            break;
                            
                            case 3: // dans le cas où $note vaut 7
                                echo "<p>Veuillez entrer une adresse e-mail valide !</p>";
                            break;
                            
                            case 4: // etc. etc.
                                echo "<p>À bientôt !</p>";
                            break;
                            
                            case 5:
                                echo "<p>Veuillez-vous connecter d'abord !</p>";
                            break;
    
}

				
			}?>
	    </div>
	
		
    </body>
</html>