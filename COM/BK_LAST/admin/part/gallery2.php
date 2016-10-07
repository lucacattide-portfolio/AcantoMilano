<div class="row">


<!-- BEGIN --> 
		<div class="col-md-11  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione Home: <span class="semi-bold">Galleria 2</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                <input type="hidden" name="slid" value="2" />
                
                <h4>Seleziona Immagine</h4>
                <input id="img1" type="file" name="img"/>
                <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                <h5>  Larghezza: <span class="semi-bold">400px</span> | Altezza: <span class="semi-bold">400px</span> | Risoluzione: <span class="semi-bold">72dpi</span>  </h5> 
                
                <hr/>
                
                <h4>Voce Menu</h4>
               <textarea name="voce" ></textarea>
                
                <h4>Titolo</h4>
                <textarea class="tiny" name="title"></textarea>
                
                <h4>Testo</h4>
                <textarea class="tiny" name="txt"></textarea>
                
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="g1Ins" type="submit">Inserisci</button>
                
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
    
<!-- Lista contenuti   ------------------------------------------------------------------------------------------------------------------------------------------------------------------->    


<hr />

<div class="clear"></div>


<?php 

  $query = "SELECT * FROM `".$tab."_gallery` WHERE `slide_g` = 2  ORDER BY `id_g` ASC "; 
  
  $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ ?>


<!-- BEGIN --> 
		<div class="col-md-5 allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Modifica: <span class="semi-bold">Galleria <?php echo $row["id_g"];  ?></span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="lang" value="<?php echo $lang1; ?>" />
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                <input type="hidden" name="id" value="<?php echo $row["id_g"]; ?>" />
                <input type="hidden" name="slid" value="2" />
                
                <h4>Seleziona Immagine</h4>
                <img src="../img/<?php echo $row["img_g"]; ?>" width="200" />
               
                <div class="allineamentoBox">
                    <input id="img1" type="file" name="img"/>
                    <label for="img1" class="iconFile"><i class="fa fa-camera-retro"></i> Clicca e aggiungi l'immagine</label>
                    <h5>  Larghezza: <span class="semi-bold">400px</span> | Altezza: <span class="semi-bold">400px</span> | Risoluzione: <span class="semi-bold">72dpi</span>  </h5> 
                </div>
                
                <hr/>
                <div class="clear"></div>
                
                <h4>Voce Menu</h4>
                <textarea name="voce"  ><?php echo $row["voce_g"]; ?></textarea>
                
                <h4>Titolo</h4>
                <textarea class="tiny" name="title"><?php echo $row["titolo_g"]; ?></textarea>
                
                <h4>Testo</h4>
                <textarea class="tiny" name="txt"><?php echo $row["testo_g"]; ?></textarea>
                
                <div class="clear"></div>
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="g1Mod" type="submit">Modifica</button>
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="g1Del" type="submit">Elimina</button>
                
               <?php 
			   
			   if(isset($_GET["id"])){
			     if($row["id_g"] == $_GET["id"] ){
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

</div>