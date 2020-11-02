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
			
					$sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 AND articolo_id != 100 "; // Assegnazione Query Pagina DB
			
					$rArt2 = $mysqli->query($sqlArticolo2);

                  while ($articolo = $rArt2->fetch_array()): // Allora finchè esistono record non vuoti
				  
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
                 
                 	BOOK NOW
                 
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

<!--Inizio Box-->

<aside class="box_preview box_home box_slides deseleziona">

    <h7> <!--Titolo-->
    
        Home
        
    </h7>
    
    <!--Inizio Slider Box-->
    
    <div id="box_slides" class="<?php if( $_SESSION['vista'] == 0 ): if( $pag == 1 || $pag == ""   ):  /* ?> animated fadeInDown <?php */ else:  endif; endif; ?>">
    
    	<!--Inizio Container Slideshow-->
    
        <ul class="slides-container">
        
         <?php 
			 
			 $sqlART = " SELECT * FROM `articolo` WHERE articolo_id = 100 "; 
			 
			 $rART =  $mysqli->query($sqlART);
			 
			 	while ($ART = $rART->fetch_array()):
	   
				   // IMMAGINE GALLERY
				   $sqlImg2 = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$ART["articolo_id"]."  ";
				   $rImg2 = $mysqli->query($sqlImg2);
				   
				   while ($immagine2 = $rImg2->fetch_array()):
				   
				   		$immagine3 = $immagine2["immagine_label"];
        
		?>
        
        	<!--Inizio Elemento-->
        
        	<li>
            
            	<div class="elemento_box_slides elemento_full" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine3; ?>)">

                </div>
            
            </li>
            
        <?php
		
				   endwhile;
		
				endwhile;
					
		?>
            
            <!--Fine Elemento-->
        
        </ul>
        
        <!--Fine Container Slideshow-->
    
    </div>
    
    <!--Fine Slider Box-->
    
</aside>

<!--Fine Box-->

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

