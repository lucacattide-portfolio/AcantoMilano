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
    
    <div class="container_popup_verticale">
    
    	<h2 class="titolo_popup"> <!--Titolo-->
        
        <?php 
		 $paginaId = $_GET["id"];
		 $siteurl_base = "http://www.acantomilano.it/beta/";
		 $sqlPaginaLoop = "SELECT * FROM `pagina` WHERE `pagina_id` = '".$paginaId."' ";
		 $rPaginaLoop = $mysqli->query( $sqlPaginaLoop );
		 $countPaginaLoop =  $rPaginaLoop->num_rows;
		 if($countPaginaLoop >= 1):
		 while ($PaginaLoop = $rPaginaLoop->fetch_array()):
		 
		  $sqlPaginaLoop = "SELECT * FROM `pagina` WHERE `pagina_id` = '".$articolo["articolo_pagina_id"]."' ";
				 $rPaginaLoop = $mysqli->query( $sqlPaginaLoop );
				 $countPaginaLoop =  $rPaginaLoop->num_rows;
				 if($countPaginaLoop >= 1):
				 while ($PaginaLoop = $rPaginaLoop->fetch_array()): $paginaUrl = $PaginaLoop["pagina_url"]; 
				 endwhile;
				 endif;
		 
		 
		  ?>
        
        	<?php echo $PaginaLoop["pagina_meta_title"]; ?>
		  	
		<?php endwhile; endif; ?>	
            
        </h2>
        
        <!--Inizio Elenco-->
        
        <div class="elenco_popup mCustomScrollbar" data-mcs-theme="rounded-dark">
        
        	<!--Inizio Articolo-->
            <?php 
			  $sqlArticolo3 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." ";
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
                
                <div class="container_bio containers_bio">
            
                    <!--Inizio Titoli-->
                
                    <hgroup>
                
                        <h7> <!--Sezione-->
                        
                            Summary
                            
                        </h7>
                        <h2 class="titolo_summary"> <!--Contenuti-->
                        
                            <?php echo $articolo3["articolo_titolo"]; ?> 
                            
                        </h2>
                
                    </hgroup>
                    
                    <!--Fine Titoli-->
                     <?php  //$articolo["articolo_sottotitolo"]; ?>
                    <!--Inizio Corpo-->
                    
                    <div class="corpo_summary">
                    
                    	<!--Inizio Facebook Widget-->
                    
                    	<div class="fb-share-button" data-href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                        
                        	<a class="fb-xfbml-parse-ignore social_share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $urlSocial; ?>&amp;src=sdkpreparse">

                            
                            	Condividi
                                
                            </a>
                            
                        </div>
                        
                        <!--Fine Facebook Widget-->
                    
                        <?php echo $articolo3["articolo_testo"]; ?>
                        
                    </div>
                    
                    <!--Fine Corpo-->
                    
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
     
    </div>
    
    <!--Fine Contaniner Popup-->