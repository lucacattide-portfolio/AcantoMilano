<?php include("admin/connessione_sql.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<title>Acanto</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body id="calendario">

<?php include 'include/menu.php' ?>

<!-- CONTAINER -->
<section class="container" id="page-calendario">

<?php

$queryA = "SELECT *,`testo`.`id_txt` AS IDTXT FROM `testo` LEFT JOIN `immagini` ON `immagini`.`id_txt`=`testo`.`id_txt` LEFT JOIN `info` ON `info`.`id_txt`=`testo`.`id_txt`  WHERE `testo`.`id_vm1` = '5' ORDER BY DATE(data_txt) ASC "; 

$resultA = $mysqli->query($queryA); while ( $rowA = $resultA->fetch_array()){ 

$IdTxt = $rowA["IDTXT"];

$originalDate3 = $rowA["data_txt"]; 

$newDate3 = date("d", strtotime($originalDate3));

$newDate2 = date("m", strtotime($originalDate3));




 if( $newDate2 == 1 ){ $newDate2 = "Gennaio"; }elseif( $newDate2 == 2 ){ $newDate2 = "Febbraio"; }elseif( $newDate2 == 3 ){ $newDate2 = "Marzo"; }elseif( $newDate2 == 4 ){ $newDate2 = "Aprile"; }
 elseif( $newDate2 == 5 ){ $newDate2 = "Maggio"; }elseif( $newDate2 == 6 ){ $newDate2 = "Giugno"; }elseif( $newDate2 == 7 ){ $newDate2 = "Luglio"; }elseif( $newDate2 == 8 ){ $newDate2 = "Agosto"; }
 elseif( $newDate2 == 9 ){ $newDate2 = "Settembre"; }elseif( $newDate2 == 10 ){ $newDate2 = "Ottobre"; }elseif( $newDate2 == 11 ){ $newDate2 = "Novembre"; }elseif( $newDate2 == 12 ){ $newDate2 = "Dicembre"; }



  
?>





    <!-- NEWS 1 -->
    <div class="news" id="news<?php echo $IdTxt; ?>">

        <!-- SLIDE -->
        <div id="slides-first-level">
            <div class="slides-container">
                <div class="item" style="background-image:url(img/<?php echo $rowA["nome_img"]; ?>)">&nbsp;</div>
            </div>
        </div>
    
        <!-- TEXT -->
        <div class="text-block">
            <h3 class="subtitle"><?php echo "".$newDate3."  ".$newDate2." ".date("Y")." " ?></h3>
            <h2 class="title"><?php echo $rowA["titolo_txt"]; ?></h2>
            <?php echo $rowA["testo_txt"]; ?>
            <!-- DOWNLOAD -->
            
            <?php if($rowA["txt_info"] == ""){}else{ ?>
            <div class="download">
                <a  href="img/<?php echo $rowA["txt_info"]; ?>" class="image"><img src="img/<?php echo $rowA["txt_Info"]; ?>" alt="download"></a>
                <p>
                    Scarica il pdf con il calendario<br>del tour guidato
                </p>
            </div>
            <?php } ?>
        </div>

    </div>
    

<?php } ?>    

    

   
        
	<?php include 'include/social.php' ?>

</section>

<?php include 'include/script.php' ?>

</body>
</html>
