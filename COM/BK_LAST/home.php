<?php include("admin/connessione_sql.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<title>Acanto</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- SHOULDER SX -->
<div class="shoulder">
    <header>
        <nav>
            
            <!-- MENU -->
        	<div id="menu-icon-open"></div>
        	<div id="menu-icon-closed" class="no-active"></div>

            <!-- MENU 1° LIVELLO -->
            <ul class="menu-first">
                <li rel="home" class="sel"><a href="index.php">home</a></li>
                <li rel="chi-siamo"><a href="chi-siamo.php">chi siamo</a></li>
                <li rel="leonardo"><a href="leonardo.php">leonardo</a></li>
                <li rel="anticipazioni"><a href="anticipazioni.php">anticipazioni</a></li>
                <li rel="calendario"><a href="calendario.php">calendario</a></li>
                <li rel="tour-guidati"><a href="tour-guidati.php">tour guidati</a></li>
                <li rel="scuole"><a href="scuole.php">scuole</a></li>
                <li rel="viaggi"><a href="viaggi.php">viaggi</a></li>
                <li rel="aziende"><a href="aziende.php">aziende</a></li>
                <li rel="contatti"><a href="contatti.php">contatti</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- FOOTER -->
    <footer>
    
        <!-- LOGO -->
        <img src="img/acanto.png" alt="Acanto" class="logo" />
        
        <!-- LINGUE -->
        <ul class="menu-languages">
            <li class="sel">Italiano</li>
            <li><a href="http://www.acantomilano.com" target="_blank">English</a></li>
        </ul>
        
        <!-- LINK -->
        <a href="http://www.laboratorioa.it/acanto" class="link-sito" target="_blank">www.acantomilano.com</a>
        
        <!-- PIVA -->
        <p class="text">P. IVA 0000000000<br />Tutti i diritti riservati.</p>
	</footer>
</div>

<!-- CONTAINER -->
<section class="container-home">
    
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
    
</section>

<?php include ('include/script.php'); ?>

</body>
</html>
