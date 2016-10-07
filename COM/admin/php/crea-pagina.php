<?php
  $id = $_GET["id"];
  $sqlCreaPagina = "SELECT * FROM `pagina` WHERE pagina_id = '".$id."' "; 
  $rCreaPagina = $mysqli->query($sqlCreaPagina);
  $countCreaPagina =  $rCreaPagina->num_rows;
   if( $countCreaPagina >= 1  ):
     
     while ( $rowCreaPagina = $rCreaPagina->fetch_array() ):  ?>

<div class="page-header filled full-block light">
  <div class="row">
    <div class="col-md-6">
      <h2><?php echo $rowCreaPagina["pagina_url"]; ?></h2>
      <p><?php echo $rowCreaPagina["pagina_riferimento"];  ?></p>
    </div>
    <div class="col-md-6">
      <ul class="list-page-breadcrumb">
        <li><a href="index.php" title="Home">Home<i class="zmdi"></i></a> | <a href="index.php?pag=crea-pagina&id=<?php echo $_GET["id"]; ?>"><i class="zmdi"></i><?php echo $rowCreaPagina["pagina_url"]; ?></a></li>
      </ul>
    </div>
  </div>
</div>
<div class="btnAdd-page btn-primary"> <a class="aggiungi" title="Aggiungi Pagina"  href="#"><i class="zmdi zmdi-plus zmdi-hc-fw"></i></a> </div>
<div class="row">
  <div class="col-md-12">
  
   <?php 
     if($countArticolo >= 1):
		$i = 1;
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
                        <label for="password" class="icon-left"> <i class="fa fa-edit"></i> </label>
                        <textarea name="articolo_sottotitolo"  spellcheck="false" placeholder="Inserire il sottotitolo" class="form-control"><?php echo $rowArticolo["articolo_sottotitolo"]; ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 unit">
                      <label class="label">Testo</label>
                      <div class="input">
                        <label for="password" class="icon-left"> <i class="fa fa-edit"></i> </label>
                        <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"><?php echo $rowArticolo["articolo_testo"]; ?></textarea>
                      </div>
                    </div>
                    <?php /* if($_GET["id"] == 3): ?>
                     <div class="col-md-12 unit">
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
                                <option <?php if($rowArticolo["articolo_categoria_id"] == $rowCat["categoria_id"] ): echo "selected"; endif; ?> value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?></option>
                                <?php
                                   endwhile;
                                  endif; 
                                ?>
                            </select>
                            <i></i>
                        </label>
                    </div>
                    <?php endif; */ ?>
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
                       <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" <?php if( $rowArticolo["articolo_visibile"] == 3 ): echo "checked"; endif; ?> name="articolo_visibile" value="3">
                          <i></i>Archivia</label>
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
                            <input type="text" placeholder="no file selected" readonly id="prepend-small-btn" class="form-control">
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
                      <?php if($i > 1): ?>
                      <div class="col-md-3 col-sm-3">
                           <div class="btn-ex-container">
                            <label class="checkbox">
                                          <input type="checkbox" name="eliminaArticolo">
                                          <i></i>
                                          ELIMINA ARTICOLO
                                       </label>
                          </div>
                      </div>
                      <?php endif; ?>
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
    
     <?php if($i == 1): ?> 
	
	   <hr>
       
	<?php endif; ?>
    
     <?php 
	 $i++;
   endwhile; 
   endif; 
 ?> 
  </div>
</div>
<?php 
   endwhile;
   endif;	 
?>
