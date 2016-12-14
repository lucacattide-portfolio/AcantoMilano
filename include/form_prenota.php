<?php

	// Invio Form
	
	$email_proprietario = "curiosacanto@gmail.com"; // Dichiarazione ed Inizializzazione Variabile Destinatario
	$oggetto = "Prenotazione - Acanto Milano"; // Dichiarazione ed Inizializzazione Variabile Oggetto
	
	// Controllo Input

/*	if ((!isset($_POST['nome_prenota'])) || (!isset($_POST['cognome_prenota'])) || (!isset($_POST['emaile_prenota'])) || (!isset($_POST['oggetto_prenota'])) || (!isset($_POST['ora_prenota'])) || (!isset($_POST['messaggio_prenota'])) || (!isset($_POST['datae_prenota']))) { // Se non sono stati inseriti tutti i campi richiesti

		// RIATTIVARE L'INVOCAZIONE IN PRODUZIONE
		
		//chiudi('Errore: compilare tutti i campi del modulo'); // Allora lancia l'eccezione

    } else { // Altrimenti*/
		
		// Assegnazione campi
		
        $nome = $_POST['nome'];
		$cognome = $_POST['cognome'];
        $email = $_POST['email'];
		$oggetto = $_POST['oggetto'];
		$data = $_POST['data'];
		$ora = $_POST['ora'];
		$messaggio = $_POST['messaggio'];
        
		// Validazione Input
		
		/*$pattern_nome = "#[a-zA-Zàèìòù' ]+#"; // Impostazione pattern di controllo nome e cognome
        $pattern_email = "#^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})#"; // Impostazione pattern di controllo email
		
		if (!@preg_match($pattern_nome, $nome)) { // Se l'input non rispetta la condizione
        
            $messaggio_errore .= "Inserire un nome valido"; // Allora errore
        
        }	
		
		if (!@preg_match($pattern_nome, $cognome)) { // Se l'input non rispetta la condizione
        
            $messaggio_errore .= "Inserire un cognome valido"; // Allora errore
        
        }
		
		if (!@preg_match($pattern_nome, $oggetto)) { // Se l'input non rispetta la condizione
        
            $messaggio_errore .= "Inserire un oggetto valido"; // Allora errore
        
        }
        		        
        if (!@preg_match($pattern_email, $email)) { // Se l'input non rispetta la condizione
        
            $messaggio_errore .= "Inserire un indirizzo di posta elettronica valido"; // Allora errore
        
        }	
        
        if (@strlen($messaggio) < 2) { // Se il messaggio è più corto di 2 caratteri
        
            $messaggio_errore .= "Inserire il testo del messaggio da inviare"; // Allora errore
        
        }
        		        
        if (@strlen($messaggio_errore) > 0) { // Se il messaggio di errore è stato prodotto
        
            chiudi($messaggio_errore); // Allora lancia l'eccezione
        
        }*/
        		
		$email_corpo = "Prenotazione evento:\n\n"; // Separatore Mail
		
		// Definizione corpo del messaggio

        $email_corpo .= "Nome: ".@strip_tags(clean_stringa($nome))."\n";
		    $email_corpo .= "Cognome: ".@strip_tags(clean_stringa($cognome))."\n";
        $email_corpo .= "E-Mail: ".@strip_tags(clean_stringa($email))."\n";
		    $email_corpo .= "Oggetto: ".@strip_tags(clean_stringa($oggetto))."\n";
		    $email_corpo .= "Data: ".$data."\n";
		    $email_corpo .= "Orario: ".$ora."\n";
        $email_corpo .= "Messaggio: ".@strip_tags(clean_stringa($messaggio))."\n";
		
		// Definizione Headers
        
        $headers = 'From: '.$email.' <'.$email.">\r\n".'Reply-To: '.$email."\r\n".'Return-Path: '.$email."\r\n".'Inviato da Acanto Milano (acantomilano.it) con (X-Mailer): PHP/' . @phpversion();
		 
        if (@mail($email_proprietario, $oggetto, $email_corpo, $headers)) { // Funzione Mail
		
			echo "Messaggio inviato con successo";
		
		}
		
	//}
	
	
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