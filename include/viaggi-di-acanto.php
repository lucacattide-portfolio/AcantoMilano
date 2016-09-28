<!-- HTML * CSS Visite guidate, news + altre -->
<!-- CONTAINER -->
<div id="container_contenuti" rel="visite-guidate"> 
  <!-- grid -->
  <section class="sezione-grid">
  
  <?php 
    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." LIMIT 0,1 ";
	$rArt2 = $mysqli->query($sqlArticolo2);
    $countArticolo2 =  $rArt2->num_rows;
   if( $countArticolo2 >= 1 ):
		while ($articolo2 = $rArt2->fetch_array()): 
  ?>		
  
     <!-- titolo -->
     <h2 class="intestazione">
       <?php echo $articolo2["articolo_titolo"]; ?>
     </h2>
     <!-- END titolo -->
     
     <!-- Descrizione -->
     <article class="testoIntestazione">
       <?php echo $articolo2["articolo_testo"]; ?>
     </article>
     <!-- END Descrizione -->
     
    <?php 
	  endwhile; 
	 endif; 
	?>  
    
  <!-- griglia img -->
   <div class="griglia-sezione griglia_viaggi">
     <center>
        <?php 
		  $sqlArticolo3 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." LIMIT 1,".$countArticolo."   ";
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
     	<div class="boxBlock art" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $img; ?>)">
          <a href="<?php echo $siteurl_base; ?>include/pop-up3.php" rel="<?php echo $articolo3["articolo_id"]; ?>">
          
             <?php echo $articolo3["articolo_titolo"]; ?>
        
          </a>
        </div>
        
        <?php endwhile; endif; ?>
        
    <!-- <a class="newsletter" href="<?php echo $siteurl_base; ?>newsletter">
      Iscriviti alla newsletter
     </a> -->
     
     </center>
   </div>
 
  <!-- END griglia img -->
    
     
  </section>
  <!-- end -->
<!-- END CONTAINER -->
</div>

<!--Inizio Popup Verticale-->

<aside class="popup_verticale secondo_piano">


</aside>

<!--Fine Popup Verticale-->