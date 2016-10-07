<ul class="sortAb">

<?php $sqlA="SELECT * FROM prodotto LEFT JOIN prezzo USING ( id_p ) ORDER BY ordine_p ASC "; $datiA = mysql_query($sqlA); while ($record = mysql_fetch_array($datiA)) { $id_p = $record["id_p"]; $nome = $record["titolo_p"];  $codice = $record["codice_p"]; $vis = $record["vis"]; $sesso = $record["sesso"]; $img = $record["img_p"]; $prezzo = $record["prezzo"];  ?>


    
    
     <li id="listP_<?php echo $id_p; ?>" class="ui-state-default" rel="<?php echo $id_p; ?>">
     
       <div class="row">
     
         <div class="panel-group riposizione" id="accordion_<?php echo $id_p; ?>" data-toggle="collapse">
        
           <div class="panel panel-default sortable ui-sortable">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion_<?php echo $id_p; ?>" href="#collapse_<?php echo $id_p; ?>">
                   <?php echo $nome; ?>
                </a>
              </h4>
            </div>
            <div id="collapse_<?php echo $id_p; ?>" class="panel-collapse collapse">
              <div class="panel-body ColorSez">
                
                
                
                
             <?php include("modificaProd.php"); ?>
                
                
                
                 
              </div>
            </div>
           </div>
         
          </div>
    
         </div>
         
      </li>
     



<?php } ?>


</ul>