

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
              
                
                
                <div class="col-md-6 no-padding">
                <h4>Seleziona PDF</h4>
                
                <input id="img1" type="file" name="info1" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi il PDF</label>
                </div> 
                
                
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Dati di contatto</h4>
                <textarea class="tiny" name="info2"></textarea>
                
                </div>
                
                
               
                
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
                
                <hr />
               
                <button class="btn btn-primary btn-cons pull-right btn-success" name="Int2Ntesto" type="submit">Inserisci Contenuti</button>
                
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
	
  $queryA = "SELECT * FROM `testo` WHERE `testo`.`id_vm2` = '".$_GET["id"]."' "; 
	 
	
  //$query4 = "SELECT * FROM `testo` LEFT JOIN `immagini` ON `immagini`.`id_txt`=`testo`.`id_txt` LEFT JOIN `info` ON `info`.`id_txt`=`testo`.`id_txt`  WHERE `testo`.`id_vm1` = '".$_GET["id"]."' "; 

  $resultA = $mysqli->query($queryA); while ( $rowA = $resultA->fetch_array()){ 
  
  
  $idTxt = $rowA["id_txt"];  
  
  
  $originalDate = $rowA["data_txt"]; 
  $newDate = date("Y-m-d", strtotime($originalDate));
  
  
  
 ?>
  
  
  
     
     
       <!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione <span class="semi-bold"><?php echo $rowA["titolo_txt"]; ?></span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
            
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
               
                <input type="hidden" name="idtxt" value="<?php echo $idTxt; ?>" />
                
                
                
               
                
                
                <div class="col-md-6 no-padding">
                
                 <?php 
				    
					$queryB = "SELECT * FROM `immagini` WHERE `id_txt` = '".$idTxt."' "; 
					$resultB = $mysqli->query($queryB); while ( $rowB = $resultB->fetch_array()){ 
				 
				 
				 ?>
                 
                 <input type="hidden" name="idimg" value="<?php echo $rowB["id_img"]; ?>" />
                
                 <?php  if(empty($rowB["nome_img"])){}else{ ?>  <img src="../img/<?php echo $rowB["nome_img"]; ?>"  width="220"/>   <?php } } ?>
                
                
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" type="file" name="img_g" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                
                <h5>Misure immagine:1871px × 531px</h5>
                </div>
              
                
                
                <div class="col-md-6 no-padding">
                
                
                <?php 
				    
					$queryC = "SELECT * FROM `info` WHERE `id_txt` = '".$idTxt."' "; 
					$resultC = $mysqli->query($queryC); while ( $rowC = $resultC->fetch_array()){ 
					
					$info2 = $rowC["txt2_info"];
				 
				 ?>
                 
                 <input type="hidden" name="idinfo" value="<?php echo $rowC["id_info"]; ?>" />
                
                
                <h5> <span class="semi-bold"><?php echo $rowC["txt_info"]; ?></span>  </h5>
                
                <?php } ?>
                
                <h4>Seleziona PDF</h4>
                
                <input id="img1" type="file" name="info1" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi il PDF</label>
                
                
                </div> 
                
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Dati di contatto</h4>
                <textarea class="tiny" name="info2"><?php echo $info2; ?></textarea>
                
                </div>
                
                
               
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Titolo</h4>
                <textarea class="tiny" name="title"><?php echo $rowA["titolo_txt"]; ?></textarea>
                
                </div>
                
               
                
                
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                <h4>Testo </h4>
                <textarea class="tiny" name="txt"><?php echo $rowA["testo_txt"]; ?></textarea>
                
                </div>
           
                
                
                <div class="col-md-12 no-padding">
                
                <hr/>
                
                
                
              
               
                
                 <div class="col-md-12 no-padding">
                
                 <hr>
               
                 <button class="btn btn-primary btn-cons pull-right btn-success" name="WhoMtesto" type="submit">Modifica Contenuti</button>
                 <button class="btn btn-primary btn-cons pull-right btn-warning" name="WhoEtestoImg" type="submit">Elimina Immagine</button>
                 <button class="btn btn-primary btn-cons pull-right btn-warning" name="WhoEtestoPDF" type="submit">Elimina PDF</button> 
                 <button class="btn btn-primary btn-cons pull-right btn-danger" name="WhoEtesto" type="submit">Elimina</button>
                
                </div> 
                
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END -->  
  
  
  
  
  
  
  
<?php } ?>    
    
