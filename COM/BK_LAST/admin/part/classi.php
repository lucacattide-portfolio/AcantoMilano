<div class="row">


<!-- BEGIN --> 
		<div class="col-md-4  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione Categorie: <span class="semi-bold">Primo Livello</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="text" name="classe1" class="custom-input" placeholder="Nome Classe" />
                
                <hr/>
                
               
         
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Nclasse" type="submit">Inserisci</button>
                
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
		<div class="col-md-6  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione Categorie: <span class="semi-bold">Secondo Livello</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                
                <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                
                <input type="text" name="classe2" class="custom-input" placeholder="Nome Classe" />
                
                <hr/>
                
                <h4>Categoria Associata:</h4>
                 
                 <select id="source" class="selelectCover" name="classe1">
                 <?php $query = "SELECT * FROM `".$tab."_prodotti_classi` GROUP BY `nome_c1_classi` ORDER BY `id_classi` ASC ";   
				   
				   $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ ?>

                   <option value="<?php echo $row["nome_c1_classi"];  ?>"><?php echo $row["nome_c1_classi"];  ?></option>
                    
                 <?php } ?>    
                 </select>
                <hr/>
                
                
                <h4>Slide Associata:</h4>
                 
                 <select id="source" class="selelectCover" name="id_g">
                 <?php  $query3 = "SELECT * FROM `".$tab."_gallery` WHERE `slide_g` = 3  ORDER BY `id_g` ASC "; 
  
                     $result3 = $mysqli->query($query3); while ( $row3 = $result3->fetch_array()){ ?>
                     
                     

                   <option value="<?php echo $row3["id_g"];  ?>"><?php echo $row3["img_g"]; ?></option>
                    
                 <?php } ?>    
                 </select>
                 <hr/>
                
                
               <h4>Seleziona Immagine di copertina:</h4>
                <input id="img1" type="file" name="img"/>
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                <h5>  Larghezza: <span class="semi-bold">300px</span> | Altezza: <span class="semi-bold">216px</span> | Risoluzione: <span class="semi-bold">72dpi</span>  </h5> 
                
                
                <hr/>
                
                <h4>Testo</h4>
                <textarea class="tiny" name="testo"></textarea>
                
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Nclasse" type="submit">Inserisci</button>
                
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
 
 <?php 
 
    $query = "SELECT * FROM `".$tab."_prodotti_classi`";  
 
    $result = $mysqli->query($query); while ( $row = $result->fetch_array()){
     
	$classe1 = $row["nome_c1_classi"];
	
	$id_g = $row["id_g"];
	
	
	
	
	 if(empty($row["nome_c2_classi"])){ ?>
     
     
     <!-- BEGIN --> 
		<div class="col-md-4  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione Categorie: <span class="semi-bold">Primo Livello</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id_classi" value="<?php echo $row["id_classi"]; ?>" />
                
                 <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                
                <input type="text" name="classe1" class="custom-input" value="<?php echo $row["nome_c1_classi"]; ?>" />
                
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Mclasse" type="submit">Modifica</button>
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Dclasse" type="submit">Elimina</button>
                
                
               <?php 
			   if(isset($_GET["id"])){
			     if($row["id_classi"] == $_GET["id"] ){
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
		
		
     <?php 	 
     
	  }else{ ?>
		  
         <!-- BEGIN --> 
		<div class="col-md-5  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione Categorie: <span class="semi-bold">Secondo Livello</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id_classi" value="<?php echo $row["id_classi"]; ?>" />
                
                <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                
                
                <input type="text" name="classe2" class="custom-input" value="<?php echo $row["nome_c2_classi"]; ?>" />
                
                <hr/>
                
                <h4>Categoria Associata:</h4>
                 
                 <select id="source" class="selelectCover" name="classe1">
                 <?php $query2 = "SELECT * FROM `".$tab."_prodotti_classi` GROUP BY `nome_c1_classi` ORDER BY `id_classi` ASC ";   
				   
				   $result2 = $mysqli->query($query2); while ( $row2 = $result2->fetch_array()){ ?>

                   <option <?php if( $classe1 ==  $row2["nome_c1_classi"] ){ echo "selected";  } ?> value="<?php echo $row2["nome_c1_classi"]; ?>"><?php echo $row2["nome_c1_classi"];  ?></option>
                    
                 <?php } ?>    
                 </select>
                <hr/>
                
                <h4>Seleziona Immagine</h4>
                <img src="../img/<?php echo $row["img_classi"]; ?>" width="200" />
                
               <div class="allineamentoBox"> 
               <h4>Seleziona Immagine di copertina:</h4>
                <input id="img1" type="file" name="img"/>
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                <h5>  Larghezza: <span class="semi-bold">300px</span> | Altezza: <span class="semi-bold">216px</span> | Risoluzione: <span class="semi-bold">72dpi</span>  </h5> 
                </div>
                
                <div class="clear"></div>
               
                
                <hr/>
                
                
                <h4>Slide Associata:</h4>
                 
                 <select id="source" class="selelectCover" name="id_g">
                 <?php  $query3 = "SELECT * FROM `".$tab."_gallery` WHERE `slide_g` = 3  ORDER BY `id_g` ASC "; 
  
                        $result3 = $mysqli->query($query3); while ( $row3 = $result3->fetch_array()){ ?>
                     
                    
                   <option <?php if($id_g == $row3["id_g"]){ echo "selected"; } ?> value="<?php echo $row3["id_g"];  ?>"><?php echo $row3["img_g"]; ?></option>
                    
                 <?php } ?>    
                 </select>
                 <hr/>
                
                <div class="clear"></div>
                
                
                <h4>Testo</h4>
                <textarea class="tiny" name="testo"><?php echo $row["testo_classi"]; ?></textarea>
                
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Mclasse" type="submit">Modifica</button>
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="Dclasse" type="submit">Elimina</button>
                
               <?php 
			   if(isset($_GET["id"])){
			     if($row["id_classi"] == $_GET["id"] ){
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
      
          
          
		  
	  
	  
	  <?php 
	  }
		
		
	}
 
 
 
 
 ?>






</div> 