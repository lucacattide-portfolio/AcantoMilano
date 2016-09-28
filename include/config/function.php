<?php

	// Funzione Estrazione Dati DB Pagine - Menu
	
	// Query - Switch
	
	$sqlPagina = "SELECT * FROM `pagina`"; // Assegnazione Query Pagina DB
	
	$sqlMenu = "SELECT * FROM `pagina` WHERE `pagina_dipendenza_id` = 0"; // Assegnazione Query MENU Pagina Primo livello DB
	
	$rPagina = $mysqli->query($sqlPagina); // Pagina 
	
	$rMenu = $mysqli->query($sqlMenu); // Menu
	
	$countPagina =  $rPagina->num_rows; // Conteggio Record Pagina
	
	if ($pag == ""): // Default
	
	  $sqlSeo = "SELECT * FROM `pagina` WHERE pagina_id = 1 "; // Assegnazione Query Pagina DB
	  
	else: // Altrimenti singole pagine
	
	  $sqlSeo = "SELECT * FROM `pagina` WHERE pagina_id = ".$pag.""; // Assegnazione Query Pagina DB
	
	endif;  
	
	$rSeo = $mysqli->query($sqlSeo); // SEO
	
	while ($seo = $rSeo->fetch_array()): // Finchè sono presenti pagine

		$paginaId = $seo["pagina_id"]; // variabile id pagina

		$paginaMetaTag = $seo["pagina_meta_tag"]; // pagina meta tag

		$paginaMetaDesc = $seo["pagina_meta_description"]; // pagina meta tag

		$paginaMetaTitle = $seo["pagina_meta_title"]; // pagina meta tag
		
		 if ($art == ""): // Default
	
			$sqlArticolo = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId.""; // Assegnazione Query Pagina DB
			
		  else: // Altrimenti singole pagine
		  
			$sqlArticolo = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_id = ".$art."";
			
		  endif;  
		
        
	endwhile; 
	
	
	$rArt = $mysqli->query($sqlArticolo);
    $countArticolo =  $rArt->num_rows;
	
	
	
	/* ASSOCIAZIONE ARTICOLO BRAND */
	/* $sqlArtBrand = "SELECT * FROM `articolo` LEFT JOIN `categoria` ON `articolo`.`articolo_categoria_id` = `categoria`.`categoria_id` WHERE `articolo`.articolo_pagina_id = ".$paginaId." ORDER BY articolo_titolo ASC ";
					  
	$rArtBrand = $mysqli->query($sqlArtBrand); // Pagina 
			  
	$countArtBrand = $rArtBrand->num_rows; // Conteggio Record Pagina */
	
	
	
			
?>