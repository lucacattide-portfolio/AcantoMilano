<!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione: <span class="semi-bold"><?php echo $sezN; ?></span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
            
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                <!--   <h4>Seleziona Immagine</h4>
                <input id="img1" type="file" name="img"/>
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                <h5>  Larghezza: <span class="semi-bold">1920px</span> | Altezza: <span class="semi-bold">880px</span> | Risoluzione: <span class="semi-bold">72dpi</span>  </h5> -->
                
                
                <?php 
      
				  $query = "SELECT * FROM `testo` WHERE `id_vm1` = '".$_GET["id"]."' "; 
				  
				  $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ ?>
                  
                <input type="hidden" name="idtxt" value="<?php echo $row["id_vm1"]; ?>" />  

                <h4>Testo Introduttivo</h4>
                <textarea class="tiny" name="txt"><?php echo $row["testo_txt"]; ?></textarea>
                
                <?php } ?>
                
                <div class="clear"></div>
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right btn-success" name="Mint" type="submit">Modifica</button>
                
               <?php 
			   if(isset($_GET["risp"])){  
			     if($_GET["risp"] == "si"){
					 ?>
					 
                     <h4>Inserimento avvenuto con successo</h4>
                     
                     
			   <?php 		 
				 }
				 else{}
			   
			   } 
			   ?>
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END --> 
    
    
    
    
    
    
    
<!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione: <span class="semi-bold">Gallery</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
            
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" multiple type="file" name="img_g[]" multiple="multiple" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                
                <h5>Misure immagine: 1927px × 1004px</h5>
               
                <button class="btn btn-primary btn-cons pull-right btn-success" name="InsImg" type="submit">Inserisci immagini</button>
                
               <?php 
			   if(isset($_GET["risp"])){  
			     if($_GET["risp"] == "si"){
					 ?>
					 
                     <h4>Inserimento avvenuto con successo</h4>
                     
                     
			   <?php 		 
				 }
				 else{}
			   
			   } 
			   ?>
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END -->  
    
    
    
<!-------------------------------     LOOP CONTENUTI GALLERY      ------------------------------------->    

   <?php 
        
	  $query4 = "SELECT * FROM `gallery` LEFT JOIN `immagini` USING( id_gal ) WHERE `gallery`.`id_vm1` = '".$_GET["id"]."' "; 
	
	  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){  ?>
      
      
      
      <!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Immagine <span class="semi-bold"><?php echo $row4["nome_img"] ?></span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
            
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                 <input type="hidden" name="idimg" value="<?php echo $row4["id_img"]; ?>" />
                
                <img src="../img/<?php echo $row4["nome_img"] ?>"  width="220"/>
                
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" multiple type="file" name="img_g" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e cambia l'immagine</label>
                
                <h5>Misure immagine: 1927px × 1004px</h5>
                
                <hr/>
                
                <h4>Credits Immagine</h4>
                <textarea class="tiny" name="txt"><?php echo $row4["txt_img"]; ?></textarea>
                
                <hr>
               
                <button class="btn btn-primary btn-cons pull-right btn-success" name="ModImg" type="submit">Modifica Contenuti</button>
                
               <?php 
			   if(isset($_GET["risp"])){  
			     if($_GET["risp"] == "si"){
					 ?>
					 
                     <h4>Inserimento avvenuto con successo</h4>
                     
                     
			   <?php 		 
				 }
				 else{}
			   
			   } 
			   ?>
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END -->  
      
   
   
   <?php } ?>
    