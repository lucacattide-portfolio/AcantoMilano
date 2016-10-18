<?php include("../admin/php/connessione_sql.php"); // Connessione DB ?>
<h7> <!--Titolo-->
    
    	Popup
        
    </h7>
    
    <div class="logo_popup"> <!--Logo-->
    </div>
    
    <div class="chiudi_popup chiudi"> <!--Chiudi-->
    
    	<span> <!--Icona-->
        </span>
    
    </div>
    
    <!--Inizio Contaniner Popup-->
    
    <div class="container_popup_verticale popup4 overHide">
    
    	<h2 class="titolo_popup"> <!--Titolo-->
        
        <?php 
		 $paginaId = $_GET["id"];
		 $siteurl_base = "http://www.acantomilano.it/beta/";
		 $sqlPaginaLoop = "SELECT * FROM `pagina` WHERE `pagina_id` = '".$paginaId."' ";
		 $rPaginaLoop = $mysqli->query( $sqlPaginaLoop );
		 $countPaginaLoop =  $rPaginaLoop->num_rows;
		 if($countPaginaLoop >= 1):
		 while ($PaginaLoop = $rPaginaLoop->fetch_array()): $paginaUrl = $PaginaLoop["pagina_url"]; ?>
        	
        	<?php echo $PaginaLoop["pagina_meta_title"]; ?>
		  	
		<?php endwhile; endif; ?>	
            
        </h2>
        
        <center>
         <div class="pulsanti_interni">
        
           <a class="newsletter_popup deseleziona" href="<?php echo $siteurl_base; ?>newsletter">
            Iscriviti alla Newsletter
           </a>
           
         </div>
       
       </center>
        
        <!--Inizio Elenco-->
        
        <div class="elenco_popup mCustomScrollbar" data-mcs-theme="rounded-dark">
        
        	<!--Inizio Articolo-->
            <?php 
			  $sqlArticolo3 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1  ";
			  $rArt3 = $mysqli->query($sqlArticolo3);
			  $countArticolo3 =  $rArt3->num_rows;
			  if($countArticolo3  >= 1):
			  while ($articolo3 =  $rArt3->fetch_array()):
		 		
				//IMG BACKGROUND
				$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo3["articolo_id"]." LIMIT 0,1 ";
				$rImg = $mysqli->query($sqlImg);
				$countImg = $rImg->num_rows;
				if($countImg >= 1):
					while ($immagine = $rImg->fetch_array()):
				        $img = $immagine["immagine_label"];
					endwhile;
				endif;
		
		?>
        
        	<article class="align_bio">
            
    
                <!--Inizio Immagini-->
        
                <div class="img_bio containers_bio">
                
                    <img src="<?php echo $siteurl_base."img/".$img; ?>" alt="<?php echo $articolo3["articolo_titolo"]; ?>" /> <!--Foto-->
                
                </div>
                
                <!--Fine Immagini-->
                
                <!--Inizio Bio-->
                
                <div class="container_bio containers_bio_2">
            
                    <!--Inizio Titoli-->
                
                    <hgroup>
                
                        <h7> <!--Sezione-->
                        
                            Summary
                            
                        </h7>
                        <h2 class="titolo_summary"> <!--Contenuti-->
                        
                            <?php echo $articolo3["articolo_titolo"]; ?> 
                            
                        </h2>
                        
                        <!--Inizio Disponibilità-->
                        
                        <div class="disponibilita">
                        
                        	<span class="dispo_icona <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile_ico"; endif; ?>"> <!--Icona-->
                            </span>
                        	<span class="dispo_label <?php if ($articolo3["articolo_img_id"] == 1): echo "disponibile"; endif; ?>"> <!--Etichetta-->
                            
                            	Esaurito
                            
                            </span>
                        
                        </div>
                        
                        <!--Fine Disponibilità--> 
                
                    </hgroup>
                    
                    <!--Fine Titoli-->
                     <?php  //$articolo["articolo_sottotitolo"]; ?>
                    <!--Inizio Corpo-->
                    
                    <div class="corpo_summary corpo_eventi">
                    
                    	<!--Inizio Facebook Widget-->
                    
                        <div class="fb-share-button" data-href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.acantomilano.it%2F".$paginaUrl;
                        
                        /*"http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'];*/ ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                        
                            <a class="fb-xfbml-parse-ignore social_share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "http%3A%2F%2Fwww.acantomilano.it%2F".$paginaUrl; ?>&amp;src=sdkpreparse">
                            
                                Condividi
                                
                            </a>
                            
                        </div>
                        
                        <!--Fine Facebook Widget-->         
                    
                        <?php echo $articolo3["articolo_testo"]; ?>
                        
                    </div>
                    
                    <!--Fine Corpo-->
                    
                    <!--Inizio Data-->
                    
                    <div class="data_evento">
                    
                    	29 Settbembbre 2016
                    
                    </div>
                    
                    <!--Fine Data-->
                    
                   <!--Inizio Azioni-->
                   
                   <div class="azioni_evento">
                   
                   		<!--Inizio PDF-->
                        
                   		<?php
					
							$sqlImg2 = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." AND immagine_tipo LIKE 'application/pdf' LIMIT 0,1 ";
							$rImg2 = $mysqli->query($sqlImg2);
							$countImg2 =  $rImg2->num_rows;
							$presente = 0;
							
							if ($countImg2 >= 1): 
							
							$presente = 1;
							
								while ($immagine2 = $rImg2->fetch_array()):
							  
									$immagine3 =  $immagine2["immagine_label"];
									
							endwhile;
								
							endif;
							
						?>
				      
                      <?php if ($countImg2 >=1 ): ?>
					   <a class="pulsante_pdf deseleziona <?php if ($presente == 0) { echo "pdf_presente"; } ?>" href="<?php if ($presente == 0) { echo "#"; } else { echo $siteurl_base."img/".$immagine3; } ?>" target="_blank"  title="<?php if(!empty($articolo["articolo_titolo"])): echo $articolo["articolo_titolo"]; else: echo $articolo3["articolo_titolo"]; endif;  ?>">
				   
						   <div class="pdf_interno deseleziona">
						   
								<span class="pdf_icona"> <!--Icona-->
								</span>
								<span class="pdf_label"> <!--Label-->
								
									Scarica il PDF
									
								</span>
						   
						   
						   </div>
					   
					   </a>
                       <?php endif; ?>
                       
                   		<!--Fine PDF-->
					   
                       <a class="prenota_interno deseleziona prenotazione" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p" rel="<?php if(!empty($articolo["articolo_id"])): echo $articolo["articolo_id"]; else: echo $articolo3["articolo_id"]; endif; ?>"> <!--Prenota-->
                 
                          Prenota Ora
                 
                       </a>
                   
                   </div>
                 
                   <!--Fine Azioni-->    
                    
                </div>
                
                <!--Fine Bio-->
                
                <div style="clear:both;">
                </div>
                
            
            </article>   
 
            <!--Fine Articolo-->
            <?php
			  endwhile;
			 endif;
			?>
         
        </div>
        
        <!--Fine Elenco-->
        
        <div class="out_clear">
        </div>
     
    </div>
    
    <!--Fine Contaniner Popup-->