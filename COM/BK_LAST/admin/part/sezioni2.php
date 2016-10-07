 <!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione <span class="semi-bold">NUOVA VOCE MENU</span></h4>
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
                
                <h5>Misure immagine: 374px × 303px</h5>
                
                <hr/>
                
                
                <h4>Titolo</h4>
                <input class="col-md-12" type="text" name="title" />
                
                <br>
                <br>
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right btn-success" name="Nliv2" type="submit">Inserisci</button>
                
               
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
	
  $query4 = "SELECT * FROM `voce_menu_2` WHERE id_txt = '".$_GET["id"]."' "; 

  $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){  ?>  
  
  
   <!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
                
		    <h4>Sezione <span class="semi-bold">NUOVA VOCE MENU</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
            
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                <input type="hidden" name="idvm2" value="<?php echo $row4["id_vm2"]; ?>" />
                
                
                <?php  if(empty($row4["img_vm2"])){}else{ ?>  <img src="../img/<?php echo $row4["img_vm2"] ?>"  width="220"/>   <?php } ?>
                
                
                <h4>Seleziona Immagine</h4>
                
                <input id="img1" type="file" name="img_g" />
                
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                
                <h5>Misure immagine: 374px × 303px</h5>
                
                <hr/>
                
                
                <h4>Titolo</h4>
                <input class="col-md-12" type="text" name="title" value="<?php echo $row4["nome_vm2"] ?>" />
                
                <br>
                <br>
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right btn-success" name="Mliv2" type="submit">Modifica Voce</button>
                <a class="btn btn-primary btn-cons pull-right btn-primary" href="index1.php?pag=interni2&id=<?php echo $row4["id_vm2"]; ?>">Gestisci Contenuto</a>
                <button class="btn btn-primary btn-cons pull-right btn-danger" name="Eliv2" type="submit">Elimina</button>
                
               
               
                
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END --> 
  
  
  
<?php } ?>    
    