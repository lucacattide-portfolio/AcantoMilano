<!--Inizio Navigazione Principale-->

<!--Inizio Pulsante-->

<aside id="pulsante_menu" class="<?php if( $_SESSION['vista'] >= 0 ): if( $pag == 1 || $pag == ""   ):  ?>pulsante_attivo<?php  else:  endif; endif; ?>">

	<h7> <!--Titolo-->
    
    	Menu
        
    </h7>
    
    <div id="freccia_menu" class="<?php if( $_SESSION['vista'] >= 0 ): if( $pag == 1 || $pag == ""  ):  ?>freccia_attiva<?php  else:  endif; endif; ?>"> <!--Freccia--> 
    </div>

</aside>

<!--Fine Pulsante-->

<!--Inizio Voci-->

<nav id="menu_principale">

	<h7> <!--Titolo-->
    
    	Menu
    
    </h7>
    
    <!--Inizio Header-->
    
	<div id="header_menu">
    
    	<!--Inizio Logo-->
        
        <a id="logo" href="home" title="Acanto Milano" tabindex="h">
        </a>
        
        <!--Fine Logo-->
    	
        <!--Inizio Lingua-->
        
       	<nav id="menu_lingua" class="nascondi no_animazione sfuma">
        
        	<h7> <!--Titolo-->
            
            	Lingua
                
            </h7>
            
            <!--Inizio Voci-->
            
            <ul>
            
            	<a href="http://www.acantomilano.it/beta" title="Italiano">
                
                    <li>
                    
                        <span>
                        
                            ITA
                            
                        </span>
                    
                    </li>
                
                </a>
                <a href="http://www.acantomilano.com/beta" title="Inglese">
                
                    <li class="lingua_attiva">
                    
                        <span>
                        
                            ENG
                            
                        </span>
                    
                    </li>
                    
                </a>
                
           </ul>
           
           <!--Fine Voci-->
        
        </nav>
        
        <!--Fine Lingua-->
    
    </div>
    
    <!--Fine Header-->
    
    <!--Inizio Voci-->
    
    <ul id="menu_voci" class="<?php if( $_SESSION['vista'] >= 0 ): if( $pag == 1 || $pag == ""  ):  ?>container_voci_chiuso<?php else: endif; endif; ?> nascondi no_animazione">
    
       <?php while ($menu = $rMenu->fetch_array()): 
	     
		 if( $pag == "" ): ?>
         
          <?php if(  $menu["pagina_id"] == 31  ): else: ?>
         
          <a class="<?php if($menu["pagina_id"] == 1 ): echo "voce_attiva"; endif; ?>" href="<?php echo $siteurl_base.$menu["pagina_url"]; ?>" title="<?php echo $menu["pagina_meta_title"]; ?>" rel="<?php echo $siteurl_base.$menu["pagina_url"]; ?>">
        
            <li>
            
               <?php echo $menu["pagina_meta_title"]; ?>
                
            </li>
            
          </a>
 
		<?php 
		  
		  endif;
		
		 else:
		
	   ?> 
       
       
       <?php if(  $menu["pagina_id"] == 31  ): else: ?>
        
        <a class="<?php if($pag == $menu["pagina_id"] || $box == $menu["pagina_id"]  ): echo "voce_attiva"; endif; ?>" href="<?php echo $siteurl_base.$menu["pagina_url"]; ?>" title="<?php echo $menu["pagina_meta_title"]; ?>" rel="<?php echo $siteurl_base.$menu["pagina_url"]; ?>">
        
            <li>
            
               <?php echo $menu["pagina_meta_title"]; ?>
                
            </li>
            
        </a>
        <?php endif; ?>
        
        
		<?php 
		
		    /* CONDIZIONE PAGINA POST */
			
			if ( $menu["pagina_dipendenza_id"]  == "post" ): 

			 $sqlMenu2 = " SELECT * FROM `pagina` WHERE `pagina_dipendenza_id` = ".$menu["pagina_id"]." "; 
			 
			 $rMenu2 = $mysqli->query($sqlMenu2); // Menu
			 $countMenu2 = $rMenu2->num_rows;
			 
			 if ( $countMenu2  >= 1 ): 
		 
		 ?>
                   
       <!--  <span class="popUpMenu container_menu_livello_2 <?php if( $box == $menu["pagina_id"] ): echo "voce_attiva2"; endif; ?>">
                   
         <?php while ($menu2 = $rMenu2->fetch_array()): ?>
              
            
              
             <a class="voce_livello_2 <?php if( $menu2["pagina_id"] == 18 || $menu2["pagina_id"] == 19 ): else: ?> leggi-tutto <?php endif; ?> <?php if($pag == $menu2["pagina_id"]): echo "voce_livello_2_attiva"; endif; ?>" href="<?php if( $menu2["pagina_id"] == 18 ):  echo "mostre"; elseif( $menu2["pagina_id"] == 19 ):  echo "speciale-cenacolo"; elseif( $menu2["pagina_id"] == 20 ):  echo $siteurl_base."include/pop-up2.php"; else: echo $siteurl_base."include/pop-up4.php"; endif; ?>" title="<?php echo $menu2["pagina_meta_title"]; ?>" data-id="2" rel="<?php echo $menu2["pagina_id"]; ?>">
        
                  <li>
              
                      <?php echo $menu2["pagina_meta_title"]; ?>
                  
                  </li>
              
              </a>
                   
                 
         <?php endwhile; // CHIUSURA LIV 2 ?>
                   
         </span> -->
                   
         <?php
                   
		     endif;
		
		
		    /* CONDIZIONE PAGINA LINK */
			
			elseif ( $menu["pagina_dipendenza_id"]  == "link" ): 

			 $sqlMenu2 = " SELECT * FROM `pagina` WHERE `pagina_dipendenza_id` = ".$menu["pagina_id"]." "; 
			 
			 $rMenu2 = $mysqli->query($sqlMenu2); // Menu
			 $countMenu2 = $rMenu2->num_rows;
			 
			 if ( $countMenu2  >= 1 ): 
		 
		 ?>
                   
        <!-- <span class="container_menu_livello_2 <?php if( $box == $menu["pagina_id"] ): echo "voce_attiva2"; endif; ?>">
                   
         <?php while ($menu2 = $rMenu2->fetch_array()): ?>
              
             <a class="voce_livello_2 <?php if($pag == $menu2["pagina_id"]): echo "voce_livello_2_attiva"; endif; ?>" href="<?php echo $siteurl_base.$menu2["pagina_url"]; ?>" title="<?php echo $menu2["pagina_meta_title"]; ?>" rel="<?php echo $menu2["pagina_url"]; ?>">
        
                  <li>
              
                      <?php echo $menu2["pagina_meta_title"]; ?>
                  
                  </li>
              
              </a>
                   
                 
         <?php endwhile; // CHIUSURA LIV 2 ?>
                   
         </span> -->
                   
         <?php
                   
		     endif;	 
			 
			 
			 
		 
			/* CONDIZIONE PAGINA ARTICOLO */
			
			elseif( $menu["pagina_dipendenza_id"]  == "articolo" ): 
                    
				$sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$menu["pagina_id"]." AND articolo_visibile = 1 "; // Assegnazione Query Pagina DB
				
				$rArt2 = $mysqli->query($sqlArticolo2);
				$countArticolo2 =  $rArt2->num_rows;
                   
                if( $countArticolo2 >= 1 ):
				   
		?>
                   
      <!--  <span class="container_menu_livello_2 <?php if( $pag == $menu["pagina_id"] ): echo "voce_attiva2"; endif; ?>">
       
       	<?php while ($articolo2 = $rArt2->fetch_array()): ?>
       
       	<a class="voce_livello_2 <?php if($art == $articolo2["articolo_id"]  ): echo "voce_livello_2_attiva"; endif; ?>" href="<?php echo "#".$articolo2["articolo_url"]; ?>" title="<?php echo $articolo2["articolo_titolo"]; ?>" rel="<?php echo $articolo2["articolo_url"]; ?>">
    
            <li>
        
                <?php echo $articolo2["articolo_titolo"]; ?> 
            
            </li>
          
        </a> 
          
       <?php endwhile; ?>   
        
       </span>  -->

       <?php
       
       			endif; 
				   
		 	else: 
		
			endif;
			
			endif;
		
			endwhile; // CHIUSURA LIV 1 
		
	   ?>
           
    </ul>
    
    <!--Fine Voci-->
    
    <!--Inizio Links Outbound-->
    
    <div id="links_outbound" class="<?php if( $_SESSION['vista'] >= 0 ): if( $pag == 1 || $pag == ""   ):  ?>container_links_chiuso<?php  else: endif; endif;?> nascondi no_animazione sfuma">
    
    	<!--Inizio Social-->
    
    	<div class="links social facebook"> <!--Facebook-->
        
        	<a href="https://it-it.facebook.com/acantovisiteguidate/" title="Acanto - Facebook" target="new">
            
            	<img src="img/facebook.svg" alt="Segui Acanto Milano su Facebook" />
                
            </a>
        
        </div>
        <div class="links social trip_advisor"> <!--Trip Advisor-->
        
        	<a href="https://www.tripadvisor.it/Attraction_Review-g187849-d10895025-Reviews-Acanto_Milano-Milan_Lombardy.html" title="Acanto - TripAdvisor" target="new">
            
            	<img src="img/tripadvisor.svg" alt="Segui Acanto Milano su TripAdvisor" />
                
            </a>
        
        </div>
    	<div class="links social instagram"> <!--Instagram-->
        
        	<a href="https://www.instagram.com/acantomilano/" title="Acanto - Instagram" target="new">
            
            	<img src="img/instagram.svg" alt="Segui Acanto Milano su Instagram" />
                
            </a>
        
        </div>
        
        <!--Fine Social-->
        
        <div class="links dominio"> <!--Versione Inglese-->
        
        	<a href="http://www.acantomilano.it" title="Acanto Milano">
            
            	www.acantomilano.it
                
            </a>
        
        </div>
        
        <!--Fine Social-->
        
    </div>
    
    <!--Fine Links Outbound-->
    
    <!--Inizio P. IVA-->
      
    <div class="iva">
    
        <span>
        
            <small>
            
            	P. IVA 04396280960
                
            </small>
            
        </span>
    
    </div>
    
    <!--Fine P. IVA-->

</nav>

<!--Fine Voci-->

<!--Fine Navigazione Principale-->

<?php

	//include "include/prenota_popup.php"; // Inclusione Form Popup

?>

