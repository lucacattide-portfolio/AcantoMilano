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




               $sqlArticolo5 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND date(articolo_data_modifica) = '".$dateCurrentMonth."' AND articolo_id != 22 AND articolo_visibile = 1  ORDER BY articolo_data_modifica ASC LIMIT 0,1 ";
					   $rArt5 = $mysqli->query($sqlArticolo5);
					   $countArticolo5 =  $rArt5->num_rows;
					   if( $countArticolo5 >= 1 ):
					     while ($articolo5 = $rArt5->fetch_array()):  
						   
						 
			   ?>	
               <div class="box-list">   
                 <h2><?php echo $articolo5["articolo_titolo"]; ?></h2>
                 <div class="button-box">
                   <span class="ore">
                    Ore <?php echo date("H:i", strtotime($articolo5["articolo_data_modifica"])); ?>
                   </span>
                    <a href="<?php echo $siteurl_base; ?>include/pop-up3.php" rel="<?php echo $articolo5["articolo_id"]; ?>" data-id="">
                     leggi Tutto
                   </a>
                 </div>
               </div>
               <?php 
			   endwhile;
					   endif;
			   ?>