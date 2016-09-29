  <!-- BEGIN --> 
		<div class="col-md-6  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione Prodotti: <span class="semi-bold">Gallery</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id_cp" value="<?php echo $_GET["id"] ?>" />
                
                <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                
                
                
               <h4>Seleziona Immagine di copertina:</h4>
                <input id="img1" type="file" name="img"/>
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                <h5>  Larghezza: <span class="semi-bold">1920px</span> | Altezza: <span class="semi-bold">880px</span> | Risoluzione: <span class="semi-bold">72dpi</span>  </h5> 
                
                
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Npc" type="submit">Inserisci</button>
                
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
    
    
    
    <!------------------------------------------------------------------------------------  ------------------------------------>
 
  <?php 
 
    $query = "SELECT * FROM `".$tab."_prodotti_gallery` WHERE `id_cp` = '".$_GET["id"]."' ORDER BY `id_pg`  ASC";  
 
    $result = $mysqli->query($query); while ( $row = $result->fetch_array()){
		
    $id = $row["id_pg"];
		
	?>
    
    
    
    <!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione Prodotti: <span class="semi-bold">Copertina</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id_pg" value="<?php echo $id ?>" />
                
                <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                
                <h4>Immagine Caricata</h4>
                <img src="../img/<?php echo $row["img_pg"]; ?>" width="200" />
                
    
                
                <hr/>
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Dpc" type="submit">Elimina</button>
               
      
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END --> 
    
    
    
    
    
 <?php } ?>
 