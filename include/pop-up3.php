<?php 

	include("../admin/php/connessione_sql.php"); // Connessione DB 

	 // data setting
	  @date_default_timezone_set('Europe/Rome');
	  @setlocale(LC_ALL, 'it_IT');
	  @setlocale(LC_TIME, 'ita', 'it_IT.utf8');

?>


	<h7> <!--Titolo-->
    
    	Popup
        
    </h7>
    
    <div class="chiudi_popup chiudi"> <!--Chiudi-->
    
    	<span> <!--Icona-->
        </span>
    
    </div>
    
    <!--Inizio Contaniner Popup-->
    
    <div class="container_popup_verticale popup3">
    
    	<?php
		   $paginaId = $_GET["id"];
		   $siteurl_base = "http://www.acantomilano.it/beta/";
		   $sqlArticolo = "SELECT * FROM `articolo` WHERE articolo_id = ".$paginaId." AND articolo_visibile = 1  ";
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
                
                <header class="header_popup" style="background-image:url('<?php echo $siteurl_base; ?>img/<?php echo $immagine2;  ?>')">
                
					 <div class="logo_popup_1"> <!--Logo-->
					 </div>
                
            	</header>
                
                <!-- single img --> 
                
                <?php endwhile; ?>
                <?php elseif( $countImg > 1):   ?>
                
                  <header id="popup_slides" class="header_popup">	
                  
                  	<div class="logo_popup_1"> <!--Logo-->
					 </div>
				  
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
            
				<!--Inizio Facebook Widget-->
                    
                <div class="fb-share-button" data-href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.acantomilano.it%2F".$paginaUrl;
                
                /*"http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'];*/ ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                
                    <a class="fb-xfbml-parse-ignore social_share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "http%3A%2F%2Fwww.acantomilano.it%2F".$paginaUrl; ?>&amp;src=sdkpreparse">
                    
                        Condividi
                        
                    </a>
                    
                </div>
                
                <!--Fine Facebook Widget-->           
                   
            	<?php echo $articolo["articolo_testo"]; ?>

          </div>
            
            <!--Fine Corpo-->
            
             <!--Inizio Prenotazione-->
   
         
           <!--Fine Prenotazione--> 
            
            
            <!--Inizio Date-->
            
            
           
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
                        
            <!--Fine Container-->
            
                  <!--<!--Inizio Container-->
                  
                     
			<?php 

				if ($paginaId != "38" && $paginaId != "39"):

			?>
            
            <div class="elenco_date_dettaglio"> 
            
            	<center>
            
                    <!--Inizio Dettagli-->
                    
                    <?php
                             
                             $sqlArticoloDate = "SELECT * FROM `articolo` WHERE articolo_titolo LIKE '%".$articolo["articolo_titolo"]."%' AND `articolo_pagina_id` = '".$articolo["articolo_pagina_id"]."' AND articolo_visibile = 1 ORDER BY articolo_data_modifica ASC  ";
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
                        
                    
                    <!--Fine Dettagli---->
                
                </center>

                <div style="margin-bottom:20px;" class="clear"></div>
                
            </div>
            
            <!--Fine Date-->
                               
			<?php

				endif;

			?>
          
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