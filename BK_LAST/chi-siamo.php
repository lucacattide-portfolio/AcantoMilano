<?php include("admin/connessione_sql.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<title>Acanto</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body id="chi-siamo">

<?php include 'include/menu.php' ?>

<!-- CONTAINER -->
<section class="container" id="page-chisiamo">

    <!-- BLOCK 1 -->
<?php 
	
	  $query4 = "SELECT * FROM `testo` LEFT JOIN `immagini` USING( id_txt ) WHERE `testo`.`id_vm1` = 2 "; 
	
	  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){  
  
      
	  if( $row4["nome_img"] != "" ){  ?>
      
      
      
      <hr>
    <div class="text-block">
    	<div class="photo" id="sez<?php echo $row4["id_txt"]; ?>"><img src="img/<?php echo $row4["nome_img"]; ?>" alt="<?php echo $row4["titolo_txt"]; ?>"></div>
      <h2 class="title"><?php echo $row4["titolo_txt"]; ?></h2>
        <?php echo $row4["testo_txt"]; ?>
    </div>
	  
	  
	  
	<?php  
	
	 }else{  

   ?>
    
    
	<div class="text-block" id="sez<?php echo $row4["id_txt"]; ?>">
        <h2 class="title"><?php echo $row4["titolo_txt"]; ?></h2>
        <?php echo $row4["testo_txt"]; ?>
        
    </div>
    
   <?php } } ?>

    <!-- BLOCK 2 
    <hr>
    <div class="text-block">
    	<div class="photo" id="sez2"><img src="img/carlotta.gif" alt="Carlotta"></div>
      <h2 class="title">CARLOTTA</h2>
        <p>
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.<br>
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
        </p>
    </div>

    BLOCK 3 
    <hr>
    <div class="text-block">
    	<div class="photo" id="sez3"><img src="img/emanuela.gif" alt="Emanuela"></div>
      <h2 class="title">EMANUELA</h2>
        <p>
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.<br>
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
        </p>
    </div> -->
        
	<?php include 'include/social.php' ?>

</section>

<?php include 'include/script.php' ?>

</body>
</html>
