 <?php
 
      include("../admin/php/connessione_sql.php"); // Connessione DB 
	  
      // data setting
	  @date_default_timezone_set('Europe/Rome');
	  @setlocale(LC_ALL, 'it_IT');
	  @setlocale(LC_TIME, 'ita', 'it_IT.utf8');

      
	     $paginaId = $_POST["dataId"];
	     $dateCurrentMonth = date('Y-m', strtotime($_POST["datarif"]) ); // MESE CORRENTE
	     $giorni = date("t",strtotime($dateCurrentMonth)); // Giorni in un mese
	     $dateNextMonth = date('Y-m', strtotime('+1 month', strtotime($dateCurrentMonth)));
	     $datePrevMonth = date('Y-m', strtotime('-1 month', strtotime($dateCurrentMonth)));
		     
	     $sqlArticoloAB = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND (articolo_data_modifica BETWEEN '".$dateCurrentMonth."-1' AND '".$dateNextMonth."-1') AND articolo_id != 22 AND articolo_visibile = 1 GROUP BY DATE_FORMAT(articolo_data_modifica,'%Y-%m-%d') ORDER BY articolo_data_modifica ASC ";
		 $rArtAB = $mysqli->query($sqlArticoloAB);
		 $countArticoloAB =  $rArtAB->num_rows;
		 if( $countArticoloAB >= 1 ):
		   while ($articoloAB = $rArtAB->fetch_array()):  
		   
		    
			
		     $sqlArticoloInt = "SELECT * FROM `articolo` WHERE articolo_pagina_id = '".$paginaId."' AND DATE_FORMAT(articolo_data_modifica,'%Y-%m-%d') = '".date('Y-m-d', strtotime($articoloAB["articolo_data_modifica"]))."' AND articolo_id != 22 AND articolo_visibile = 1 GROUP BY articolo_titolo  ORDER BY articolo_data_modifica ASC ";
			 $rArtInt = $mysqli->query($sqlArticoloInt);
			 $countArticoloInt =  $rArtInt->num_rows;
			   if( $countArticoloInt > 1 ):
			   $i = 1;
			    else:
			   $i = 0;
			   endif;
			 
			   while ($articoloInt = $rArtInt->fetch_array()):  
			   
	       
		   ?>

            <div class="container_evento">
            
            	<!--Inizio Riga-->
                
                <div class="riga">
            
                  <!--Inizio Info 1-->
                  
                  <div class="info_1 info_container">
              
                          <!--Inizio Data-->
                          
                          <div class="<?php if( $i == 1 || $i == 0  ): echo "data_evento_dettaglio"; else:  echo "data_evento_dettaglio2";  endif; ?>">
                          <?php if( $i == 1 || $i == 0  ):  ?>
                              <span class="giorno_evento_dettaglio"> <!--Giorno-->
                               
                                 <?php echo date("d", strtotime($articoloInt["articolo_data_modifica"])); ?>
                                  
                              </span>
                              <span class="mese_evento_dettaglio"> <!--Mese-->
                              
                                 <?php echo utf8_encode( strftime("%b", strtotime($articoloInt["articolo_data_modifica"]))); ?>
                                  
                              </span>
                              <span class="anno_evento_dettaglio"> <!--Anno-->
                              
                                 <?php echo date("Y", strtotime($articoloInt["articolo_data_modifica"])); ?>
                                  
                              </span>
                          <?php endif; ?>
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
						    
							$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articoloInt["articolo_id"]." AND immagine_tipo NOT LIKE 'application/pdf' LIMIT 0,1 ";
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
                                  
                             <?php echo $articoloInt["articolo_titolo"]; ?>
                                      
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
                          
                           <?php echo date("H:i", strtotime($articoloInt["articolo_data_modifica"])); ?>
                          
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
                              
                              <span class="dispo_icona <?php if ($articoloInt["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articoloInt["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
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
                         
                         
                          <a class="prenota_interno leggi-tutto deseleziona" href="<?php echo $siteurl_base; ?>include/pop-up3.php" rel="<?php echo $articoloInt["articolo_id"]; ?>" data-id="" title="Prenota Ora" tabindex="p">
                 
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
			           $i++;
			       endwhile;
			    endwhile;
			 endif;
		   
			?>
           
	
        
       