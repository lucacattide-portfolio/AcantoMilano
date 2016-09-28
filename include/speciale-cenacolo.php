<div id="container_contenuti" rel="speciale-cenacolo"> <!--Inizio Container Chi Siamo-->

	<!--Inizio Sezione Cenacolo-->

	<section id="chi_siamo">
    
    	<h7> <!--Titolo-->
        
        	Speciale Cenacolo
        
        </h7>
        
       	<!--Inizio Summary-->
<?php 
   if( $countArticolo >= 1 ):
		while ($articolo = $rArt->fetch_array()): 
		
		$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." LIMIT 0,1 ";
	    $rImg = $mysqli->query($sqlImg);
		$countImg =  $rImg->num_rows;
		
		if( $countImg >= 1):
		
		 while ($immagine = $rImg->fetch_array()):
		  
		 $immagine2 =  $immagine["immagine_label"];
		 $i = 1;
		 
		 // ARTICOLO CON IMMAGINE 
		 ?>
         
   <article>
   
   			<header class="header_popup" style="background-image:url('<?php echo $siteurl_base; ?>img/<?php echo $immagine2;  ?>')">
            </header>
        
        	<!--Inizio Titoli-->
        
        	<hgroup>
        
                <h7> <!--Sezione-->
                
                    Summary
                    
                </h7>
                <h2 class="titolo_summary_2"> <!--Contenuti-->
                
                    <?php echo $articolo["articolo_titolo"]; ?>
                    
                </h2>
        
        	</hgroup>
            
            <!--Fine Titoli-->
             <?php  $articolo["articolo_sottotitolo"]; ?>
            <!--Inizio Corpo-->
            
            <div class="corpo_summary">
            
            	<?php echo $articolo["articolo_testo"]; ?>
            
            </div>
            
            <!--Fine Corpo-->
            
            <!--Inizio Date-->
            
            <!--Inizio Container-->
            
            <div class="elenco_date_dettaglio"> 
            
            	<center>
            
                    <!--Inizio Dettagli-->
                
                    <div class="data_dettaglio">
                    
                        <!--Inizio Data-->
                    
                        <span class="giorno_dettaglio">
                        
                            <span class="numero"> <!--Numero-->
                                
                                14
                            
                            </span>
                            <span class="mese"> <!--Mese-->
                            
                                Sett
                            
                            </span>
                            <span class="anno"> <!--Anno-->
                            
                                2016
                            
                            </span>
                        
                        </span>
                        
                        <!--Fine Data-->
                        
                        <span class="ora_dettaglio"> <!--Ora-->
                        
                            15:30
                            
                        </span>
                        
                        <!--Inizio Prenotazione-->
                       
                        <a class="prenota_interno deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
                   
                            Prenota Ora
                   
                        </a>
                     
                        <!--Fine Prenotazione-->    
                       
                        <!--Inizio Disponibilità-->
                            
                        <div class="disponibilita">
                        
                            <span class="dispo_icona <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                            </span>
                            <span class="dispo_label <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                            
                                Esaurito
                            
                            </span>
                        
                        </div>
                        
                        <!--Fine Disponibilità--> 
                    
                    </div>	
                    
                    <!--Fine Dettagli-->
                
                </center>
            
            </div>
            
            <!--Fine Container-->
            
            <!--Fine Date-->
            
            <!--Inizio PDF-->
           
           <center>
           
           		<?php
					
					$sqlImg2 = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." AND immagine_tipo LIKE 'application/pdf' LIMIT 0,1 ";
					$rImg2 = $mysqli->query($sqlImg2);
					$countImg2 =  $rImg2->num_rows;
					
					if ($countImg2 >= 1): 
					
						while ($immagine2 = $rImg2->fetch_array()):
					  
							$immagine3 =  $immagine2["immagine_label"];
					
				?>
           
           	   <a class="pulsante_pdf" href="<?php echo $siteurl_base."img/".$immagine3; ?>" target="_blank"  title="<?php echo $articolo["articolo_titolo"]; ?>">
           
                   <div class="pdf_popup deseleziona">
                   
                        <span class="pdf_icona"> <!--Icona-->
                        </span>
                        <span class="pdf_label"> <!--Label-->
                        
                            Scarica il PDF del tour guidato
                            
                        </span>
                   
                   
                   </div>
               
               </a>
               
               <?php
			   
			   			endwhile;
						
					endif;
			   
			   ?>
           
           </center>
           
           <!--Fine PDF-->
            
             <div style="clear:both;">
            </div>
        
        </article>
		
        <?php	  
		 
		 endwhile;
   endif; 
  endwhile;
 endif; 
?>       
       
            
    </section>
    
    <!--Finechi- Sezione Cenacolo-->

<!--Fine Container Cenacolo-->

</div>