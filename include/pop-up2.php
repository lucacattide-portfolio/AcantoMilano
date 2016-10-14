<?php include("../admin/php/connessione_sql.php"); // Connessione DB ?>
	<h7> <!--Titolo-->
    
    	Popup
        
    </h7>
    
    <div class="logo_popup_1"> <!--Logo-->
    </div>
    
    <div class="chiudi_popup chiudi"> <!--Chiudi-->
    
    	<span> <!--Icona-->
        </span>
    
    </div>
    
    <!--Inizio Contaniner Popup-->
    
    <div class="container_popup_verticale popup2">
    
    	<?php
		   $paginaId = $_GET["id"];
		   $siteurl_base = "http://www.acantomilano.it/beta/";
		   $sqlArticolo = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 ";
		   $rArt = $mysqli->query($sqlArticolo);
		   $countArticolo =  $rArt->num_rows;
		
			if( $countArticolo >= 1 ):
			   
				while ($articolo = $rArt->fetch_array()): 
				 $sqlPaginaLoop = "SELECT * FROM `pagina` WHERE `pagina_id` = '".$articolo["articolo_pagina_id"]."' ";
				 $rPaginaLoop = $mysqli->query( $sqlPaginaLoop );
				 $countPaginaLoop =  $rPaginaLoop->num_rows;
				 if($countPaginaLoop >= 1):
				 while ($PaginaLoop = $rPaginaLoop->fetch_array()): $paginaUrl = $PaginaLoop["pagina_url"]; 
				 endwhile;
				 endif;
				
				$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." AND immagine_tipo NOT LIKE 'application/pdf' ";
				$rImg = $mysqli->query($sqlImg);
				$countImg =  $rImg->num_rows;
				
				
				 
				 // ARTICOLO CON IMMAGINE
		 ?>
    
    	<article>
        
        	<!--Inizio Header-->
            
          <?php if( $countImg == 1): ?>
                 
                <?php 
				
				  while ($immagine = $rImg->fetch_array()):
				  
				  $immagine2 =  $immagine["immagine_label"];
				
				?>
            
                <!-- single img -->  
                
                <header class="header_popup" style="background-image:url('<?php echo $siteurl_base; ?>img/<?php echo $immagine2;  ?>')">
                
                	 <!--Inizio Facebook Widget-->
                    
                <div class="fb-share-button" data-href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.acantomilano.it%2F".$paginaUrl;
                
                /*"http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'];*/ ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                
                    <a class="fb-xfbml-parse-ignore social_share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "http%3A%2F%2Fwww.acantomilano.it%2F".$paginaUrl; ?>&amp;src=sdkpreparse">
                    
                        Condividi
                        
                    </a>
                    
                </div>
                
                <!--Fine Facebook Widget-->  
                
                </header>
                
                <?php endwhile; ?>
                <?php elseif( $countImg > 1):   ?>
                
                  <header id="popup_slides" class="header_popup">	
				  
                   <!--Inizio Container Slideshow-->
    
                  <ul class="slides-container">
				  
				  <?php  while ($immagine = $rImg->fetch_array()):
				  
				  $immagine2 =  $immagine["immagine_label"];
				
				?>
                  <!-- loop gallery --> 
                  
                 
                  
                      <!--Inizio Elemento-->
                     
                    <li>
                  
                         <div class="foto_home carousel" style="background-image:url('<?php echo $siteurl_base; ?>img/<?php echo $immagine2;  ?>')"> <!--Foto-->
                         </div>
                          
                      </li>

                    <!--Fine Elemento-->
                  
                 
                  
                <?php endwhile; ?>
                
                 </ul>
                  
                  <!--Fine Container Slideshow-->  
                
                 </header>
                 
                <!-- inset gallery close -->
                
                <?php endif; ?>		
            
            
        
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
            
            <div class="corpo_summary" data-mcs-theme="rounded-dark">
                      
            	<?php echo $articolo["articolo_testo"]; ?>

          </div>
            
            <!--Fine Corpo-->
            
            <!--Inizio Date-->
            
            <!--<!--Inizio Container--
            
            <div class="elenco_date_dettaglio"> 
            
            	<center>
            
                    <!--Inizio Dettagli--
                
                    <div class="data_dettaglio">
                    
                        <!--Inizio Data--
                    
                        <span class="giorno_dettaglio">
                        
                            <span class="numero"> <!--Numero--
                                
                                14
                            
                            </span>
                            <span class="mese"> <!--Mese--
                            
                                Sett
                            
                            </span>
                            <span class="anno"> <!--Anno--
                            
                                2016
                            
                            </span>
                        
                        </span>
                        
                        <!--Fine Data--
                        
                        <span class="ora_dettaglio"> <!--Ora--
                        
                            15:30
                            
                        </span>
                        
                        <!--Inizio Prenotazione--
                       
                        <a class="prenota_interno deseleziona prenotazione" href="<?php //echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p" rel="<?php //echo $articolo["articolo_id"]; ?>">
                   
                            Prenota Ora
                   
                        </a>
                     
                        <!--Fine Prenotazione--  
                       
                        <!--Inizio Disponibilità--
                            
                        <div class="disponibilita">
                        
                            <span class="dispo_icona <?php //if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona--
                            </span>
                            <span class="dispo_label <?php //if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta--
                            
                                Esaurito
                            
                            </span>
                        
                        </div>
                        
                        <!--Fine Disponibilità--
                    
                    </div>	
                    
                    <!--Fine Dettagli--
                
                </center>
            
            </div>
            
            <!--Fine Container---->
            
            <!--Fine Date-->
            
            <!--Inizio Prenotazione-->
            
            <center> 
           
           		<a class="prenota_interno deseleziona prenotazione" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p" rel="<?php echo $articolo["articolo_id"]; ?>">
           
              		Prenota Ora
           
           		</a>
                
           </center>
         
           <!--Fine Prenotazione-->    
           
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
           
           	   <a class="pulsante_pdf" href="<?php echo $siteurl_base."img/".$immagine3; ?>" target="_blank"  title="<?php echo $articolo["articolo_titolo"]; ?>" >
           
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
 
 		?>
        
	</div>
        
        <!--Fine Elenco-->
    
    </div>
    
    <!--Fine Contaniner Popup-->