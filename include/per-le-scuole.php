<!-- HTML * CSS Visite guidate, news + altre -->
<!-- CONTAINER -->
<div id="container_contenuti" rel="per-le-scuole"> 
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
    
  </section>
  <!-- end -->
  
    <!-- griglia img -->
   <div class="griglia-sezione-esterna griglia_scuole">
     <center>
        <?php 
		 $sqlPaginaLoop = "SELECT * FROM `pagina` WHERE `pagina_dipendenza_id` = '".$paginaId."' ";
		 $rPaginaLoop = $mysqli->query( $sqlPaginaLoop );
		 $countPaginaLoop =  $rPaginaLoop->num_rows;
		 if($countPaginaLoop >= 1):
		  $i = 1;
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
     	<div class="boxBlock"  style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $img; ?>)">
          <a data-id="<?php echo $i; ?>" href="<?php 
		            switch($i):     
					
					 case "1":
					   
					   echo  $siteurl_base.$PaginaLoop["pagina_url"];
					   
					 break; 
					 
					 case "2":
					   
					   echo $siteurl_base."include/pop-up.php";
					 
					 break; 
					 
					 case "3":
					   
					   echo $siteurl_base."include/pop-up2.php";
					 
					 break; 
					 
					 case "4":
					   
					   echo $siteurl_base."include/pop-up2.php";
					 
					 break; 
					 
					 case "5":
					   
					   echo $siteurl_base."include/pop-up2.php";
					 
					 break; 
					 
					 
					 case "6":
					   
					   echo $siteurl_base."include/pop-up2.php";
					 
					 break; 
		  
		            endswitch; ?>" rel="<?php echo $PaginaLoop["pagina_id"]; ?>">
          
             <p><?php echo $PaginaLoop["pagina_meta_title"]; ?></p>
        
          </a>
        </div>
        
        <?php  $i++; endwhile; endif; ?>
        
 	 	<!--Inizio Prenotazione-->
               
       <a class="prenota_interno deseleziona" href="<?php echo $siteurl_base."prenota"; ?>" title="Prenota Ora" tabindex="p">
       
          Prenota Ora
       
       </a>
     
       <!--Fine Prenotazione-->    
        
     </center>
   </div>
 
  <!-- END griglia img -->
  
<!-- END CONTAINER -->
</div>

<!--Inizio Popup Verticale-->

<aside class="popup_verticale secondo_piano">


</aside> 

<!--Fine Popup Verticale-->