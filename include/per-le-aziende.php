<!-- HTML * CSS Visite guidate, news + altre -->
<!-- CONTAINER -->
<div id="container_contenuti" rel="per-le-aziende"> 
  <!-- grid -->
  <section class="sezione-grid">
  
  <?php 
   
   $sqlArticoloA = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1  LIMIT 0,1";
   $rArtA = $mysqli->query($sqlArticoloA);
   $countArticoloA =  $rArtA->num_rows;
   
   if( $countArticoloA >= 1 ):
		while ($articoloA = $rArtA->fetch_array()): 
  ?>		
  
     <!-- titolo -->
     <h2 class="intestazione">
       <?php echo $articoloA["articolo_titolo"]; ?>
     </h2>
     <!-- END titolo -->
     
     <!-- Descrizione -->
     <article class="testoIntestazione">
       <?php echo $articoloA["articolo_testo"]; ?>
     </article>
     <!-- END Descrizione -->
     
      <!--Inizio Info-->
    
    <div class="box_info">
    
    	<?php echo $articoloA["articolo_sottotitolo"]; ?>
    
    </div>
    
    <!--Fine Info-->
     
    <?php 
	  endwhile; 
	 endif; 
	?>  
    
  </section>
  <!-- end -->
  
    <!-- griglia img -->
   <div class="griglia-sezione-esterna">
     <center>
			
		<?php 

		$sqlArticoloAz = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1  LIMIT 1, ".$countArticolo."   ";
	    $rArtAz = $mysqli->query($sqlArticoloAz);
        $countArticoloAz =  $rArtAz->num_rows;
		
		if( $countArticoloAz > 1):
		   while ($articoloAz = $rArtAz->fetch_array()):
		  //IMG BACKGROUND
				$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articoloAz["articolo_id"]." LIMIT 0,1 ";
				$rImg = $mysqli->query($sqlImg);
				$countImg = $rImg->num_rows;
				if($countImg >= 1):
					while ($immagine = $rImg->fetch_array()):
				        $img = $immagine["immagine_label"];
					endwhile;
				endif;
		
		
		?>
        
         <div data-id="1" class="boxBlock aziende" style="background-image:url(<?php echo $siteurl_base; ?>img/<?php echo $img; ?>)" >
          <!--<a  data-id="1" rel="">
          
             <p>Nome Azienda</p>
        
          </a>-->
         </div>
        
        
        <?php endwhile;  endif; ?>
        
        
       
                
     </center>
   </div>
 
  <!-- END griglia img -->
  
<!-- END CONTAINER -->
</div>