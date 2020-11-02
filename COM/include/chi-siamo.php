<div id="container_contenuti" rel="chi-siamo"> <!--Inizio Container Chi Siamo-->

	<!--Inizio Sezione Chi Siamo-->

	<section id="chi_siamo">
    
    	<h7> <!--Titolo-->
        
        	Chi Siamo
        
        </h7>
        
       	<!--Inizio Summary-->
<?php 
   $sqlArticolo = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1  LIMIT 0,3";
   $rArt = $mysqli->query($sqlArticolo);
   $countArticolo =  $rArt->num_rows;
	

   if( $countArticolo >= 1 ):
		while ($articolo = $rArt->fetch_array()): 
		
		$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." LIMIT 0,1 ";
	    $rImg = $mysqli->query($sqlImg);
		$countImg =  $rImg->num_rows;
		
		if( $countImg >= 1):
		
		 while ($immagine = $rImg->fetch_array()):
		  
		 $immagine2 =  $immagine["immagine_label"];
		 $i = 1;
		 
		 // ARTICOLO CON IMMAGINE
		 ?>
         
         <article class="contenuto-globale sezione-grid <?php $articolo_out = str_replace("<p>", "", $articolo["articolo_titolo"]);  $articolo_out = str_replace("</p>", "", $articolo_out); echo strip_tags($articolo_out); ?>">
          
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
  endwhile;
 endif; 
?>       
       
        
        <!--Fine Emanuela-->
    
    </section>
    
    <!--Finechi- Sezione Chi Siamo-->
    
    <!-- Trip Advisor -->
    <section class="trip-advisor">
    
        <article class="sezione-grid">
          
          <h2 class="intestazione">Some says about us:</h2>
        
        </article>
        
        <section class="sezione-grid">
         <center>
         <?php 
		   
		   $sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 LIMIT 3,".$countArticolo." ";
		   $rArt2 = $mysqli->query($sqlArticolo2);
           $countArticolo2 =  $rArt2->num_rows;
		   if( $countArticolo2 >= 1 ):
		      while ($articolo2 = $rArt2->fetch_array()): 
		 
		 ?>
           
           <div class="boxTrip">
           
              <?php echo $articolo2["articolo_titolo"]; ?>
              <?php echo $articolo2["articolo_sottotitolo"]; ?> 
              <?php echo $articolo2["articolo_testo"]; ?>
              <div class="nomeA"><?php echo $articolo2["articolo_url"]; ?></div>
            
           </div>
           
         <?php endwhile; endif; ?>   
          
         </center>
        </section>
        
        
    
    </section>
    <!-- End Trip Advisor -->

<!--Fine Container Chi Siamo-->

</div>