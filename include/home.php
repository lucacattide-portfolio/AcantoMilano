<!--Inizio Home-->

<!--Inizio Carousel-->

<!--Inizio Popup Verticale-->

<aside class="popup_verticale secondo_piano">


</aside>

<!--Fine Popup Verticale-->


<section id="home_carousel" rel="home">

	<h7> <!--Titolo-->
    
    	Home
        
    </h7>
    
    <!--Inizio Slideshow-->
    
    <div id="home_slides" class="<?php if( $_SESSION['vista'] == 0 ): if( $pag == 1 || $pag == ""   ):  /* ?> animated fadeInDown <?php */ else:  endif; endif; ?>">
    
    	<!--Inizio Container Slideshow-->
    
        <ul class="slides-container">
        
        	<!--Inizio Elemento-->
			 <?php 
			 
             	if ( $countArticolo >= 1 ): // Se esistono almeno un record 
				
                  while ($articolo = $rArt->fetch_array()): // Allora finchè esistono record non vuoti
				  
             ?> 
           
            <li>
        
               <div class="container_claim animated fadeIn">
               
                 <!--Inizio Titoli-->
               
                 <hgroup>
               
                     <h2 class="logo_carousel"> <!--Logo-->
                     
                        <?php //echo $articolo["articolo_titolo"]; ?>
                        
                     </h2>
                     <h2 class="tagline"> <!--Tagline-->
                     
                        <?php echo $articolo["articolo_sottotitolo"]; ?>
                        
                     </h2>
                     
                     <hr class="dingbat" /> <!--Separatore-->
                     
                     <h2 class="headline"> <!--Headline-->
                        
                         <?php echo $articolo["articolo_testo"]; ?>
                        
                     </h2>
                 
                 </hgroup> 
                 
                 <!--Fine Titoli-->
               
               	 <!--Inizio Prenotazione-->
               
             	 <a class="prenota deseleziona" href="<?php echo $siteurl_base.$articolo["articolo_url"]; ?>" title="Prenota Ora" tabindex="p">
                 
                 	Prenota Ora
                 
                 </a>
               
               	 <!--Fine Prenotazione-->
               
               </div>
               
               <?php // IMMAGINE GALLERY
				 $sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." LIMIT 0,1 ";
				 $rImg = $mysqli->query($sqlImg);
				 while ($immagine = $rImg->fetch_array()):
			   ?>
        	   <div class="foto_home carousel" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine["immagine_label"]; ?>)"> <!--Foto-->
               </div>
               
               <?php endwhile; ?>
                
            </li>
           <?php 
		   		endwhile;
				
			endif;	  
		    ?>
            <!--Fine Elemento-->
        
        </ul>
        
        <!--Fine Container Slideshow-->        
        
    </div>
    <!--Fine Slideshow-->

</section>

<!--Fine Carousel-->

<!--Inizio News-->

<aside id="news_preview" class="box_home bg_news <?php if( $_SESSION['vista'] == 0 ): if( $pag == 1 || $pag == ""   ):  /* ?> animated fadeInUp <?php */ else:  endif; endif; ?>">

	<h7> <!--Titolo-->
    
    	News
        
    </h7>
    
    <!--Inizio Header-->
    
    <div id="header_news">
    
    	<h2> <!--Titolo-->
        
        	News
            
        </h2>
    
    </div>
    
    <!--Fine Header-->
    
    <!--Inizio Slideshow-->
    
    <div id="news_slides">
    
        <!--Inizio Container Slideshow-->
        
          <ul class="slides-container">
          
              <!--Inizio Elemento-->
              
             <?php 
			 
			    $sqlPaginaNews = " SELECT * FROM `pagina` WHERE `pagina_dipendenza_id` = 5 "; 
              
                   $rPaginaNews = $mysqli->query($sqlPaginaNews); // Menu
                  
                   $countPaginaNews = $rPaginaNews->num_rows;
                   
                   if( $countPaginaNews  >= 1 ): 
				   
				      while ($PaginaNews = $rPaginaNews->fetch_array()):
						
					  $sqlArticolo3 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$PaginaNews["pagina_id"]." AND articolo_visibile = 1 ORDER BY articolo_data_modifica DESC  "; // Assegnazione Query Pagina DB
					  $rArt3 = $mysqli->query($sqlArticolo3);
					  $countArticolo3 =  $rArt3->num_rows;
					  
					  if( $countArticolo3 >= 1 ): 
					  
					   while ($articolo3 = $rArt3->fetch_array()):
	 
			 ?> 
              
          
              <li>
          
                 <div class="container_news">
                 
                 	<!--Inizio Anteprima -->
                 
                   <div class="anteprima_news anteprima_ridotta"> 
                      
                        <span class="titolo_anteprima"> <!--Titolo-->
                        
                        	<?php echo $articolo3["articolo_titolo"]; ?>
                            
                        </span>
                        <span class="testo_anteprima"> <!--Corpo-->
                        
                        	<?php echo $articolo3["articolo_sottotitolo"]; ?>
                        
                        </span>
                        <span class="data_anteprima"> <!--Data-->
                        
                        	<small>
                            	
                                <?php 
								
								$dataEv = utf8_encode( strftime("%d %B %Y", strtotime($articolo3["articolo_data_modifica"])) );   
								echo $dataEv;  
								
								?>
                                
                            </small>
                      
                      	</span>
                       
                        <!--Inizio Leggi Tutto-->
                 
                        <span class="leggi_anteprima">
                        
                        <a class="leggi_tutto deseleziona newsHome" data-id="2" href="<?php echo $siteurl_base; ?>include/pop-up4.php" rel="<?php echo $PaginaNews["pagina_id"]; ?>" title="Leggi tutto" tabindex="l">
                       
                          Leggi tutto
                       
                       </a>
                       
                       </span>
                     
                       <!--Fine Leggi Tutto-->
                        
                   </div>
                 
                 </div>
                 <div class="overlay"> <!--Overlay-->
                 </div>
                 
                 <?php // IMMAGINE GALLERY
				 
				 	$sqlImg2 = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo3["articolo_id"]." LIMIT 0,1 ";
				 
				 	$rImg2 = $mysqli->query($sqlImg2);
				 
				 	while ($immagine2 = $rImg2->fetch_array()):
			   
			   	  ?>
                 
                 <div class="box_home" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine2["immagine_label"]; ?>)"> <!--Foto-->
                 </div>
                 
                 <?php 
			  	
					endwhile; 
						
				 ?>
                  
              </li>
              
              <?php 
			  			endwhile; 
					endif; 
				endwhile; 
			  endif;  
			  ?>
               
              <!--Fine Elemento-->
          
          </ul>
          
          <!--Fine Container Slideshow-->
          
           <!--Inizio Navigazione Slideshow-->
           
           <nav class="slides-navigation deseleziona">
           
              <a href="#" class="next"> <!--Precedente-->
              </a>
              <a href="#" class="prev"> <!--Successivo-->
              </a>
              
  		  </nav>
          
          <!--Inizio Navigazione Slideshow-->
         
      </div>
      
      <!--Fine Slideshow-->
        
</aside>

<!--Fine News-->

<!--Inizio Box-->


 <?php 
			 
   $sqlCategorie = " SELECT * FROM `categoria` LIMIT 2 "; 
   
   $rCategorie =  $mysqli->query($sqlCategorie);
   
   $countCategorie = $rCategorie->num_rows;
   
   if(  $countCategorie >= 1 ): 
	   $i = 1;
	   while ($categoria = $rCategorie->fetch_array()):
	   
	   // IMMAGINE GALLERY
	   $sqlImg2 = "SELECT * FROM `immagine` WHERE immagine_id = ".$categoria["categoria_articolo_id"]." LIMIT 0,1 ";
	   $rImg2 = $mysqli->query($sqlImg2);
	   while ($immagine2 = $rImg2->fetch_array()):
	   
	   
	   $immagine = $immagine2["immagine_label"];
	   
	   endwhile;
			   
	 
?> 

<aside class="box_preview box_home deseleziona <?php if( $_SESSION['vista'] == 0 ): if( $pag == 1 || $pag == ""   ):  /* ?> animated fadeInUp <?php */ else:  endif; endif; ?>" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine; ?>)">

	<h7> <!--Titolo-->
    
    	<?php echo $categoria["categoria_nome"]; ?>
        
    </h7>
    
    <!--Inizio Link Associativo-->
    
	<a class="pulsante_box" href="<?php echo $categoria["categoria_url"]; ?>" title="<?php echo $categoria["categoria_nome"]; ?>" tabindex="c" data-rel="<?php echo $i; ?>">
    
    	<?php echo $categoria["categoria_nome"]; ?>
    
    </a>
    
     <!--Fine Link Associativo-->
    
</aside>
<?php 
      $i++;
	  endwhile; 
  endif;  
?>

<!--Fine Box-->

<!--Fine Home-->

