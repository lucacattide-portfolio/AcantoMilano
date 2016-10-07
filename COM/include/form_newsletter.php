<?php

    if(isset($_POST["iscritto"])) {
	
	// Invio Form
	
	$email_proprietario = "curiosacanto@gmail.com"; // Dichiarazione ed Inizializzazione Variabile Destinatario 
	$oggetto = "Newsletter - Acanto Milano"; // Dichiarazione ed Inizializzazione Variabile Oggetto
	
	// Controllo Input

	/*if ((!isset($_POST['email_news'])) || (!isset($_POST['check_news']))) { // Se non sono stati inseriti tutti i campi richiesti

		// RIATTIVARE L'INVOCAZIONE IN PRODUZIONE
		
		chiudi('Errore: compilare tutti i campi del modulo'); // Allora lancia l'eccezione

    } else { // Altrimenti*/
		
		// Assegnazione campi
		
        $email = $_POST['email_news'];
        
		// Validazione Input
		
        $pattern_email = "#^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})#"; // Impostazione pattern di controllo email
		        		        
        if (!@preg_match($pattern_email, $email)) { // Se l'input non rispetta la condizione
        
            $messaggio_errore .= "<div id='form_notifica'><p>Inserire un indirizzo di posta elettronica valido</p></div>"; // Allora errore
        
        }	
                		        
        if (@strlen($messaggio_errore) > 0) { // Se il messaggio di errore è stato prodotto
        
            chiudi($messaggio_errore); // Allora lancia l'eccezione
        
        }
        		
		$email_corpo = "Iscrizione Newsletter:\n\n"; // Separatore Mail
		
		// Definizione corpo del messaggio

        $email_corpo .= "E-Mail: ".@strip_tags(clean_stringa($email))."\n";
		
		// Definizione Headers
        
        $headers = 'From: '.$email.' <'.$email.">\r\n".'Reply-To: '.$email."\r\n".'Return-Path: '.$email."\r\n".'Inviato da Acanto Milano (acantomilano.it) con (X-Mailer): PHP/' . @phpversion();
		 
        if (@mail($email_proprietario, $oggetto, $email_corpo, $headers)) { // Funzione Mail
		
			echo "<div id='form_notifica'><p>Iscrizione avvenuta con successo</p></div>";
		
		}
		
	}
	
	
	// Funzione Formattazione Mail
    
    function clean_stringa($stringa) {
    
      $escluse = array("content-type", "bcc:", "to:", "cc:", "href"); // Dichiarazione ed Inizializzazione intestazioni
    
      return @str_replace($escluse, "", $stringa); // Restituisci la stringa formattata
    
    }
    
   
    // Funzione Gestione Eccezioni

    function chiudi($errore) {
        
        // Messaggio di errore
  
        echo $errore;
 
        die(); // Termina la sessione
 
    }

?>