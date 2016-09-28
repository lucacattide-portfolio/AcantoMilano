<div id="container_contenuti" rel="chi-siamo"> <!--Inizio Container Chi Siamo-->

	<!--Inizio Sezione Chi Siamo-->

	<section id="chi_siamo">
    
    	<h7> <!--Titolo-->
        
        	Chi Siamo
        
        </h7>
        
       	<!--Inizio Summary-->
<?php 
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
         
    <article class="align_bio">
    
    		<!--Inizio Immagini-->
    
    		<div class="img_bio containers_bio">
            
            	<img src="<?php echo $siteurl_base; ?>img/<?php echo $immagine2; ?>" alt="<?php echo $articolo["articolo_titolo"]; ?>" /> <!--Foto-->
            
            </div>
            
            <!--Fine Immagini-->
            
            <!--Inizio Bio-->
            
            <div class="container_bio containers_bio">
        
                <!--Inizio Titoli-->
            
                <hgroup>
            
                    <h7> <!--Sezione-->
                    
                        Summary
                        
                    </h7>
                    <h2 class="titolo_summary <?php $articolo_out = str_replace("<p>", "", $articolo["articolo_titolo"]);  $articolo_out = str_replace("</p>", "", $articolo_out); echo $articolo_out; ?>"> <!--Contenuti-->
                    
                        <?php echo $articolo["articolo_titolo"]; ?>
                        
                    </h2>
            
                </hgroup>
                
                <!--Fine Titoli-->
                 <?php  $articolo["articolo_sottotitolo"]; ?>
                <!--Inizio Corpo-->
                
                <div class="corpo_summary">
                
                    <?php echo $articolo["articolo_testo"]; ?>
                
                </div>
                
                <!--Fine Corpo-->
                
            </div>
            
            <!--Fine Bio-->
            
            <div style="clear:both;">
            </div>
        
        </article>     
		  
	
    
    <?php	 
		 
		 endwhile;
		 
		else:
		
   ?> 
        <article>
        
        	<!--Inizio Titoli-->
        
        	<hgroup>
        
                <h7> <!--Sezione-->
                
                    Summary
                    
                </h7>
                <h2 class="titolo_summary accento-su-arte"> <!--Contenuti-->
                
                    <?php echo $articolo["articolo_titolo"]; ?>
                    
                </h2>
        
        	</hgroup>
            
            <!--Fine Titoli-->
             <?php  $articolo["articolo_sottotitolo"]; ?>
            <!--Inizio Corpo-->
            
            <div class="corpo_summary">
            
            	<?php echo $articolo["articolo_testo"]; ?>
            
            </div>
            
            <!--Fine Corpo-->
            
             <div style="clear:both;">
            </div>
        
        </article>
<?php 
   endif; 
  endwhile;
 endif; 
?>       
       
        
        <!--Fine Emanuela-->
    
    </section>
    
    <!--Finechi- Sezione Chi Siamo-->

<!--Fine Container Chi Siamo-->

</div>