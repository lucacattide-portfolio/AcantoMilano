<div id="container_contenuti" rel="mostre"> 

  
   
  <section class="mostre">
     
     <h2 class="intestazione">
     
         <?php 
			$sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1  LIMIT 0,1   ";
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
			$sqlArticolo3 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId."  AND articolo_visibile = 1 AND  articolo_id != 83 AND articolo_id != 86 ORDER BY articolo_data_modifica DESC    ";
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
			    else:
				   $img = "";
						
				endif;
			  
		  ?>
       <article class="itemContainer">
          <div class="ImgContent">
            <img src="<?php echo $siteurl_base."img/".$img; ?>" />
          </div>
          <div class="testoContainer">
             <h3>
			 	<?php echo $articolo3["articolo_titolo"]; ?>
                
                	<span class="dataMostra"> <?php echo $articolo3["articolo_sottotitolo"];?> </span>
                
                   <!--Inizio Facebook Widget-->
                    
                 <!--   <div class="fb-share-button" data-href="<?php // echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                    
                        <a class="fb-xfbml-parse-ignore social_share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">
                        
                            Condividi
                            
                        </a>
                        
                    </div>-->
                    
                    <!--Fine Facebook Widget-->
                
             </h3> 
             
              
             <span class="small" rel="<?php echo $articolo3["articolo_id"]; ?>">
             <?php 
			 
			
				
			   $textA = strip_tags($articolo3["articolo_testo"], '<p>');
			   $text2 = strip_tags($textA, '</p>');
			 
			      $pos=strpos($text2 , ' ', 150);
                substr($text2 ,0,$pos ); 
			    
				if( str_word_count($articolo3["articolo_testo"]) > 50 ):
				
				  echo "<p>".substr($text2 ,0,$pos )."... </p>";
				
				else:
				
				  echo $articolo3["articolo_testo"];
				
				endif;
			 
			     ?>
                
               </span> 
                
                <span class="big"  rel="<?php echo $articolo3["articolo_id"]; ?>">
                   
                   <?php echo $articolo3["articolo_testo"];  ?>
                   
                </span>
             
             <!--Inizio Facebook Widget-->
                    
              <div class="fb-share-button" data-href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true">
              
                  <a class="fb-xfbml-parse-ignore social_share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">
                  
                      Condividi
                      
                  </a>
                  
              </div>
              
              <!--Fine Facebook Widget-->
             
           
            <?php if( str_word_count($articolo3["articolo_testo"]) > 50 ): ?>
            
             <span rel="<?php echo $articolo3["articolo_id"]; ?>" class="leggi leggitutto"> Read more </span>
             
           <?php endif; ?>  
          </div>
       </article>
         <?php 
		      endwhile; 
		   endif; 
		  ?>
     </section>
  
  </section>