<?php
// Vérification de l'appel via le formulaire
if (count($_POST)==0) {
	// Si le le tableau est vide, on affiche le formulaire
	header('location: formContact.php');
}

// Vérification des données du formulaire

$affichage_retour = '';														// Lignes à ajouter au début des vérifications
$erreurs=0;

// Exemple pour le nom
if (!empty($_POST['nom'])) {
	$nom=$_POST['nom'];
} else {
    // header('location: contact.php'); 									// Ligne à remplacer
    $affichage_retour .='Le champ NOM est obligatoire<br>';
    $erreurs++;
}


// Exemple pour l'adresse mail
if (!empty($_POST['email'])) {
// Si le champ email contient des données
  
  	// Verification du format de l'email
  	if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
      $email=$_POST['email'];
    } else {
    // Si l'email est incorrect 
    // header('location: contact.php'); 									// Ligne à remplacer
    $affichage_retour .='Adresse mail incorrecte<br>';
    $erreurs++;
    }
        
// Si le champ email est vide
} else {
    // header('location: contact.php'); 									// Ligne à remplacer
    $affichage_retour .='Le champ EMAIL est obligatoire<br>';
    $erreurs++;
}

if ($erreurs == 0) {

  // Préparation des données 

	// Récupération des données du formulaire
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$message=$_POST['message'];
$email=$_POST['email'];

// Affichage des données du formulaire 
// Cette partie n'est pas à conserver par la suite, elle permet juste de verifier la récupération des données
echo 'Votre nom : '.$prenom.' '.$nom.'<br>';
echo 'Adresse mail : '.$email.'<br>';
echo 'Message : '.$message.'<br>';

// Traitement des données

$prenom=mb_strtolower($prenom);
$nom=mb_strtolower($nom);

//Préparation des variables pour l'envoi du mail de contact
$subject='DailyDrivers : demande de '.$prenom.' '.$nom;
$headers['From']=$email;							// Pour pouvoir répondre à la demande de contact
$headers['Reply-to']=$email;						// On donne l'adresse de l'utilisateur comme adresse de réponse
$headers['X-Mailer']='PHP/'.phpversion();			// On précise quel programme à généré le mail

// On fixe l'adresse du destinataire - Pour ce Mail il s'agit de notre adresse MMI@mmi-troyes.fr
$email_dest="mmi22h08@mmi-troyes.fr";

//Envoi du mail avec confirmation d'envoi (ou pas)
if (mail($email_dest,$subject,$message,$headers)) {
echo "Mail de Contact OK";									// On confirme l'envoi du message
}else {
echo "Erreur d'envoi du mail de contact";					// Le message n'a pas été envoyé - Erreur de traitement
}




// Cette partie n'est pas à conserver par la suite, elle permet juste de verifier la récupération des données
echo 'Votre nom : '.$prenom.' '.$nom.'<br>';
echo 'Adresse mail : '.$email.'<br>';
echo 'Message : '.$message.'<br>';

// Traitement des données

$prenom=mb_strtolower($prenom);
$nom=mb_strtolower($nom);

//Préparation des variables pour l'envoi du mail de contact
$subject='Confirmation de votre demande sur DailyDrivers';
$headers['From']='mmi22h08@mmi-troyes.fr';							// Pour pouvoir répondre à la demande de contact
$headers['Reply-to']='no-reply@mmi-troyes.fr';						// On donne l'adresse de l'utilisateur comme adresse de réponse
$headers['X-Mailer']='PHP/'.phpversion();	

$message = 'Bonjour, '.$prenom.' '.$nom."\n".'Nous avons bien pris en compte votre demande.';		// On précise quel programme à généré le mail

// On fixe l'adresse du destinataire - Pour ce Mail il s'agit de notre adresse MMI@mmi-troyes.fr
$email_dest=$_POST['email'];

$headers['MIME-Version'] = '1.0';
$headers['content-type'] = 'text/html; charset=utf-8';
//Envoi du mail avec confirmation d'envoi (ou pas)
if (mail($email_dest,$subject,$message,$headers)) {
echo "Mail de Contact OK";									// On confirme l'envoi du message
}else {
echo "Erreur d'envoi du mail de contact";					// Le message n'a pas été envoyé - Erreur de traitement
}

// Fin de l'envoi en PHP
  
  // Détermination du message à affichée après les tentatives d'envoi
  	$affichage_retour='Votre demande à bien été envoyée';
    
  	if ($erreurs != 0) {
    $affichage_retour='Echec de l\'envoi du message';
    }
}

?>