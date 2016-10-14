<div id="container_contenuti" rel="speciale-cenacolo"> <!--Inizio Container Chi Siamo-->

	<!--Inizio Sezione Cenacolo-->

	<section id="chi_siamo">
    
    	<h7> <!--Titolo-->
        
        	Speciale Cenacolo
        
        </h7>
        
       	<!--Inizio Summary-->
<?php 
   $sqlArticolo = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1  LIMIT 0,1";
   $rArt = $mysqli->query($sqlArticolo);
   $countArticolo =  $rArt->num_rows;
   
   if( $countArticolo >= 1 ):
		while ($articolo = $rArt->fetch_array()): 
		
		$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." LIMIT 0,5";
	    $rImg = $mysqli->query($sqlImg);
		$countImg =  $rImg->num_rows;

		
		 
		
		 
		 ?>
         
   <article>
   
   			<header class="header_popup" >
            
               <div class="fb-share-button" data-href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.acantomilano.it%2F".$paginaUrl;
				
				/*"http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'];*/ ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                
                    <a class="fb-xfbml-parse-ignore social_share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "http%3A%2F%2Fwww.acantomilano.it%2F".$paginaUrl; ?>&amp;src=sdkpreparse">
                    
                        Share
                        
                    </a>
                    
                </div>
            
              <ul class="slides-container">
               <?php  
			   
			   
	     if( $countImg == 1):
		
		 while ($immagine = $rImg->fetch_array()):
		  
		 $immagine2 =  $immagine["immagine_label"];
		 $i = 1;   ?>
              
                <li>
                 <div class="foto_home carousel" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine["immagine_label"]; ?>)"> <!--Foto-->
                 </div>
                </li>
                <li>
                 <div class="foto_home carousel" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine["immagine_label"]; ?>)"> <!--Foto-->
                 </div>
                </li>
                
         <?php 
		 
		    // ARTICOLO CON IMMAGINE 
		  endwhile;
		  
		  elseif( $countImg > 1 ):
		  
		   while ($immagine = $rImg->fetch_array()):
		  
		  ?>
          
                <li>
                 <div class="foto_home carousel" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine["immagine_label"]; ?>)"> <!--Foto-->
                 </div>
                </li>
          
          
          <?php
		  
		   endwhile;
						
	     endif;
		 
		 ?>       
              </ul>
              
              
                
            </header>
        
        	<!--Inizio Titoli-->
        
        	<hgroup>
        
                <h7> <!--Sezione-->
                
                    Summary
                    
                </h7>
                
                 <!--<!--Inizio Container-->
            
            <div class="elenco_date_dettaglio"> 
            
            	<center>
            
                    <!--Inizio Dettagli-->
                    
                    <?php
                             
                             $sqlArticoloDate = "SELECT * FROM `articolo` WHERE articolo_titolo LIKE '%".$articolo["articolo_titolo"]."%' AND `articolo_pagina_id` = '".$articolo["articolo_pagina_id"]."' AND articolo_visibile = 1 ";
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
                   
                            Book Now
                   
                        </a>
                     
                        <!--Fine Prenotazione-->   
                       
                          <!--Inizio Disponibilità-->
                          
             
                            <div class="disponibilita">
                          
                              <span class="dispo_icona <?php if ($articoloD["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                              </span>
                              <span class="dispo_label <?php if ($articoloD["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                              
                                  Sold Out
                              
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
            
           </div>
           
           <!--Fine Date Dettagli--> 

                
                <h2 class="titolo_summary_2"> <!--Contenuti-->
                
                    <?php echo $articolo["articolo_titolo"]; ?>
                    
                </h2>
                
                <h3 class="sezione-grid altre-sez">
                 <center>
                 <hr><?php echo  $articolo["articolo_sottotitolo"]; ?><hr>
                 </center>
                </h3>
        
        	</hgroup>
            
            <!--Fine Titoli-->
             
            <!--Inizio Corpo-->
            
            <div class="corpo_summary">
            
				<!--Inizio Facebook Widget-->
                    
               
                <!--Fine Facebook Widget-->          
                  
            	<?php echo $articolo["articolo_testo"]; ?>
            
            </div>
            
            
            <?php 
			  
			  $sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 LIMIT 1,2 ";
		   $rArt2 = $mysqli->query($sqlArticolo2);
           $countArticolo2 =  $rArt2->num_rows;
		   if( $countArticolo2 >= 1 ):
		      while ($articolo2 = $rArt2->fetch_array()): 
			
			
			?>
            <div class="boxAcanto">
              
              <h2>ac&agrave;nto guides</h2>
              
              <?php echo $articolo2["articolo_testo"]; ?>
            
            </div>
            
            <?php  endwhile; endif; ?>    
            
                       <!-- 
            <center> 
           
           		<a class="prenota_interno deseleziona prenotazione" href="<?php //echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p" rel="<?php //echo $articolo["articolo_id"]; ?>">
           
              		BOOK NOW
           
           		</a>
                
           </center>-->
            
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
                        
                            <span class="dispo_icona <?php //if ($articolo["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona--
                            </span>
                            <span class="dispo_label <?php //if ($articolo["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta--
                            
                                Esaurito
                            
                            </span>
                        
                        </div>
                        
                        <!--Fine Disponibilità-- 
                    
                    </div>	
                    
                    <!--Fine Dettagli---->
                
                </center>
            
            </div>
            
            <!--Fine Container-->
            
            <!--Fine Date-->
            
            <!--Inizio Pulsante Go To-->

            <a href="<?php 
			
				if($paginaUrl == "book-your-private-tour") {
										
					echo $siteurl_base."some-ideas";
					
				} else {
					
					echo $siteurl_base."book-your-private-tour";
					
				}		
			
			?>" class="pdf_cal_link" title="<?php 
			
				if($paginaUrl == "book-your-private-tour") {
												
					echo "Go To Some Ideas";
					
				} else {
					
					echo "Go To Private Tours";
					
				}		
						
			?>">
                
                <aside class="pdf_cal">
                 
                    <h7> <!--Titolo-->
                    
                        Go To
                        
                    </h7>
                    
                    <div class="pdf_cal_label">
                    
                        <span class="etichetta"> 
                        
                            <?php 
                            
                                if($paginaUrl == "book-your-private-tour") {
                                    
                                    echo "Go To Some Ideas";
                                    
                                } else {
                                    
                                    echo "Go To Private Tours";
                                    
                                }
                                
                            ?>
                            
                        </span>
                        <span class="icona"> <!--Icona-->
                        </span>
                                
                    </div>
                
                </aside>
            
            </a>
            
            <!--Fine Pulsante Go To-->
            
             <div style="clear:both;">
            </div>
        
        </article>
		
        <?php	  
		 
 
  endwhile;
 endif; 
?>       
       
            
    </section>
    
    <!--Finechi- Sezione Cenacolo-->

<!--Fine Container Cenacolo-->

</div>