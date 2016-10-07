<?php 
 
 include("../connessione_sql.php");
 
 /* DATA FUSO ORARIO */
  date_default_timezone_set('Europe/Rome');
 
 /* CARICA IMMAGINI ***********************************/
function imgUp($img){
	
  //imposta directory img 
  $target_pathA = "../../../img/";
  $temp = explode(".",$img['name']);
  $newfilename = rand(1,99999) . '.' .end($temp);
  $target_pathA = $target_pathA.basename($newfilename);	 
 
   //upload img
   if( is_uploaded_file($img["tmp_name"]) ) {
	  move_uploaded_file($img["tmp_name"], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	  $img = $newfilename;
   }
   else{
	  $img = ""; 
   }
 return $img;
} 
/* END CARICA IMMA
 
 
 /*CREAZIONE DI NUOVO AMMINISTRATORE DB BACKEND*/
 
 /*ACCOUNT PAGE ***************************************************************/
 
 /* CREA AMMINISTRATORE DB BACKEND ***************/

 if(isset($_POST["account"])):
 
 	 if((!empty($_POST["username2"])) && (!empty($_POST["password2"]))):
		 /* PERMESSI DI ACCESSO */
		 $liv = $_POST["liv"];
		 $livello = $_POST["livello"];
		 /* SET LIVELLO SE LIVELLO NON E' CORRETTO */
		 if( $liv <= $livello ): $livello = $liv+1; endif;
		 /* SET QUERY */
		 $sqlAccount = "INSERT INTO `admin`(`admin_id`, `admin_user`, `admin_password`, `admin_accesso`, `admin_data_creazione`) VALUES (NULL,'".$mysqli->real_escape_string($_POST["username2"])."','".$mysqli->real_escape_string($_POST["password2"])."','".$livello."','".date("Y-m-d H:i:s")."' )";  
		 if($mysqli->query($sqlAccount)): 
			echo "Utente creato";
		  else:
			echo "Errore! Riprova";   
		  endif;  
		
	  else: 
	 
	 	echo "Errore! Compila tutti i campi";    
	 
	 endif;
	 
  endif;
  /* END CREA AMMINISTRATORE DB BACKEND ***************/
  
  /* MODIFICA AMMINISTRATORE DB BACKEND ***************/
  if(isset($_POST["modificAccount"])):
   /* PERMESSI DI ACCESSO */
   $liv = $_POST["liv"];
   $livello = $_POST["livello"];
   $id = $_POST["admin_id"];
   /* SET LIVELLO SE LIVELLO NON E' CORRETTO */
   if( $livello < $liv ): $livello = $liv+1; endif;
   /* SET QUERY */
   $sqlAccount = "UPDATE `admin` SET `admin_accesso`='".$livello."' WHERE `admin_id` = $id ";  
   if($mysqli->query($sqlAccount)): 
	  echo "Modifiche salvate";
	else:
	  echo "Errore! Riprova";      
    endif;  	 
  endif;
  /* END MODIFICA AMMINISTRATORE DB BACKEND ***************/
  
  /* ELIMINA AMMINISTRATORE DB BACKEND ***************/
  if(isset($_POST["eliminAccount"])):
	$id = $_POST["admin_id"];
	$sqlElAccount = "DELETE FROM `admin` WHERE admin_id = $id";
	if($mysqli->query($sqlElAccount)): 
	  echo "Account eliminato"; 
	else:
	 echo "Errore! Riprova";   
    endif; 
  endif;
  /* END ELIMINA AMMINISTRATORE DB BACKEND ***************/
  
  /* ENDACCOUNT PAGE ***********************************************************/ 
  
  
  /* PAGE **********************************************************************/ 
  
  /* AGGIUNGI NUOVA PAGINA DB BACKEND ***************/
  if(isset($_POST["nuovaPagina"])):
     $nextId = 0;
	 //UPLOAD IMGS ///////////////////////////////////////////////////
	 if( isset($_FILES['file']) ):
		 foreach ($_FILES['file']['tmp_name'] as $key => $val ):
			 $target_pathA = "../../../img/";
			 $temp = explode(".",$_FILES['file']['name'][$key]);
			 // CHANGE NAME IMG /////////////////////////////////
			 $newfilename = rand(1,99999) . '.' .end($temp);
			 $target_pathA = $target_pathA.basename($newfilename);	 
			 //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
			 if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
				move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
				$img = $newfilename;
				/// QUERY IMG ///////////////////////////////////////////////
				$sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','', '".$_FILES['file']['type'][$key]."', '')";
				$mysqli->query($sql);
				$nextId = $mysqli->insert_id; 
			 //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
			 endif;
		  // CLOSE FOREACH ///////////////////// 
		  endforeach; 
	  endif;
  
  
	  $sqlPagina = "INSERT INTO `pagina`(`pagina_id`, `pagina_url`, `pagina_riferimento`, `pagina_meta_title`, `pagina_meta_description`, `pagina_meta_tag`, `pagina_immagine_id`, `pagina_gallery_id`, `pagina_lingua`, `pagina_data_creazione`, `pagina_data_modifica`, `pagina_dipendenza_id`, `pagina_ordinamento`, `pagina_categoria_id`) VALUES (NULL,'".$mysqli->real_escape_string($_POST["pagina_url"])."','".$mysqli->real_escape_string($_POST["pagina_riferimento"])."','".$mysqli->real_escape_string($_POST["pagina_meta_title"])."','".$mysqli->real_escape_string($_POST["pagina_meta_description"])."','".$mysqli->real_escape_string($_POST["pagina_meta_tag"])."','".$nextId."','','','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','".$mysqli->real_escape_string($_POST["pagina_dipendenza_id"])."','0','0')";
	  if($mysqli->query($sqlPagina)): 
		echo "Pagina creata"; 
	  else:
		echo "Errore! Riprova";   
	  endif;  	
  endif;
  /* END AGGIUNGI NUOVA PAGINA DB BACKEND ***************/
  
  /* MODIFICA PAGINA DB BACKEND ***************/
  if(isset($_POST["modificaPagina"])):
  
    $nextId = 0;
	
    //UPLOAD IMGS //////////////////////////////////////////////////
	 if( isset($_FILES['file']) ):
		 foreach ($_FILES['file']['tmp_name'] as $key => $val ):
			 $target_pathA = "../../../img/";
			 $temp = explode(".",$_FILES['file']['name'][$key]);
			 // CHANGE NAME IMG /////////////////////////////////
			 $newfilename = rand(1,99999) . '.' .end($temp);
			 $target_pathA = $target_pathA.basename($newfilename);	 
			 //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
			 if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
				move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
				$img = $newfilename;
				/// QUERY IMG ///////////////////////////////////////////////
				$sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','', '".$_FILES['file']['type'][$key]."', '')";
				$mysqli->query($sql);
				$nextId = $mysqli->insert_id; 
			 //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
			 endif;
		  // CLOSE FOREACH ///////////////////// 
		  endforeach; 
	  endif;
  
    if($nextId != 0):
    	$sqlPagina = "UPDATE `pagina` SET `pagina_url`='".$mysqli->real_escape_string($_POST["pagina_url"])."',`pagina_riferimento`='".$mysqli->real_escape_string($_POST["pagina_riferimento"])."',`pagina_meta_title`='".$mysqli->real_escape_string($_POST["pagina_meta_title"])."',`pagina_meta_description`='".$mysqli->real_escape_string($_POST["pagina_meta_description"])."',`pagina_meta_tag`='".$mysqli->real_escape_string($_POST["pagina_meta_tag"])."',`pagina_immagine_id`='".$nextId."',`pagina_data_modifica`='".date("Y-m-d H:i:s")."',`pagina_dipendenza_id`='".$mysqli->real_escape_string($_POST["pagina_dipendenza_id"])."' WHERE `pagina_id` = '".$mysqli->real_escape_string($_POST["pagina_id"])."' ";
	else:
	    $sqlPagina = "UPDATE `pagina` SET `pagina_url`='".$mysqli->real_escape_string($_POST["pagina_url"])."',`pagina_riferimento`='".$mysqli->real_escape_string($_POST["pagina_riferimento"])."',`pagina_meta_title`='".$mysqli->real_escape_string($_POST["pagina_meta_title"])."',`pagina_meta_description`='".$mysqli->real_escape_string($_POST["pagina_meta_description"])."',`pagina_meta_tag`='".$mysqli->real_escape_string($_POST["pagina_meta_tag"])."',`pagina_data_modifica`='".date("Y-m-d H:i:s")."',`pagina_dipendenza_id`='".$mysqli->real_escape_string($_POST["pagina_dipendenza_id"])."' WHERE `pagina_id` = '".$mysqli->real_escape_string($_POST["pagina_id"])."' ";
	endif;
	
	if($mysqli->query($sqlPagina)): 
	  echo "Pagina modificata"; 
	else:
	  echo "Errore! Riprova";     
	endif; 
  endif;
  /* END MODIFICA PAGINA DB BACKEND ***************/ 
  
  
  /* ELIMINA PAGINA DB BACKEND *******************/
  if(isset($_POST["eliminPagina"])):
    $sqlPagina = "DELETE FROM `pagina` WHERE `pagina_id` = '".$mysqli->real_escape_string($_POST["pagina_id"])."' ";
	if($mysqli->query($sqlPagina)): 
	  echo "Pagina eliminata"; 
	else:
	 echo "Errore! Riprova";   
	endif; 
  endif;
  /* END ELIMINA PAGINA DB BACKEND ***************/ 
  
  /* END PAGE ******************************************************************/ 
  
    /* ARTICOLO **********************************************************************/
  
  /* AGGIUNGI ARTICOLO DB BACKEND *******************/
  if(isset($_POST["nuovoArticolo"])):
	 if(empty($_POST["articolo_data_modifica"])): $dateModifica = ""; else: $dateModifica = date("Y-m-d", strtotime($_POST["articolo_data_modifica"]));  endif;
	 if(isset($_POST["articolo_categoria_id"]) ):  $categoria = $_POST["articolo_categoria_id"];  else:  $categoria = "";  endif;
	 if(isset($_POST["articolo_img_id"])): $disponibile = $_POST["articolo_img_id"]; else: $disponibile = "0"; endif;
	 if(isset($_POST["articolo_gallery_id"])): $evidenza = $_POST["articolo_gallery_id"]; else: $evidenza = "2"; endif;
    // query insert nuovo articolo 
	$sqlArticolo = "INSERT INTO `articolo`(`articolo_id`,`articolo_pagina_id`,`articolo_titolo`,`articolo_sottotitolo`,`articolo_testo`,`articolo_url`,`articolo_img_id`,`articolo_gallery_id`,`articolo_data_creazione`,`articolo_data_modifica`,`articolo_lingua`,`articolo_ordinamento`,`articolo_categoria_id`,`articolo_visibile`) VALUES ( NULL,'".$mysqli->real_escape_string($_POST["articolo_pagina_id"])."','".$mysqli->real_escape_string($_POST["articolo_titolo"])."','".$mysqli->real_escape_string($_POST["articolo_sottotitolo"])."','".$mysqli->real_escape_string($_POST["articolo_testo"])."','".$mysqli->real_escape_string($_POST["articolo_url"])."','".$disponibile."','".$evidenza."','".date("Y-m-d H:i:s")."','".$dateModifica."','','','".$categoria."','".$mysqli->real_escape_string($_POST["articolo_visibile"])."')";
	if($mysqli->query($sqlArticolo)):  
	     $nextId = $mysqli->insert_id;
		 //UPLOAD IMGS ///////////////////////////////////////////////////
		 foreach ($_FILES['file']['tmp_name'] as $key => $val ):
			 $target_pathA = "../../../img/";
			 $temp = explode(".",$_FILES['file']['name'][$key]);
			 // CHANGE NAME IMG /////////////////////////////////
			 $newfilename = rand(1,99999) . '.' .end($temp);
			 $target_pathA = $target_pathA.basename($newfilename);	 
			 //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
			 if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
				move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
				$img = $newfilename;
				/// QUERY IMG ///////////////////////////////////////////////
				$sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','".$nextId."', '".$_FILES['file']['type'][$key]."', '')";
	            $mysqli->query($sql); 
			 //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
			 endif;
		  // CLOSE FOREACH ///////////////////// 
		  endforeach;
	  echo "Articolo Inserito!"; 
	else:
	  echo "ERRORE: RIPROVA";   
	endif;
  endif;
  /* END AGGIUNGI ARTICOLO DB BACKEND *******************/
  
  
  /* MODIFICA ARTICOLO DB BACKEND *******************/
  if(isset($_POST["modificaArticolo"])): 
	  $id = $_POST["articolo_id"];
	  $dateModifica = date("Y-m-d H:i:s", strtotime($_POST["articolo_data_modifica"]));
	  if(isset($_POST["articolo_img_id"])): $disponibile =  $_POST["articolo_img_id"]; else: $disponibile = "0"; endif;
	  if(isset($_POST["articolo_categoria_id"]) ):  $categoria = $_POST["articolo_categoria_id"];  else:  $categoria = "";  endif;
	  if(isset($_POST["articolo_gallery_id"])): $evidenza = $_POST["articolo_gallery_id"]; else: $evidenza = "2"; endif;
	  $sqlModificaArticolo =" UPDATE `articolo` SET `articolo_titolo`='".$mysqli->real_escape_string($_POST["articolo_titolo"])."',`articolo_sottotitolo`='".$mysqli->real_escape_string($_POST["articolo_sottotitolo"])."',`articolo_testo`='".$mysqli->real_escape_string($_POST["articolo_testo"])."',`articolo_url`='".$mysqli->real_escape_string($_POST["articolo_url"])."',`articolo_img_id`='".$disponibile."',`articolo_gallery_id`='".$evidenza."', `articolo_data_modifica`='".$dateModifica."', `articolo_categoria_id`='".$categoria."',`articolo_visibile`='".$mysqli->real_escape_string($_POST["articolo_visibile"])."' WHERE `articolo_id` = $id ";	
      if($mysqli->query($sqlModificaArticolo)):  
	     $nextId = $id;
		 //UPLOAD IMGS ///////////////////////////////////////////////////
		 foreach ($_FILES['file']['tmp_name'] as $key => $val ):
			 $target_pathA = "../../../img/";
			 $temp = explode(".",$_FILES['file']['name'][$key]);
			 // CHANGE NAME IMG /////////////////////////////////
			 $newfilename = rand(1,99999) . '.' .end($temp);
			 $target_pathA = $target_pathA.basename($newfilename);	 
			 //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
			 if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
				move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
				$img = $newfilename;
				/// QUERY IMG ///////////////////////////////////////////////
				$sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','".$nextId."', '".$_FILES['file']['type'][$key]."', '')";
	            $mysqli->query($sql); 
			 //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
			 endif;
		  // CLOSE FOREACH ///////////////////// 
		  endforeach;
		  //ELIMINA IMGS ///////////////////////////////////////////////////
		  if(!empty($_POST['immagine_id'])):
			  foreach ($_POST['immagine_id'] as $key => $val ): 
			      $sqlElImmagine = "DELETE FROM `immagine` WHERE immagine_id = ".$val."";
				  $mysqli->query($sqlElImmagine);
   		      endforeach;
		  //END ELIMINA IMGS ///////////////////////////////////////////////////	  
		  endif;
		  //ORDINAMENTO IMGS ///////////////////////////////////////////////////
		  if(isset($_POST['immagine_ordinamento'])):
			  foreach ($_POST['immagine_ordinamento'] as $key => $val ): 
				  $sqlUpdateImmagine = "UPDATE `immagine` SET `immagine_ordinamento` = '".$key."' WHERE `immagine_id` = ".$val."";
				  $mysqli->query($sqlUpdateImmagine);
			  //ORDINAMENTO IMGS ///////////////////////////////////////////////////  
			  endforeach;
		  endif;
		  
		  //ELIMINA ARTICOLO //////////////////////////////////////////////////
		  
		  if(isset($_POST["eliminaArticolo"])):
		     $sqlElArt = "DELETE FROM `articolo` WHERE articolo_id = ".$id."";
		     $mysqli->query($sqlElArt);
			 echo "Articolo Eliminato";
		  else:
		    echo " Articolo Modificato!"; 
		  endif;
		  
	  
	else:
	  echo "ERRORE: RIPROVA";   
	endif;
  /* END MODIFICA ARTICOLO DB BACKEND *******************/
  endif;
  
  /* END ARTICOLO **********************************************************************/
  
  /* CATEGORIA **********************************************************************/
  
  /* NUOVA CATEGORIA **********************************************************/
  if(isset($_POST["nuovaCategoria"])): 
     $nextId = 0;
	 //UPLOAD IMGS ///////////////////////////////////////////////////
	 if( isset($_FILES['file']) ):
		 foreach ($_FILES['file']['tmp_name'] as $key => $val ):
			 $target_pathA = "../../../img/";
			 $temp = explode(".",$_FILES['file']['name'][$key]);
			 // CHANGE NAME IMG /////////////////////////////////
			 $newfilename = rand(1,99999) . '.' .end($temp);
			 $target_pathA = $target_pathA.basename($newfilename);	 
			 //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
			 if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
				move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
				$img = $newfilename;
				/// QUERY IMG ///////////////////////////////////////////////
				$sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','', '".$_FILES['file']['type'][$key]."', '')";
				$mysqli->query($sql);
				$nextId = $mysqli->insert_id; 
			 //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
			 endif;
		  // CLOSE FOREACH ///////////////////// 
		  endforeach; 
	  endif;
  
  
  
  	$sqlCategoria = "INSERT INTO `categoria`(`categoria_id`, `categoria_nome`, `categoria_url`, `categoria_articolo_id`, `categoria_immagine_id`, `categoria_gallery_id`, `categoria_data_creazione`, `categoria_data_modific`) VALUES (NULL,'".$mysqli->real_escape_string($_POST["categoria_nome"])."','".$mysqli->real_escape_string($_POST["categoria_url"])."','".$nextId."','','','".date("Y-m-d H:i:s")."','')";
    if($mysqli->query($sqlCategoria)):
	   echo "Categoria Aggiunta!";
	else:
	   echo "ERRORE: RIPROVA";   
	endif;   
  endif;
  /* END NUOVA CATEGORIA **********************************************************/
  
  /* MODIFICA CATEGORIA **********************************************************/
  if(isset($_POST["modificaCategoria"])): 
  
    $nextId = 0;
	
    //UPLOAD IMGS //////////////////////////////////////////////////
	 if( isset($_FILES['file']) ):
		 foreach ($_FILES['file']['tmp_name'] as $key => $val ):
			 $target_pathA = "../../../img/";
			 $temp = explode(".",$_FILES['file']['name'][$key]);
			 // CHANGE NAME IMG /////////////////////////////////
			 $newfilename = rand(1,99999) . '.' .end($temp);
			 $target_pathA = $target_pathA.basename($newfilename);	 
			 //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
			 if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
				move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
				$img = $newfilename;
				/// QUERY IMG ///////////////////////////////////////////////
				$sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','', '".$_FILES['file']['type'][$key]."', '')";
				$mysqli->query($sql);
				$nextId = $mysqli->insert_id; 
			 //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
			 endif;
		  // CLOSE FOREACH ///////////////////// 
		  endforeach; 
	  endif;
    
  
    if(  $nextId != 0 ):
	    $sqlModificaCategoria = "UPDATE `categoria` SET `categoria_nome`='".$mysqli->real_escape_string($_POST["categoria_nome"])."', `categoria_url`='".$mysqli->real_escape_string($_POST["categoria_url"])."',  `categoria_articolo_id` = ".$nextId."  WHERE `categoria_id` = '".$_POST["categoria_id"]."'";
	else:
	    $sqlModificaCategoria = "UPDATE `categoria` SET `categoria_nome`='".$mysqli->real_escape_string($_POST["categoria_nome"])."', `categoria_url`='".$mysqli->real_escape_string($_POST["categoria_url"])."'  WHERE `categoria_id` = '".$_POST["categoria_id"]."'";
	endif;
  
    if($mysqli->query($sqlModificaCategoria)):
	   echo "Categoria Modificata!";
	else:
	   echo "ERRORE: RIPROVA";   
     endif;
  /* END MODIFICA CATEGORIA **********************************************************/
  endif; 

  if(isset($_POST["eliminaCategoria"])): 
    $sqlElCategoria = "DELETE FROM `categoria` WHERE categoria_id = ".$_POST["categoria_id"]."";
    if($mysqli->query($sqlElCategoria)):
	   echo "Categoria Eliminata!";
	else:
	   echo "ERRORE: RIPROVA";   
     endif;
  /* END MODIFICA CATEGORIA **********************************************************/
  endif; 
  
  
  /* END CATEGORIA **********************************************************************/




?>