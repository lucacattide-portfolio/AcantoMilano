
	<section id="calendario_dettagli">
    
    	<h7> <!--Titolo-->
        
        	Calendario - Dettagli
        
        </h7>
        
        <!--Inizio Header-->
        
        <div id="header_dettagli">
        
        	<h2 id="titolo_dettagli"> <!--Titolo-->
            
            	<?php echo utf8_encode( strftime("%B %Y", strtotime($dateCurrentMonth)) );  ?> <hr />
            
            </h2>
        
        </div>
        
        <!--Fine Header-->
        
        <!--Inizio Contenuti Dettagli-->
        
        <div id="dettagli_contenuti">
        
        	<!--Inizio Evento-->
           <?php
		    $dateCurrentMonth = date('Y-m', strtotime(strtotime($dateCurrentMonth)));
		     
			 $sqlArticoloAB = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND date(articolo_data_modifica) >= '".$dateCurrentMonth."' AND articolo_id != 22 AND articolo_visibile = 1  ";
			 $rArtAB = $mysqli->query($sqlArticoloAB);
			 $countArticoloAB =  $rArtAB->num_rows;
			 if( $countArticoloAB >= 1 ):
			   while ($articoloAB = $rArtAB->fetch_array()):  
	
		   ?>

            <div class="container_evento">
            
            	<!--Inizio Riga-->
                
                <div class="riga">
            
                  <!--Inizio Info 1-->
                  
                  <div class="info_1 info_container">
              
                          <!--Inizio Data-->
                          
                          <div class="data_evento_dettaglio">
                          
                              <span class="giorno_evento_dettaglio"> <!--Giorno-->
                              
                                 <?php echo date("d", strtotime($articoloAB["articolo_data_modifica"])); ?>
                                  
                              </span>
                              <span class="mese_evento_dettaglio"> <!--Mese-->
                              
                                 <?php echo utf8_encode( strftime("%b", strtotime($articoloAB["articolo_data_modifica"]))); ?>
                                  
                              </span>
                              <span class="anno_evento_dettaglio"> <!--Anno-->
                              
                                 <?php echo date("Y", strtotime($articoloAB["articolo_data_modifica"])); ?>
                                  
                              </span>
                          
                          </div>
                          
                          <!--Fine Data-->
                  
                  </div>
                  
                  <!--Fine Info 1-->
                  
                  <!--Inizio Info 2-->
                  
                  <div class="info_2 info_container">
                  
                      <!--Inizio Foto-->
                      
                      <!--Inizio Container-->
                      
                      <div class="container_foto_evento_dettaglio">
                      
                          <!--Inizio Immagine-->
                           <?php 
						    
							$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articoloAB["articolo_id"]." AND immagine_tipo NOT LIKE 'application/pdf' LIMIT 0,1 ";
							$rImg = $mysqli->query($sqlImg);
							$countImg =  $rImg->num_rows;
							
							if( $countImg >= 1):
							
							   while ($immagine = $rImg->fetch_array()):
							   
							   $immagine4 = $immagine["immagine_label"];
						    
						     ?>
                           
                      
                          <div class="immagine_evento_dettaglio" style="background-image:url(<?php echo $siteurl_base; ?>img/<?php echo $immagine4; ?>)">
                          </div>
                          
                             
                            <?php 
						      
							  endwhile;
							  
							 endif; 
						   
						     ?>  
                          
                          <!--Fine Immagine-->
                          
                          <!--Inizio Titolo-->
                          
                          <div class="titolo_evento_dettaglio">
                                  
                             <?php echo $articoloAB["articolo_titolo"]; ?>
                                      
                          </div>
                          
                          <!--Fine Titolo-->
                      
                      </div>
                      
                      <!--Fine Container-->
                      
                      <!--Fine Foto-->
                  
                  </div>
                  
                  <!--Fine Info 2-->
                  
                  <!--Inizio Info 3-->
                  
                  <div class="info_3 info_container">
                  
                      <!--Inizio Orario-->
                      
                      <div class="orario_evento_dettaglio">
                      
                          Ore
                          
                          <span class="ora_evento_dettaglio">
                          
                           <?php echo date("H:i", strtotime($articoloAB["articolo_data_modifica"])); ?>
                          
                          </span>
                      
                      </div>
                      
                      <!--Fine Orario-->
                  
                  </div>
                  
                  <!--Fine Info 3-->
                  
                  <!--Inizio Info 4-->
                  
                  <div class="info_4 info_container">
                  
                      <!--Inizio Disponibilità-->
                      
                      <div class="disponibilita_evento_dettaglio">
                      
                          <div class="disponibilita">
                              
                              <span class="dispo_icona <?php if ($articoloAB["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articoloAB["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
                                  Esaurito
                              
                              </span>
                          
                          </div>
                      
                      </div>
                      
                      <!--Fine Disponibilità-->
                  
                  </div>
                  
                  <!--Fine Info 4-->
                  
                  <!--Inizio Info 5-->
                  
                  <div class="info_5 info_container">
                  
                      <!--Inizio Prenotazione-->
                      
                      <div class="prenotazione_evento_dettaglio cal">
                         
                         
                          <a class="prenota_interno leggi-tutto deseleziona" href="<?php echo $siteurl_base; ?>include/pop-up3.php" rel="<?php echo $articoloAB["articolo_id"]; ?>" data-id="" title="Prenota Ora" tabindex="p">
                 
                              Penota Ora
                 
                          </a>
                      
                      </div>
                      
                      <!--Fine Prenotazione-->
                  
                  </div>
                  
                  <!--Fine Info 5-->
                
                </div>
                
                <!--Fine Riga-->
                            
            </div>
            
            <?php 
			
			    endwhile;
			 endif;
		   
			?>
           
	
        
        </div>
        
        <!--Fine Contenuti Dettagli-->
            
    </section>