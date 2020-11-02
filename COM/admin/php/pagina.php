<?php

	include "config/htaccess.php"; // Inclusione Funzione htaccess

?>

<div class="page-header filled full-block light">
    <div class="row">
        <div class="col-md-6">
            <h2>Pagine</h2>
            <p>Gestione pagine</p>
        </div>
        <div class="col-md-6">
            <ul class="list-page-breadcrumb">
                <li><a href="index.php" title="Home">Home<i class="zmdi"></i></a> | <a href="index.php?pag=pagina" title="Pagine"><i class="zmdi"></i>Pagine</a></li>
            </ul>
        </div>
    </div>
</div>

<?php if($_SESSION["accesso"] >= 2): else: ?>
<div class="btnAdd-page btn-primary">
 <a class="aggiungi" title="Aggiungi Pagina"  href="#"><i class="zmdi zmdi-plus zmdi-hc-fw"></i></a>
</div>
<?php endif; ?>


<div class="row">
  <div class="col-md-12">
    <div class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
        <h3>Pagine attive</h3>
        <p>Gestione pagine pubblicate</p>
        </div>
        <div class="pull-right w-action">
          <ul class="widget-action-bar">
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more"></i></a>
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
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nome file</th>
                  <th>URL SEF</th>
                  <th>Livello pagina</th>
                  <th>Copertina</th>
                  <th class="td-center">Azioni</th>
                </tr>
              </thead>
              <tbody class="insertContentQuery">
			  <?php 
               /*  LOOP ACCOUNT ADMIN  */
               if($countPagina >= 1):
               
                  while ( $rowPagina3 = $rPagina3->fetch_array() ):
                  
                 ?>
                 <tr>
                  <td><?php echo $rowPagina3["pagina_riferimento"]; ?></td>
                  <td><?php echo $rowPagina3["pagina_url"]; ?></td>
                  <td>
				   <?php 
				     /* RICHIAMO PAGINA PRIMARIA*/
				     if($rowPagina3["pagina_dipendenza_id"] == "0"): echo "Pagina primaria";
					 
					 elseif ($rowPagina3["pagina_dipendenza_id"] == "accordion"): 
					 
					 	echo "Pagina primaria - Accordion";
						
					 elseif ($rowPagina3["pagina_dipendenza_id"] == "post"): 
					 
					 	echo "Pagina primaria - Post sottopagine";	
						
				     elseif ($rowPagina3["pagina_dipendenza_id"] == "articolo"): 
					 
					 	echo "Pagina primaria - Articolo";			
						
					  elseif ($rowPagina3["pagina_dipendenza_id"] == "link"): 
					 
					 	echo "Pagina primaria - Link";				
						
					  else:  
	  					$sqlPagina2 = "SELECT * FROM `pagina` WHERE pagina_id = '".$rowPagina3["pagina_dipendenza_id"]."'"; 
  						$rPagina2 = $mysqli->query($sqlPagina2);
						while ( $rowPagina2 = $rPagina2->fetch_array() ):  echo $rowPagina2["pagina_url"]; endwhile;
				      endif; 
					?>
                  </td>
                  <td>
                   <?php 
               /*  LOOP ACCOUNT ADMIN  */
              
				  
				  $sqlImg = "SELECT * FROM `immagine` WHERE immagine_id = ".$rowPagina3 ["pagina_immagine_id"]." ORDER BY immagine_id DESC LIMIT 0,1  ";
				  $rImg = $mysqli->query($sqlImg);
				  $countImg =  $rImg->num_rows;
				  
				  if( $countImg >= 1):
				  
					   while ($immagine = $rImg->fetch_array()):
						
					     $immagineLabel =  $immagine["immagine_label"];
					   
					   endwhile;
				   
				  
                  
                 ?>
                  <img style="height:60px;" src="../img/<?php echo $immagineLabel; ?>"/>
                  <?php  endif; ?>
                  </td>
                  <td class="td-center">
                   <div class="btn-toolbar" role="toolbar">
                  	<div class="btn-group" role="group"> 
                     <form class="j-forms formElement"  method="post" enctype="multipart/form-data" novalidate>
                      <a  class="btn btn-default btn-sm m-user-edit modifica" href="#"><i class="zmdi zmdi-edit"></i></a> 
                      <input type="hidden" name="eliminPagina" />
                      <input type="hidden" name="accesso" value="<?php echo $_SESSION["acesso"]; ?>" />
                      <input class="idSelection" type="hidden" name="pagina_id" value="<?php echo $rowPagina3["pagina_id"]; ?>" />
                      <?php if($_SESSION["accesso"] >= 2): else: ?><button class="btn btn-default btn-sm m-user-delete"><i class="zmdi zmdi-close"></i></button><?php endif; ?>
                     </form>
                    </div>
                   </div>
                  </td>
                </tr>
			  <?php 
               		
              	 endwhile;
				 
			  else:
		
              endif;  
              ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
   </div>
</div>