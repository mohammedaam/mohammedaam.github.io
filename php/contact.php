<?php
if($_POST){
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$destinataire = "mohammed.aamoum@outlook.fr";
			$email=$_POST["email"];
			$from=htmlentities("From: $email" . "\r\n") ;
			$subject=stripslashes(htmlentities($_POST["name"]));
			$contents=stripslashes(htmlentities($_POST["comments"]));     
			 
			$regex = "/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i";
			 
			if (!preg_match($regex,$email))
			{
				  echo "L'adresse $email n'est pas valide";
			}
			   elseif (trim($contents)=="")
			{
					echo "Veuillez écrire votre message";
			}
			 
			if (mail($destinataire, $email, $sujet, $contents, $from)) // Envoi du message
			{
				echo 'Votre message a bien été envoyé ';
			}
			else // Non envoyé
			{
				echo "Votre message n'a pas pu être envoyé";
			}
}
?>