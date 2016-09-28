<!-- HTML * CSS Visite guidate, news + altre -->
<!-- CONTAINER -->
<div id="container_contenuti" rel="news"> 
  <!-- grid -->
  <section class="sezione-grid">
  
  <?php 
   if( $countArticolo >= 1 ):
		while ($articolo = $rArt->fetch_array()): 
  ?>		
  
     <!-- titolo -->
     <h2 class="intestazione">
       <?php echo $articolo["articolo_titolo"]; ?>
     </h2>
     <!-- END titolo -->
     
     <!-- Descrizione -->
     <article class="testoIntestazione">
       <?php echo $articolo["articolo_testo"]; ?>
     </article>
     <!-- END Descrizione -->
     
    <?php 
	  endwhile; 
	 endif; 
	?>  
    
  <!-- griglia img -->
   <div class="griglia-sezione">
     <center>
        <?php 
		 $sqlPaginaLoop = "SELECT * FROM `pagina` WHERE `pagina_dipendenza_id` = '".$paginaId."' ";
		 $rPaginaLoop = $mysqli->query( $sqlPaginaLoop );
		 $countPaginaLoop =  $rPaginaLoop->num_rows;
		 if($countPaginaLoop >= 1):
		 while ($PaginaLoop = $rPaginaLoop->fetch_array()):
		 		
				//IMG BACKGROUND
				$sqlImg = "SELECT * FROM `immagine` WHERE immagine_id = ".$PaginaLoop["pagina_immagine_id"]." LIMIT 0,1 ";
				$rImg = $mysqli->query($sqlImg);
				$countImg = $rImg->num_rows;
				if($countImg >= 1):
					while ($immagine = $rImg->fetch_array()):
				        $img = $immagine["immagine_label"];
					endwhile;
				endif;
		
		?>
     	<div class="boxBlock" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $img; ?>)">
          <a data-id="2" href="<?php echo $siteurl_base; ?>include/pop-up4.php" rel="<?php echo $PaginaLoop["pagina_id"]; ?>">
          
             <p><?php echo $PaginaLoop["pagina_meta_title"]; ?></p>
        
          </a>
        </div>
        
        <?php endwhile; endif; ?>
        
        <div class="pulsanti_interni">
        
           <a class="newsletter news deseleziona" href="<?php echo $siteurl_base; ?>newsletter">
            Iscriviti alla Newsletter
           </a>
           
           <!--Inizio Prenotazione-->
                     
           <a class="prenota_interno news deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
           
              Prenota Ora
           
           </a>
         
           <!--Fine Prenotazione-->  
       
       </div>
     
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