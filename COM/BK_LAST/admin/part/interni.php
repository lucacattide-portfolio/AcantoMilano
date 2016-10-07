

     <!-- BEGIN --> 
		<div class="col-md-6  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione <span class="semi-bold">  Intestazione </span></h4>
            
            <h5>Inserisci l'intestazione una sola volta per sezione</h5>
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
                
                <button class="btn btn-primary btn-cons pull-right btn-success" name="IntNcont" type="submit">Inserisci Intestazione</button>
                
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
                
		    <h4>Sezione <span class="semi-bold">  Contenuto </span></h4>
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
                
                
                
                <h4>Titolo Contenuto </h4>
                <textarea class="tiny" name="title"></textarea>
                
                <hr/>
                
                
                
                <h4>Testo Contenuto </h4>
                <textarea class="tiny" name="txt"></textarea>
                
                <hr/>
                
                
                
           
               
               
                <button class="btn btn-primary btn-cons pull-right btn-success" name="IntNcont" type="submit">Inserisci Contenuto sezione</button>
                
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
    
<div class="clearfix"></div>
<hr/>    
    
<?php 
	
  $query4 = "SELECT *,`testo`.`id_txt` AS IDTXT FROM `testo` LEFT JOIN `immagini` USING( id_txt ) WHERE `testo`.`id_vm2` = '".$_GET["id"]."' "; 

  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){ 
  
  $idTxt = $row4["IDTXT"];
  
  
  if( $row4["titolo_txt"] != "" ){?>
	    
  
  
  
  
  <!-- BEGIN --> 
		<div class="col-md-6  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione <span class="semi-bold">  Contenuto </span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
            
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                <input type="hidden" name="idimg" value="<?php echo $row4["id_img"]; ?>" />
                
                <input type="hidden" name="idtxt" value="<?php echo  $idTxt; ?>" />
                
                
                
                <?php  if(empty($row4["nome_img"])){}else{ ?>  <img src="../img/<?php echo $row4["nome_img"] ?>"  width="220"/>   <?php } ?>
                
                
                
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" type="file" name="img_g" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                
                <h5>Misure immagine:1871px × 531px</h5>
                
                <hr/>
                
                
                <h4>Titolo Contenuto </h4>
                <textarea class="tiny" name="title"><?php echo $row4["titolo_txt"]; ?></textarea>
                
                <hr/>
                
                
                <h4>Testo Contenuto </h4>
                <textarea class="tiny" name="txt"><?php echo $row4["testo_txt"]; ?></textarea>
                
                <hr/>
                
                
                <button class="btn btn-primary btn-cons pull-right btn-success" name="IntMcont" type="submit">Modifica Intestazione</button>
                <button class="btn btn-primary btn-cons pull-right btn-warning" name="WhoEtestoImg" type="submit">Elimina Immagine</button>
                <button class="btn btn-primary btn-cons pull-right btn-danger" name="WhoEtesto" type="submit">Elimina</button>

                
              
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END -->
    
    
 <?php }else{ ?>  
 
 
 
 
 
 
 <!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione <span class="semi-bold">  Intestazione </span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
            
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                <input type="hidden" name="idimg" value="<?php echo $row4["id_img"]; ?>" />
                
                <input type="hidden" name="idtxt" value="<?php echo  $idTxt; ?>" />
                
                
                
                <?php  if(empty($row4["nome_img"])){}else{ ?>  <img src="../img/<?php echo $row4["nome_img"] ?>"  width="220"/>   <?php } ?>
                
                
                
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" type="file" name="img_g" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                
                <h5>Misure immagine:1871px × 531px</h5>
                
                <hr/>
                
                
                
                <button class="btn btn-primary btn-cons pull-right btn-success" name="IntMcont" type="submit">Modifica Intestazione</button>
                <button class="btn btn-primary btn-cons pull-right btn-danger" name="WhoEtesto" type="submit">Elimina</button>
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END -->

 <?php  }  ?>      
  
  
  
  
 
 
<?php } ?>  