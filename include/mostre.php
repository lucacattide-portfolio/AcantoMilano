<div id="container_contenuti" rel="mostre"> 

    

   
  <section class="mostre">
     
     <h2 class="intestazione">
     
         <?php 
			$sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." LIMIT 0,1 ";
			$rArt2 = $mysqli->query($sqlArticolo2);
			$countArticolo2 =  $rArt2->num_rows;
			 if( $countArticolo2 >= 1 ):
				while ($articolo2 = $rArt2->fetch_array()): 
		  ?>		
        
          <?php echo $articolo2["articolo_titolo"]; ?>
		  	
		  <?php endwhile; endif; ?>	
       
     </h2>
     
     
     <section class="mostre-grid mCustomScrollbar">
         <?php 
			$sqlArticolo3 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." LIMIT 1,".$countArticolo." ";
			  $rArt3 = $mysqli->query($sqlArticolo3);
			  $countArticolo3 =  $rArt3->num_rows;
			  if($countArticolo3  >= 1):
			  while ($articolo3 =  $rArt3->fetch_array()):
			  
			  $dataEv = utf8_encode( strftime("%d %B %Y", strtotime($articolo3["articolo_data_modifica"])) ); 
			  
			  $sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo3["articolo_id"]." AND immagine_tipo NOT LIKE 'application/pdf' LIMIT 0,1 ";
				$rImg = $mysqli->query($sqlImg);
				$countImg = $rImg->num_rows;
				if($countImg >= 1):
					while ($immagine = $rImg->fetch_array()):
				        $img = $immagine["immagine_label"];
					endwhile;
				endif;
			  
		  ?>
       <article class="itemContainer">
          <div class="ImgContent">
            <img src="<?php echo $siteurl_base."img/".$img; ?>" />
          </div>
          <div class="testoContainer">
             <h3><?php echo $articolo3["articolo_titolo"]; ?></h3> 
             
             <?php echo $articolo3["articolo_testo"]; ?>
             
             <span class="dataMostra"> <?php echo $dataEv; ?> </span>
             <span class="leggi"> Leggi tutto </span>
          </div>
       </article>
         <?php 
		      endwhile; 
		   endif; 
		  ?>
     </section>
  
  </section>


    
   
 <?php /*   
      <h2 class="titolo_popup"> <!--Titolo-->
        
        <?php 
			$sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." LIMIT 0,1 ";
			$rArt2 = $mysqli->query($sqlArticolo2);
			$countArticolo2 =  $rArt2->num_rows;
			 if( $countArticolo2 >= 1 ):
				while ($articolo2 = $rArt2->fetch_array()): 
		  ?>		
        
        	<?php echo $articolo2["articolo_titolo"]; ?>
		  	
		   <?php endwhile; endif; ?>	
            
        </h2>
        
        <!--Inizio Elenco-->
        
        <div class="elenco_popup mCustomScrollbar" data-mcs-theme="rounded-dark">
        
        	<!--Inizio Articolo-->
            <?php 
			  $sqlArticolo3 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." LIMIT 1,".$countArticolo." ";
			  $rArt3 = $mysqli->query($sqlArticolo3);
			  $countArticolo3 =  $rArt3->num_rows;
			  if($countArticolo3  >= 1):
			  while ($articolo3 =  $rArt3->fetch_array()):
		 		
				//IMG BACKGROUND
				$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo3["articolo_id"]." AND immagine_tipo NOT LIKE 'application/pdf' LIMIT 0,1 ";
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
                        
                        	<span class="dispo_icona disponibile"> <!--Icona-->
                            </span>
                        	<span class="dispo_label disponibile"> <!--Etichetta-->
                            
                            	Disponibile
                            
                            </span>
                        
                        </div>
                        
                        <!--Fine Disponibilità--> 
                
                    </hgroup>
                    
                    <!--Fine Titoli-->
                     <?php  //$articolo["articolo_sottotitolo"]; ?>
                    <!--Inizio Corpo-->
                    
                    <div class="corpo_summary">
                    
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



 
</div> */ ?>