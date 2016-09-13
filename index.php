<?php 

	/* Navigazione */

	if (isset($_GET["pag"])) { // Se il parametro pagina è settato
	
		$pag = $_GET["pag"]; // Allora inizializzalo
		
	} else {  // Altrimenti inizializzazione default
		
		$pag = "";  
		
	}
	
	// Impostazione Timezone e Codifica Caratteri

	@date_default_timezone_set('Europe/Rome');
	@setlocale(LC_ALL, 'it_IT');
	@setlocale(LC_TIME, 'ita', 'it_IT.utf8');
	
	// Impostazioni HTACCESS
	
	//variabili per htaccess

	if( $pag == "prodotto" ) { // Se la pagina è
  
  		$siteurl = "http://localhost/acanto/"; // Allora inizializza l'url
  
	} else { // Altrimenti inizializza default
 
  		$siteurl = "";
 
	} 
  
 	// Menu htaccess 
 
 	$siteurl_base = "http://localhost/acanto/"; // Inizializzazione URL base

?>

<!doctype html> <!--Dichairazione DOCTYPE-->

<!--Inizio HTML-->

<html>

    <!--Inizio Head-->

	<head>

		<?php 
		
			include ("include/meta.php"); // Inclusione Meta Tags
			
		?>
                
		<!--Inizio Inclusione CSS-->

		<link rel="stylesheet" type="text/css" href="<?php echo $siteurl; ?>css/style.css"> <!--CSS Main-->
        <link rel="icon" type="image/png" href="favicon.png" /> <!--FavIcon-->
	
    	<!--Fine Inclusione CSS-->
	
    </head>
    
    <!--Fine Head-->
    
    <!--Inizio Body-->

	<body>
        
        <!--Inizio Containers-->
    
    	<div id="container_menu"> <!--Menu-->
        
        	<?php
			
				include "include/menu.php"; // Inclusione Menu Principale
				
			?>
            
            <div id="separatore_menu"> <!--Separatore-->
            </div>
        
        </div>
    
        <div id="container"> <!--Contenuti-->
                
            <?php 
			
              /*-- BODY -------------------------------------------------------------------*/
      
               switch($pag):
               
                 case "":
                 
                  include("include/home.php");
                
                  break;
                                       
                  case "home":
                 
                  include("include/home.php");
                  
                  break;
                                      
               endswitch;
              
              /*-- END BODY ------------------------------------------------------------------*/
                       
            ?>
            
        </div>
    
        <!--Fine Container-->
                        
    </body>
    
    <!--Fine Body -->
    
    <?php 
		  
     	include ("include/scripts.php"); // Inclusione JavaScript
		
    ?>
    
</html>

<!--Fine HTML-->