<div id="container_contenuti" rel="cookies"> <!--Inizio Container Cookies-->

	<!--Inizio Sezione Cookies-->

	<section id="chi_siamo">
    
    	<h7> <!--Titolo-->
        
        	Cookies
        
        </h7>
        
       	<!--Inizio Summary-->
        
		<?php 
   
			if( $countArticolo >= 1 ):
			
				while ($articolo = $rArt->fetch_array()): 
		
		 ?>
  
        <article>
        
        	<!--Inizio Titoli-->
        
        	<hgroup>
        
                <h7> <!--Sezione-->
                
                    Summary
                    
                </h7>
                <h2 class="titolo_summary"> <!--Contenuti-->
                
                    <?php echo $articolo["articolo_titolo"]; ?>
                    
                </h2>
        
        	</hgroup>
            
            <!--Fine Titoli-->
            
            <!--Inizio Corpo-->
            
            <div class="corpo_summary">
            
            	<?php echo $articolo["articolo_testo"]; ?>
            
            </div>
            
            <!--Fine Corpo-->
            
            <div style="clear:both;">
            </div>
        
        </article>
        
		<?php 
		
        		endwhile;
        	
			endif; 
        
		?>       
       
    </section>
    
    <!--Fine sezione Cookies-->

<!--Fine Container Cookies-->

</div>