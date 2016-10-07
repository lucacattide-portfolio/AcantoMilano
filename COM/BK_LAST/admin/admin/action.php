<?php

include("connessione_sql.php");
 
 
 

// Modifica Home //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

if(isset($_POST["homeMod"])){
	
$target_pathA = "../imgs/pics/";
$target_pathA = $target_pathA.basename($_FILES['imgH']['name']);


$titolo = "home";

$imgA = $_FILES["imgH"];	


    //  con img ////////////////////////////// 
    if($imgA["name"] != ""){
	
	
	  if( is_uploaded_file($imgA["tmp_name"]) ) {
	
	   move_uploaded_file($imgA["tmp_name"], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");	
	   
	   $query  = ("UPDATE `home` SET `img_home` = '".$imgA["name"]."',`link1_home`='".mysql_escape_string($_POST["link1"])."',`link2_home`='".mysql_escape_string($_POST["link2"])."',`link3_home`='".mysql_escape_string($_POST["link3"])."',`link4_home`='".mysql_escape_string($_POST["link4"])."',`link5_home`='".mysql_escape_string($_POST["link5"])."'  WHERE `id_home` = 1");
		  
	   $stmt = $mysqli->prepare($query);
		  
		  if( $stmt->execute() ){
			 
			 header("Location: index1.php?name=$titolo&ob=ok"); 
			 
		   }else{
			 
			 header("Location: index1.php?name=$titolo&ok=no");
			
		   }
	
	 }else{  header("Location: index1.php?name=$titolo&ok=no"); }
	 
	}
	
	
	//  Senza img ////////////////////////////// 
	else{
		
		
       $query  = ("UPDATE `home` SET `link1_home`='".mysql_escape_string($_POST["link1"])."',`link2_home`='".mysql_escape_string($_POST["link2"])."',`link3_home`='".mysql_escape_string($_POST["link3"])."',`link4_home`='".mysql_escape_string($_POST["link4"])."',`link5_home`='".mysql_escape_string($_POST["link5"])."'  WHERE `id_home` = 1");
		  
	   $stmt = $mysqli->prepare($query);
		  
		  if( $stmt->execute() ){
			 
			 header("Location: index1.php?name=$titolo&ob5=ok"); 
			 
		   }else{
			 
			 header("Location: index1.php?name=$titolo&ob5=no");
			
		   }	
    		
	}


}





// Inserisci gallery video //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

if(isset($_POST["nuovoGv"])){
	
	
	$titolo = "galleryV";
	
	
	$query = ("INSERT INTO `gallery-video`(`id_gv`, `code_gv`, `name_gv`) VALUES (NULL,'".mysql_escape_string($_POST["code"])."','".mysql_escape_string($_POST["name"])."')");
	
	
	if( $mysqli->query($query) ){
			 
			 header("Location: index1.php?name=$titolo&ob5=ok"); 
			 
		   }else{
			 
			 header("Location: index1.php?name=$titolo&ob5=no");
			
		   }	
	
	
}



// Modifica gallery video //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

if(isset($_POST["modificaGv"])){
	
	 
	 $titolo = "galleryV";
	
	 $query  = ("UPDATE `gallery-video` SET `code_gv`='".mysql_escape_string($_POST["code"])."',`name_gv`='".mysql_escape_string($_POST["name"])."' WHERE `id_gv`= '".$_POST["id"]."'");
		  
	 $stmt = $mysqli->prepare($query);
		
		if( $stmt->execute() ){
		   
		   header("Location: index1.php?name=$titolo&ob5=ok"); 
		   
		 }else{
		   
		   header("Location: index1.php?name=$titolo&ob5=no");
		  
		 }	
	
	
}


// Elimina gallery video //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

if(isset($_POST["eliminaGv"])){
	
	
$titolo = "galleryV";
	
	 $query  = ("DELETE FROM `gallery-video` WHERE `id_gv`= '".$_POST["id"]."'");
		  
	 $stmt = $mysqli->prepare($query);
		
		if( $stmt->execute() ){
		   
		   header("Location: index1.php?name=$titolo&ob5=ok"); 
		   
		 }else{
		   
		   header("Location: index1.php?name=$titolo&ob5=no");
		  
		 }	


}


// Inserisci categoria //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

if(isset($_POST["nCat"])){
	
	$target_pathB = "../imgs/pics/";
    $target_pathB = $target_pathB.basename($_FILES['imgA']["name"]);	
	$imgB = $_FILES["imgA"]; 
	
	$titolo = "categorie";
	$tag = $_POST["tag"];
	
	if(empty($_POST["video"])){
		$video = "";
     }else{
		$video = mysql_escape_string($_POST["video"]);
	 }
	
	 //registr
	 if(is_uploaded_file($imgB["tmp_name"])) { 

     //muovi file dentro directory img da tmp

      move_uploaded_file($imgB["tmp_name"], $target_pathB) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	 
	  $query = ("INSERT INTO `categorie`(`id_cat`, `nome_cat`, `titolo_cat`, `txt_cat`, `citta_cat`, `tags_cat`, `video_cat`, `link_cat`, `data_start`, `data_end`, `img_cat` ) VALUES (NULL,'".mysql_escape_string($_POST["cat"])."','".mysql_escape_string($_POST["titolo"])."','','".mysql_escape_string($_POST["citta"])."','".implode(',',$tag)."','".$video."','".mysql_escape_string($_POST["link"])."','".$_POST["dataIn"]."','".$_POST["dataEnd"]."','".$imgB["name"]."')");
	 
	 
	  if( $mysqli->query($query) ){
		  
		  header("Location: index1.php?name=$titolo&ob5=ok&$lista"); 
			   
			 }else{
			   
		  header("Location: index1.php?name=$titolo&ob5=no");
			   
	  }	 
	 
	 
	 
	 
	  }else{
		 
		 
      $lista = $_FILES['imgS']["tmp_name"];
		 
		 
	  $query = ("INSERT INTO `categorie`(`id_cat`, `nome_cat`, `titolo_cat`, `txt_cat`, `citta_cat`, `tags_cat`, `video_cat`, `link_cat`, `data_start`, `data_end`, `img_cat` ) VALUES ('".mysqli_insert_id()."','".mysql_escape_string($_POST["cat"])."','".mysql_escape_string($_POST["titolo"])."','','".mysql_escape_string($_POST["citta"])."','".implode(',',$tag)."','".mysql_escape_string($_POST["video"])."','".mysql_escape_string($_POST["link"])."','".$_POST["dataIn"]."','".$_POST["dataEnd"]."','')");	 
		 
	   
	   if( $mysqli->query($query) ){
		   
		  
		    $result = $mysqli->query("SELECT * FROM `categorie` ORDER BY id_cat DESC LIMIT 1 "); while ( $row = $result->fetch_array()){ $id = $row["id_cat"];  }
		   
		   
		    if(empty($lista)){}else{
	 
	
			  foreach ($lista as $key => $tmp_name) {
			 
			  $file_name = $key.$_FILES['imgS']['name'][$key];
			  $file_tmp =$_FILES['imgS']['tmp_name'][$key];  
				  
				  
			   $target_pathA = "../imgs/pics/";
			   $target_pathA = $target_pathA.basename($file_name);	  
				
			   if(is_uploaded_file($file_tmp)){
			
			   move_uploaded_file($file_tmp, $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
			   
			   $mysqli->query("INSERT INTO `gallery-photo`(`id_g`, `id_cat`, `img_g`) VALUES (NULL,'".$id."','".$file_name."')");
			   
			   }
			   
			   } 
			   
			}
		   
		   
		   
		   
			   
			   header("Location: index1.php?name=$titolo&ob5=ok&$lista"); 
			   
			 }else{
			   
			   header("Location: index1.php?name=$titolo&ob5=no");
			   
			   
	   }	 
		 
		 
    //gallery
  
	
	}
	   
		
 
	
	
}
	
// Modifica categoria //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

	
if(isset($_POST["mCat"])){
	
	$target_pathB = "../imgs/pics/";
    $target_pathB = $target_pathB.basename($_FILES['imgA']["name"]);	
	$imgB = $_FILES["imgA"]; 
	
	
	
	
	$titolo = "categorie";	
	$tag = $_POST["tag"];
	
	$lista = $_FILES['imgS']["tmp_name"];
	
	
	
	if(is_uploaded_file($imgB["tmp_name"])) { 

     //muovi file dentro directory img da tmp

      move_uploaded_file($imgB["tmp_name"], $target_pathB) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	 
	 
	 $query  = ("UPDATE `categorie` SET `titolo_cat`='".mysql_escape_string($_POST["titolo"])."',`citta_cat`='".mysql_escape_string($_POST["citta"])."',`tags_cat`='".implode(',',$tag)."',`video_cat`='".mysql_escape_string($_POST["video"])."',`link_cat`='".mysql_escape_string($_POST["link"])."',`data_start`='".mysql_escape_string($_POST["dataIn"])."',`data_end`='".mysql_escape_string($_POST["dataEnd"])."', `img_cat`='".$imgB["name"]."' WHERE id_cat = '".$_POST["id"]."'");
	 
	 
	 }else{
		 
		 
	 $query  = ("UPDATE `categorie` SET `titolo_cat`='".mysql_escape_string($_POST["titolo"])."',`citta_cat`='".mysql_escape_string($_POST["citta"])."',`tags_cat`='".implode(',',$tag)."',`video_cat`='".mysql_escape_string($_POST["video"])."',`link_cat`='".mysql_escape_string($_POST["link"])."',`data_start`='".mysql_escape_string($_POST["dataIn"])."',`data_end`='".mysql_escape_string($_POST["dataEnd"])."' WHERE id_cat = '".$_POST["id"]."'"); 
		 
		 
	 }
	
	
	
	
	  
	
	
	if(empty($lista)){}else{
	
	
	  foreach ($lista as $key => $tmp_name) {
	 
	  $file_name = $key.$_FILES['imgS']['name'][$key];
      $file_tmp =$_FILES['imgS']['tmp_name'][$key];  
		  
		  
	   $target_pathA = "../imgs/pics/";
       $target_pathA = $target_pathA.basename($file_name);	  
		
	   if(is_uploaded_file($file_tmp)){
	
	   move_uploaded_file($file_tmp, $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	   
	   $mysqli->query("INSERT INTO `gallery-photo`(`id_g`, `id_cat`, `img_g`) VALUES (NULL,'".$_POST["id"]."','".$file_name."')");
	   
	   }
	   
	   } 
	   
	}
	  
	
	$stmt = $mysqli->prepare($query);
	  
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
	
	
	
	
}




// Elimina categoria //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

if(isset($_POST["eliminaCat"])){
	
	
     $titolo = "categorie";	
	
	 $query  = ("DELETE FROM `categorie` WHERE `id_cat`= '".$_POST["id"]."'");
		  
	 $stmt = $mysqli->prepare($query);
		
		if( $stmt->execute() ){
		   
		   header("Location: index1.php?name=$titolo&ob5=ok"); 
		   
		 }else{
		   
		   header("Location: index1.php?name=$titolo&ob5=no");
		  
		 }	


}





if(isset($_POST["eliminaIMG"])){
	
	
     $titolo = "categorie";	
	
	 $query  = ("DELETE FROM `gallery-photo` WHERE `id_g`= '".$_POST["id"]."'");
		  
	 $stmt = $mysqli->prepare($query);
		
		if( $stmt->execute() ){
		   
		   header("Location: index1.php?name=$titolo&ob5=ok"); 
		   
		 }else{
		   
		   header("Location: index1.php?name=$titolo&ob5=no");
		  
		 }	


}


// Mappa  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

if(isset($_POST["mappa"])){
	
    $mysqli->query("INSERT INTO `mappa`(`id_mappa`, `x_mappa`, `y_mappa`, `id_cat`, `id_video`, `id_photo`, `visibile`) VALUES (NULL,'".$_POST["x"]."','".$_POST["y"]."','','','','')");
	
	$result = $mysqli->query("SELECT * FROM `mappa` LEFT JOIN `categorie` USING( id_cat )"); while ( $row = $result->fetch_array()){
		
		$id_map = $row["id_mappa"];
		$x = $row["x_mappa"]; 
		$y = $row["y_mappa"];
		$dataIn = $row["data_start"];
		$dataEnd = $row["data_end"];
		
		echo "<div class='pointer' style='top:".$y."px; left:".$x."px; '><center>$id_map</center></div>";
	
	}
	
}


if(isset($_POST["mappa2"])){
	
    $result = $mysqli->query("SELECT COUNT(*) FROM `mappa` ORDER BY id_mappa DESC"); while ( $row = $result->fetch_array()){ $Nidm = $row["COUNT(*)"]; }
		
		
	if($Nidm <= 0){ echo '<h3>Clicca sulla mappa e inserisci gli <span class="semi-bold">EVENTI</span></h3>';  }else{	
	
	$result = $mysqli->query("SELECT * FROM `mappa_reg` ORDER BY id_mappa DESC"); while ( $row = $result->fetch_array()){  $idm = $row["id_mappa"];
		
       if($idm <= 0){ echo 'PROVA'; } 
		
		
       echo '<form action="action.php" method="post" enctype="multipart/form-data">
             
			 <input type="hidden" name="id" value="'.$idm.'" />
             
			 <h3>Marker n° <span class="semi-bold">'.$idm.'</span></h3>
             <label class="form-label">Seleziona Evento</label>
             
           <div class="controls">
           <select>';
		   
		   $resultA = $mysqli->query("SELECT * FROM `categorie` WHERE nome_cat LIKE 'Register' OR nome_cat LIKE 'Seminari'  ORDER BY id_cat DESC "); while ( $row = $resultA->fetch_array()){  $idCat = $row["id_cat"]; $nCat = $row["titolo_cat"];
            
            echo '<option value="'.$idCat.'">'.$nCat.'</option>';
			 
		   }
			 
          echo '</select>
            </div>
           
           <br>

           <div class="controls">
            <button type="" name="mappa4" class="btn btn-primary btn-sm btn-small">Associa Evento</button>
           </div>
           
           <hr>
          </form>';
		
	  }
	
	}
	
}


if(isset($_POST["mappa3"])){
	
   
	
	$result = $mysqli->query("SELECT * FROM `mappa`"); while ( $row = $result->fetch_array()){
		
		$id_map = $row["id_mappa"];
		$x = $row["x_mappa"]; 
		$y = $row["y_mappa"];
		
		echo "<div class='pointer' style='top:".$y."px; left:".$x."px; '><center>$id_map</center></div>";
	
	}
	
}



if(isset($_POST["mappa3"])){
	
   
	
	$result = $mysqli->query("SELECT * FROM `mappa` "); while ( $row = $result->fetch_array()){
		
		$id_map = $row["id_mappa"];
		$x = $row["x_mappa"]; 
		$y = $row["y_mappa"];
		
		echo "<div class='pointer' style='top:".$y."px; left:".$x."px; '><center>$id_map</center></div>";
	
	}
}
	
if(isset($_POST["mappa4"])){
	
	$titolo = "mappa";
	
    $query = "UPDATE `mappa` SET `id_cat`='".$_POST["id_cat"]."' WHERE id_mappa = '".$_POST["id_mappa"]."' ";
	
	$stmt = $mysqli->prepare($query);
		
		if( $stmt->execute() ){
		   
		   header("Location: index1.php?name=$titolo&ob5=ok"); 
		   
		 }else{
		   
		   header("Location: index1.php?name=$titolo&ob5=no");
		  
		 }	

	
}







if(isset($_POST["mappa5"])){
	
	$titolo = "mappa";
	
    $query = "UPDATE `mappa` SET `id_cat`='".$_POST["id_cat"]."', `id_video`='".$_POST["id_video"]."',`id_photo`='".$_POST["id_gallery"]."',`visibile`='".$_POST["visibile"]."' WHERE id_mappa = '".$_POST["id_mappa"]."' ";
	
	$stmt = $mysqli->prepare($query);
		
		if( $stmt->execute() ){
		   
		   header("Location: index1.php?name=$titolo&ob5=ok"); 
		   
		 }else{
		   
		   header("Location: index1.php?name=$titolo&ob5=no");
		  
		 }	

	
}



if(isset($_POST["mappa6"])){
	
	
     $titolo = "mappa";	
	
	 $query  = ("DELETE FROM `mappa` WHERE `id_mappa`= '".$_POST["id_mappa"]."'");
		  
	 $stmt = $mysqli->prepare($query);
		
		if( $stmt->execute() ){
		   
		   header("Location: index1.php?name=$titolo&ob5=ok"); 
		   
		 }else{
		   
		   header("Location: index1.php?name=$titolo&ob5=no");
		  
		 }	


}


?>