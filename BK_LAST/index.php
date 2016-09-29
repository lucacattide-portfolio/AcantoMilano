<?php include("admin/connessione_sql.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<title>Acanto</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body id="index">

<?php
//------- SESSIONE -------------

session_start();

// se la sessione non è stata avviata la crea

if ( empty($_SESSION['code']) ){

	 session_regenerate_id();

	 $_SESSION["code"] = session_id();
	
	 $_SESSION['vista'] = '0';

	//trace("sessiona creata");
	
	

}else{

	//trace("sessione già avviata");
	
	$_SESSION['vista'] = '0';

}

?>

<?php include 'include/menu.php' ?>

<!-- CONTAINER -->
<section class="container-home">
    
    <!-- ROUND -->
    <div class="second circle">
        <strong>100<i>%</i></strong>
    </div>
    
   <!-- ROUND -->
    <div class="round">
    <?php 
      
	  $query = "SELECT * FROM `testo` WHERE `id_vm1` = '1' "; 
	  
	  $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ 
	  
	  echo "<h2>".$row["testo_txt"]."</h2>";
	  
				  
	  } ?>
    </div>

    <!-- SLIDE -->
    <div id="slides">
        <div class="slides-container">
        <?php 
        
	  $query4 = "SELECT * FROM `gallery` LEFT JOIN `immagini` USING( id_gal ) WHERE `gallery`.`id_vm1` = '1' "; 
	
	  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){  ?>
            <div class="item" style="background-image:url(img/<?php echo $row4["nome_img"]; ?>)" >
                <h3><?php echo $row4["txt_img"]; ?></h3>
            </div>
        <?php } ?>    
        </div>
    </div>
        
	<?php include 'include/social.php' ?>

</section>

<?php include 'include/script.php' ?>

</body>
</html>
