<div id="container_contenuti" rel="calendario"> 
    
    <!--Inizio Scarica PDF-->
    
    
    
    <?php 
	
		if( $countArticolo >= 1 ):
		   while ($articolo = $rArt->fetch_array()): 
	
	 	        $sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." AND immagine_tipo LIKE 'application/pdf' LIMIT 0,1 ";
				$rImg = $mysqli->query($sqlImg);
				$countImg =  $rImg->num_rows;
				
				if( $countImg >= 1):
				
				   while ($immagine = $rImg->fetch_array()):
					
	
	
	?>
    
    
    <a href="<?php echo $siteurl_bae."img/".$immagine["immagine_label"];  ?>" class="pdf_cal_link" target="_blank" title="Scarica il PDF del Calendario">
    
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
    <?php
	  
	  	 			endwhile;
			   endif;
			   
			   
	         endwhile;
		  endif;		
	
	?>
    
    <!--Fine Scarica PDF-->
    
    <?php
	  $dateCurrentMonth = date('Y-m'); // MESE CORRENTE
	  $giorni = date("t",strtotime($dateCurrentMonth)); // Giorni in un mese
	  $dateNextMonth = date('Y-m', strtotime('+1 month', strtotime($dateCurrentMonth)));
	  $datePrevMonth = date('Y-m', strtotime('-1 month', strtotime($dateCurrentMonth)));
	  $dataNow = date("Y-m-d");
	  $dataNowMonth = date("Y-m");


    include("calendario-parte1.php"); ?>
	
    <!--Inizio Calendario - Dettagli-->
    <?php include("calendario-parte2.php"); ?>
    
    <!--Fine Calendario - Dettagli-->

	<!--Inizio Apertura Calendario-->

	<aside id="apertura_calendario" class="deseleziona">
    
    	<!--Inizio Titoli-->
    
    	<hgroup>
    
            <h7> <!--Titolo-->
            
                Calendario - Mostra Tutto
            
            </h7>
            <h2 id="apertura_titolo"> 
                
                <?php 
				
					 $sqlArticolo120 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 LIMIT 0,1  ";
					 $rArt120 = $mysqli->query($sqlArticolo120);
					 $countArticolo120 =  $rArt120->num_rows;
		 
		 			 if( $countArticolo120 >= 1 ):
		   
		   				while ($articolo120 = $rArt120->fetch_array()): 
		 			 
					 		echo $articolo120["articolo_sottotitolo"]; 
					 
					 	endwhile;
					 
					 endif;
					 
				?>
                    
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
		
		 $sqlArticolo20 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_gallery_id = 1 AND articolo_id != 22 AND articolo_visibile = 1 ORDER BY articolo_data_modifica DESC  ";
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
    
    	<a href="<?php echo $siteurl_base; ?>include/pop-up3.php" rel="<?php echo $articolo20["articolo_id"]; ?>" title="<?php $etichetta = str_replace("<p>", "", $articolo20["articolo_titolo"]); $etichetta = str_replace("</p>", "", $etichetta); echo $etichetta; ?>">
        
            <div class="evento_correlato" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine2; ?>)">
            
                <span class="pulsante_box">
                
                   	<span>
                    
                    	<?php echo $articolo20["articolo_url"];  ?>
					
               		</span>
                
                </span>
            
            </div>
        
        </a>
    
    	<?php
		
			   		
					
  				endwhile;
				
 			endif; 
		
		?>
    
    </section>
    
    <!--Fine Correlati-->

    
</div>

