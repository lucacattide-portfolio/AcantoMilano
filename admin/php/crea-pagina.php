<?php
  $id = $_GET["id"];
  $sqlCreaPagina = "SELECT * FROM `pagina` WHERE pagina_id = '".$id."' "; 
  $rCreaPagina = $mysqli->query($sqlCreaPagina);
  $countCreaPagina =  $rCreaPagina->num_rows;
   if( $countCreaPagina >= 1  ):
     
     while ( $rowCreaPagina = $rCreaPagina->fetch_array() ):  ?>

<?php if($id != 3 && $id != 5 && $id != 10 && $id != 17 && $id != 18 && $id != 25 && $id != 26 && $id != 27 && $id != 28): ?>
<div class="btnAdd-page btn-primary"> <a class="aggiungi" title="Aggiungi Pagina"  href="#"><i class="zmdi zmdi-plus zmdi-hc-fw"></i></a> </div>
<?php endif; ?>

 <div class="row">
  <div class="col-md-12">
    <?php 
	  /*  IF DELLE PAGINE   */
	  if( $id == 1 ):
	  
	    $sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id DESC ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* PAGINA HOME */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix" style="padding-bottom:5px;">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_titolo" value="">
              <input type="hidden" name="articolo_data_modifica" value="<?php echo date('Y-m-d H:i:s'); ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                  
                  <div class="col-md-12 unit">
                    <label class="label">Clame logo</label>
                    <div class="input">
                      
                      <textarea name="articolo_sottotitolo"  spellcheck="false" placeholder="Inserire il sottotitolo" class="form-control"><?php echo $rowArticolo["articolo_sottotitolo"]; ?></textarea>
                    </div>
                  </div>
                  
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6 StatoPub">
                    <label class="label">Stato di pubblicazione</label>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                        <i></i>Pubblica</label>
                    </div>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                        <i></i>Bozza</label>
                    </div>
                  </div>
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo slide</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima  <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      
                      <span class="col-md-4"> </span> </div>
                  </div>
                  <!-- container img -->
                  
                </div>
                <!-- end email url -->
                
                <!-- chiusura riga -->
                <div class="row col-md-12">
                    
                    <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr style="margin-top:0px; margin-bottom:5px;">
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                  <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-3 col-md-3 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                      <div draggable="true" class="col-sm-3 col-md-3 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                <!-- end chiusura riga -->
                </div>
                 
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php
	
			endwhile;
		
		endif;
		elseif( $id == 2 ):
	
	?>
    <?php
    
    	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id = 161  ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* CHI SIAMO */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_visibile" value="1">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		
		endif;
	
	?>
    
    <?php 
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id != 161   ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <label class="label">Stato di pubblicazione</label>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                        <i></i>Pubblica</label>
                    </div>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                        <i></i>Bozza</label>
                    </div>
                    
                  </div>
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima  <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                
                </div>
                
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
			
			
			
			
			
		<?php	
			
			endwhile;
	     endif;
	
	    ?>
        
        
        <?php
		  elseif( $id == 3 ):
		  
		  $sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* VISITE GUIDATE */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_visibile" value="1">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <label for="text" class="icon-left"> <i class="fa fa-edit"></i> </label>
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
        
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                
                
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
             
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		endif;
		elseif( $id == 4):
	
	?>
    <?php
    
    	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* PAGINA CALENDARIO */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_visibile" value="1">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
               
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
       
                
                	<div class="Gal col-md-12 unit">
                    <label class="label">Inserisci documenti*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".pdf"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .pdf </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  <!-- container img -->
                  
                
                
                  
                </div>
                <!-- end email url -->
                
                <!-- img loop -->
                <div class="row col-md-12">
                    <div class="col-md-12 thumbnail-img-sortable">
                        <div class='col-sm-12 col-md-12 nopadding'> 
                          <hr>
                          <span class="col-md-6"> Documenti allegati </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                     <?php 
                                   //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                                   $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                                   $rImmagine = $mysqli->query($sqlImmagine);
                                   $countImmagine =  $rImmagine->num_rows;
                                   if( $countImmagine >= 1 ):
                                    while ( $rowImmagine = $rImmagine->fetch_array() ):
                                        if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                        <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                          <div class="col-sm-6 col-md-6 nopadding">
                            <iframe class='thumb-image col-md-6' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                          </div>
                          <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <div class="col-sm-8 col-md-8" >
                            <label class="checkbox">
                              <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                              <i></i> ELIMINA PDF </label>
                          </div>
                        </div>
                        <?php else: ?>
                        <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                          <div class="col-sm- col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                          <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <div class="col-sm-8 col-md-8" >
                            <label class="checkbox">
                              <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                              <i></i> ELIMINA IMMAGINE </label>
                          </div>
                        </div>
                        <?php  
                                        endif;
                                    endwhile;  
                                    endif;    
                                   ?>
                        <!-- END container img --> 
                      </div>
                <!-- end img loop -->
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		
		endif;
	
	?>
    
    <?php 
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_data_modifica DESC LIMIT 1,$countArticolo";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p style="color:rgba(129,129,129,1.00);">Data Evento: <strong style="color:#1D71B8;"><?php echo date("d-m-Y | H:i:s", strtotime($rowArticolo["articolo_data_modifica"])); ?></strong></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      <label class="label">Data Articolo</label>
                      <div class="input-group date addon-datepickers">
                          <input name="articolo_data_modifica" type="text" value="<?php echo $rowArticolo["articolo_data_modifica"]; ?>" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    <?php if( $id != 2 && $id != 1 && $id != 3 && $id != 5 && $id != 17 && $id != 31 && $id != 29 && $id != 25 && $id != 26 ): ?>
                     <div class="col-md-4">
                      <label class="label">Disponibilità posti</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"] == 1 ): echo "checked"; endif; ?> name="articolo_img_id" value="1">
                          <i></i>Disponibile</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"]  == 2 ): echo "checked"; endif; ?> name="articolo_img_id" value="2">
                          <i></i>Non Disponibile</label>
                      </div>
                    </div>
                    <?php endif; ?>
                  
                   
                    <div class="col-md-4">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                
                    <!-- container img -->
                      <div class="col-md-12 thumbnail-img-sortable">
                        <div class='col-sm-12 col-md-12 nopadding'> 
                          <hr>
                          <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                     <?php 
                                   //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                                   $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                                   $rImmagine = $mysqli->query($sqlImmagine);
                                   $countImmagine =  $rImmagine->num_rows;
                                   if( $countImmagine >= 1 ):
                                    while ( $rowImmagine = $rImmagine->fetch_array() ):
                                        if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                        <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                          <div class="col-sm-6 col-md-6 nopadding">
                            <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                          </div>
                          <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <div class="col-sm-8 col-md-8" >
                            <label class="checkbox">
                              <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                              <i></i> ELIMINA PDF </label>
                          </div>
                        </div>
                        <?php else: ?>
                        <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                          <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                          <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <div class="col-sm-8 col-md-8" >
                            <label class="checkbox">
                              <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                              <i></i> ELIMINA IMMAGINE </label>
                          </div>
                        </div>
                        <?php  
                                        endif;
                                    endwhile;  
                                    endif;    
                                   ?>
                        <!-- END container img --> 
                      </div>
                
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
			
			
        <?php
		
				endwhile;
				
			endif;
		
		  elseif( $id == 5 ):
		  
		  $sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* NEWS */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_visibile" value="1">

              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <label for="text" class="icon-left"> <i class="fa fa-edit"></i> </label>
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                 
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                
                
                <div class="row col-md-6">
                 <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
            
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
				
			
		<?php	
			
			endwhile;
	     endif;
			elseif( $id == 6):
	
	?>
    <?php
    
   		// NOVITA? DI ACANTO
   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_data_modifica DESC ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      <label class="label">Data Articolo</label>
                      <div class="input-group date addon-datepickers">
                          <input name="articolo_data_modifica" type="text" value="<?php echo $rowArticolo["articolo_data_modifica"]; ?>" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    <?php if( $id != 2 && $id != 1 && $id != 3 && $id != 5 && $id != 17 && $id != 31 && $id != 29 && $id != 25 && $id != 26 ): ?>
                     <div class="col-md-6">
                      <label class="label">Disponibilità posti</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"] == 1 ): echo "checked"; endif; ?> name="articolo_img_id" value="1">
                          <i></i>Disponibile</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"]  == 2 ): echo "checked"; endif; ?> name="articolo_img_id" value="2">
                          <i></i>Non Disponibile</label>
                      </div>
                    </div>
                    <?php endif; ?>
                  
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                 
                </div>
                <!-- end email url -->
                
                
                <div class="row col-md-12">
                  
                  <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                      <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                </div>
                
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
			
			
<?php
		endwhile;
		
		endif;
		
     			elseif( $id == 7):
	
	?>
    <?php
    
   		// PROSSIME ESCURSIONI
   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_data_modifica DESC ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      <label class="label">Data Articolo</label>
                      <div class="input-group date addon-datepickers">
                          <input name="articolo_data_modifica" type="text" value="<?php echo $rowArticolo["articolo_data_modifica"]; ?>" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    <?php if( $id != 2 && $id != 1 && $id != 3 && $id != 5 && $id != 17 && $id != 31 && $id != 29 && $id != 25 && $id != 26 ): ?>
                     <div class="col-md-6">
                      <label class="label">Disponibilità posti</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"] == 1 ): echo "checked"; endif; ?> name="articolo_img_id" value="1">
                          <i></i>Disponibile</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"]  == 2 ): echo "checked"; endif; ?> name="articolo_img_id" value="2">
                          <i></i>Non Disponibile</label>
                      </div>
                    </div>
                    <?php endif; ?>
                  
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                </div>
                <!-- end email url -->
                
                <div class="row clo-md-12">
                 
                	<!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                      <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                
                </div>
                
                
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
			
			
<?php
		endwhile;
		
		endif;
		
   
        elseif( $id == 8):
	
	?>
    <?php
    
   		// MOSTRE
   
	    $sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id = 156 ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* PAGINA CALENDARIO */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <label for="text" class="icon-left"> <i class="fa fa-edit"></i> </label>
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                 
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                
                
                <div class="row col-md-6">
                 <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <label class="label">Stato di pubblicazione</label>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                        <i></i>Pubblica</label>
                    </div>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                        <i></i>Bozza</label>
                    </div>
                    
                  </div>
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		
		endif;
	
	?>
    
    <?php 
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id != 156 ORDER BY articolo_data_modifica DESC";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo:  <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      <label class="label">Data Articolo</label>
                      <div class="input-group date addon-datepickers">
                          <input name="articolo_data_modifica" type="text" value="<?php echo $rowArticolo["articolo_data_modifica"]; ?>" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    
                   
                    <div class="col-md-12">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                	<!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                      <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
		
<?php
		endwhile;
		
		endif;
		  			elseif( $id == 9):
	
	?>
    <?php
    
   		// I VIAGGI DI ACANTO
   
        $sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id = 33 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* PAGINA CALENDARIO */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left" rel="<?php echo $rowArticolo["articolo_id"]; ?>">
          <h3>Titolo:  <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
         
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_visibile" value="1">

              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <label for="text" class="icon-left"> <i class="fa fa-edit"></i> </label>
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                    
                    
                    
                    <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
       
                 
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                
                
                <div class="row col-md-6">
                 
                    <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- end email url -->
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		
		endif;
	
	?>
    
    <?php 
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."'AND articolo_id != 33 ORDER BY articolo_data_modifica DESC  ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      <label class="label">Data Articolo</label>
                      <div class="input-group date addon-datepickers">
                          <input name="articolo_data_modifica" type="text" value="<?php echo $rowArticolo["articolo_data_modifica"]; ?>" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                     <?php if( $id != 2 && $id != 1 && $id != 3 && $id != 5 && $id != 17 && $id != 31 && $id != 29 && $id != 25 && $id != 26 ): ?>
                     <div class="col-md-6">
                      <label class="label">Disponibilità posti</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"] == 1 ): echo "checked"; endif; ?> name="articolo_img_id" value="1">
                          <i></i>Disponibile</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"]  == 2 ): echo "checked"; endif; ?> name="articolo_img_id" value="2">
                          <i></i>Non Disponibile</label>
                      </div>
                    </div>
                    <?php endif; ?>
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini o documenti*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png, .pdf"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png, .pdf </small> </h5>
                      
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                  <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini e/o documenti allegat </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
		
<?php
		endwhile;
		
		endif;
		
		elseif( $id == 10 ):
	
	?>
    <?php
    
    	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id = 37 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* IDEE PER UNA VISITA */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_visibile" value="1">

              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                    
                    <div class="col-md-12 unit">
                      <label class="label">Info</label>
                      <div class="input">
                        <textarea name="articolo_sottotitolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_sottotitolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
              
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		endif;
   
         			elseif( $id == 11 ):
	
	?>
    <?php
    
   		// MILANO STORIA
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                  <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
		
<?php

		endwhile;
	
	endif;    
    
         			elseif( $id == 12):
	
	?>
    <?php
    
   		// ARCHITETTURA MODERNITA'
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
        
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-4"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                  <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
		
<?php

		endwhile;
	
	endif;    
    
         			elseif( $id == 13):
	
	?>
    <?php
    
   		// MILANO MUSEI
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
         
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                </div>
                <!-- end email url -->
                
                
                <div class="row col-md-12">
                  
                  <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                     <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
		
<?php

		endwhile;
	
	endif;    
    
         			elseif( $id == 14):
	
	?>
    <?php
    
   		// MILANO INSOLITA
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                </div>
                <!-- end email url -->
                
                <!-- container img -->
                <div class="row col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-12 col-md-12 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                
                
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
		
<?php

		endwhile;
	
	endif;    
    
         			elseif( $id == 29):
	
	?>
    <?php
    
   		// MILANO CLASSICA
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                       
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                  </div>
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                
                
                
                
                
                <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'>
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                
                
                
                
                
                
                
                </div>
                
                
                
                <div style="top:-430px;" class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
		
<?php

		endwhile;
	
	endif;    
    
		elseif( $id == 16):
	
	?>
    <?php
    
		// SPECIALE CENACOLO
		   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id = 56 ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo:  <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_visibile" value="1">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
               
                  
                
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima  <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      
                      <span class="col-md-4"> </span> </div>
                  </div>
                 
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                
                
                	 <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'>
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                
                
                </div>
                
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                  
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		
		endif;
	
	?>
    
    <?php 
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id != 56 ORDER BY articolo_data_modifica DESC ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      <label class="label">Data Articolo</label>
                      <div class="input-group date addon-datepickers">
                          <input name="articolo_data_modifica" type="text" value="<?php echo $rowArticolo["articolo_data_modifica"]; ?>" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                   
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                 <?php if( $id != 2 && $id != 1 && $id != 3 && $id != 5 && $id != 17 && $id != 31 && $id != 29 && $id != 25 && $id != 26 ): ?>
                     <div class="col-md-6">
                      <label class="label">Disponibilità posti</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"] == 1 ): echo "checked"; endif; ?> name="articolo_img_id" value="1">
                          <i></i>Disponibile</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"]  == 2 ): echo "checked"; endif; ?> name="articolo_img_id" value="2">
                          <i></i>Non Disponibile</label>
                      </div>
                    </div>
                    <?php endif; ?>
                  
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
              
                </div>
                <!-- end email url -->
                
               <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
			
			
        <?php
		
				endwhile;
				
			endif;
		  elseif( $id == 17 ):
		  
		     	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* IDEE PER UNA VISITA */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_visibile" value="1">

              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                    
                    <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
         
                    
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>

				
			
		<?php	
			
			endwhile;
	     endif;
         			elseif( $id == 19):
	
	?>
    <?php
    
   		// LEONARDO MILANO
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  <div class="col-md-6 unit">
                      
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-4">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                    </div>
                     <?php endif; ?>
                    
                   
                    <div class="col-md-6">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .png"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png </small> </h5>
                      
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                
                  <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                </div>
                
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
		
<?php

		endwhile;
	
	endif;    
		elseif( $id == 20):
	
	?>
    <?php
    
    	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* MILANO PRIMA VOLTA */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <label class="label">Stato di pubblicazione</label>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                        <i></i>Pubblica</label>
                    </div>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                        <i></i>Bozza</label>
                    </div>
                    
                  </div>
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
       
       
       				<div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                	<div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini o documenti*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .pdf, .pdf"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png, .pdf </small> </h5>
                      
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                
                  
                </div>
                <!-- end email url -->
                
                
                <div class="row col-md-12">
                
                
                
                
                <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini e/o documenti allegati </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                
                
                
                
                
                
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		
		endif;
	
		elseif( $id == 21):
	
	?>
    <?php
    
    	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* SCUOLE PRIMARIE */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <label class="label">Stato di pubblicazione</label>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                        <i></i>Pubblica</label>
                    </div>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                        <i></i>Bozza</label>
                    </div>
                    
                  </div>
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
       
       
       				<div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                	<div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini o documenti*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .pdf, .pdf"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png, .pdf </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                
                
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                  <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini e/o documenti allegati </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-12 col-md-12" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-12 col-md-12" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                 
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		
		endif;
	
		elseif( $id == 22):
	
	?>
    <?php
    
    	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* SCUOLE PRIMARIE GRADO 1 */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <label class="label">Stato di pubblicazione</label>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                        <i></i>Pubblica</label>
                    </div>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                        <i></i>Bozza</label>
                    </div>
                    
                  </div>
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
       
       
       				<div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                	<div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini o documenti*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .pdf, .pdf"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png, .pdf </small> </h5>
                      
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                
                
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                
                
                
                  <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini e/o documenti allegati </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-12 col-md-12" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-12 col-md-12 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-12 col-md-12" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		
		endif;
	
		elseif( $id == 23):
	
	?>
    <?php
    
    	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id ASC LIMIT 0,1 ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* SCUOLE PRIMARIE GRADO 2 */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <label class="label">Stato di pubblicazione</label>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                        <i></i>Pubblica</label>
                    </div>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                        <i></i>Bozza</label>
                    </div>
                    
                  </div>
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
       
       
       				<div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                	<div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini o documenti*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .pdf, .pdf"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-12"> Anteprima <small> * Estensioni ammesse: .jpg, .png, .pdf </small> </h5>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-12">
                
                
                   <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini e/o documenti allegati </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-8 col-md-8" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                 
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
               
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		
		endif;
	
		elseif( $id == 24 ):
	
	?>
    <?php
    
    	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id = 44";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* PER LE AZIENDE */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <input type="hidden" name="articolo_visibile" value="1">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                    
                    <div class="col-md-12 unit">
                      <label class="label">Info</label>
                      <div class="input">
                        <textarea name="articolo_sottotitolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_sottotitolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Testo</label>
                    <div class="input">
                      
                      <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                    </div>
                  </div>
                
                <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    <?php 
	  
	  		endwhile;
		endif;
		
	?>
		
		    <?php 
	   
	    $sqlArticolo2 = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' AND articolo_id != 44 ORDER BY articolo_data_modifica DESC";
   		$rArticolo2 = $mysqli->query($sqlArticolo2);
   		$countArticolo2 =  $rArticolo2->num_rows;
	  
	  	if($countArticolo2 >= 1):
		
			while ( $rowArticolo = $rArticolo2->fetch_array()):  ?>
			
			<div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   
                  
                  <div class="col-md12 unit">
                    <label class="label">URL ESTERNO</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="http://www.example.com" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-12">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-12">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                   
                  
                  </div>
                  <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
       
                   
                   
                    
                    <div class="Gal col-md-12 unit">
                    <label class="label">Inserisci immagini*</label>
                    <div class="input prepend-small-btn">
                      <div class="file-button"> Sfoglia
                        <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple accept=".jpg, .pdf"/>
                      </div>
                      <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                    </div>
                  </div>
                  <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                    <div class="row col-md-12"> <span class="col-md-4"> </span>
                      <h5 class="anteprima col-md-4"> Anteprima </h5>
                      <small> * Estensioni ammesse: .jpg, .png </small>
                      <span class="col-md-4"> </span> </div>
                  </div>
                  
                
              
                </div>
                <!-- end email url -->
                
                
                <div class="row col-md-12">
                
                
                  <!-- container img -->
                  <div class="col-md-12 thumbnail-img-sortable">
                    <div class='col-sm-12 col-md-12 nopadding'> 
                      <hr>
                      <span class="col-md-6"> Immagini allegate </span> <span class="col-md-4"></span> <span class="col-md-4"></span> </div>
                 <?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding">
                        <iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>
                      </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-6 col-md-6" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA PDF </label>
                      </div>
                    </div>
                    <?php else: ?>
                    <div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
                      <div class="col-sm-6 col-md-6 nopadding"> <img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" /> </div>
                      <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                      <div class="col-sm-6 col-md-6" >
                        <label class="checkbox">
                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                          <i></i> ELIMINA IMMAGINE </label>
                      </div>
                    </div>
                    <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                    <!-- END container img --> 
                  </div>
                
                
                </div>
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                   <div class="boxCheck">
                      <div class="btn-ex-container">
                        <label class="checkbox">
                          <input type="checkbox" name="eliminaArticolo">
                          <i></i> ELIMINA ARTICOLO </label>
                      </div>
                    </div> 
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
			
			
        <?php
		
				endwhile;
				
			endif;
		elseif( $id == 25 ):
	
	?>
    <?php
    
    	$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ORDER BY articolo_id ASC  ";
   		$rArticolo = $mysqli->query($sqlArticolo);
   		$countArticolo1 =  $rArticolo->num_rows;
	  
	  	if($countArticolo1 >= 1):
		
			while ( $rowArticolo = $rArticolo->fetch_array()): 
	  /* CONTATTI */
	  
	?>
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3>Titolo: <?php $titolo = str_replace("<p>", "", $rowArticolo['articolo_titolo']); $titolo = str_replace("</p>", "", $titolo); echo $titolo; ?></h3>
          <p>URL Pagina interna: <?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="modificaArticolo" >
              <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
              <div class="form-content"> 
                
                <!-- start text password -->
                <div class="row col-md-6">
                   <div class="col-md-12 unit">
                      <label class="label">Recapito</label>
                      <div class="input">
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                  
                  <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                  <div class="col-md-6 unit">
                    <label class="label">URL SEF</label>
                    <div class="input">
                      <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                      <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <label class="label">Stato di pubblicazione</label>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                        <i></i>Pubblica</label>
                    </div>
                    <div class="col-md-12">
                      <label class="radio">
                        <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                        <i></i>Bozza</label>
                    </div>
                    
                  </div>
                </div>
                <!-- end text password --> 
                
                <!-- start email url -->
                <div class="row col-md-6">
                
                  <div class="col-md-12 unit">
                    <label class="label">Contenuto</label>
                    <div class="input">
                      
                      <textarea name="articolo_sottotitolo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_sottotitolo"]; ?></textarea>
                    </div>
                  </div>
                
                
                  
                </div>
                <!-- end email url -->
                
                <div class="row col-md-6 topLeftSave">
                 
                  <div style="clear:both;"></div>
                  <div class="col-md-12 col-sm-12 ">
                    <div style="float:right;" class="col-md-2 col-sm-2">
                      <div class="btn-ex-container">
                        <button class="btn btn-primary"  type="submit">Salva</button>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- end /.content --> 
              
              <!-- end /.footer -->
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <hr>
    
    <?php
	
			endwhile;
			
		endif;
	
	?>
    
    <?php 
     /*
     if($countArticolo >= 1):
		
		while ( $rowArticolo = $rArticolo->fetch_array()): 
  ?>		
   
    <div draggable="false" class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
          <h3><?php echo $rowArticolo["articolo_titolo"]; ?></h3>
          <p><?php echo $rowArticolo["articolo_url"]; ?></p>
        </div>
        <div class="pull-right w-action">
          <ul class="widget-action-bar">
            <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="zmdi zmdi-more"></i></a>
              <ul class="dropdown-menu">
                <li class="widget-reload"><a href="#"><i class="zmdi zmdi-refresh"></i></a></li>
                <li class="widget-toggle"><a href="#"><i class="zmdi zmdi-chevron-down"></i></a></li>
                <li class="widget-fullscreen"><a href="#"><i class="zmdi zmdi-fullscreen"></i></a></li>
                <li class="widget-exit"><a href="#"><i class="zmdi zmdi-power"></i></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <div class="row">
            <div class="col-md-12">
              <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>
                <input type="hidden" name="modificaArticolo" >
                <input type="hidden" name="articolo_id" value="<?php echo $rowArticolo["articolo_id"];  ?>">
                <div class="form-content"> 
                  
                  <!-- start text password -->
                  <div class="row col-md-6">
                    <div class="col-md-12 unit">
                      <label class="label">Titolo</label>
                      <div class="input">
                        <label for="text" class="icon-left"> <i class="fa fa-edit"></i> </label>
                        <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"> <?php echo $rowArticolo["articolo_titolo"]; ?> </textarea>
                      </div>
                    </div>
                    <div class="col-md-12 unit">
                      <label class="label">Sottotitolo</label>
                      <div class="input">
                        
                        <textarea name="articolo_sottotitolo"  spellcheck="false" placeholder="Inserire il sottotitolo" class="form-control"><?php echo $rowArticolo["articolo_sottotitolo"]; ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 unit">
                      <label class="label">Testo</label>
                      <div class="input">
                        
                        <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                      </div>
                    </div>
                  
                     <!--<div class="col-md-12 unit">
                      <label class="label">CATEGORIA</label>
                      <label class="input select">
                            <select name="articolo_categoria_id" class="form-control">
                                <?php 
                                  $sqlCat = "SELECT * FROM `categoria`"; 
                                  $rCat = $mysqli->query($sqlCat);
                                  $countCat =  $rCat->num_rows;
                                  if($countCat >= 1):      
                                    while ( $rowCat = $rCat->fetch_array() ):     
                                ?>
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?>			</option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div> -->
                  
                    <div class="col-md-12 unit">
                      <label class="label">URL SEF</label>
                      <div class="input">
                        <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                        <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" value="<?php echo $rowArticolo["articolo_url"]; ?>" pattern="/[^a-z0-9\s]/ig">
                      </div>
                    </div>
                    <div class="col-md-12 unit">
                      <label class="label">Data Articolo</label>
                      <div class="input-group date addon-datepickers">
                          <input name="articolo_data_modifica" type="text" value="<?php echo $rowArticolo["articolo_data_modifica"]; ?>" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                    <?php if( $id == 4): ?>
                     <div class="col-md-12">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="checkbox" <?php if( $rowArticolo["articolo_gallery_id"] == 1 ): echo "checked"; endif; ?> name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                      <div class="col-md-12">
                       <hr>
                      </div>
                    </div>
                     <?php endif; ?>
                    <?php if( $id != 2 && $id != 1 && $id != 3 && $id != 5 && $id != 17 && $id != 31 && $id != 29 && $id != 25 && $id != 26 ): ?>
                     <div class="col-md-12">
                      <label class="label">Disponibilità posti</label>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"] == 1 ): echo "checked"; endif; ?> name="articolo_img_id" value="1">
                          <i></i>Disponibile</label>
                      </div>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_img_id"]  == 2 ): echo "checked"; endif; ?> name="articolo_img_id" value="2">
                          <i></i>Non Disponibile</label>
                      </div>
                      <div class="col-md-12">
                       <hr>
                      </div>
                    </div>
                    <?php endif; ?>
                  
                   
                    <div class="col-md-12">
                      <label class="label">Stato di pubblicazione</label>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 1 ): echo "checked"; endif; ?> name="articolo_visibile" value="1">
                          <i></i>Pubblica</label>
                      </div>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 2 ): echo "checked"; endif; ?> name="articolo_visibile" value="2">
                          <i></i>Bozza</label>
                      </div>
                       
                    </div>
                  
                  </div>
                  <!-- end text password --> 
                  
                  <!-- start email url -->
                  <div class="row col-md-6">
                    <div class="Gal col-md-12 unit">
                        <label class="label">Inserisci immagini o documenti*</label>
                        <div class="input prepend-small-btn">
                            <div class="file-button">
                                Sfoglia
                                <input type="file" class="fileUpload2" rel="<?php echo $rowArticolo["articolo_id"]; ?>" name="file[]" multiple/>
                            </div>
                            <input type="text" placeholder="Misura immagine 1920px X 1080px " readonly id="prepend-small-btn" class="form-control">
                         </div>
                     </div>
                     <div  class="blah col-md-12 image-holder2 unit" rel="<?php echo $rowArticolo["articolo_id"]; ?>" >
                     	<div class="row col-md-12">
                        
                        	<span class="col-md-4">
                            </span>
                        	<h3 class="anteprima col-md-4">
                            
                            	Anteprima
                                
                            </h3>
                            <span class="col-md-4">
                            </span>
                        
                        </div>
                     </div>
                     <!-- container img -->
                     <div class="col-md-12 thumbnail-img-sortable">
                       
                            <div class='col-sm-12 col-md-12 nopadding'>
                             <small>
                             
                             	* Estensioni ammesse: .jpg, .png, .pdf
                             
                             </small>
                             <hr>
                              <span class="col-md-6">
                              
                                  Immagini allegate
                                  
                              </span>
                              
                              <span class="col-md-4"></span>
                             
                              <span class="col-md-4"></span>
                              
                            </div>
							<?php 
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticolo["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
                                  <div draggable="true" class="col-sm-6 col-md-6 nopadding boxImgMod">
                                   <div class="col-sm-12 col-md-12 nopadding">
                                   	<iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" ></iframe>                                   </div>  
                                   <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                                   <div class="col-sm-12 col-md-12" >
                                       <label class="checkbox">
                                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                                          <i></i>
                                          ELIMINA PDF
                                       </label>
                                   </div> 
                                 </div> 
							   <?php else: ?>
                                 <div draggable="true" class="col-sm-6 col-md-6 nopadding boxImgMod">
                                   <div class="col-sm-12 col-md-12 nopadding">
                                   	<img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>" />
                                   </div>  
                                   <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                                   
                                   <div class="col-sm-12 col-md-12" >
                                       <label class="checkbox">
                                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                                          <i></i>
                                          ELIMINA IMMAGINE
                                       </label>
                                   </div> 
                               
                                 </div>  
                               <?php  
							    	endif;
                                endwhile;  
                                endif;    
                               ?>
                      <!-- END container img -->   
                      </div>
                  </div>
                  <!-- end email url -->
                  
                  <div class="row col-md-12">
                    <div style="clear:both;"></div>
                    <hr>
                    <div style="clear:both;"></div>
                    <div class="col-md-12 col-sm-12">
                      <div class="col-md-3 col-sm-3">
                          <div class="btn-ex-container">
                            <button class="btn btn-primary"  type="submit">Modifica Articolo</button>
                          </div>
                      </div>
                     
                      <div class="col-md-3 col-sm-3">
                           <div class="btn-ex-container">
                            <label class="checkbox">
                                          <input type="checkbox" name="eliminaArticolo">
                                          <i></i>
                                          ELIMINA ARTICOLO
                                       </label>
                          </div>
                      </div>
                  
                    </div>
                  </div>
                  
                </div>
                <!-- end /.content -->

                 
                
                <!-- end /.footer -->
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    
     <?php 
	 
   endwhile; 
   endif;  */
 ?>
  
    
    <?php 
   /*  END IF DELLE PAGINE   */
   endif; 
 ?>
  </div>
</div>
<?php 
   endwhile;
   endif;	 
?>
