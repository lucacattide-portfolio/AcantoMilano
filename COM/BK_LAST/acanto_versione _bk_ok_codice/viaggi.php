<?php include("admin/connessione_sql.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<title>Acanto</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body id="viaggi">

<?php include 'include/menu.php' ?>



<!-- CONTAINER -->
<section class="container" id="page-tour-scuole">



<?php 
  $query5 = "SELECT * FROM `testo` WHERE `testo`.`id_vm1` = 8 "; 

  $result5 = $mysqli->query($query5); while ( $row5 = $result5->fetch_array()){ 
  
  $idTxt = $row5["id_txt"]; ?>
  
   <!-- BLOCK -->
   <div class="text-block">
        <h2 class="title"><?php echo $row5["titolo_txt"]; ?></h2>
        <?php echo $row5["testo_txt"]; ?>
    </div>
    
    
    
    <!-- GALLERY LINK -->
    <div class="gallery-link">
    <center>
      <?php 
	  
	    $query6 = "SELECT * FROM `voce_menu_2` WHERE id_txt = '".$idTxt."' "; 
		
	    $result6 = $mysqli->query($query6); while ( $row6 = $result6->fetch_array()){
			
	    $idTxt2 = $row6["id_txt"];
	  
	  ?>
      
         <a href="#sez<?php echo $row6["id_vm2"]; ?>" class="scuole<?php echo $row6["id_vm2"]; ?>" rel="<?php echo $row6["id_vm2"]; ?>">
            <p><span><?php echo $row6["nome_vm2"]; ?></span></p>
            <img src="img/<?php echo $row6["img_vm2"]; ?>" alt="<?php echo $row6["nome_vm2"]; ?>">
        </a>
      
      
      <?php } ?>
    
        
         
        <div class="clear"></div>
      </center>  
  </div>
  
  
  
<?php } ?>  



<?php 
	  
	    //riciclo per la parte testuale inerente alle sezioni
	  
	    $query6 = "SELECT * FROM `voce_menu_2` WHERE id_txt = '".$idTxt."' "; 
		
	    $result6 = $mysqli->query($query6); while ( $row6 = $result6->fetch_array()){
			
	    $idVm2 = $row6["id_vm2"];
	  
	  ?>




    
<?php 
	
  $query7 = "SELECT *,`testo`.`id_txt` AS IDTXT FROM `testo` LEFT JOIN `immagini` ON `immagini`.`id_txt`=`testo`.`id_txt` LEFT JOIN `info` ON `info`.`id_txt`=`testo`.`id_txt`  WHERE `testo`.`id_vm2` = '".$idVm2."' "; 

  $result7 = $mysqli->query($query7); while ( $row7 = $result7->fetch_array()){ 
  
 ?>
  
  <!-- BLOCK 5 -->
    <div class="block-container">
  
        <!-- SLIDE -->
        <div id="slides-first-level">
            <div class="slides-container" id="sez<?php echo $idVm2 ?>">
                <div class="item" style="background-image:url(img/<?php echo $row7["nome_img"]; ?>)">&nbsp;</div>
            </div>
        </div>
        
        
        
        <!-- TEXT -->
        <div class="text-block">
            <h2 class="title"><?php echo $row7["titolo_txt"]; ?></h2>
            <?php echo $row7["testo_txt"]; ?>
        
            <!-- INFO -->
            <div class="info">
                <p>
                    Per informazioni chiamaci o scrivi a:
                    <span><?php echo $row7["txt2_info"]; ?></span>
                    
                </p>
            </div>
            
            <!-- DOWNLOAD -->
            <div class="download">
                <a  href="img/<?php echo $row7["txt_info"]; ?>" class="image"><img src="img/download.png" alt="download"></a>
                <p>
                    Scarica il pdf con il calendario<br>del tour guidato
                </p>
            </div>
        </div>
        
        
       <div class="clear"></div>  
        
    </div>   

  <?php }?>    
   
 

<?php /* end riciclo */ }  ?>






    

        
	<?php include 'include/social.php' ?>

</section>

<?php include 'include/script.php' ?>

</body>
</html>
