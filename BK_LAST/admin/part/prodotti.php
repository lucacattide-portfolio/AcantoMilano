  <!-- BEGIN --> 
		<div class="col-md-6  allineamentoBox no-border">
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
                
                <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                

                <h4>Categoria Associata:</h4>
                 
                 <select id="source" class="selelectCover" name="classe2">
                 <?php $query = "SELECT * FROM `".$tab."_prodotti_classi` ORDER BY `id_classi` ASC ";   
				   
				   $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ ?>

                   <option value="<?php echo $row["id_classi"];  ?>"><?php echo $row["nome_c2_classi"];  ?></option>
                    
                 <?php } ?>    
                 </select>
                <hr/>
                
     
                
                
               <h4>Seleziona Immagine di copertina:</h4>
                <input id="img1" type="file" name="img"/>
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                <h5>  Larghezza: <span class="semi-bold">1920px</span> | Altezza: <span class="semi-bold">880px</span> | Risoluzione: <span class="semi-bold">72dpi</span>  </h5> 
                
                
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Ncopertina" type="submit">Inserisci</button>
                
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
    
    
 
 
 <div class="clear"></div>   
    

 <hr/>
 
 
 <!------------------------------------------------------------------------------------  ------------------------------------>
 
  <?php 
 
    $query = "SELECT * FROM `".$tab."_prodotti_copertina` ORDER BY `id_classi`,`id_cp`  ASC";  
 
    $result = $mysqli->query($query); while ( $row = $result->fetch_array()){
		
    $id = $row["id_classi"];
		
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
                
                <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id_cp" value="<?php echo $row["id_cp"] ?>" />
                

                <h4>Categoria Associata:</h4>
                 
                 <select id="source" class="selelectCover" name="classe2">
                 <?php $query2 = "SELECT * FROM `".$tab."_prodotti_classi` ORDER BY `id_classi` ASC ";   
				   
				   $result2 = $mysqli->query($query2); while ( $row2 = $result2->fetch_array()){ ?>

                   <option  <?php if( $id  == $row2["id_classi"] ){ echo "selected"; }else{} ?> value="<?php echo $row2["id_classi"];  ?>"><?php echo $row2["nome_c2_classi"];  ?></option>
                    
                 <?php } ?>    
                 </select>
                <hr/>
                
   
                
                <h4>Seleziona Immagine</h4>
                <img src="../img/<?php echo $row["img_cp"]; ?>" width="200" />
                
               <div class="allineamentoBox"> 
               <h4>Seleziona Immagine di copertina:</h4>
                <input id="img1" type="file" name="img"/>
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                <h5>  Larghezza: <span class="semi-bold">1920px</span> | Altezza: <span class="semi-bold">880px</span> | Risoluzione: <span class="semi-bold">72dpi</span>  </h5> 
                </div>
                
                <div class="clear"></div>
                
                <hr/>
                
                
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Mcopertina" type="submit">Modifica</button>
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Dcopertina" type="submit">Elimina</button>
                <a href="index1.php?pag=sliders&id=<?php echo $row["id_cp"] ?>" class="btn btn-primary btn-cons pull-right Btn-color">Gestisci Gallery</a>
                
                
               <?php 
			   if(isset($_GET["id"])){
			     if($row["id_cp"] == $_GET["id"] ){
					 ?>
					 
                     <h4>Modifica avvenuta con successo</h4>
                     
                     
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
 