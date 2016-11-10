<div id="container_contenuti" rel="speciale-cenacolo"> <!--Inizio Container Chi Siamo-->

	<!--Inizio Sezione Cenacolo-->

	<section id="chi_siamo">
    
    	<h7> <!--Titolo-->
        
        	Speciale Cenacolo
        
        </h7>
        
       	<!--Inizio Summary-->
<?php 
   $sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 AND articolo_id = 56  ";
   $rArt2 = $mysqli->query($sqlArticolo2);
   $countArticolo2 =  $rArt2->num_rows;
   if( $countArticolo2 >= 1 ):
		while ($articolo = $rArt2->fetch_array()): 
		
		$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." LIMIT 0,1 ";
	    $rImg = $mysqli->query($sqlImg);
		$countImg =  $rImg->num_rows;

		if( $countImg >= 1):
		
		 while ($immagine = $rImg->fetch_array()):
		  
		 $immagine2 =  $immagine["immagine_label"];
		 $i = 1;
		 
		 // ARTICOLO CON IMMAGINE 
		  endwhile;
						
	     endif;
		 
		 ?>
         
   <article>
   
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
            
           <!-- <center> 
           
           		<a class="prenota_interno deseleziona prenotazione" href="<?php //echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p" rel="<?php //echo $articolo["articolo_id"]; ?>">
           
              		Prenota Ora
           
           		</a>
                -->
           </center>
            
            <!--Fine Corpo-->
            
            <!--Inizio Date-->
            
            <center>
           
           		<?php
					
					$sqlImg2 = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." AND immagine_tipo LIKE 'application/pdf' LIMIT 0,1 ";
					$rImg2 = $mysqli->query($sqlImg2);
					$countImg2 =  $rImg2->num_rows;
					
					if ($countImg2 >= 1): 
					
						while ($immagine2 = $rImg2->fetch_array()):
					  
							$immagine3 =  $immagine2["immagine_label"];
							
							 endwhile;
                      
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
			   
			   		 endif;		
						
			   
			   ?>
           
           </center>
           
           <!--Fine PDF-->
           
           
            
             <div style="clear:both;">
            </div>
            
            <!--Fine Container-->
              <center>
                
                 <!--Inizio Dettagli-->
                    
                    <?php
                             
                             $sqlArticoloDate = "SELECT * FROM `articolo` WHERE articolo_titolo LIKE '%".$articolo["articolo_titolo"]."%' AND `articolo_pagina_id` = '".$articolo["articolo_pagina_id"]."' AND articolo_visibile = 1 AND articolo_id != 56 ";
                             $rArtDate = $mysqli->query($sqlArticoloDate);
                             $countArticoloDate =  $rArtDate->num_rows;
                         
                             if( $countArticoloDate >= 1 ):
							 
								 while ($articoloD = $rArtDate->fetch_array()): 
                  
                          
                           ?>
                
                    <div class="data_dettaglio">
                    
                        <!--Inizio Data-->
                    
                        <span class="giorno_dettaglio">
                        
                            <span class="numero"> <!--Numero-->
                                
                                <?php echo date("d", strtotime($articoloD["articolo_data_modifica"])); ?>
                            
                            </span>
                            <span class="mese"> <!--Mese-->
                            
                               <?php echo strftime("%b", strtotime($articoloD["articolo_data_modifica"])); ?>
                               
                            
                            </span>
                            <span class="anno"> <!--Anno-->
                            
                                 <?php echo date("Y", strtotime($articoloD["articolo_data_modifica"])); ?>
                            
                            </span>
                        
                        </span>
                        
                        <!--Fine Data-->
                        
                        <span class="ora_dettaglio"> <!--Ora-->
                        
                             <?php echo date("H:i", strtotime($articoloD["articolo_data_modifica"])); ?>
                            
                        </span>
                        
                        <!--Inizio Prenotazione-->
                       
           		        <a class="prenota_interno deseleziona prenotazione" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p" rel="<?php echo $articoloD["articolo_id"]; ?>">
                   
                            Prenota Ora
                   
                        </a>
                     
                        <!--Fine Prenotazione-->   
                       
                          <!--Inizio Disponibilità-->
                          
             
                            <div class="disponibilita">
                          
                              <span class="dispo_icona <?php if ($articoloD["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articoloD["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
                                  Esaurito
                              
                              </span>
                          
                            </div>
                        
						
                        <!--Fine Disponibilità-->
                    
                    </div>	
                    
                 
                    
                      <?php
						      
						  endwhile;
					  
						endif;
                          
                        ?>
                        
                       </center>
                    <!--Fine Dettagli---->
                
            <!--Fine Date-->
            
            <!--Inizio PDF-->
           
           
        
        </article>
		
        <?php	  
		 
 
  endwhile;
 endif; 
?>       
       
            
    </section>
    
    <!--Finechi- Sezione Cenacolo-->

<!--Fine Container Cenacolo-->

</div>