<div id="container_contenuti" rel="chi-siamo"> <!--Inizio Container Chi Siamo-->

	<!--Inizio Sezione Chi Siamo-->

	<section id="chi_siamo">
    
    	<h7> <!--Titolo-->
        
        	Chi Siamo
        
        </h7>
        
       	<!--Inizio Summary-->
<?php 
    
        $sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_id` = 161 ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 	
		
		    ?>
		     
		
		  <article class="sezione-grid">
          
             <h2 class="intestazione"><?php echo $rowArticolo ["articolo_titolo"]; ?></h2>
          
             <div class="testoIntestazione"><?php echo $rowArticolo ["articolo_testo"]; ?></div>
        
          </article>
		    
		        
		  
		    <?php
		
		
		    endwhile;
		endif;
		
		
   if( $countArticolo >= 1 ):
		while ($articolo = $rArt->fetch_array()): 
		
		if( $articolo["articolo_id"] == 161 ): else:
		
		$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." LIMIT 0,1 ";
	    $rImg = $mysqli->query($sqlImg);
		$countImg =  $rImg->num_rows;
		
		if( $countImg >= 1):
		
		 while ($immagine = $rImg->fetch_array()):
		  
		 $immagine2 =  $immagine["immagine_label"];
		 $i = 1;
		 
		 // ARTICOLO CON IMMAGINE
		 ?>
         
         <article class="contenuto-globale sezione-grid <?php $articolo_out = str_replace("<p>", "", $articolo["articolo_titolo"]);  $articolo_out = str_replace("</p>", "", $articolo_out); echo $articolo_out; ?>">
          
             <div class="image" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine2; ?>)">
             </div>
             
             <div class="testo-blocco">
                <h2><?php echo $articolo["articolo_titolo"]; ?></h2>
                
                <div class="testo">
                 <?php echo $articolo["articolo_testo"]; ?>
                </div> 
             </div>
             
             <div class="clear"></div>
       
          </article>
          
         <!-- <div class="out_clear" ></div>-->
         
         
         
        <?php

		 
		 $i++;
		 endwhile;
		 
		else:
		
		?>
        <article class="sezione-grid">
          
          <h2 class="intestazione"><?php echo $articolo["articolo_titolo"]; ?></h2>
          
          <div class="testoIntestazione"><?php echo $articolo["articolo_testo"]; ?></div>
        
        </article>
        
        
        
        
        
        <?php

    endif; 
   endif; 
  endwhile;
 endif; 
?>       
       
        
        <!--Fine Emanuela-->
    
    </section>
    
    <!--Finechi- Sezione Chi Siamo-->

<!--Fine Container Chi Siamo-->

</div>