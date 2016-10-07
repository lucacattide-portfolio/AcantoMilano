

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
                
                
                
                
                <h4>Titolo</h4>
                <textarea class="tiny" name="title"></textarea>
                
                <hr/>
                
                
                <h4>Testo </h4>
                <textarea class="tiny" name="txt"></textarea>
                
                <hr>
               
                <button class="btn btn-primary btn-cons pull-right btn-success" name="WhoNtesto" type="submit">Inserisci Contenuti</button>
                
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
	
  $query4 = "SELECT * FROM `testo` LEFT JOIN `immagini` USING( id_txt ) WHERE `testo`.`id_vm1` = '".$_GET["id"]."' "; 

  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){  ?>
  
  
  
  
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
                
                <input type="hidden" name="idimg" value="<?php echo $row4["id_img"] ?>" />
                
                <input type="hidden" name="idtxt" value="<?php echo $row4["id_txt"] ?>" />
                
                <?php  if(empty($row4["nome_img"])){}else{ ?>  <img src="../img/<?php echo $row4["nome_img"] ?>"  width="220"/>   <?php } ?>
                
                
                
                
                
                <h4>Titolo</h4>
                <textarea class="tiny" name="title"><?php echo $row4["titolo_txt"]; ?></textarea>
                
                <hr/>
                
                
                <h4>Testo </h4>
                <textarea class="tiny" name="txt"><?php echo $row4["testo_txt"]; ?></textarea>
                
                <hr>
               
                <button class="btn btn-primary btn-cons pull-right btn-success" name="WhoMtesto" type="submit">Modifica Contenuti</button>
                <a class="btn btn-primary btn-cons pull-right btn-primary" href="index1.php?pag=sezioni2&id=<?php echo $row4["id_txt"] ?>">Gestisci Voci Menu</a>
                <button class="btn btn-primary btn-cons pull-right btn-warning" name="WhoEtestoImg" type="submit">Elimina Immagine</button>
                <button class="btn btn-primary btn-cons pull-right btn-danger" name="WhoEtesto" type="submit">Elimina</button>
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END -->  
  
  
      
      
      
<?php } ?>    
    



<?php  /*  anticipazioni origine 
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
                
                
                <div class="col-md-6 no-padding">
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" type="file" name="img_g" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                
                <h5>Misure immagine:1871px × 531px</h5>
                </div>
              
                
                
               <!-- <div class="col-md-6 no-padding">
                <h4>Seleziona PDF</h4>
                
                <input id="img1" type="file" name="info1" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi il PDF</label>
                </div> -->
                
                
               
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Titolo</h4>
                <textarea class="tiny" name="title"></textarea>
                
                </div>
                
               
                
                
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Testo </h4>
                <textarea class="tiny" name="txt"></textarea>
                
                </div>
           
                
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Data </h4>
                <div class="input-append success date col-md-10 col-lg-6 no-padding">
                    <input type="text" class="form-control" name="data-post">
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                </div>
                
                </div>
                
                
               
                <div class="col-md-12 no-padding">
                
                <hr />
               
                <button class="btn btn-primary btn-cons pull-right btn-success" name="LeoNtesto" type="submit">Inserisci Contenuti</button>
                
                </div>
                
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

  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){ 
  
  
  $idTxt = $row4["id_txt"];  
  
  
  $originalDate = $row4["data_txt"]; 
  $newDate = date("Y-m-d", strtotime($originalDate));
  
  
  
 ?>
  
  
  
     
     
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
                
               
                
                
                <div class="col-md-6 no-padding">
                
                 <?php  if(empty($row4["nome_img"])){}else{ ?>  <img src="../img/<?php echo $row4["nome_img"]; ?>"  width="220"/>   <?php } ?>
                
                
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" type="file" name="img_g" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                
                <h5>Misure immagine:1871px × 531px</h5>
                </div>
              
                
            
                
               
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Titolo</h4>
                <textarea class="tiny" name="title"><?php echo $row4["titolo_txt"]; ?></textarea>
                
                </div>
                
               
                
                
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Testo </h4>
                <textarea class="tiny" name="txt"><?php echo $row4["testo_txt"]; ?></textarea>
                
                </div>
           
                
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Data </h4>
                <div class="input-append success date col-md-10 col-lg-6 no-padding">
                    <input type="text" class="form-control" name="data-post" value="<?php echo $newDate; ?>">
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                </div>
                
                </div>
                
                
                
                
                
                
                 <div class="col-md-12 no-padding">
                
                 <hr>
               
                 <button class="btn btn-primary btn-cons pull-right btn-success" name="WhoMtesto" type="submit">Modifica Contenuti</button>
                 <button class="btn btn-primary btn-cons pull-right btn-warning" name="WhoEtestoImg" type="submit">Elimina Immagine</button>
                 <!-- <button class="btn btn-primary btn-cons pull-right btn-warning" name="WhoEtestoPDF" type="submit">Elimina PDF</button> -->
                 <button class="btn btn-primary btn-cons pull-right btn-danger" name="WhoEtesto" type="submit">Elimina</button>
                
                </div> 
                
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END -->  
  
  
  
  
  
  
  
<?php } */ ?>    
    
