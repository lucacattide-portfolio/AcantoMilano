<?php 
 
	  
      // data setting
	  @date_default_timezone_set('Europe/Rome');
	  @setlocale(LC_ALL, 'it_IT');
	  @setlocale(LC_TIME, 'ita', 'it_IT.utf8');

      
	     $paginaId = $_POST["dataId"];
	     $dateCurrentMonth = date('Y-m-d', strtotime($_POST["datarif"]) ); // MESE CORRENTE
	     $giorni = date("t",strtotime($dateCurrentMonth)); // Giorni in un mese
	     $dateNextMonth = date('Y-m', strtotime('+1 month', strtotime($dateCurrentMonth)));
	     $datePrevMonth = date('Y-m', strtotime('-1 month', strtotime($dateCurrentMonth)));


?>


<?php echo utf8_encode( strftime("%B %Y", strtotime($dateCurrentMonth)) );  ?> <hr />