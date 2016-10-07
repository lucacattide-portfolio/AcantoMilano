<?php

      include("../admin/php/connessione_sql.php"); // Connessione DB 
	 
	  // data setting
	  @date_default_timezone_set('Europe/Rome');
	  @setlocale(LC_ALL, 'it_IT');
	  @setlocale(LC_TIME, 'ita', 'it_IT.utf8');

      
	  $paginaId = $_POST["dataId"];
	  $dateCurrentMonth = date('Y-m-d', strtotime($_POST["datarif"]) ); // MESE CORRENTE
	  $giorni = date("t",strtotime($dateCurrentMonth)); // Giorni in un mese
	  $dateNextMonth = date('Y-m', strtotime('+1 month', strtotime($dateCurrentMonth)));
	  $datePrevMonth = date('Y-m', strtotime('-1 month', strtotime($dateCurrentMonth)));


               $sqlArticolo6 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND date(articolo_data_modifica) = '".$dateCurrentMonth."' AND articolo_id != 22 AND articolo_visibile = 1  ORDER BY articolo_data_modifica ASC LIMIT 0,1 ";
					   $rArt6 = $mysqli->query($sqlArticolo6);
					   $countArticolo6 =  $rArt6->num_rows;
					   if( $countArticolo6 >= 1 ):
					     while ($articolo6 = $rArt6->fetch_array()):  
						 
						 $dateArt6 = utf8_encode( strftime("%d %B %Y", strtotime($articolo6["articolo_data_modifica"])) ); 
						 
				$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo6["articolo_id"]." AND immagine_tipo NOT LIKE 'application/pdf' LIMIT 0,1 ";
				$rImg = $mysqli->query($sqlImg);
				$countImg =  $rImg->num_rows;
				
				if( $countImg >= 1):
				
				   while ($immagine = $rImg->fetch_array()):
				   
				   $immagine4 = $immagine["immagine_label"];
				   
				  endwhile;
			   endif;  
						   
						 
			   ?>	
             <section class="box-calendario-3" style="background-image:url(<?php echo $siteurl_base; ?>img/<?php echo $immagine4; ?>)">
               <h2 class="box-intestazione"><?php echo $dateArt6  ?></h2>
             </section>
           <?php 
				 endwhile;
			   endif;
		   ?>  