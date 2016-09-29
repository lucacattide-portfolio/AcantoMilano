<?php 

  include("connessione_sql.php"); 


 //if( $_SESSION["lang"] != "eng" ){   $tab = "ita"; }else{ $tab = "eng"; } 

   //$tab = $_POST["lang"];


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


//////////////////////////////////////////    MODIFICA HOME   /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Mint"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idtxt = $_POST["idtxt"];
	
	
	$sql="UPDATE `testo` SET `testo_txt`='".mysql_escape_string($_POST["txt"])."' WHERE `id_txt` = '".$idtxt ."' ";
	
	if($mysqli->query($sql)){  
	
	 header("Location: index1.php?pag=$pag&id=$id");
	 
	}else{ header("Location: index1.php?pag=$pag&id=$id&no");  }
	
}


////////////////// Inserisci Home //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST["InsImg"])){
	
    $pag = $_POST["pag"];
	
	$id = $_POST["id"];	 
	
	//seleziona id Gallery
	
	  $query1 = "SELECT * FROM `gallery` WHERE `id_vm1` = '".$id."' "; 
	   
	  $result1 = $mysqli->query($query1); while ( $row1 = $result1->fetch_array()){ $idGal = $row1["id_gal"];  }
	
	
 
  //ciclo foreach per estraqzione img 
  foreach($_FILES['img_g']['tmp_name'] as $key => $tmp_name ){
	 
	 // nome dell' immagine 
     $file_name = $_FILES['img_g']['name'][$key];
     
	 // percorso immagine temporaneo
	 $file_tmp = $_FILES['img_g']['tmp_name'][$key];
	
	 //cartella immagini
	 $target_pathA = "../img/";
	 
	 //percorso cartella
     $target_pathA = $target_pathA.basename($file_name);	 
 
    //upload img
    if( is_uploaded_file($file_tmp) ) {
   
       //spostamento img in db
	   move_uploaded_file($file_tmp, $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	   
	   //$sql = "INSERT INTO `immagini`(`id_img`, `id_gal`, `nome_img`, `id_vm1`, `id_vm2`, `id_txt`, `txt_img`) VALUES (NULL,'".$idGal."','".$file_name."','NULL','NULL','NULL','')";
	   
	   $sql = "INSERT INTO `immagini`(`id_img`, `id_gal`, `nome_img`, `id_vm1`, `id_vm2`, `id_txt`, `txt_img`) VALUES (NULL,'".$idGal."','".mysql_escape_string($file_name)."','0','0','0','')";
	   
	   $mysqli->query($sql);	 
	 
	}
   
  }
  
  header("Location: index1.php?pag=$pag&id=$id"); 
  
  
  
} 



//////////////////////////////////////////    MODIFICA Immagini   /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["ModImg"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idimg = $_POST["idimg"];
	
	
	if(empty( $_FILES["img_g"])){ $res = ""; }
	else{
	
	  $imgA = $_FILES["img_g"];
	  
	  $res = imgUp($imgA);
	  
	 }
	 
	 
	 if( $res != ""){ 
	   
	    $sql="UPDATE `immagini` SET `nome_img`='".mysql_escape_string($res)."',  `txt_img`='".mysql_escape_string($_POST["txt"])."' WHERE `id_img` = '".$idimg."'";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&no1");
		
		}
			 
    } 
		
    else{ 
	
	    $sql="UPDATE `immagini` SET `txt_img`='".mysql_escape_string($_POST["txt"])."' WHERE `id_img` = '".$idimg."'";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&no2");
		
		}
	
	
	
	}	
	 
	
	
	
}




////////////////////////////////////////// CHI SIAMO  NUOVO TESTO   /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["WhoNtesto"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	
	
	//INSERISCI TESTO
	$sql="INSERT INTO `testo`(`id_txt`, `titolo_txt`, `testo_txt`, `id_vm1`, `id_vm2`, `id_gal`, `data_txt`) VALUES (NULL,'".mysql_escape_string($_POST["title"])."','".mysql_escape_string($_POST["txt"])."','".$id."','','','".date("Y-m-d H:i:s")."')";
	
	$mysqli->query($sql);
	
	$id_img = $mysqli->insert_id;
	
	
	
	
	
	if(empty( $_FILES["img_g"])){ $res = ""; }
    else{
	
	  $imgA = $_FILES["img_g"];
	  
	  $res = imgUp($imgA);
	  
	 }
	 
	 
	 if( $res != ""){ 
	   
	    $sql="INSERT INTO `immagini`(`id_img`, `id_gal`, `nome_img`, `id_vm1`, `id_vm2`, `id_txt`, `txt_img`) VALUES (NULL,'','".mysql_escape_string($res)."','','','".$id_img."','')";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}
			 
    } 
		
    else{ 
	
      header("Location: index1.php?pag=$pag&id=$id&risp=si1");
	
	}
	 
	
	
	
}




////////////////////////////////////////// CHI SIAMO MODIFICA TESTO   /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["WhoMtesto"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idimg = $_POST["idimg"];
	
	$idtxt = $_POST["idtxt"];
	
	$idinfo = $_POST["idinfo"];
	
	if( empty($_POST["data-post"]) ){ $dataTime = date("Y-m-d H:i:s"); }else{  $dataTime = $_POST["data-post"];  }
	
	
	if( empty($idinfo)  ){
		
		$imgB = $_FILES["info1"];
	  
	    $res1 = imgUp($imgB);
	    
		
		$sql2="INSERT INTO `info`(`id_info`, `txt_info`, `txt2_info`, `id_txt`) VALUES (NULL,'".mysql_escape_string($res1)."','".mysql_escape_string($_POST["info2"])."','".$idtxt."')";
		
		$mysqli->query($sql2);
	
	}
	
	
	
	
	//INSERISCI TESTO
	$sql="UPDATE `testo` SET `titolo_txt`='".mysql_escape_string($_POST["title"])."',`testo_txt`='".mysql_escape_string($_POST["txt"])."',`data_txt`='".$dataTime."' WHERE `id_txt`='".$idtxt."'";
	
	$mysqli->query($sql);
	
	if(empty( $_FILES["info1"])){ $res1 = "";
	
		$sql2="UPDATE `info` SET `txt_info`='".mysql_escape_string($_POST["info1"])."',`txt2_info`='".mysql_escape_string($_POST["info2"])."' WHERE `id_info` = '".$idinfo."'";
		
		$mysqli->query($sql2);
	
	}else{
		
		
	    $imgB = $_FILES["info1"];
	  
	    $res1 = imgUp($imgB);
		
		
		$sql2="UPDATE `info` SET `txt_info`='".mysql_escape_string($res1)."',`txt2_info`='".mysql_escape_string($_POST["info2"])."' WHERE `id_info` = '".$idinfo."'";
		
		$mysqli->query($sql2);
		
		
	}
	
	if(empty( $_FILES["img_g"])){ $res = ""; }else{
	
	  $imgA = $_FILES["img_g"];
	  
	  $res = imgUp($imgA);
	  
	 }
	 
	 
	 if(empty($idimg)){
		 
		 
					if( $res != ""){ 
					   
						$sql="INSERT INTO `immagini`(`id_img`, `id_gal`, `nome_img`, `id_vm1`, `id_vm2`, `id_txt`, `txt_img`) VALUES (NULL,'','".mysql_escape_string($res)."','','','".$idtxt."','')";
					 
						if($mysqli->query($sql)){  
						 
						 header("Location: index1.php?pag=$pag&id=$id&risp=si");
						 
						} 
						else{
						  
						  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
						
						}
							 
					} 
						
					else{ 
					
					  header("Location: index1.php?pag=$pag&id=$id&risp=si&c");
					
					}
		 
		 
	 
	 }else{
	 
				 if( $res != ""){ 
				   
					$sql="UPDATE `immagini` SET `nome_img`='".mysql_escape_string($res)."' WHERE `id_img` = '".$idimg."' ";
				 
					if($mysqli->query($sql)){  
					 
					 header("Location: index1.php?pag=$pag&id=$id&risp=si");
					 
					} 
					else{
					  
					  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
					
					}
						 
				} 
				else{ 
				
				  header("Location: index1.php?pag=$pag&id=$id&risp=si1");
				
				}
	
	  }
	
	
	
}


////////////////////////////////////////// CHI SIAMO ELIMINA IMG   /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["WhoEtestoImg"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idimg = $_POST["idimg"];
	
	$sql="DELETE FROM `immagini` WHERE `id_img` = '".$idimg."' ";
				 
	if($mysqli->query($sql)){  
	 
	 header("Location: index1.php?pag=$pag&id=$id&risp=si");
	 
	} 
	else{
	  
	  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
	
	}
	
	
}



////////////////////////////////////////// ELIMINA INFO /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["WhoEtestoPDF"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idinfo = $_POST["idinfo"];
	
	$sql="UPDATE `info` SET `txt_info`='' WHERE `id_info` = '".$idinfo."'";

				 
	if($mysqli->query($sql)){  
	 
	 header("Location: index1.php?pag=$pag&id=$id&risp=si");
	 
	} 
	else{
	  
	  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
	
	}
	
	
}



////////////////////////////////////////// CHI SIAMO ELIMINA TOT   /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["WhoEtesto"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idtxt = $_POST["idtxt"];
	
	$idimg = $_POST["idimg"];
	
	$idinfo= $_POST["idinfo"];
	
	$sql="DELETE FROM `testo` WHERE `id_txt` = '".$idtxt."' ";
				 
	if($mysqli->query($sql)){  
	
	   if( $idinfo != "" ){
		   
		   
		   $sql="DELETE FROM `info` WHERE `id_info` = '".$idinfo."' ";
		   
		   $mysqli->query($sql);
		   
		   
	   }else{  }
	
	
	
	 
	   if( $idimg != "" ){
		    
			  $sql="DELETE FROM `immagini` WHERE `id_img` = '".$idimg."' ";
				 
			  if($mysqli->query($sql)){  
			   
			   header("Location: index1.php?pag=$pag&id=$id&risp=si");
			   
			  } 
			  else{
				
				header("Location: index1.php?pag=$pag&id=$id&risp=no");
			  
			  }
		
	    }else{
	  
	  header("Location: index1.php?pag=$pag&id=$id&risp=si");
	
	}
	 
	
	 
	} 
	else{
	  
	  header("Location: index1.php?pag=$pag&id=$id&risp=no");
	
	}
	
	
}





////////////////////////////////////////// LEONARDO NUOVO TESTO   /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["LeoNtesto"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	if( empty($_POST["data-post"]) ){ $dataTime = date("Y-m-d H:i:s"); }else{  $dataTime = $_POST["data-post"];  }
	
	
	//INSERISCI TESTO
	$sql="INSERT INTO `testo`(`id_txt`, `titolo_txt`, `testo_txt`, `id_vm1`, `id_vm2`, `id_gal`, `data_txt`) VALUES (NULL,'".mysql_escape_string($_POST["title"])."','".mysql_escape_string($_POST["txt"])."','".$id."','','','".$dataTime."')";
	
	$mysqli->query($sql);
	
	$id_img = $mysqli->insert_id;
	
	
	//carica pdf
	if(empty( $_FILES["info1"])){ $res1 = "";
	
		$sql2="INSERT INTO `info`(`id_info`, `txt_info`, `txt2_info`, `id_txt`) VALUES (NULL,'".mysql_escape_string($_POST["info1"])."','".mysql_escape_string($_POST["info2"])."','".$id_img."')";
		
		$mysqli->query($sql2);
	
	}else{
		
	  $imgB = $_FILES["info1"];
	  
	  $res1 = imgUp($imgB);
	  
	  
	  if( $res1 != ""){ 
	   
	    $sql2="INSERT INTO `info`(`id_info`, `txt_info`, `txt2_info`, `id_txt`) VALUES (NULL,'".mysql_escape_string($res1)."','".mysql_escape_string($_POST["info2"])."','".$id_img."')";
	
	    $mysqli->query($sql2);
			 
       }
			
    }
	
	
	//carica img
	if(empty( $_FILES["img_g"])){ $res = ""; }
    else{
	
	  $imgA = $_FILES["img_g"];
	  
	  $res = imgUp($imgA);
	  
	 }
	 
	 
	 if( $res != ""){ 
	   
	    $sql="INSERT INTO `immagini`(`id_img`, `id_gal`, `nome_img`, `id_vm1`, `id_vm2`, `id_txt`, `txt_img`) VALUES (NULL,'','".mysql_escape_string($res)."','','','".$id_img."','')";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}
			 
    } 
		
    else{ 
	
      header("Location: index1.php?pag=$pag&id=$id&risp=si1");
	
	}
	 
}


////////////////////////////////////////// Nuova data di ripubblicaazione   /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Ndate"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idtxt = $_POST["idtxt"];
	
	$idimg = $_POST["idimg"];
	
	$idinfo= $_POST["idinfo"];
	
	
	if( empty($_POST["data-post2"]) ){ $dataTime = date("Y-m-d H:i:s"); }else{  $dataTime = $_POST["data-post2"];  }
	
	
	$sql="INSERT INTO `data`(`id_data`, `id_txt`, `data_data`) VALUES (NULL,'".$idtxt."','".$dataTime."')";
	
	
	if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}


}



////////////////////////////////////////// ELIMINA INFO /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Edata"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	$iddata = $_POST["iddata"];
	
	$sql="DELETE FROM `data` WHERE id_data = '".$iddata."' ";
	
	if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}

}



////////////////////////////////////////// Voce Menu2 /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Nliv2"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	
	//carica img
	if(empty( $_FILES["img_g"])){ $res = ""; }
    else{
	
	  $imgA = $_FILES["img_g"];
	  
	  $res = imgUp($imgA);
	  
	 }
	 
	 
	 if( $res != ""){ 
	   
	    $sql="INSERT INTO `voce_menu_2`(`id_vm2`, `nome_vm2`, `img_vm2`, `id_txt`) VALUES (NULL,'".mysql_escape_string($_POST["title"])."','".mysql_escape_string($res)."','".$id."')";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}
			 
    } 
		
    else{ 
	
      header("Location: index1.php?pag=$pag&id=$id&risp=si1");
	
	}
	
	
}




////////////////////////////////////////// Modifica Voce Menu2 /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Mliv2"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idvm2 = $_POST["idvm2"];
	
	
	//carica img
	if(empty($_FILES["img_g"])){ $res = ""; 
	
	}else{
	
	  $imgA = $_FILES["img_g"];
	  
	  $res = imgUp($imgA);
	  
	 
	}
	 
	 if( $res != ""){ 
	   
	    $sql="UPDATE `voce_menu_2` SET `nome_vm2`='".mysql_escape_string($_POST["title"])."', `img_vm2`='".mysql_escape_string($res)."' WHERE `id_vm2` = '".$idvm2."' ";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}
			 
    } 
		
    else{ 
	
     $sql="UPDATE `voce_menu_2` SET `nome_vm2`='".mysql_escape_string($_POST["title"])."' WHERE `id_vm2` = '".$idvm2."' ";
	
	if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}
	
	
	}
	
 
	
	
}

////////////////////////////////////////// Elimina Voce Menu2 /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Eliv2"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	$idvm2 = $_POST["idvm2"];
	
	$sql="DELETE FROM `voce_menu_2` WHERE id_vm2 = '".$idvm2."' ";
	
	if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}
	
}


////////////////////////////////////////// NUOVO CONTENUTO INTERNO /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["IntNcont"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	
	$sql="INSERT INTO `testo`(`id_txt`, `titolo_txt`, `testo_txt`, `id_vm1`, `id_vm2`, `id_gal`, `data_txt`) VALUES (NULL,'".mysql_escape_string($_POST["title"])."','".mysql_escape_string($_POST["txt"])."','','".$id."','','".$dataTime."')";
	
	$mysqli->query($sql);
	
	$id_img = $mysqli->insert_id;
	
	
	
	
	if(empty( $_FILES["img_g"])){ $res = ""; }
    else{
	
	  $imgA = $_FILES["img_g"];
	  
	  $res = imgUp($imgA);
	  
	 }
	 
	 
	 if( $res != ""){ 
	   
	    $sql="INSERT INTO `immagini`(`id_img`, `id_gal`, `nome_img`, `id_vm1`, `id_vm2`, `id_txt`, `txt_img`) VALUES (NULL,'','".mysql_escape_string($res)."','','','".$id_img."','')";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}
			 
    } 
		
    else{ 
	
       $sql="INSERT INTO `immagini`(`id_img`, `id_gal`, `nome_img`, `id_vm1`, `id_vm2`, `id_txt`, `txt_img`) VALUES (NULL,'','','','','".$id_img."','')";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}
	
	}



}


////////////////////////////////////////// MODIFICA CONTENUTO INTERNO /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["IntMcont"])){
	
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idtxt = $_POST["idtxt"];
	
	$idimg = $_POST["idimg"];
	
	
	
	$sql="UPDATE `testo` SET `titolo_txt`='".mysql_escape_string($_POST["title"])."',`testo_txt`='".mysql_escape_string($_POST["txt"])."' WHERE `id_txt`='".$idtxt."'";
	
	$mysqli->query($sql);
	
	
	
	if(empty($_FILES["img_g"])){ $res = ""; 
	
	}else{
	
	  $imgA = $_FILES["img_g"];
	  
	  $res = imgUp($imgA);
	  
	 
	}
	 
	if( $res != ""){ 
				   
			  $sql="UPDATE `immagini` SET `nome_img`='".mysql_escape_string($res)."' WHERE `id_img` = '".$idimg."' ";
		 
			  if($mysqli->query($sql)){  
			 
				header("Location: index1.php?pag=$pag&id=$id&risp=si");
			 
			  } 
			  else{
			  
				header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
			
			   }
			 
    } 
	else{
	  
		header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
	
	   }


}


////////////////////////////////////////// ELIMINA IMG CONTENUTO INTERNO /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["IntEimg"])){
	
	
	
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idtxt = $_POST["idtxt"];
	
	$idimg = $_POST["idimg"];
	
	
	
	if( $res != ""){ 
				   
			  $sql="UPDATE `immagini` SET `nome_img`='".mysql_escape_string($res)."' WHERE `id_img` = '".$idimg."' ";
		 
			  if($mysqli->query($sql)){  
			 
				header("Location: index1.php?pag=$pag&id=$id&risp=si");
			 
			  } 
			  else{
			  
				header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
			
			   }
			 
    } 
	else{
	  
		      $sql="UPDATE `immagini` SET `nome_img`='' WHERE `id_img` = '".$idimg."' ";
		 
			  if($mysqli->query($sql)){  
			 
				header("Location: index1.php?pag=$pag&id=$id&risp=si");
			 
			  } 
			  else{
			  
				header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
			
			   }
	
	   }
	
	
}










////////////////////////////////////////// Viaggio NUOVO TESTO   /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["Int2Ntesto"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	if( empty($_POST["data-post"]) ){ $dataTime = date("Y-m-d H:i:s"); }else{  $dataTime = $_POST["data-post"];  }
	
	
	//INSERISCI TESTO
	$sql="INSERT INTO `testo`(`id_txt`, `titolo_txt`, `testo_txt`, `id_vm1`, `id_vm2`, `id_gal`, `data_txt`) VALUES (NULL,'".mysql_escape_string($_POST["title"])."','".mysql_escape_string($_POST["txt"])."','','".$id."','','".$dataTime."')";
	
	$mysqli->query($sql);
	
	$id_img = $mysqli->insert_id;
	
	
	//carica pdf
	if(empty( $_FILES["info1"])){ $res1 = "";
	
		$sql2="INSERT INTO `info`(`id_info`, `txt_info`, `txt2_info`, `id_txt`) VALUES (NULL,'".mysql_escape_string($_POST["info1"])."','".mysql_escape_string($_POST["info2"])."','".$id_img."')";
		
		$mysqli->query($sql2);
	
	}else{
		
	  $imgB = $_FILES["info1"];
	  
	  $res1 = imgUp($imgB);
	  
	  
	  if( $res1 != ""){ 
	   
	    $sql2="INSERT INTO `info`(`id_info`, `txt_info`, `txt2_info`, `id_txt`) VALUES (NULL,'".mysql_escape_string($res1)."','".mysql_escape_string($_POST["info2"])."','".$id_img."')";
	
	    $mysqli->query($sql2);
			 
       }
			
    }
	
	
	//carica img
	if(empty( $_FILES["img_g"])){ $res = ""; }
    else{
	
	  $imgA = $_FILES["img_g"];
	  
	  $res = imgUp($imgA);
	  
	 }
	 
	 
	 if( $res != ""){ 
	   
	    $sql="INSERT INTO `immagini`(`id_img`, `id_gal`, `nome_img`, `id_vm1`, `id_vm2`, `id_txt`, `txt_img`) VALUES (NULL,'','".mysql_escape_string($res)."','','','".$id_img."','')";
	 
	    if($mysqli->query($sql)){  
		 
		 header("Location: index1.php?pag=$pag&id=$id&risp=si");
		 
		} 
		else{
	      
		  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
		
		}
			 
    } 
		
    else{ 
	
      header("Location: index1.php?pag=$pag&id=$id&risp=si1");
	
	}
	 
}



////////////////////////////////////////// CONTATTI  /////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["contMod"])){
	
	$pag = $_POST["pag"];
	
	$id = $_POST["id"];
	
	$idinfo = $_POST["idinfo"];
	
	$sql="UPDATE `info` SET `txt_info`='".mysql_escape_string($_POST["title"])."' WHERE `id_info` = '".$idinfo."'";

				 
	if($mysqli->query($sql)){  
	 
	 header("Location: index1.php?pag=$pag&id=$id&risp=si");
	 
	} 
	else{
	  
	  header("Location: index1.php?pag=$pag&id=$id&risp=si&a");
	
	}
	
	
}



?>