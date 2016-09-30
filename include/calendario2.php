<div id="container_contenuti" rel="calendario"> 
    
	<?php
	  $dateCurrentMonth = date('Y-m'); // MESE CORRENTE
	  $giorni = date("t",strtotime($dateCurrentMonth)); // Giorni in un mese
	  $dateNextMonth = date('Y-m', strtotime('+1 month', strtotime($dateCurrentMonth)));
	  $datePrevMonth = date('Y-m', strtotime('-1 month', strtotime($dateCurrentMonth)));
	?>

    <section class="sezione-calendario1">
         <section class="box-calendario">
           <h2 class="box-intestazione"> 
             <a class="arrow" rel="<?php echo $datePrevMonth; ?>"></a> 
			  <?php echo utf8_encode( strftime("%B %Y", strtotime($dateCurrentMonth)) ); ?> 
             <a class="arrow" rel="<?php echo $dateNextMonth; ?>"></a> 
           </h2>
           <section class="calendario-counter">
               
               <div class="calendario">
                 <div class="int-giorni">
                  <div class="box-int">Lun</div>
                  <div class="box-int">Mar</div>
                  <div class="box-int">Mer</div>
                  <div class="box-int">Gio</div>
                  <div class="box-int">Ven</div>
                  <div class="box-int">Sab</div>
                  <div class="box-int">Dom</div>
                 </div>
            
                
                 <div class="int-date">
                 <?php 
				 
				  // ciclo dei giorni
				 
				  for( $i = 1; $i <= $giorni; $i++ ){
				   $NomeGiornoAbbreviato = strftime("%a", strtotime("".date("Y")."-".date("m")."-".$i.""));
				   
				
				    if( $i == 1 ){
					
					       if( $NomeGiornoAbbreviato == "lun" ){ ?>
                                 <div class="box-int">
                                  <?php echo $i; ?>
                                 </div>
                               <?php }elseif( $NomeGiornoAbbreviato == "mar" ){ ?>   
                             
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                     <?php echo $i; ?>
                                   </div>
                                 
                               <?php }elseif( $NomeGiornoAbbreviato == "mer" ){ ?>    
                         
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                     <?php echo $i; ?>
                                   </div>  
                                   
                               <?php }elseif( $NomeGiornoAbbreviato == "gio" ){ ?>    
                                   
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                     <?php echo $i; ?>
                                   </div>  
                                    
                               <?php }elseif( $NomeGiornoAbbreviato == "ven" ){ ?>    
                                   
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                     <?php echo $i; ?>
                                   </div>   
                                                   
                                <?php }elseif( $NomeGiornoAbbreviato == "sab" ){ ?>    
                                
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                     <?php echo $i; ?>
                                   </div> 
                                   
                                <?php }elseif( $NomeGiornoAbbreviato == "dom" ){ ?>    
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                    &nbsp;
                                   </div>
                                   <div class="box-int">
                                     <?php echo $i; ?>
                                   </div> 
        
                                <?php }
					
					}elseif( $i == $giorni ){
						
							   if( $NomeGiornoAbbreviato == "lun" ): ?>
								  
									 <div class="box-int">
									   <?php echo $i; ?>
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div>
									 <div class="box-int">
									  &nbsp;
									 </div>
									 <div class="box-int">
									  &nbsp;
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div>   
									 <div class="box-int">
									  &nbsp;
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div> 
								   
								<?php elseif( $NomeGiornoAbbreviato == "mar" ): ?>   
							   
									 <div class="box-int">
									   <?php echo $i; ?>
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div>
									 <div class="box-int">
									  &nbsp;
									 </div>
									 <div class="box-int">
									  &nbsp;
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div>   
									 <div class="box-int">
									  &nbsp;
									 </div>   
															 
								<?php elseif( $NomeGiornoAbbreviato == "mer" ): ?>    
						   
									 <div class="box-int">
									   <?php echo $i; ?>
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div>
									 <div class="box-int">
									  &nbsp;
									 </div>
									 <div class="box-int">
									  &nbsp;
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div>  
									 
								<?php elseif( $NomeGiornoAbbreviato == "gio" ): ?>    
									 
									 <div class="box-int">
									   <?php echo $i; ?>
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div>
									 <div class="box-int">
									  &nbsp;
									 </div>
									 <div class="box-int">
									  &nbsp;
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div> 
									 
													 
								 <?php elseif( $NomeGiornoAbbreviato == "ven" ): ?>    
									 
									 <div class="box-int">
									   <?php echo $i; ?>
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div>
									 <div class="box-int">
									  &nbsp;
									 </div>
									 
								 <?php elseif( $NomeGiornoAbbreviato == "sab" ): ?>    
									
									 
									 <div class="box-int">
									   <?php echo $i; ?>
									 </div> 
									 <div class="box-int">
									  &nbsp;
									 </div>
									 
								 <?php elseif( $NomeGiornoAbbreviato == "dom" ): ?>    
									 
									 <div class="box-int">
									   <?php echo $i; ?>
									 </div> 
												 
												 
								  <?php endif; 
					
						}else{ ?>
							
						   <div class="box-int">
								 <?php echo $i; ?>
							   </div>  
								
				<?php	
				        }
				
				   }
		  
                ?>
           
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 <?php 
				  
				 
				    
					/*
					
					if( $i == 1 ):
					
					  
						
						
						elseif( $i == $giorni ):  
						
							
						
						
						
						else: ?>    
                  
                           <div class="box-int">
                             <?php echo $i; ?>
                           </div>  
				 			 
				         <?php endif; ?>

                  <?php endfor; */ ?>
                 </div>
                 

               </div>
               
             
           </section>
         </section>
         <section class="box-calendario">
           <h2 class="box-intestazione"> Eventi in Evidenza </h2>
         
         </section>
         <section class="box-calendario" style="background-image:url(<?php echo $siteurl_base; ?>img/A7-Leo-Scala-Sera.jpg)">
           <h2 class="box-intestazione"> 08 Settembre 2016 </h2>
         
         </section>
    </section>
    
    <!--Inizio Calendario - Dettagli-->

	<section id="calendario_dettagli">
    
    	<h7> <!--Titolo-->
        
        	Calendario - Dettagli
        
        </h7>
        
        <!--Inizio Header-->
        
        <div id="header_dettagli">
        
        	<h2 id="titolo_dettagli"> <!--Titolo-->
            
            	Settembre 2016 <hr />
            
            </h2>
        
        </div>
        
        <!--Fine Header-->
        
        <!--Inizio Contenuti Dettagli-->
        
        <div id="dettagli_contenuti" class="mCustomScrollbar" data-mcs-theme="rounded-dark">
        
        	<!--Inizio Evento-->
        
        	<div class="container_evento">
            
            	<!--Inizio Riga-->
                
                <div class="riga">
            
                  <!--Inizio Info 1-->
                  
                  <div class="info_1 info_container">
              
                          <!--Inizio Data-->
                          
                          <div class="data_evento_dettaglio">
                          
                              <span class="giorno_evento_dettaglio"> <!--Giorno-->
                              
                                  02
                                  
                              </span>
                              <span class="mese_evento_dettaglio"> <!--Mese-->
                              
                                  Sett
                                  
                              </span>
                              <span class="anno_evento_dettaglio"> <!--Anno-->
                              
                                  2016
                                  
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
                      
                          <div class="immagine_evento_dettaglio">
                          
                              <img src="img/evento_dettaglio.png" alt="" /> 
                          
                          </div>
                          
                          <!--Fine Immagine-->
                          
                          <!--Inizio Titolo-->
                          
                          <div class="titolo_evento_dettaglio">
                                  
                              Titolo dell’Evento in programma nel calendario...
                                      
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
                          
                              09:15
                          
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
                              
                              <span class="dispo_icona <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
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
                      
                          <a class="prenota_interno deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
                 
                              Prenota Ora
                 
                          </a>
                      
                      </div>
                      
                      <!--Fine Prenotazione-->
                  
                  </div>
                  
                  <!--Fine Info 5-->
                
                </div>
                
                
                
                
                
                
                
                
                
                <div class="riga">
            
                  <!--Inizio Info 1-->
                  
                  <div class="info_1 info_container">
              
                          <!--Inizio Data-->
                          
                          <div class="data_evento_dettaglio">
                          
                              <span class="giorno_evento_dettaglio"> <!--Giorno-->
                              
                                  02
                                  
                              </span>
                              <span class="mese_evento_dettaglio"> <!--Mese-->
                              
                                  Sett
                                  
                              </span>
                              <span class="anno_evento_dettaglio"> <!--Anno-->
                              
                                  2016
                                  
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
                      
                          <div class="immagine_evento_dettaglio">
                          
                              <img src="img/evento_dettaglio.png" alt="" /> 
                          
                          </div>
                          
                          <!--Fine Immagine-->
                          
                          <!--Inizio Titolo-->
                          
                          <div class="titolo_evento_dettaglio">
                                  
                              Titolo dell’Evento in programma nel calendario...
                                      
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
                          
                              09:15
                          
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
                              
                              <span class="dispo_icona <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
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
                      
                          <a class="prenota_interno deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
                 
                              Prenota Ora
                 
                          </a>
                      
                      </div>
                      
                      <!--Fine Prenotazione-->
                  
                  </div>
                  
                  <!--Fine Info 5-->
                
                </div>
                <div class="riga">
            
                  <!--Inizio Info 1-->
                  
                  <div class="info_1 info_container">
              
                          <!--Inizio Data-->
                          
                          <div class="data_evento_dettaglio">
                          
                              <span class="giorno_evento_dettaglio"> <!--Giorno-->
                              
                                  02
                                  
                              </span>
                              <span class="mese_evento_dettaglio"> <!--Mese-->
                              
                                  Sett
                                  
                              </span>
                              <span class="anno_evento_dettaglio"> <!--Anno-->
                              
                                  2016
                                  
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
                      
                          <div class="immagine_evento_dettaglio">
                          
                              <img src="img/evento_dettaglio.png" alt="" /> 
                          
                          </div>
                          
                          <!--Fine Immagine-->
                          
                          <!--Inizio Titolo-->
                          
                          <div class="titolo_evento_dettaglio">
                                  
                              Titolo dell’Evento in programma nel calendario...
                                      
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
                          
                              09:15
                          
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
                              
                              <span class="dispo_icona <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
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
                      
                          <a class="prenota_interno deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
                 
                              Prenota Ora
                 
                          </a>
                      
                      </div>
                      
                      <!--Fine Prenotazione-->
                  
                  </div>
                  
                  <!--Fine Info 5-->
                
                </div>
                <div class="riga">
            
                  <!--Inizio Info 1-->
                  
                  <div class="info_1 info_container">
              
                          <!--Inizio Data-->
                          
                          <div class="data_evento_dettaglio">
                          
                              <span class="giorno_evento_dettaglio"> <!--Giorno-->
                              
                                  02
                                  
                              </span>
                              <span class="mese_evento_dettaglio"> <!--Mese-->
                              
                                  Sett
                                  
                              </span>
                              <span class="anno_evento_dettaglio"> <!--Anno-->
                              
                                  2016
                                  
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
                      
                          <div class="immagine_evento_dettaglio">
                          
                              <img src="img/evento_dettaglio.png" alt="" /> 
                          
                          </div>
                          
                          <!--Fine Immagine-->
                          
                          <!--Inizio Titolo-->
                          
                          <div class="titolo_evento_dettaglio">
                                  
                              Titolo dell’Evento in programma nel calendario...
                                      
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
                          
                              09:15
                          
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
                              
                              <span class="dispo_icona <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
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
                      
                          <a class="prenota_interno deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
                 
                              Prenota Ora
                 
                          </a>
                      
                      </div>
                      
                      <!--Fine Prenotazione-->
                  
                  </div>
                  
                  <!--Fine Info 5-->
                
                </div>
                
                <!--Fine Riga-->
                
                <div class="clear">
                </div>
                            
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="container_evento">
            
            	<!--Inizio Riga-->
                
                <div class="riga">
            
                  <!--Inizio Info 1-->
                  
                  <div class="info_1 info_container">
              
                          <!--Inizio Data-->
                          
                          <div class="data_evento_dettaglio">
                          
                              <span class="giorno_evento_dettaglio"> <!--Giorno-->
                              
                                  02
                                  
                              </span>
                              <span class="mese_evento_dettaglio"> <!--Mese-->
                              
                                  Sett
                                  
                              </span>
                              <span class="anno_evento_dettaglio"> <!--Anno-->
                              
                                  2016
                                  
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
                      
                          <div class="immagine_evento_dettaglio">
                          
                              <img src="img/evento_dettaglio.png" alt="" /> 
                          
                          </div>
                          
                          <!--Fine Immagine-->
                          
                          <!--Inizio Titolo-->
                          
                          <div class="titolo_evento_dettaglio">
                                  
                              Titolo dell’Evento in programma nel calendario...
                                      
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
                          
                              09:15
                          
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
                              
                              <span class="dispo_icona <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
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
                      
                          <a class="prenota_interno deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
                 
                              Prenota Ora
                 
                          </a>
                      
                      </div>
                      
                      <!--Fine Prenotazione-->
                  
                  </div>
                  
                  <!--Fine Info 5-->
                
                </div>
                
                <!--Fine Riga-->
                            
            </div>
        	<div class="container_evento">
            
            	<!--Inizio Riga-->
                
                <div class="riga">
            
                  <!--Inizio Info 1-->
                  
                  <div class="info_1 info_container">
              
                          <!--Inizio Data-->
                          
                          <div class="data_evento_dettaglio">
                          
                              <span class="giorno_evento_dettaglio"> <!--Giorno-->
                              
                                  02
                                  
                              </span>
                              <span class="mese_evento_dettaglio"> <!--Mese-->
                              
                                  Sett
                                  
                              </span>
                              <span class="anno_evento_dettaglio"> <!--Anno-->
                              
                                  2016
                                  
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
                      
                          <div class="immagine_evento_dettaglio">
                          
                              <img src="img/evento_dettaglio.png" alt="" /> 
                          
                          </div>
                          
                          <!--Fine Immagine-->
                          
                          <!--Inizio Titolo-->
                          
                          <div class="titolo_evento_dettaglio">
                                  
                              Titolo dell’Evento in programma nel calendario...
                                      
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
                          
                              09:15
                          
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
                              
                              <span class="dispo_icona <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
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
                      
                          <a class="prenota_interno deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
                 
                              Prenota Ora
                 
                          </a>
                      
                      </div>
                      
                      <!--Fine Prenotazione-->
                  
                  </div>
                  
                  <!--Fine Info 5-->
                
                </div>
                
                <!--Fine Riga-->
                            
            </div>
			<div class="container_evento">
            
            	<!--Inizio Riga-->
                
                <div class="riga">
            
                  <!--Inizio Info 1-->
                  
                  <div class="info_1 info_container">
              
                          <!--Inizio Data-->
                          
                          <div class="data_evento_dettaglio">
                          
                              <span class="giorno_evento_dettaglio"> <!--Giorno-->
                              
                                  02
                                  
                              </span>
                              <span class="mese_evento_dettaglio"> <!--Mese-->
                              
                                  Sett
                                  
                              </span>
                              <span class="anno_evento_dettaglio"> <!--Anno-->
                              
                                  2016
                                  
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
                      
                          <div class="immagine_evento_dettaglio">
                          
                              <img src="img/evento_dettaglio.png" alt="" /> 
                          
                          </div>
                          
                          <!--Fine Immagine-->
                          
                          <!--Inizio Titolo-->
                          
                          <div class="titolo_evento_dettaglio">
                                  
                              Titolo dell’Evento in programma nel calendario...
                                      
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
                          
                              09:15
                          
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
                              
                              <span class="dispo_icona <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
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
                      
                          <a class="prenota_interno deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
                 
                              Prenota Ora
                 
                          </a>
                      
                      </div>
                      
                      <!--Fine Prenotazione-->
                  
                  </div>
                  
                  <!--Fine Info 5-->
                
                </div>
                
                <!--Fine Riga-->
                            
            </div>
            <!--Fine Evento-->
        
        </div>
        
        <!--Fine Contenuti Dettagli-->
            
    </section>
    
    <!--Fine Calendario - Dettagli-->

	<!--Inizio Apertura Calendario-->

	<aside id="apertura_calendario" class="deseleziona">
    
    	<!--Inizio Titoli-->
    
    	<hgroup>
    
            <h7> <!--Titolo-->
            
                Calendario - Mostra Tutto
            
            </h7>
            <h2 id="apertura_titolo"> 
                
                CLICCA SULLA FRECCIA ALLA DESTRA DELLO SCHERMO PER MOSTRARE TUTTI GLI EVENTI DEL MESE NEL CALENDARIO
                    
                <!--Inizio Pulsante-->
                
                <div id="pulsante_apertura_cal">
                </div>
                
                <!--Inizio Pulsante-->     
                           
            </h2>
        
        </hgroup>
        
        <!--Fine Titoli-->
        
    </aside>
    
    <!--Fine Apertura Calendario-->
    
    <!--Inizio Correlati-->
    
    <section id="correlati">
    
    	<h7> <!--Titolo-->
        
        	Eventi Correlati
            
        </h7>
        
        <?php
		
		 $sqlArticolo20 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_gallery_id = 1 AND articolo_id != 22 AND articolo_visibile = 1  ";
		 $rArt20 = $mysqli->query($sqlArticolo20);
		 $countArticolo20 =  $rArt20->num_rows;
		 if( $countArticolo20 >= 1 ):
		   while ($articolo20 = $rArt20->fetch_array()): 
		   
		   
		        $sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo20["articolo_id"]." AND immagine_tipo NOT LIKE 'application/pdf' LIMIT 0,1 ";
				$rImg = $mysqli->query($sqlImg);
				$countImg =  $rImg->num_rows;
				
				if( $countImg >= 1):
				
				   while ($immagine = $rImg->fetch_array()):
					
				   $immagine2 =  $immagine["immagine_label"]; 
			
				 endwhile;
			   endif;
	
				
				
				 
				 	// ARTICOLO CON IMMAGINE
		
		?>
    
    	<a href="<?php echo $siteurl_base; ?>include/pop-up3.php" rel="<?php echo $articolo20["articolo_id"]; ?>" title="<?php echo $articolo20["articolo_titolo"]; ?>">
        
            <div class="evento_correlato" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine2; ?>)">
            
                <span class="pulsante_box">
                
                    <?php echo $articolo20["articolo_titolo"]; ?>
                
                </span>
            
            </div>
        
        </a>
    
    	<?php
		
			   		
					
  				endwhile;
				
 			endif; 
		
		?>
    
    </section>
        
    <!--Fine Correlati-->
    
    <!--Inizio Scarica PDF-->
    
    <a href="#" title="Scarica il PDF del Calendario">
    
        <aside class="pdf_cal">
         
            <h7> <!--Titolo-->
            
                Scarica PDF
                
            </h7>
            
            <div class="pdf_cal_label">
            
                <span class="etichetta"> 
                
                    Scarica il PDF del Calendario
                    
                </span>
                <span class="icona"> <!--Icona-->
                </span>
                        
            </div>
        
        </aside>
    
    </a>
    
    <!--Fine Scarica PDF-->
    
</div>