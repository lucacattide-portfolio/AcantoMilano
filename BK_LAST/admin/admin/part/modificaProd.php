<input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id_p"  />
<input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="data_p"  />

<!-- img -->



<div class="col-md-4 spazio">

  <div class="grid-body no-border">
    <div class="row">
      <div class="col-md-12">
        <h3>Descrizione <span class="semi-bold">Prodotto</span></h3>
        
        <div class="row-fluid">
      <form action="index1.php" class="dropzone no-margin">
        <div class="fallback">
          <input name="file" type="file"  />
        </div>
      </form>
        </div>
        
        
      </div>
    </div>
  </div>
</div>








<!-- end img -->


<!-- descrizione -->

<div class="col-md-6 spazio">

  <div class="grid-body no-border">
    <div class="row">
      <div class="col-md-12">
        <h3>Descrizione <span class="semi-bold">Prodotto</span></h3>
        
        <br>
        <textarea placeholder="Enter text ..." class="form-control text-editor" rows="10"></textarea>
      </div>
    </div>
  </div>
</div>




<!-- end descrizione -->







<!-- nome prodotto -->

<div class="col-md-4 spazio">

  <div class="grid-body no-border">
    <div class="row">
      <div class="col-md-12">
        <h3>Nome <span class="semi-bold">Prodotto</span></h3>
        
        <br>
        <input type="text" name="titolo_p" class="form-control" value="<?php echo $record["titolo_p"]; ?>">
      </div>
    </div>
  </div>
</div>

<!-- end nome prodotto -->



<!-- nome key words -->

<div class="col-md-4 spazio">

  <div class="grid-body no-border">
    <div class="row">
      <div class="col-md-12">
        <h3>Key <span class="semi-bold">Words</span></h3>
        
        <br>
        <input type="text" name="key_p" class="form-control"  value="<?php echo $record["key_p"]; ?>" />
      </div>
    </div>
  </div>
</div>

<!-- end key words -->




<!-- codice prodotto -->

<div class="col-md-4 spazio">

  <div class="grid-body no-border">
    <div class="row">
      <div class="col-md-12">
        <h3>Codice <span class="semi-bold">Prodotto</span></h3>
        
        <br>
        <input type="text" name="codice_p"  class="form-control" value="<?php echo $record["codice_p"]; ?>" />
      </div>
    </div>
  </div>
</div>

<!-- end codice prodotto -->





<!--  Club prodotto -->

<div class="col-md-4 spazio">

  <div class="grid-body no-border">
    <div class="row">
      <div class="col-md-12">
        <h3>Club <span class="semi-bold">Prodotto</span></h3>
        
        <br>

        <select class="source" name="marca" style="width:100%"> 
         <option value="Milan">Milan</option>
        </select>
        
        
      </div>
    </div>
  </div>
</div>

<!-- end Club prodotto -->





<!--  Marca prodotto -->

<div class="col-md-4 spazio">

  <div class="grid-body no-border">
    <div class="row">
      <div class="col-md-12">
        <h3>Marca <span class="semi-bold">Prodotto</span></h3>
        
        <br>

        
        <select class="source" name="marca" style="width:100%"> 
      
        <?php $sql=" SELECT * FROM `marca`"; $dati = mysql_query($sql); while ($record = mysql_fetch_array($dati)) { 
		
		if( $marca == $record["nome_m"] ){ ?>
		
        
        <option selected value="<?php echo $record["nome_m"]; ?>"><?php echo $record["nome_m"]; ?></option>
        
        
        <?php 	
		}
		
		?> 
        
        <option value="<?php echo $record["nome_m"]; ?>"><?php echo $record["nome_m"]; ?></option>
        
       <?php } ?>
                                              
      </select>
      </div>
    </div>
  </div>
</div>

<!-- end Marca prodotto -->
                  
                  
                
                               
              




<!-- categorie -->

<div class="col-md-4 spazio">

  <div class="grid-body no-border">
    <div class="row">
      <div class="col-md-12">
        <h3>Selezione <span class="semi-bold"> Categorie</span></h3>
        
        <br>
        <select id="multiCat_<?php echo $id_p; ?>" style="width:100%" multiple>
        <?php  $sql=" SELECT * FROM `categoria`"; $dati = mysql_query($sql); while ($record = mysql_fetch_array($dati)) { $cat=$record["nome_c"];?>
         <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>
  </div>
</div>

<!-- end categorie -->





