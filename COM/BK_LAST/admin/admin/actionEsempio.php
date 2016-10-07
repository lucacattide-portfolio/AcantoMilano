<?php

	
include("connessione_sql.php");
 
 
 

// Inserimento prodotto  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 
 
 if(isset($_POST["prodSend"])){
	
 $target_pathA = "../imgs/thumbs/";
 $target_pathA = $target_pathA.basename($_FILES['thumb']['name']);
 
 
 $target_pathB = "../imgs/shirts/";
 $target_pathB = $target_pathB.basename($_FILES['img']['name']);


 $imgA = $_FILES["thumb"];
 
 $imgB = $_FILES["img"];
 
 $color = $_POST["color"];
 
 $varColor = implode("|",$color);


 if(empty($imgA["name"])  && $imgB["name"] != "" ){
	 
	 
	// immagine B
	if( is_uploaded_file($imgB["tmp_name"]) ) {
		 
	  //muovi immagine
	  move_uploaded_file($imgB["tmp_name"], $target_pathB) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
		
	  $query  = ("INSERT INTO `prodotti`(`id_prod`, `nome_prod`, `txt_prod`, `colori_prod`, `img_prod`, `thumb_prod`) VALUES (NULL,'".mysql_escape_string($_POST["nome"])."','".mysql_escape_string($_POST["desc"])."','".$varColor."','".$imgB["name"]."','')") ;
	 
	  $stmt = $mysqli->prepare($query);
	 
	 
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
	
	
	 }else{ echo "Trasferimento non eseguito";  }
	 
  
  }
  elseif( empty($imgB["name"])  && $imgA["name"] != "" ){
	  
	  
	// immagine B
	if( is_uploaded_file($imgA["tmp_name"]) ) {
		 
	  //muovi immagine
	  move_uploaded_file($imgA["tmp_name"], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
		
	  $query  = ("INSERT INTO `prodotti`(`id_prod`, `nome_prod`, `txt_prod`, `colori_prod`, `img_prod`, `thumb_prod`) VALUES (NULL,'".mysql_escape_string($_POST["nome"])."','".mysql_escape_string($_POST["desc"])."','".$varColor."','','".$imgA["name"]."')") ;
	 
	  $stmt = $mysqli->prepare($query);
	 
	 
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
	
	
	 }else{ echo "Trasferimento non eseguito";  }
	  
	  
  }
  elseif(empty($imgA["name"])  && empty($imgB["name"])){
	  
	  
		
	  $query  = ("INSERT INTO `prodotti`(`id_prod`, `nome_prod`, `txt_prod`, `colori_prod`, `img_prod`, `thumb_prod`) VALUES (NULL,'".mysql_escape_string($_POST["nome"])."','".mysql_escape_string($_POST["desc"])."','".$varColor."','','')") ;
	 
	  $stmt = $mysqli->prepare($query);
	 
	 
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
  
  }else{
	  
	 
	 
	 if( is_uploaded_file($imgA["tmp_name"])  && is_uploaded_file($imgB["tmp_name"]) ) {
		 
	  //muovi immagine
	  move_uploaded_file($imgA["tmp_name"], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	  move_uploaded_file($imgB["tmp_name"], $target_pathB) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
		
	  $query  = ("INSERT INTO `prodotti`(`id_prod`, `nome_prod`, `txt_prod`, `colori_prod`, `img_prod`, `thumb_prod`) VALUES (NULL,'".mysql_escape_string($_POST["nome"])."','".mysql_escape_string($_POST["desc"])."','".$varColor."','".$imgB["name"]."','".$imgA["name"]."')") ;
	 
	  $stmt = $mysqli->prepare($query);
	 
	 
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
	
	
	 }else{ echo "Trasferimento non eseguito";  } 
 
	  
  }
	 
}




// Modifica prodotto  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
if(isset($_POST["prodMod"])){
	
 $target_pathA = "../imgs/thumbs/";
 $target_pathA = $target_pathA.basename($_FILES['thumb']['name']);
 
 
 $target_pathB = "../imgs/shirts/";
 $target_pathB = $target_pathB.basename($_FILES['img']['name']);



 $idProd = $_POST["idP"]; 

 $imgA = $_FILES["thumb"];
 
 $imgB = $_FILES["img"];
 
 $color = $_POST["color"];
 
 $varColor = implode("|",$color);
 
 
 // se non ci sono immagini////////////////////////////
if( empty($imgB["name"])  && empty($imgA["name"]) ){
	 
	 
	  $query  = ("UPDATE `prodotti` SET `nome_prod`= '".mysql_escape_string($_POST["nome"])."',`txt_prod` = '".mysql_escape_string($_POST["desc"])."',`colori_prod` = '".$varColor."' WHERE id_prod = '".$idProd."'");
	  
	  $stmt = $mysqli->prepare($query);
	  
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
 
   	 
}
// solo thumb
elseif( empty($imgB["name"])  && $imgA["name"] != ""){

	  if( is_uploaded_file($imgA["tmp_name"]) ) {
		 
	  //muovi immagine
	  move_uploaded_file($imgA["tmp_name"], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	  
	  
      $query  = ("UPDATE `prodotti` SET `nome_prod`= '".mysql_escape_string($_POST["nome"])."',`txt_prod` = '".mysql_escape_string($_POST["desc"])."',`colori_prod` = '".$varColor."', `thumb_prod` = '".$imgA["name"]."'  WHERE id_prod = '".$idProd."'");
	  
	  $stmt = $mysqli->prepare($query);
	  
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
	   
	  }else{ header("Location: index1.php?name=$titolo&ob5=no"); }
 
}
// solo img
elseif( empty($imgA["name"])  && $imgB["name"] != ""){

	  if( is_uploaded_file($imgB["tmp_name"]) ) {
		 
	  //muovi immagine
	  move_uploaded_file($imgB["tmp_name"], $target_pathB) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	  
	  
      $query  = ("UPDATE `prodotti` SET `nome_prod`= '".mysql_escape_string($_POST["nome"])."',`txt_prod` = '".mysql_escape_string($_POST["desc"])."',`colori_prod` = '".$varColor."', `img_prod` = '".$imgB["name"]."'  WHERE id_prod = '".$idProd."'");
	  
	  $stmt = $mysqli->prepare($query);
	  
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
	   
	  }else{ header("Location: index1.php?name=$titolo&ob5=no"); }
 
}

//img thumb
else{
	
	 if( is_uploaded_file($imgA["tmp_name"])  && is_uploaded_file($imgB["tmp_name"]) ) {
		 
	  //muovi immagine
	  move_uploaded_file($imgA["tmp_name"], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	  move_uploaded_file($imgB["tmp_name"], $target_pathB) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	
	
	$query  = ("UPDATE `prodotti` SET `nome_prod`= '".mysql_escape_string($_POST["nome"])."',`txt_prod` = '".mysql_escape_string($_POST["desc"])."',`colori_prod` = '".$varColor."', `img_prod` = '".$imgB["name"]."', `thumb_prod` = '".$imgA["name"]."'  WHERE id_prod = '".$idProd."'");
	  
	  $stmt = $mysqli->prepare($query);
	  
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
	   
	  }else{ header("Location: index1.php?name=$titolo&ob5=no"); }




}



}
 


// Elimina prodotto  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST["del"])){

$stmt = $mysqli->prepare("DELETE FROM `prodotti` WHERE id_prod = '".$_POST["id"]."' "); 




	  
	  if( $stmt->execute() ){
		 
		 header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	   }else{
		 
		 header("Location: index1.php?name=$titolo&ob5=no");
		
	   }
 
 
}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
// HOME  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
 
 
 
if(isset($_POST["sezione"])){
	
 $target_path = "../img/";
 $target_path = $target_path.basename($_FILES['img_txt']['name']);

 $id= $_POST["id"];
 
 $red = "localhost/".$_POST["red"]; 
  
 $imgB = $_FILES["img_txt"];
 


     //se l'update del file è avvenuto correttamente

     if(is_uploaded_file($imgB["tmp_name"])) { 

     //muovi file dentro directory img da tmp

      move_uploaded_file($imgB["tmp_name"], $target_path) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
 
      $mysqli->query("UPDATE `sezioni` SET `txt_sez`='".mysql_escape_string($_POST["desc"])."',`img_sez`='".$imgB["name"]."' WHERE id_sez = ".$id." ");
	  
	  $RID = printf($mysqli->affected_rows);
	  $result = $mysqli->query("SELECT * FROM `sezioni` WHERE id_sez = $id");   while ($row = $result->fetch_array()) { $titolo = $row["title_sez"];
	  
	  if ( $RID >= 1 && $RID < 2) { 
	     
		 
		 
		 header("Location: index1.php?name=$titolo&ob=ok");
		 
		 
	  } 
	  else 
	  { 
	     header("Location: index1.php?name=$titolo&ob=no"); 
	  
	  } 
	  
	  }
	
	 }
	 else{
		 
		 
	  $mysqli->query("UPDATE `sezioni` SET `txt_sez`='". mysql_escape_string($_POST["desc"])."' WHERE id_sez = ".$id." ");
	  
	   $result = $mysqli->query("SELECT * FROM `sezioni` WHERE id_sez = $id");   while ($row = $result->fetch_array()) { $titolo = $row["title_sez"];
	  
	  $RID = printf($mysqli->affected_rows);
	  
	  if ( $RID >= 1 && $RID < 2) { header("Location: index1.php?name=$titolo&ob=ok");} else { header("Location: index1.php?name=$titolo&ob=no"); } 
		 
		 
     }
	 
	 }
	 
}



// HOME 2 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
 
 
 
if(isset($_POST["sezione2"])){
	
 $target_path = "../img/";
 $target_path = $target_path.basename($_FILES['img_txt']['name']);

 $id= $_POST["id"];
 
 $idlr = $_POST["idlr"];
 
 $red = "localhost/".$_POST["red"]; 
  
 $imgB = $_FILES["img_txt"];
 


     //se l'update del file è avvenuto correttamente

     if(is_uploaded_file($imgB["tmp_name"])) { 

     //muovi file dentro directory img da tmp

      move_uploaded_file($imgB["tmp_name"], $target_path) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
 
      $mysqli->query("UPDATE `lr-sez` SET `txt_lr`='".mysql_escape_string($_POST["desc"])."',`img_lr`='".$imgB["name"]."' WHERE id_lr = '".$idlr."' ");
	  
	  $RID = printf($mysqli->affected_rows);
	  
	  $result = $mysqli->query("SELECT * FROM `sezioni` WHERE id_sez = $id");   while ($row = $result->fetch_array()) { $titolo = $row["title_sez"];
	  
	  if ( $RID >= 1 && $RID < 2) { 
	     
		 
		 
		 header("Location: index1.php?name=$titolo&ob2=ok");
		 
		 
	  } 
	  else 
	  { 
	     header("Location: index1.php?name=$titolo&ob2=no"); 
	  
	  } 
	  
	  }
	
	 }
	 else{
		 
		 
	  $mysqli->query("UPDATE `lr-sez` SET `title_lr`='".mysql_escape_string($_POST["titolo"])."', `txt_lr`='".mysql_escape_string($_POST["desc"])."' WHERE id_lr = '".$idlr."' ");
	  
	   $result = $mysqli->query("SELECT * FROM `sezioni` WHERE id_sez = $id");   while ($row = $result->fetch_array()) { $titolo = $row["title_sez"];
	  
	  $RID = printf($mysqli->affected_rows);
	  
	  if ( $RID >= 1 && $RID < 2) { header("Location: index1.php?name=$titolo&ob2=ok");} else { header("Location: index1.php?name=$titolo&ob2=no"); } 
		 
		 
     }
	 
	 }
	 
}





// HOME 3 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
 
 
 
if(isset($_POST["sezione3"])){
	
 $target_path = "../img/";
 $target_path = $target_path.basename($_FILES['img_txt']['name']);

 $id= $_POST["id"];
 
 $idlr = $_POST["idlr"];
 
 $red = "localhost/".$_POST["red"]; 
  
 $imgB = $_FILES["img_txt"];
 


     //se l'update del file è avvenuto correttamente

     if(is_uploaded_file($imgB["tmp_name"])) { 

     //muovi file dentro directory img da tmp

      move_uploaded_file($imgB["tmp_name"], $target_path) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
 
      $mysqli->query("UPDATE `lr-sez` SET `txt_lr`='".mysql_escape_string($_POST["desc"])."',`img_lr`='".$imgB["name"]."' WHERE id_lr = '".$idlr."' ");
	  
	  $RID = printf($mysqli->affected_rows);
	  
	  $result = $mysqli->query("SELECT * FROM `sezioni` WHERE id_sez = $id");   while ($row = $result->fetch_array()) { $titolo = $row["title_sez"];
	  
	  if ( $RID >= 1 && $RID < 2) { 
	     
		 
		 
		 header("Location: index1.php?name=$titolo&ob3=ok");
		 
		 
	  } 
	  else 
	  { 
	     header("Location: index1.php?name=$titolo&ob3=no"); 
	  
	  } 
	  
	  }
	
	 }
	 else{
		 
		 
	  $mysqli->query("UPDATE `lr-sez` SET `title_lr`='".mysql_escape_string($_POST["titolo"])."', `txt_lr`='".mysql_escape_string($_POST["desc"])."' WHERE id_lr = '".$idlr."' ");
	  
	   $result = $mysqli->query("SELECT * FROM `sezioni` WHERE id_sez = $id");   while ($row = $result->fetch_array()) { $titolo = $row["title_sez"];
	  
	  $RID = printf($mysqli->affected_rows);
	  
	  if ( $RID >= 1 && $RID < 2) { header("Location: index1.php?name=$titolo&ob3=ok");} else { header("Location: index1.php?name=$titolo&ob3=no"); } 
		 
		 
     }
	 
	 }
	 
}
 
	
	
	
// HOME 4 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
 
 
 
if(isset($_POST["sezione4"])){
	
 $target_path = "../img/";
 $target_path = $target_path.basename($_FILES['img_txt']['name']);

 $id= $_POST["id"];
 
 $idg= $_POST["idg"];
 
 $tit = mysql_escape_string($_POST["titolo"]);
	
	$desc = mysql_escape_string($_POST["desc"]);
	
	$vid = $_POST["vid"];
 
 $red = "localhost/".$_POST["red"]; 
  
 $imgB = $_FILES["img_txt"];
 

    //se l'update del file è avvenuto correttamente

     if(is_uploaded_file($imgB["tmp_name"])) { 

     //muovi file dentro directory img da tmp

      move_uploaded_file($imgB["tmp_name"], $target_path) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
 
      $mysqli->query("UPDATE `gallery` SET `title_g`='".mysql_escape_string($_POST["desc"])."', `txt_g`='".mysql_escape_string($_POST["desc"])."',`img_g`='".$imgB["name"]."', `vid_g`='".$vid."' WHERE id_g = '".$idg."' ");
	  
	  $RID = printf($mysqli->affected_rows);
	  
	  $result = $mysqli->query("SELECT * FROM `sezioni` WHERE id_sez = $id");   while ($row = $result->fetch_array()) { $titolo = $row["title_sez"];
	  
	  if ( $RID >= 1 && $RID < 2) { 
	     
		 
		 
		 header("Location: index1.php?name=$titolo&ob4=ok");
		 
		 
	  } 
	  else 
	  { 
	     header("Location: index1.php?name=$titolo&ob4=no"); 
	  
	  } 
	  
	  }
	
	 }
	 else{
		 
		 
	  $mysqli->query("UPDATE `gallery` SET `title_g`='".mysql_escape_string($_POST["titolo"])."', `txt_g`='".mysql_escape_string($_POST["desc"])."', vid_g`='".$vid."',  WHERE id_g = '".$idg."' ");
	  
	   $result = $mysqli->query("SELECT * FROM `sezioni` WHERE id_sez = $id");   while ($row = $result->fetch_array()) { $titolo = $row["title_sez"];
	  
	  $RID = printf($mysqli->affected_rows);
	  
	  if ( $RID >= 1 && $RID < 2) { header("Location: index1.php?name=$titolo&ob4=ok");} else { header("Location: index1.php?name=$titolo&ob4=no"); } 
		 
		 
     }
	 
	 }
	 
}



// HOME 5 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
if(isset($_POST["sezione5"])){
	
	$id= $_POST["id"];
	
	$titolo = $_POST["pag"];
	
	$tit = mysql_escape_string($_POST["titolo"]);
	
	$desc = mysql_escape_string($_POST["desc"]);
	
	$vid = $_POST["vid"];
	
	
 $target_path = "../img/";
 $target_path = $target_path.basename($_FILES['img_txt']['name']);


  
 $imgB = $_FILES["img_txt"];
 
 
 
    //se l'update del file è avvenuto correttamente

     if(is_uploaded_file($imgB["tmp_name"])) { 

     //muovi file dentro directory img da tmp

      move_uploaded_file($imgB["tmp_name"], $target_path) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	  
	  
	  
	  $query  = ("INSERT INTO `gallery` (`id_g`, `id_sez`, `title_g`, `img_g`, `txt_g`, `vid_g`) VALUES (NULL, '".$id."', '".$tit."', '".$imgB["name"]."', '".$vid."', '' )") ;
	 
	  $stmt = $mysqli->prepare($query);
	 
	 
	
     if( $stmt->execute() ){
		 
		header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	}else{
		
		header("Location: index1.php?name=$titolo&ob5=no");
		
		}
	  
	
	 
	 }else{
	 
	 
	 $query  = ("INSERT INTO `gallery` (`id_g`, `id_sez`, `title_g`, `img_g`, `txt_g`, `vid_g`) VALUES (NULL, '".$id."', '".$tit."', '', '".$desc."', '".$vid."' )") ;
	 
	 
	 
	 $stmt = $mysqli->prepare($query);
	 
	 
	
     if( $stmt->execute() ){
		 
		header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	}else{
		
		header("Location: index1.php?name=$titolo&ob5=no");
		
		}
   
  
	 }
	
	 
	 
	 
}





// HOME D ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
if(isset($_POST["sezioneD"])){
	
	$id= $_POST["id"];
	
	$idg= $_POST["idg"];
	
	$titolo = $_POST["pag"];
	
	$tit = mysql_escape_string($_POST["titolo"]);
	
	$desc = mysql_escape_string($_POST["desc"]);
	
	$vid = $_POST["vid"];
	
	
 $target_path = "../img/";
 $target_path = $target_path.basename($_FILES['img_txt']['name']);


  
 $imgB = $_FILES["img_txt"];
 
 
 
    //se l'update del file è avvenuto correttamente

     if(is_uploaded_file($imgB["tmp_name"])) { 

     //muovi file dentro directory img da tmp

      move_uploaded_file($imgB["tmp_name"], $target_path) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	  
	  
	  
	  $query  = ("UPDATE `gallery` SET `title_g`='".$tit."', `txt_g`='".$desc."', `img_g`='".$imgB["name"]."' WHERE id_g = '".$idg."' ") ;
	 
	  $stmt = $mysqli->prepare($query);
	 
	 
	
     if( $stmt->execute() ){
		 
		header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	}else{
		
		header("Location: index1.php?name=$titolo&ob5=no");
		
		}
	  
	
	 
	 }else{
	 
	 
	 $query  = ("UPDATE `gallery` SET `title_g`='".$tit."', `txt_g`='".mysql_escape_string($_POST["desc"])."', `vid_g`='".$_POST["vid"]."' WHERE id_g = '".$idg."' ") ;
	 
	 
	 
	 $stmt = $mysqli->prepare($query);
	 
	 
	
     if( $stmt->execute() ){
		 
		header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	}else{
		
		header("Location: index1.php?name=$titolo&ob5=no");
		
		}
   
  
	 }
	
	 
	 
	 
}



// HOME DELETE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
if(isset($_POST["del"])){
	
	$id= $_POST["id"];
	
	$idg= $_POST["idg"];
	
	$titolo = $_POST["pag"];
	
	
	$query  = ("DELETE FROM `gallery` WHERE id_g = '".$idg."' ") ;
	 
	 
	 
	 $stmt = $mysqli->prepare($query);
	 
	 
	
     if( $stmt->execute() ){
		 
		header("Location: index1.php?name=$titolo&ob5=ok"); 
		 
	}else{
		
		header("Location: index1.php?name=$titolo&ob5=no");
		
		}
   
	
	
}