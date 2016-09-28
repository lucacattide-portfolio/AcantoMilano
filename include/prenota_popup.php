<!--Inizio Prenota Popup-->

<!--<aside id="prenota_popup" class="secondo_piano">
-->

	<h7> <!--Titolo-->
    
    	Prenota Ora
    
    </h7>
    
    <!--Inizio Form-->
    
    <form id="prenota_form" method="post" enctype="application/x-www-form-urlencoded" autocomplete="on"> 
    
    	 <div class="chiudi_popup chiudi_prenota"> <!--Chiudi-->
    
    		<span> <!--Icona-->
        	</span>
    
    	</div>
    
    	<legend> <!--Legenda-->
        
        	Prenotazione eventi online
        
        </legend>
        
        <!--Inizio Campi-->
        
        <fieldset>
        
        	<?php

				include("../admin/php/connessione_sql.php"); // Connessione DB 
			
				// data setting
				@date_default_timezone_set('Europe/Rome');
				@setlocale(LC_ALL, 'it_IT');
				@setlocale(LC_TIME, 'ita', 'it_IT.utf8');
				
			   $paginaId = $_POST["articoloId"];
			   $sqlArticolo = "SELECT * FROM `articolo` WHERE articolo_id = ".$paginaId." ";
			   $rArt = $mysqli->query($sqlArticolo);
			   $countArticolo =  $rArt->num_rows;
			   
			 ?>
        
        	<label for="nome_prenota">
        
        		Nome <span class="richiesto">*</span>
            
            	<input name="nome_prenota" type="text" required id="nome_prenota" placeholder="Inserire il nome (es. Mario Rossi)" pattern="[a-zA-Zàèìòù' ]+" title="Nome">
            
            </label>
            <label for="cognome_prenota">
            
            	Cognome <span class="richiesto">*</span>
            
           	  <input name="cognome_prenota" type="text" required id="cognome_prenota" placeholder="Inserire il nome (es. Mario Rossi)" pattern="[a-zA-Zàèìòù' ]+" title="Cognome">
            
            </label>
            <label for="email_prenota">
            
            	E-Mail <span class="richiesto">*</span>
            
           	  <input name="email_prenota" type="email" required id="email_prenota" placeholder="Inserire l'indirizzo e-mail (es. m.rossi@email.it)" pattern="^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})" title="E-Mail">
            
            </label>
            <label for="oggetto_prenota">
            
            	Oggetto
            
           	  <input name="oggetto_prenota" type="text" disabled="disabled" id="oggetto_prenota" placeholder="Inserire l'oggetto del messaggio" pattern="[a-zA-Zàèìòù' ]+" title="Oggetto" readonly value="<?php echo $articolo["articolo_titolo"]; ?>">
            
            </label>
            <label for="data_prenota">
            
            	Data
            
           	  <input name="data_prenota" type="date" disabled="disabled" id="data_prenota" title="Data" value="<?php echo date('Y-m-d', strtotime($articolo["articolo_data_modifica"]) ) ?>" readonly>
            
            </label>
            <label for="ora_prenota">
            
            	Ora
            
           	  <input name="ora_prenota" type="time" disabled="disabled" id="ora_prenota" title="Orario" value="<?php echo date('H:i:s', strtotime($articolo["articolo_data_modifica"])) ?>" readonly>
            
            </label>
            <label for="messaggio_prenota">
            
            	Note Aggiuntive
       
       			<textarea name="messaggio_prenota" id="messaggio_prenota" placeholder="Inserire il testo della prenotazione" title="Note Aggiuntive"></textarea>
      
   		  	</label>
            <label for="accettazione_prenota">
       
       			<input name="accettazione_prenota" type="checkbox" required id="accettazione_prenota" title="Informativa sulla Privacy">
      			
                Acconsento al trattamento dei dati personali ai sensi del DLgs. 196/03 <span class="richiesto">*</span>
      
      		</label>
        
        </fieldset>
        
        <!--Fine Campi-->
        
        <center>
        
            <button type="button" id="invia_prenota" class="prenota_interno deseleziona" title="Prenota Ora" tabindex="p"> <!--Prenota-->
                     
                Prenota Ora
                     
            </button>
        
        </center>
        
        <!--Inizio Notifica-->
        
        <div id='form_notifica'>
        
        	<p>
            </p>
            
        </div>
        
        <!--Fine Notifica-->
    
    </form>
    
    <!--Fine Form-->
    
    <div id="prenota_sfondo"> <!--Sfondo-->
    </div>

<!--</aside>
-->
<!--Fine Prenota Popup-->