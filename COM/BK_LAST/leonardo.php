<?php include("admin/connessione_sql.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<title>Acanto</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body id="leonardo">

<?php include 'include/menu.php' ?>

<!-- CONTAINER -->
<section class="container" id="page-leonardo">


<?php 
	
  $query4 = "SELECT * FROM `testo` LEFT JOIN `immagini` ON `immagini`.`id_txt`=`testo`.`id_txt` LEFT JOIN `info` ON `info`.`id_txt`=`testo`.`id_txt`  WHERE `testo`.`id_vm1` = 3 "; 

  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){ $idTxt = $row4["id_txt"];  ?>

    <!-- BLOCK -->
    <div class="block-container">
        
        <!-- SLIDE -->
        <div id="slides-first-level">
            <div class="slides-container">
                <div class="item" style="background-image:url(img/<?php echo $row4["nome_img"]; ?>)">&nbsp;</div>
            </div>
        </div>
        
        
        
    
        <!-- TEXT -->
        <div class="text-block">
            <h2 class="title"><?php echo $row4["titolo_txt"]; ?></h2>
            
            <?php echo $row4["testo_txt"]; ?>
            
        
           <?php  if( $row4["txt_info"] != "" || $row4["txt2_info"] != "" ){   ?>
            <!-- INFO -->
            <div class="info">
                <p>
                    Per informazioni chiamaci o scrivi a:
                    <span>+39 <?php echo $row4["txt2_info"]; ?></span>
                    <a href="mailto:<?php echo $row4["txt_info"]; ?>"><?php echo $row4["txt_info"]; ?></a>
                </p>
            </div>
           <?php }else{} ?> 
            
        </div>
    </div>
    
    <?php } ?>
        
	<?php include 'include/social.php' ?>

</section>

<?php include 'include/script.php' ?>

</body>
</html>
