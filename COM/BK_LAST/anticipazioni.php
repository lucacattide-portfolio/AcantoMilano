<?php include("admin/connessione_sql.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<title>Acanto</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body id="anticipazioni">

<?php include 'include/menu.php' ?>

<!-- CONTAINER -->
<section class="container" id="page-anticipazioni">
     
    <?php 
	
  $query4 = "SELECT * FROM `testo` LEFT JOIN `immagini` ON `immagini`.`id_txt`=`testo`.`id_txt` LEFT JOIN `info` ON `info`.`id_txt`=`testo`.`id_txt`  WHERE `testo`.`id_vm1` = '4' "; 

  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){ 
  
  
  $idTxt = $row4["id_txt"];  
  
  
 
 
  setlocale(LC_TIME, "it_IT");
  
  
  $originalDate = $row4["data_txt"]; 
  
  $newDate1 = date("Y", strtotime($originalDate));
  
  $newDate2 = date("m", strtotime($originalDate));
  
  if( $newDate2 == 1 ){ $newDate2 = "Gennaio"; }elseif( $newDate2 == 2 ){ $newDate2 = "Febbraio"; }elseif( $newDate2 == 3 ){ $newDate2 = "Marzo"; }elseif( $newDate2 == 4 ){ $newDate2 = "Aprile"; }
  elseif( $newDate2 == 5 ){ $newDate2 = "Maggio"; }elseif( $newDate2 == 6 ){ $newDate2 = "Giugno"; }elseif( $newDate2 == 7 ){ $newDate2 = "Luglio"; }elseif( $newDate2 == 8 ){ $newDate2 = "Agosto"; }
  elseif( $newDate2 == 9 ){ $newDate2 = "Settembre"; }elseif( $newDate2 == 10 ){ $newDate2 = "Ottobre"; }elseif( $newDate2 == 11 ){ $newDate2 = "Novebre"; }elseif( $newDate2 == 12 ){ $newDate2 = "Dicembre"; }
  
  
 ?> 
     
    <!-- BLOCK -->
    <div class="block-container">
    	
        <!-- SLIDE 1 -->
        <div id="slides-first-level">
            <div class="slides-container">
                <div class="item" style="background-image:url(img/<?php echo $row4["nome_img"]; ?>)">&nbsp;</div>
            </div>
        </div>
    
        <!-- TEXT -->
        <div class="text-block">
            <h3 class="subtitle"><?php echo $newDate2."  ".$newDate1; ?></h3>
            <h2 class="title"><?php echo $row4["titolo_txt"]; ?></h2>
            <?php echo $row4["testo_txt"]; ?>
        </div>
    </div>
    
 <?php } ?>   

  
        
	<?php include 'include/social.php' ?>

</section>

<?php include 'include/script.php' ?>

</body>
</html>
