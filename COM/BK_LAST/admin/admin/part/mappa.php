 <div class="page-title"> <i class="icon-custom-left IconR_A"></i>
   <h3 >Event - <span class="semi-bold">Map</span> </h3>
 </div>
 
 
 
 
 
 <div class="col-md-8">
    <div id="mappaCont" class="grid simple">
       <div class="mappaDown"><img  src="../imgs/mappaDef.png" width="1038" /></div>
       <div id="wrapper2" class="grid-title no-border bKB"></div>
     
       
     </div>
 </div>  
 
 
 <div class="col-md-4 Zindex ">
    <div class="grid simple">
       <div  class="grid-title no-border">   
       
       <h3>Add new  <span class="semi-bold">event</span></h3>
       <form action="action.php" method="post" enctype="multipart/form-data">
             
             
           <label class="form-label">Select  Marker</label>
             
           <div class="controls">
           <select name="id_mappa">
		   <?php   $resultA = $mysqli->query("SELECT * FROM `mappa` "); while ( $row = $resultA->fetch_array()){  ?>
             <option value="<?php echo $row["id_mappa"]; ?>"><?php echo $row["id_mappa"]; ?></option>
	       <?php  } ?>
		   </select>
           </div>
             
             
             
             
            
           <label class="form-label">Select Event</label>
             
           <div class="controls">
           <select name="id_cat">
		   <?php   $resultA = $mysqli->query("SELECT * FROM `categorie` WHERE nome_cat LIKE 'Register' OR nome_cat LIKE 'Seminari'  ORDER BY id_cat DESC "); while ( $row = $resultA->fetch_array()){  $idCat = $row["id_cat"]; $nCat = $row["titolo_cat"]; ?>
             <option value="<?php echo $idCat; ?>"><?php echo $nCat; ?></option>
	       <?php  } ?>
		   </select>
           </div>
           
           <br>

           <div class="controls">
            <button type="" name="mappa4" class="btn btn-primary btn-sm btn-small">Connect event</button>
           </div>
           
           <hr>
          </form>
       
       
       
       </div>
     </div>
 </div> 
   
 
 
 
  <div class="col-md-12">
    <div class="grid simple">
       <div  class="grid-title no-border">
       
        <?php  $result = $mysqli->query("SELECT * FROM `mappa` LEFT JOIN `categorie` USING( id_cat ) ORDER BY id_mappa DESC"); while ( $row = $result->fetch_array()){
		
		$id_map = $row["id_mappa"];
		$x = $row["x_mappa"]; 
		$y = $row["y_mappa"];
		$Icat = $row["id_cat"];
		$dataIn = $row["data_start"];
		$dataEnd = $row["data_end"];
		$titolo = $row["titolo_cat"];
		$vis =  $row["visibile"];
		
		?>
        
        
        <h3>Evento <span class="semi-bold"><?php echo $titolo ?></span></h3>
       <form action="action.php" method="post" enctype="multipart/form-data">
       
       <input  type="hidden" name="id_mappa"  value="<?php echo $id_map; ?>" />

           <div class="col-md-3"> 
           <label class="form-label">Select Event</label>
            
           <div class="controls">
           <select name="id_cat">
		   <?php   $resultA = $mysqli->query("SELECT * FROM `categorie` WHERE nome_cat LIKE 'Register' OR nome_cat LIKE 'Seminario'  ORDER BY id_cat DESC "); while ( $row = $resultA->fetch_array()){  $idCat = $row["id_cat"]; $nCat = $row["titolo_cat"]; ?>
             <option <?php if( $Icat == $idCat){ echo "selected";  }else{} ?>  value="<?php echo $idCat; ?>"><?php echo $nCat; ?></option>
	       <?php  } ?>
		   </select>
           </div>
           
           </div>
           
           
            <div class="col-md-3">
           <label class="form-label">Select Gallery</label>
             
           <div class="controls">
           <select name="id_gallery">
           <option value="">---</option>
		   <?php   $resultA = $mysqli->query("SELECT * FROM `categorie` WHERE nome_cat LIKE 'Gallery' ORDER BY id_cat DESC "); while ( $row = $resultA->fetch_array()){  $idCat = $row["id_cat"]; $nCat = $row["titolo_cat"]; ?>
             <option <?php if( $Icat == $idCat){ echo "selected";  }else{} ?>  value="<?php echo $idCat; ?>"><?php echo $nCat; ?></option>
	       <?php  } ?>
		   </select>
           </div>
           
          </div>
           
           <div class="col-md-3">
           
           <label class="form-label">Select Video</label>
             
           <div class="controls">
           <select name="id_video">
           <option value="">---</option>
		   <?php   $resultA = $mysqli->query("SELECT * FROM `categorie` WHERE nome_cat LIKE 'Video' ORDER BY id_cat DESC "); while ( $row = $resultA->fetch_array()){  $idCat = $row["id_cat"]; $nCat = $row["titolo_cat"]; ?>
             <option <?php if( $Icat == $idCat){ echo "selected";  }else{} ?>  value="<?php echo $idCat; ?>"><?php echo $nCat; ?></option>
	       <?php  } ?>
		   </select>
           </div>
           
           </div>
           
           <div class="col-md-3">
           
           <label class="form-label">Visible</label>
             
           <div class="controls">
           <select name="visibile">
            <option value="1">Invisible</option>
		    <option  <?php if( $vis == "2"){ echo "selected";  }else{} ?> value="2">Visible</option>
		   </select>
           </div>
           
           </div>
           
           
           
           <div class="clearfix"></div>
     
           <div class="col-md-3">
            <div class="controls">
            <br>

             <button type="" name="mappa5" class="btn btn-primary btn-sm btn-small">Upload</button>
             <button type="" name="mappa6" class="btn btn-primary btn-sm btn-small">Delete</button>
            </div>
           </div>
          
           <div class="clearfix"></div>
           <hr>
          </form>
        <br>

	      <div class="clearfix"></div>
          
	<?php } ?>
       
       
       
       </div>
     </div>
 </div>   