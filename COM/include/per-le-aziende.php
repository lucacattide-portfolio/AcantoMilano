<!-- HTML * CSS Visite guidate, news + altre -->
<!-- CONTAINER -->
<div id="container_contenuti" rel="per-le-aziende"> 
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
     
      <!--Inizio Info-->
    
    <div class="box_info">
    
    	<?php echo $articolo["articolo_sottotitolo"]; ?>
    
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
		/* $sqlPaginaLoop = "SELECT * FROM `pagina` WHERE `pagina_dipendenza_id` = '".$paginaId."' ";
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
				endif;*/
		
		?>
     	<!--<div class="boxBlock" style="background-image:url(<?php //echo $siteurl_base;  ?>img/<?php //echo $img; ?>)">
          <a href="#" rel="<?php //echo $PaginaLoop["pagina_id"]; ?>">
          
             <p><?php // echo $PaginaLoop["pagina_meta_title"]; ?></p>
        
          </a>
        </div>-->
        <div class="boxBlock" style="background-image:url(img/azienda_1.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_2.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_3.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_4.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div> <div class="boxBlock" style="background-image:url(img/azienda_5.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_6.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_7.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_8.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_9.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_10.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_11.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
         <div class="boxBlock" style="background-image:url(img/azienda_12.png);">
          <a href="#" rel="">
          
             <p>Nome Azienda</p>
        
          </a>
        </div>
        <?php // endwhile; endif; ?>
                
     </center>
   </div>
 
  <!-- END griglia img -->
  
<!-- END CONTAINER -->
</div>