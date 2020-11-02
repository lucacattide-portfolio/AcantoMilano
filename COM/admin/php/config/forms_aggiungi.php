<?php 

 include("../connessione_sql.php");
 
 /* CONDIZIONI RISPOSTE AJAX */
 $pag = $_POST["pag"];
 $id = $_POST["id"];
 
/* PAGE *****************************************************/
 
if($pag == "pagina" || $pag == ""  ):
    $sqlPagina = "SELECT * FROM `pagina`"; 
	$rPagina = $mysqli->query($sqlPagina);
	//while ( $rowPagina = $rPagina->fetch_array() ):
?>
    <div class="modal-content">
     <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="bootbox-close-button close" type="button">×</button>
      <h4 class="modal-title">Aggiungi Pagina</h4>
     </div>
     <div class="modal-body">
      <div class="bootbox-body">
       <div class="col-md-12">
        <form class="j-forms formElement"  method="post" enctype="multipart/form-data" novalidate>
          <input type="hidden" name="nuovaPagina" />
          <div class="form-content">
          
           
            <div class="row">
              <!-- URL PAGINA -->
              <div class="col-md-6 unit">
                <label class="label">URL SEF</label>
                <div class="input">
                  <label class="icon-left" for="text"> <i class="zmdi zmdi-globe"></i> </label>
                  <input required name="pagina_url" class="form-control" type="text" placeholder="nome-url-pagina" pattern="/[^a-z0-9\s]/ig">
                </div>
              </div>
              <!-- END URL PAGINA -->  
              
              <!-- URL PAGINA -->
            <?php if($_POST["accesso"] >= 2): else: ?>  <div class="col-md-6 unit">
                <label class="label">Nome file</label>
                <div class="input">
                  <label class="icon-left" for="text"> <i class="fa fa-terminal"></i> </label>
                  <input required name="pagina_riferimento" class="form-control" type="text" placeholder="pagina.php">
                </div>
              </div>
              <!-- END URL PAGINA -->  
            </div>  <?php endif; ?>
            
            <div class="row">
             <div class="col-md-6 unit">
               <div class="unit">
                <label class="label">Titolo</label>
                <div class="input">
                    <label for="text" class="icon-left">
                        <i class="fa fa-edit"></i>
                    </label>
                    <input name="pagina_meta_title" type="text" id="text" placeholder="Titolo pagina" class="form-control">
                </div>
               </div>
               <div class="unit">
                <label class="label">Parole chiave</label>
                    <input name="pagina_meta_tag" type="text" class="tags tags-input" data-type="tags" value="" placeholder="Aggiungi Tag"/>
               </div>
             </div>    
             <div class="col-md-6 unit">
              <label class="label">Descrizione</label>
                <div class="input">
                  <label for="textarea" class="icon-left">
                      <i class="fa fa-file-text-o"></i>
                  </label>
                 <textarea name="pagina_meta_description" id="textarea" spellcheck="false" placeholder="Descrizione pagina" class="form-control"></textarea>
                </div>
              </div>
             <?php if($_POST["accesso"] >= 2): else: ?>
              <div class="col-md-6 unit">                      
              <!-- start single select -->
              
                  <label class="input select">
                      <select name="pagina_dipendenza_id" class="form-control">
                          <option value="0">Pagina primaria</option>
                          <option value="accordion">Pagina primaria - Accordion</option>
                          <option value="post">Pagina primaria - Post sottopagine</option>
                          <option value="articolo">Pagina primaria - Articolo</option>
                          <option value="link">Pagina primaria - Link</option>
                          <?php 
						    $sqlPagina = "SELECT * FROM `pagina`"; 
  							$rPagina = $mysqli->query($sqlPagina);
							$countPagina =  $rPagina->num_rows;
							if($countPagina >= 1):      
    	                      while ( $rowPagina = $rPagina->fetch_array() ):   
							  
						  ?>
                          <option value="<?php echo $rowPagina["pagina_id"]; ?>"><?php echo $rowPagina["pagina_url"]; ?></option>
                          <?php
						    
						     endwhile;
							endif; 
						  ?>
                      </select>
                      <i></i>
                  </label>
            
              <!-- end single select -->
             </div> 
             <?php endif; ?> 
             
             <div class="row col-md-6">
              <div class="Gal col-md-12 unit">
                <label class="label">Inserisci immagini</label>
                <div class="input prepend-small-btn">
                    <div class="file-button">
                        Sfoglia
                        <input type="file" id="fileUpload" name="file[]" multiple/>
                    </div>
                    <input type="text" placeholder="Misure immagine 1920px X 1080px" readonly id="prepend-small-btn" class="form-control">
                 </div>
              </div>
              <div id="image-holder" class="blah col-md-12 unit">
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
              <div class='col-sm-12 col-md-12 unit'>
               <small>
               
                  * Tipologie ammesse: .jpg, .png,
               
               </small>
              </div>
            </div>
              
            </div>
            
            <div class="row">
                
            </div>
            
            <div class="row">  
              <div style="clear:both;"></div>
              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">Aggiungi Pagina</button>
                  <i class="zmdi"></i>
                  <button class="btn" type="reset">Annulla</button>
              </div>
             
            </div>
            
          
          </div>
         </form> 
        </div>
        <div style="clear:both;"></div>
       </div>
      </div>
     </div>
<?php 
 //endwhile;
endif; 	
/* END PAGE *****************************************************/		 

/* ARTICOLO *****************************************************/	
if($pag == "crea-pagina"): 

  if( $id == 1 ):
  ?>
  
  
  <div class="modal-content">
  <div class="modal-header">
    <button aria-hidden="true" data-dismiss="modal" class="bootbox-close-button close" type="button">×</button>
    <h4 class="modal-title">Aggiungi Articolo</h4>
  </div>
  <div class="modal-body">
    <div class="bootbox-body">
      <div class="col-md-12">
        <form class="j-forms formElement"  method="post" enctype="multipart/form-data" novalidate>
          <input type="hidden" name="nuovoArticolo" />
          <input type="hidden" name="articolo_pagina_id" value="<?php echo $id; ?>" />
          <div class="form-content"> 
            
            <!-- start text password -->
            <div class="row col-md-6">
              <div class="col-md-12 unit">
                <label class="label">Clame logo</label>
                <div class="input">
                  <label for="password" class="icon-left"> </label>
                  <textarea name="articolo_sottotitolo"  spellcheck="false" placeholder="Inserire il sottotitolo" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-12 unit">
                <label class="label">Testo slide</label>
                <div class="input">
                  <label for="password" class="icon-left"> </label>
                  <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"></textarea>
                </div>
              </div>
              <?php /* if($id == 3): ?>
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
                          <option value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?></option>
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
                  <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" pattern="/[^a-z0-9\s]/ig">
                </div>
              </div>
             
              <div class="col-md-12">
                 <label class="label">Stato di pubblicazione</label>
                <div class="col-md-4">
                  <label class="radio">
                    <input type="radio" name="articolo_visibile" value="1">
                    <i></i>Pubblica</label>
                </div>
                <div class="col-md-4">
                  <label class="radio">
                    <input type="radio" checked="" name="articolo_visibile" value="2">
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
                        <input type="file" id="fileUpload" name="file[]" multiple accept=".png, .jpg "/>
                    </div>
                    <input type="text" placeholder="Misure immagine 1920px 1080px" readonly id="prepend-small-btn" class="form-control req">
                 </div>
              </div>
              <div id="image-holder" class="blah col-md-12 unit">
               <div class="row col-md-12">
               
               		<span class="col-md-4">
                    </span>
                    <h5 class="anteprima col-md-4">
                    
                        Anteprima
                        
                    </h5>
                    <span class="col-md-4">
                    </span>
       
               </div>
              </div>
              <div class='col-sm-12 col-md-12 unit'>
               <small>
               
                  * Tipologie ammesse: .jpg, .png
               
               </small>
              </div>
            </div>
            <!-- end email url -->
   
          
             <div class="row col-md-12">
                  <div style="clear:both; margin-top:20px;"></div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" type="submit">Crea articolo</button>
                      <i class="zmdi"></i>
                      <button class="btn" type="reset">Annulla</button>
                  </div>
                </div>
            
            
          </div>
        </form>
      </div>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
  
  
  
  <?php
  elseif( $id == 32 || $id == 33 || $id == 34 || $id == 35 || $id == 36 ):
  ?>
  
  <div class="modal-content">
  <div class="modal-header">
    <button aria-hidden="true" data-dismiss="modal" class="bootbox-close-button close" type="button">×</button>
    <h4 class="modal-title">Aggiungi Articolo</h4>
  </div>
  <div class="modal-body">
    <div class="bootbox-body">
      <div class="col-md-12">
        <form class="j-forms formElement"  method="post" enctype="multipart/form-data" novalidate>
          <input type="hidden" name="nuovoArticolo" />
          <input type="hidden" name="articolo_pagina_id" value="<?php echo $id; ?>" />
          <div class="form-content"> 
            
            <!-- start text password -->
            <div class="row col-md-6">
              <div class="col-md-12 unit">
                <label class="label">Titolo</label>
                <div class="input">
                  <label for="text" class="icon-left"> <i class="fa fa-edit"></i> </label>
                  <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"></textarea>
                </div>
              </div>
       
              <div class="col-md-12 unit">
                <label class="label">Testo</label>
                <div class="input">
                  <label for="password" class="icon-left"> <i class="fa fa-edit"></i> </label>
                  <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"></textarea>
                </div>
              </div>
              <?php /* if($id == 3): ?>
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
                          <option value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?></option>
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
                  <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" pattern="/[^a-z0-9\s]/ig">
                </div>
              </div>
             
              
              <div class="col-md-12">
                      <label class="label">Disponibilità posti</label>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" name="articolo_img_id" value="1" checked>
                          <i></i>Disponibile</label>
                      </div>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" name="articolo_img_id" value="2">
                          <i></i>Non Disponibile</label>
                      </div>
                      <div class="col-md-12">
                       <hr>
                      </div>
                    </div>
             
             
              <div class="col-md-12 unit">
                <label class="label">Data Articolo</label>
                <div class="input-group date addon-datepickers">
                    <input name="articolo_data_modifica" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
              </div>
              <div class="col-md-12">
                 <label class="label">Stato di pubblicazione</label>
                <div class="col-md-4">
                  <label class="radio">
                    <input type="radio" name="articolo_visibile" value="1">
                    <i></i>Pubblica</label>
                </div>
                <div class="col-md-4">
                  <label class="radio">
                    <input type="radio" checked="" name="articolo_visibile" value="2">
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
                        <input type="file" id="fileUpload" name="file[]" multiple/>
                    </div>
                    <input type="text" placeholder="Misure immagine 1920px X 1080px" readonly id="prepend-small-btn" class="form-control">
                 </div>
              </div>
              <div id="image-holder" class="blah col-md-12 unit">
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
              <div class='col-sm-12 col-md-12 unit'>
               <small>
               
                  * Tipologie ammesse: .jpg, .png, .pdf
               
               </small>
              </div>
            </div>
            <!-- end email url -->
   
          
             <div class="row col-md-12">
                  <div style="clear:both; margin-top:20px;"></div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" type="submit">Crea articolo</button>
                      <i class="zmdi"></i>
                      <button class="btn" type="reset">Annulla</button>
                  </div>
                </div>
            
            
          </div>
        </form>
      </div>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
  
  
  
  
  <?php
  else: 
?>
<div class="modal-content">
  <div class="modal-header">
    <button aria-hidden="true" data-dismiss="modal" class="bootbox-close-button close" type="button">×</button>
    <h4 class="modal-title">Aggiungi Articolo</h4>
  </div>
  <div class="modal-body">
    <div class="bootbox-body">
      <div class="col-md-12">
        <form class="j-forms formElement"  method="post" enctype="multipart/form-data" novalidate>
          <input type="hidden" name="nuovoArticolo" />
          <input type="hidden" name="articolo_pagina_id" value="<?php echo $id; ?>" />
          <div class="form-content"> 
            
            <!-- start text password -->
            <div class="row col-md-6">
              <div class="col-md-12 unit">
                <label class="label">Titolo</label>
                <div class="input">
                  <label for="text" class="icon-left"> <i class="fa fa-edit"></i> </label>
                  <textarea name="articolo_titolo"  spellcheck="false" placeholder="Inserire il titolo" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-12 unit">
                <label class="label">Sottotitolo</label>
                <div class="input">
                  <label for="password" class="icon-left"> <i class="fa fa-edit"></i> </label>
                  <textarea name="articolo_sottotitolo"  spellcheck="false" placeholder="Inserire il sottotitolo" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-12 unit">
                <label class="label">Testo</label>
                <div class="input">
                  <label for="password" class="icon-left"> <i class="fa fa-edit"></i> </label>
                  <textarea name="articolo_testo"  spellcheck="false" placeholder="Inserire il testo" class="form-control"></textarea>
                </div>
              </div>
              <?php /* if($id == 3): ?>
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
                          <option value="<?php echo $rowCat["categoria_id"]; ?>"><?php echo $rowCat["categoria_nome"]; ?></option>
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
                  <input name="articolo_url" type="text" placeholder="Inserire l'URL" class="form-control" pattern="/[^a-z0-9\s]/ig">
                </div>
              </div>
              <?php if( $id == 4): ?>
              <div class="col-md-12">
                      <label class="label"> Metti in evidenza </label>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="checkbox"  name="articolo_gallery_id" value="1">
                          <i></i>In evidenza</label>
                      </div>
                      <div class="col-md-12">
                       <hr>
                      </div>
              </div>
               <?php endif; ?>
               <?php if( $id != 2 || $id != 1 || $id != 3 || $id != 5 || $id != 17 || $id != 31 || $id != 29 || $id != 25 || $id != 26 ): ?>
              <div class="col-md-12">
                      <label class="label">Disponibilità posti</label>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" name="articolo_img_id" value="1" checked>
                          <i></i>Disponibile</label>
                      </div>
                      <div class="col-md-4">
                        <label class="radio">
                          <input type="radio" name="articolo_img_id" value="2">
                          <i></i>Non Disponibile</label>
                      </div>
                      <div class="col-md-12">
                       <hr>
                      </div>
                    </div>
                <?php endif; ?>  
             
              <div class="col-md-12 unit">
                <label class="label">Data Articolo</label>
                <div class="input-group date addon-datepickers">
                    <input name="articolo_data_modifica" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
              </div>
              <div class="col-md-12">
                 <label class="label">Stato di pubblicazione</label>
                <div class="col-md-4">
                  <label class="radio">
                    <input type="radio" name="articolo_visibile" value="1">
                    <i></i>Pubblica</label>
                </div>
                <div class="col-md-4">
                  <label class="radio">
                    <input type="radio" checked="" name="articolo_visibile" value="2">
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
                        <input type="file" id="fileUpload" name="file[]" multiple/>
                    </div>
                    <input type="text" placeholder="Misure immagine 1920px X 1080px" readonly id="prepend-small-btn" class="form-control">
                 </div>
              </div>
              <div id="image-holder" class="blah col-md-12 unit">
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
              <div class='col-sm-12 col-md-12 unit'>
               <small>
               
                  * Tipologie ammesse: .jpg, .png, .pdf
               
               </small>
              </div>
            </div>
            <!-- end email url -->
   
          
             <div class="row col-md-12">
                  <div style="clear:both; margin-top:20px;"></div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" type="submit">Crea articolo</button>
                      <i class="zmdi"></i>
                      <button class="btn" type="reset">Annulla</button>
                  </div>
                </div>
            
            
          </div>
        </form>
      </div>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
<?php 
endif;
endif;
/* END ARTICOLO *****************************************************/	

/* CATEGORIE *****************************************************/	
if($pag == "categorie"): 
?>
<div class="modal-content">
  <div class="modal-header">
    <button aria-hidden="true" data-dismiss="modal" class="bootbox-close-button close" type="button">×</button>
    <h4 class="modal-title">Aggiungi Categoria</h4>
  </div>
  <div class="modal-body">
    <div class="bootbox-body">
      <div class="col-md-12">
        <form class="j-forms formElement"  method="post" enctype="multipart/form-data" novalidate>
          <input type="hidden" name="nuovaCategoria" />
          <div class="form-content"> 
            
            <!-- start text password -->
            <div class="row col-md-6">
              <div class="col-md-12 unit">
                <label class="label">NOME CATEGORIA</label>
                <div class="input">
                  <label for="text" class="icon-left"> <i class="zmdi zmdi-globe"></i> </label>
                  <input required name="categoria_nome" class="form-control" type="text" placeholder="categoria nome">
                </div>
              </div>
            </div>
            <!-- end text password --> 
            
            <!-- start email url -->
            <div class="row col-md-6">
               <div class="col-md-12 unit">
                <label class="label">URL SEF</label>
                <div class="input">
                  <label for="url" class="icon-left"> <i class="fa fa-globe"></i> </label>
                  <input name="categoria_url" type="text" placeholder="Inserire l'URL" class="form-control" pattern="/[^a-z0-9\s]/ig">
                </div>
              </div>
            </div>
            <!-- end email url -->
            
            <div class="row col-md-6">
             <div class="Gal col-md-12 unit">
                <label class="label">Inserisci immagine di Riferimento*</label>
                <div class="input prepend-small-btn">
                    <div class="file-button">
                        Sfoglia
                        <input type="file" id="fileUpload" name="file[]" />
                    </div>
                    <input type="text" placeholder="Misure immagine 1920px X 1080px" readonly id="prepend-small-btn" class="form-control">
                 </div>
              </div>
              <div id="image-holder" class="blah col-md-12 unit">
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
             </div> 
   
          
             <div class="row col-md-12">
                  <div style="clear:both; margin-top:20px;"></div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" type="submit">Crea Categoria</button>
                      <i class="zmdi"></i>
                      <button class="btn" type="reset">Annulla</button>
                  </div>
                </div>
            
            
          </div>
        </form>
      </div>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>


<?php


endif;
/* END CATEGORIE *****************************************************/	 	   
?>
