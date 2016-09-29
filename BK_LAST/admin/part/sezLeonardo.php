

     <!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione <span class="semi-bold"><?php echo $sezN; ?></span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
            
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" type="file" name="img_g" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                
                <h5>Misure immagine:1871px × 531px</h5>
                
                <hr/>
                
                
                <h4>Titolo</h4>
                <textarea class="tiny" name="title"></textarea>
                
                <hr/>
                
                
                <h4>Testo </h4>
                <textarea class="tiny" name="txt"></textarea>
                
                <hr />
                
                
                <h4>Email di contatto</h4>
                <input  type="text" name="info1">
                
                <hr />
                
                
                <h4>Telefono contatto</h4>
                <input  type="text" name="info2">
                
                
                <hr />
               
                <button class="btn btn-primary btn-cons pull-right btn-success" name="LeoNtesto" type="submit">Inserisci Contenuti</button>
                
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
    
    
    
<?php 
	
  $query4 = "SELECT * FROM `testo` LEFT JOIN `immagini` ON `immagini`.`id_txt`=`testo`.`id_txt` LEFT JOIN `info` ON `info`.`id_txt`=`testo`.`id_txt`  WHERE `testo`.`id_vm1` = '".$_GET["id"]."' "; 

  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){ $idTxt = $row4["id_txt"];  ?>
  
  
  
  
    <!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione <span class="semi-bold"><?php echo $row4["titolo_txt"]; ?></span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
            
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                <input type="hidden" name="idimg" value="<?php echo $row4["id_img"]; ?>" />
                
                <input type="hidden" name="idtxt" value="<?php echo $idTxt; ?>" />
                
                <input type="hidden" name="idinfo" value="<?php echo $row4["id_info"]; ?>" />
                
                <?php  if(empty($row4["nome_img"])){}else{ ?>  <img src="../img/<?php echo $row4["nome_img"]; ?>"  width="220"/>   <?php } ?>
                
                
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" type="file" name="img_g" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                
                <h5>Misure immagine:1871px × 531px</h5>
                
                <hr/>
                
                
                <h4>Titolo</h4>
                <textarea class="tiny" name="title"><?php echo $row4["titolo_txt"]; ?></textarea>
                
                <hr/>
                
                
                <h4>Testo </h4>
                <textarea class="tiny" name="txt"><?php echo $row4["testo_txt"]; ?></textarea>
                
                <hr>
                
                <h4>Email di contatto</h4>
                <input  type="text" name="info1" value="<?php echo $row4["txt_info"]; ?>">
                
                <hr />
                
                
                <h4>Telefono contatto</h4>
                <input  type="text" name="info2" value="<?php echo $row4["txt2_info"]; ?>">
                
                
                <hr />
               
                <button class="btn btn-primary btn-cons pull-right btn-success" name="WhoMtesto" type="submit">Modifica Contenuti</button>
                <button class="btn btn-primary btn-cons pull-right btn-warning" name="WhoEtestoImg" type="submit">Elimina Immagine</button>
                <button class="btn btn-primary btn-cons pull-right btn-danger" name="WhoEtesto" type="submit">Elimina</button>
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END -->  
  
  
      
      
      
<?php } ?>