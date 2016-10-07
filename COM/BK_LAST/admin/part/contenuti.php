<div class="row">

<?php 
      
	  $query3 = "SELECT * FROM `voce_menu_1` WHERE `id_vm1` = '".$_GET["id"]."'  "; 
	  
	  $result3 = $mysqli->query($query3); while ( $row3 = $result3->fetch_array()){ 
	  
	  $sezN =  $row3["nome_vm1"];
	  
	  $sezId = $_GET["id"];
	  
	  
	  
	  if($sezId == 1){
		
		
		include("sezHome.php");  
		  
	  
	  }elseif($sezId == 2){
		  
		include("sezChiSiamo.php");   
	  
	  }elseif($sezId == 3){
		  
		include("sezLeonardo.php");  
	 
	  }elseif($sezId == 4){	
	  
	    include("sezAnticipazioni.php"); 
	  
	  }elseif($sezId == 5){
		  
		include("sezCalendario.php");
		
	  }elseif($sezId == 6){
		  
		include("sezTour.php");	
		
		
	  }elseif($sezId == 7){
		  
		include("sezTour.php");		
		
	  }elseif($sezId == 8){
		  
		include("sezViaggi.php");	
		
	  }elseif($sezId == 9){
		  
		include("sezLeonardo.php");  
		
	  
	  }elseif($sezId == 10){  	
	  
	     include("contatti.php");   
				 	 	
		
?>	  


    




    
    
    
<?php }} ?>
    
</div>    