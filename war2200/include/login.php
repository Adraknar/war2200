<?php 
include('bdd.php');

/*********************************/
/* Inscription / connexion       */
/*********************************/

var_dump($_POST);
if($_GET['id_log']== 1){ // Connexion
	
	
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	
	
	  // Vérification des identifiants
           $req = $bdd->prepare('SELECT id_joueur FROM login WHERE pseudo = :pseudo AND mdp = :pass');
           $req->execute(array(
                    'pseudo' => $username,
                    'pass' => $password));

                    $resultat = $req->fetch();

                     if (!$resultat){
                              header('Location: http://localhost/war2200/index.php?id_error=1'); // erreur mdp ou pseudo
                                    
					} else { // sinon on crée notre session
                               session_start();
                               $_SESSION['id_joueur'] = $resultat['id_joueur'];
                               $_SESSION['pseudo'] = $username;
							   header('Location: http://localhost/war2200/caserne.php');
		
		}

		
} else if ($_GET['id_log']== 2) { // Inscription

       if (isset($_POST['mail_ins'])){
             $_POST['mail_ins'] = htmlspecialchars($_POST['mail_ins']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

           if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail_ins'])){ // On vérifie que c'est bien un email.
		   
		   $email_ins = $_POST['mail_ins'];
		   $username_ins = htmlspecialchars($_POST['username_ins']); 
		   $password_ins = sha1(htmlspecialchars($_POST['password_ins'])); // + rajouter à vérifier que le mdp n'est pas vide
		   
		   // Vérification pseudo / email si pris
           $req = $bdd->query("SELECT * FROM login WHERE pseudo = '$username_ins' OR email = '$username_ins'"); 
           $resultat = $req->fetch();
                 
				 if (!$resultat){ // si pas de résultat on procède à l'inscription
				             
							 $current_date = date("Y-m-d H:i:s");
							 $bdd->exec("INSERT INTO login(pseudo, mdp, email, dateins) VALUES ('$username_ins', '$password_ins', '$email_ins', '$current_date')"); // création du compte
							 
							 
							 $recup_id = $bdd->query("SELECT id_joueur FROM login WHERE pseudo = '$username_ins'"); // On récup l'id du joueur inscrit
							 while($donnees = $recup_id->fetch()){
								 
								 $bdd-> exec("INSERT INTO `ressource`(`id_joueur`, `ouvriers_joueur`, `or_joueur`, `materiaux_joueur`, `terrain_joueur`) VALUES ($donnees[id_joueur],5,200,200,50)"); // On charge les ressources de base
								 session_start();
								 $_SESSION['id_joueur'] = $donnees_id;
								 $_SESSION['pseudo_joueur'] = $username_ins;
								 header('Location: http://localhost/war2200/caserne.php');
							 }   $recup_id->closecursor();   
					} else { // on retourne l'utilisateur sur la page d'inscription avec un msg d'erreur indiquant que l'email est déjà pris / ou le pseudo.
					
		header('Location: http://localhost/war2200/index.php?error=2');
		
		}		 
				 
      } else { // on retourne l'utilisateur sur la page d'inscription avec un msg d'erreur indiquant que ce n'est pas un email.

	 header('Location: http://localhost/war2200/index.php?error=3'); 
	 
    }
}


} else if ($_GET['id_log']== 3) { // deconnecter

        session_start();

        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        header('Location: http://localhost/war2200/index.php?error=4'); 

} else {
	header('Location: http://localhost/war2200/index.php'); // Si quelqu'un tente d'accéder à cette page sans passer par un formulaire.
} 

?>