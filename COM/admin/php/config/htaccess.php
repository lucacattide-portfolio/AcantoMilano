<?php 

	// Funzione Creazione htaccess
	
	// Controllo Record
	
	if ($countPagina >= 1) { // Se esiste almeno un record
		
		// Controllo File
		
		$nomePathFile = '../.htaccess'; // Assegnazione path file nella root di dominio
		$fileHandler = fopen("".$nomePathFile."", "w") or die("Errore: Impossibile aprire il file"); // Assegnazione apertura file in modalità aggiunta
		$regola = "RewriteEngine On \n"; // Assegnazione attivazione modulo riscrittura URL
		//$regola.= "\nRewriteRule ^home/?$ index.php [L]"; // Assegnazione Index - Default
		
		fwrite($fileHandler, $regola); // Scrivi la regola su file
		
		while ($rowPaginaHt = $rPagina->fetch_array()): // Finchè sono presenti pagine
		
		  if ($rowPaginaHt["pagina_dipendenza_id"] == "accordion") { // Se la pagina è un accordion
			
				$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$rowPaginaHt["pagina_id"]."' "; // Estrae gli articoli "pagine" dalla tabella
  			    $rArticolo = $mysqli->query($sqlArticolo); // Assegna la query
   				$countArticolo =  $rArticolo->num_rows; // Conteggio records
				
				if ($countArticolo >= 1): // Se esiste almeno un record
				
					while ($rowArticolo = $rArticolo->fetch_array()): // Allora finchè esistono pagine
					
						$rowArticolo["articolo_url"] = str_replace(" ", "", $rowArticolo["articolo_url"]); // Filtra gli spazi dall'URL SEF
						$regola = "\nRewriteRule ^".$rowArticolo["articolo_url"]."/?$ index.php?pag=".$rowArticolo["articolo_pagina_id"]."&art=".$rowArticolo["articolo_id"]." [L]"; // Assegnazione regola di scrittura URL
						
						fwrite($fileHandler, $regola); // Scrivi la regola su file
						
				 	endwhile;
					
				endif;
				
				
		    } elseif ($rowPaginaHt["pagina_dipendenza_id"] == "articolo") { // Se la pagina è un accordion
			
			     /* voce padre */
				 $rowPaginaHt["pagina_url"] = str_replace(" ", "",$rowPaginaHt["pagina_url"]); // Filtra gli spazi dall'URL SEF
				 $regola = "\nRewriteRule ^".$rowPaginaHt["pagina_url"]."/?$ index.php?pag=".$rowPaginaHt["pagina_id"]."&box=".$rowPaginaHt["pagina_id"]." [L]"; // Assegnazione regola di scrittura URL
				
				 fwrite($fileHandler, $regola); // Scrivi la regola su file
			
				$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$rowPaginaHt["pagina_id"]."' "; // Estrae gli articoli "pagine" dalla tabella
  			    $rArticolo = $mysqli->query($sqlArticolo); // Assegna la query
   				$countArticolo =  $rArticolo->num_rows; // Conteggio records
				
				if ($countArticolo >= 1): // Se esiste almeno un record
				
					while ($rowArticolo = $rArticolo->fetch_array()): // Allora finchè esistono pagine
					
						$rowArticolo["articolo_url"] = str_replace(" ", "", $rowArticolo["articolo_url"]); // Filtra gli spazi dall'URL SEF
						$regola = "\nRewriteRule ^".$rowArticolo["articolo_url"]."/?$ index.php?pag=".$rowArticolo["articolo_pagina_id"]."&art=".$rowArticolo["articolo_id"]." [L]"; // Assegnazione regola di scrittura URL
						
						fwrite($fileHandler, $regola); // Scrivi la regola su file
						
				 	endwhile;
					
				endif;
				
		    } elseif( $rowPaginaHt["pagina_dipendenza_id"] == "post"){  
			
			       /* voce padre */
			       $rowPaginaHt["pagina_url"] = str_replace(" ", "",$rowPaginaHt["pagina_url"]); // Filtra gli spazi dall'URL SEF
				   $regola = "\nRewriteRule ^".$rowPaginaHt["pagina_url"]."/?$ index.php?pag=".$rowPaginaHt["pagina_id"]."&box=".$rowPaginaHt["pagina_id"]." [L]"; // Assegnazione regola di scrittura URL
				  
				   fwrite($fileHandler, $regola); // Scrivi la regola su file
			  
			       /* voce figlio */
				   $sqlMenu2 = " SELECT * FROM `pagina` WHERE `pagina_dipendenza_id` = ".$rowPaginaHt["pagina_id"]." "; 
              
                   $rMenu2 = $mysqli->query($sqlMenu2); // Menu
                  
                   $countMenu2 = $rMenu2->num_rows;
                   
                   if( $countMenu2  >= 1 ): 
				   
					   while ($rowMenu2 = $rMenu2->fetch_array()): // Allora finchè esistono pagine
					   
						   $rowMenu2["pagina_url"] = str_replace(" ", "",$rowMenu2["pagina_url"]); // Filtra gli spazi dall'URL SEF
						   $regola = "\nRewriteRule ^".$rowMenu2["pagina_url"]."/?$ index.php?pag=".$rowMenu2["pagina_id"]."&box=".$rowPaginaHt["pagina_id"]." [L]"; // Assegnazione regola di scrittura URL
						   
						   fwrite($fileHandler, $regola); // Scrivi la regola su file
					   
					   endwhile;
				   
				   endif;
			
				
			 } elseif( $rowPaginaHt["pagina_dipendenza_id"] == "link"){  
			
			       /* voce padre */
			       $rowPaginaHt["pagina_url"] = str_replace(" ", "",$rowPaginaHt["pagina_url"]); // Filtra gli spazi dall'URL SEF
				   $regola = "\nRewriteRule ^".$rowPaginaHt["pagina_url"]."/?$ index.php?pag=".$rowPaginaHt["pagina_id"]."&box=".$rowPaginaHt["pagina_id"]." [L]"; // Assegnazione regola di scrittura URL
				  
				   fwrite($fileHandler, $regola); // Scrivi la regola su file
			  
			
				
			} else { // Altrimenti se è primaria
			
				$rowPaginaHt["pagina_url"] = str_replace(" ", "",$rowPaginaHt["pagina_url"]); // Filtra gli spazi dall'URL SEF
				$regola = "\nRewriteRule ^".$rowPaginaHt["pagina_url"]."/?$ index.php?pag=".$rowPaginaHt["pagina_id"]." [L]"; // Assegnazione regola di scrittura URL
				
			    fwrite($fileHandler, $regola); // Scrivi la regola su file
				
			}

		endwhile;
		fclose($fileHandler); // Chiudi il file
	
	}

?>