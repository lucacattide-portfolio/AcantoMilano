 <?php
 
 $lista = $_FILES['files'];
 
 $result = $mysqli->query("SELECT * FROM `categorie` ORDER BY id_cat DESC LIMIT 1 "); while ( $row = $result->fetch_array()){ $id = $row["id-cat"] + 1;  }
 
 
 
 foreach ($lista as $imgA) {
		  
		
		  
		  
	   $target_pathA = "../imgs/pics/";
       $target_pathA = $target_pathA.basename($imgA['name']);	  
		
	   if( is_uploaded_file($imgA["tmp_name"]) ) {
	
	   move_uploaded_file($imgA["tmp_name"], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	   
	   $queryA = ("INSERT INTO `gallery-photo`(`id_g`, `id_cat`, `img_g`) VALUES (NULL,'".$id."','".$imgA["name"]."')");
	   
	   $mysqli->query($queryA);
		
	   }
	   
header("Location: index1.php?name=ncategoria&cat=Gallery&ob5=ok"); 
       
}       

?>