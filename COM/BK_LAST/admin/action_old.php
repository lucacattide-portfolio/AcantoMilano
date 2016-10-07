<?php 

  include("connessione_sql.php"); 


 //if( $_SESSION["lang"] != "eng" ){   $tab = "ita"; }else{ $tab = "eng"; } 

   $tab = $_POST["lang"];


////////////////// Definizioni Funzioni //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
function imgUp($img){
	
 // crea directory se non esiste 
/* if (!file_exists("../img/".$cartella."")) {
    mkdir("../img/".$cartella."", 0777, true);
  } */
  
 //imposta directory img 
 $target_pathA = "../img/";
 $target_pathA = $target_pathA.basename($img['name']);	 
 
 //upload img
 if( is_uploaded_file($img["tmp_name"]) ) {
   
    move_uploaded_file($img["tmp_name"], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
  
    $img = $img["name"];
 }
 else{
	
	$img = ""; 
 }
  
  
  return $img;
	
	 
}     


//////// Inserimento gallery home  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["g1Ins"])){
	
	$pag = $_POST["pag"];
	
	////  condizione immaagine assente  ///
	if(empty( $_FILES["img"])){ $res = ""; }
	
	////  condizione immaagine presente  ///	
	else{
		
	  ////  variabile funzione img uload  ///
	  $imgA = $_FILES["img"];
	  
	  ////  funzione img uload  ///
	  $res = imgUp($imgA);
	  
	 }
	 
	////  condizione immaagine presente  ///
	if( $res != ""){ 
	   
	    $sql="INSERT INTO `".$tab."_gallery`(`id_g`, `slide_g`, `img_g`, `titolo_g`, `testo_g`, `voce_g`, `data`) VALUES (NULL,'".$_POST["slid"]."','".mysql_escape_string($res)."','".mysql_escape_string($_POST["title"])."','".mysql_escape_string($_POST["txt"])."',''".mysql_escape_string($_POST["voce"])."'',NULL)";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&risp=no");
		
		}
			 
    } 
		
    else{ header("Location: index1.php?pag=$pag&risp=no"); }		
	
	
	
	
}


//////// Modifica gallery home  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["g1Mod"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	
	////  condizione immaagine assente  ///
	if(empty( $_FILES["img"])){ $res = ""; }
	
	////  condizione immaagine presente  ///	
	else{
		
	  ////  variabile funzione img uload  ///
	  $imgA = $_FILES["img"];
	  
	  ////  funzione img uload  ///
	  $res = imgUp($imgA);
	  
	 }
	 
	////  condizione immaagine presente  ///
	if( $res != ""){ 
	   
	   
	   $sql="UPDATE `".$tab."_gallery` SET `img_g`='".mysql_escape_string($res)."',`titolo_g`='".mysql_escape_string($_POST["title"])."',`testo_g`='".mysql_escape_string($_POST["txt"])."',`voce_g`='".mysql_escape_string($_POST["voce"])."',`data`='NULL' WHERE `id_g` = $id ";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&risp=no&");
		
		}
			 
    } 
		
    else{ 
	 
	 $sql="UPDATE `".$tab."_gallery` SET `titolo_g`='".mysql_escape_string($_POST["title"])."',`testo_g`='".mysql_escape_string($_POST["txt"])."',`voce_g`='".mysql_escape_string($_POST["voce"])."',`data`='NULL' WHERE `id_g` = $id";
	 
	 if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&risp=no");
		
		}
	
	
	 }		
	
	
	
	
}

//////// Elimina gallery home  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["g1Del"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	
	$sql="DELETE FROM `gallery` WHERE id_g  = $id";
	
	if($mysqli->query($sql)){  
	
	 header("Location: index1.php?pag=$pag");
	 
	}
	
}



//////// Modifica contatti ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["contMod"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	
	$sql="UPDATE `".$tab."_contatti` SET `map_cont`='".mysql_escape_string($_POST["mappa"])."',`tel_cont`='".mysql_escape_string($_POST["tel"])."',`email_cont`='".mysql_escape_string($_POST["email"])."',`via_cont`='".mysql_escape_string($_POST["via"])."' WHERE `id_cont` = 1";
	
	
	if($mysqli->query($sql)){  
	
	 header("Location: index1.php?pag=$pag");
	 
	}
	
}


//////// NUOVA CLASSE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Nclasse"])){
	
	////  condizione immaagine assente  ///
	if(empty( $_FILES["img"])){ $res = ""; }
	
	////  condizione immaagine presente  ///	
	else{
		
	  ////  variabile funzione img uload  ///
	  $imgA = $_FILES["img"];
	  
	  ////  funzione img uload  ///
	  $res = imgUp($imgA);
	  
	 }
	
	
	
	$pag = $_POST["pag"];
	
	$sql="INSERT INTO `".$tab."_prodotti_classi`(`id_classi`, `id_g`, `nome_c1_classi`, `nome_c2_classi`, `img_classi`, `titolo_classi`, `testo_classi`, `data_classi`) VALUES (NULL,'".$_POST["id_g"]."','".mysql_escape_string($_POST["classe1"])."','".mysql_escape_string($_POST["classe2"])."','".mysql_escape_string($res)."','".mysql_escape_string($_POST["classe2"])."','".mysql_escape_string($_POST["testo"])."','".date("Y-m-d H:i:s")."')";
	
	
	if($mysqli->query($sql)){  
	
	 header("Location: index1.php?pag=$pag&risp=si");
	 
	}else{ header("Location: index1.php?pag=$pag&risp=no");  }
	
	
		

}





//////// UPLOAD CLASSE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Mclasse"])){
	
	////  condizione immaagine assente  ///
	if(empty( $_FILES["img"])){ $res = ""; }
	
	////  condizione immaagine presente  ///	
	else{
		
	  ////  variabile funzione img uload  ///
	  $imgA = $_FILES["img"];
	  
	  ////  funzione img uload  ///
	  $res = imgUp($imgA);
	  
	 }
	
	
	$id = $_POST["id_classi"];
	
	$pag = $_POST["pag"];
	
	if( $res != ""){ 
	
	
		  //$sql="INSERT INTO `prodotti_classi`(`id_classi`, `id_g`, `nome_c1_classi`, `nome_c2_classi`, `img_classi`, `titolo_classi`, `testo_classi`, `data_classi`) VALUES (NULL,'".$_POST["id_g"]."','".mysql_escape_string($_POST["classe1"])."','".mysql_escape_string($_POST["classe2"])."','".mysql_escape_string($res)."','".mysql_escape_string($_POST["classe2"])."','".mysql_escape_string($_POST["testo"])."','".date("Y-m-d H:i:s")."')";
		  
		  $sql = "UPDATE `".$tab."_prodotti_classi` SET `id_g`='".$_POST["id_g"]."',`nome_c1_classi`='".mysql_escape_string($_POST["classe1"])."',`nome_c2_classi`='".mysql_escape_string($_POST["classe2"])."',`img_classi`='".mysql_escape_string($res)."',`titolo_classi`='".mysql_escape_string($_POST["classe2"])."',`testo_classi`='".mysql_escape_string($_POST["testo"])."',`data_classi`='".date("Y-m-d H:i:s")."' WHERE `id_classi` = $id ";
		  
		  
		  if($mysqli->query($sql)){  
		  
		   header("Location: index1.php?pag=$pag&id=$id");
		   
		  }else{ header("Location: index1.php?pag=$pag&risp=no");  }
	
	
	}else{
		
		
		$sql = "UPDATE `".$tab."_prodotti_classi` SET `id_g`='".$_POST["id_g"]."',`nome_c1_classi`='".mysql_escape_string($_POST["classe1"])."',`nome_c2_classi`='".mysql_escape_string($_POST["classe2"])."',`titolo_classi`='".mysql_escape_string($_POST["classe2"])."',`testo_classi`='".mysql_escape_string($_POST["testo"])."',`data_classi`='".date("Y-m-d H:i:s")."' WHERE `id_classi` = $id ";
		  
		  
		  if($mysqli->query($sql)){  
		  
		   header("Location: index1.php?pag=$pag&id=$id");
		   
		  }else{ header("Location: index1.php?pag=$pag&risp=no");  }
		
	
	}
		

}


//////// Elimina gallery home  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Dclasse"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id_classi"];
	
	
	$sql="DELETE FROM `".$tab."_prodotti_classi` WHERE id_classi  = $id";
	
	if($mysqli->query($sql)){  
	
	 header("Location: index1.php?pag=$pag");
	 
	}
	
}


//////// NUOVA COPERTINA ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Ncopertina"])){
	
	
	////  condizione immaagine assente  ///
	if(empty( $_FILES["img"])){ $res = ""; }
	
	////  condizione immaagine presente  ///	
	else{
		
	  ////  variabile funzione img uload  ///
	  $imgA = $_FILES["img"];
	  
	  ////  funzione img uload  ///
	  $res = imgUp($imgA);
	  
	 }
	
	
	
	$pag = $_POST["pag"];
	
	$sql="INSERT INTO `".$tab."_prodotti_copertina`(`id_cp`, `id_classi`, `img_cp`, `data_cp`) VALUES (NULL,'".$_POST["classe2"]."','".mysql_escape_string($res)."','".date("Y-m-d H:i:s")."')";
	
	
	if($mysqli->query($sql)){  
	
	 header("Location: index1.php?pag=$pag&risp=si");
	 
	}else{ header("Location: index1.php?pag=$pag&risp=no");  }
	
	
}



//////// MODIFICA COPERTINA ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Mcopertina"])){
	
	
	
	
	////  condizione immaagine assente  ///
	if(empty( $_FILES["img"])){ $res = ""; }
	
	////  condizione immaagine presente  ///	
	else{
		
	  ////  variabile funzione img uload  ///
	  $imgA = $_FILES["img"];
	  
	  ////  funzione img uload  ///
	  $res = imgUp($imgA);
	  
	 }
	
	
	$id = $_POST["id_cp"];
	
	$pag = $_POST["pag"];
	
	if( $res != ""){ 
	
	
		  //$sql = "UPDATE `prodotti_classi` SET `id_g`='".$_POST["id_g"]."',`nome_c1_classi`='".mysql_escape_string($_POST["classe1"])."',`nome_c2_classi`='".mysql_escape_string($_POST["classe2"])."',`img_classi`='".mysql_escape_string($res)."',`titolo_classi`='".mysql_escape_string($_POST["classe2"])."',`testo_classi`='".mysql_escape_string($_POST["testo"])."',`data_classi`='".date("Y-m-d H:i:s")."' WHERE `id_classi` = $id ";
		  
		  
		  $sql = "UPDATE `".$tab."_prodotti_copertina` SET `id_classi`='".$_POST["classe2"]."',`img_cp`='".mysql_escape_string($res)."',`data_cp`='".date("Y-m-d H:i:s")."' WHERE `id_cp` = $id ";
		  
		  
		  if($mysqli->query($sql)){  
		  
		   header("Location: index1.php?pag=$pag&id=$id");
		   
		  }else{ header("Location: index1.php?pag=$pag&risp=no");  }
	
	
	}else{
		
		
		 $sql = "UPDATE `".$tab."_prodotti_copertina` SET `id_classi`='".$_POST["classe2"]."',`data_cp`='".date("Y-m-d H:i:s")."' WHERE `id_cp` = $id ";
		  
		  
		  if($mysqli->query($sql)){  
		  
		   header("Location: index1.php?pag=$pag&id=$id");
		   
		  }else{ header("Location: index1.php?pag=$pag&risp=no");  }
		
	
	}
	
	
	
}

//////// Elimina gallery home  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Dcopertina"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id_cp"];
	
	
	$sql="DELETE FROM `".$tab."_prodotti_copertina` WHERE id_cp  = $id";
	
	if($mysqli->query($sql)){  
	
	 header("Location: index1.php?pag=$pag");
	 
	}
	
}





//////// NUOVA IMMAGINE PRODOTTO COPERTINA ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Npc"])){
	
	
	////  condizione immaagine assente  ///
	if(empty( $_FILES["img"])){ $res = ""; }
	
	////  condizione immaagine presente  ///	
	else{
		
	  ////  variabile funzione img uload  ///
	  $imgA = $_FILES["img"];
	  
	  ////  funzione img uload  ///
	  $res = imgUp($imgA);
	  
	 }
	
	
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id_cp"];
	
	
	$sql="INSERT INTO `".$tab."_prodotti_gallery`(`id_pg`, `id_cp`, `img_pg`, `data_pg`) VALUES (NULL,'".$_POST["id_cp"]."','".mysql_escape_string($res)."','".date("Y-m-d H:i:s")."')";
	
	
	if($mysqli->query($sql)){  
	
	 header("Location: index1.php?pag=$pag&risp=si&id=$id");
	 
	}else{ header("Location: index1.php?pag=$pag&risp=no");  }
	
	
}



//////// ELIMINA IMMAGINE PRODOTTO COPERTINA ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST["Dpc"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id_pg"];
	
	
	$sql="DELETE FROM `".$tab."_prodotti_gallery` WHERE id_pg  = '".$id."' ";
	
	if($mysqli->query($sql)){  
	
	 header("Location: index1.php?pag=$pag");
	 
	}
	
}


?>