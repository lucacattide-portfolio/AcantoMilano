<?php 

      include("../admin/php/connessione_sql.php"); // Connessione DB 
	 
	  // data setting
	  @date_default_timezone_set('Europe/Rome');
	  @setlocale(LC_ALL, 'it_IT');
	  @setlocale(LC_TIME, 'ita', 'it_IT.utf8');

      
	  $paginaId = $_POST["dataId"];
	  $dateCurrentMonth = date('Y-m-d', strtotime($_POST["datarif"]) ); // MESE CORRENTE
	  $giorni = date("t",strtotime($dateCurrentMonth)); // Giorni in un mese
	  $dateNextMonth = date('Y-m', strtotime('+1 month', strtotime($dateCurrentMonth)));
	  $datePrevMonth = date('Y-m', strtotime('-1 month', strtotime($dateCurrentMonth)));
	  $dataNow = date("Y-m-d", strtotime($_POST["datarif"]));
	  
	  // MANCA PAGINA ARTICOLO

?>

          <h2 class="box-intestazione"> 
             <a class="arrow" data-id="<?php echo $paginaId; ?>" rel="<?php echo $datePrevMonth; ?>"></a> 
			  <?php echo utf8_encode( strftime("%B %Y", strtotime($dateCurrentMonth)) ); ?> 
             <a class="arrow" data-id="<?php echo $paginaId; ?>" rel="<?php echo $dateNextMonth; ?>"></a> 
           </h2>
           <section class="calendario-counter">
               
               <div class="calendario">
                 <div class="int-giorni">
                  <div class="box-int">Lun</div>
                  <div class="box-int">Mar</div>
                  <div class="box-int">Mer</div>
                  <div class="box-int">Gio</div>
                  <div class="box-int">Ven</div>
                  <div class="box-int">Sab</div>
                  <div class="box-int">Dom</div>
                 </div>
            
                 <div class="ajax-data">
                 	<div class="int-date">
					 <?php 
                     
                      // ciclo dei giorni
                     
                      for( $i = 1; $i <= $giorni; $i++ ){
                       $NomeGiornoAbbreviato = strftime("%a", strtotime("".date("Y",strtotime($_POST["datarif"]))."-".date("m",strtotime($_POST["datarif"]))."-".$i.""));
					   $GiorniRicerca = date("Y-m-d H:i:s", strtotime("".date("Y",strtotime($_POST["datarif"]))."-".date("m",strtotime($_POST["datarif"]))."-".$i.""));
					   
				       
					   $sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND date(articolo_data_modifica) = '".$GiorniRicerca."' AND articolo_id != 22 ";
					   $rArt2 = $mysqli->query($sqlArticolo2);
					   $countArticolo2 =  $rArt2->num_rows;
					   if( $countArticolo2 >= 1 ):
					     while ($articolo2 = $rArt2->fetch_array()):  
						   $dataArt = date("Y-m-d", strtotime($articolo2["articolo_data_modifica"]));
						 endwhile;
					   endif;
					   
		
						  if( $i == 1 ){
						  
								 if( $NomeGiornoAbbreviato == "lun" ){ ?>
									   <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo 'InData'; endif;   endif; ?>">
										 <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                       </div>                                                                 
									 <?php }elseif( $NomeGiornoAbbreviato == "mar" ){ ?>   
								   
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
										   <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                         </div>                                                                
                                               
									 <?php }elseif( $NomeGiornoAbbreviato == "mer" ){ ?>    
							   
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
										   <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                         </div>                                                                
										 
									 <?php }elseif( $NomeGiornoAbbreviato == "gio" ){ ?>    
										 
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
										   <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                         </div>                                                                   
										  
									 <?php }elseif( $NomeGiornoAbbreviato == "ven" ){ ?>    
										 
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
										   <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                         </div>                                                                   
														 
									  <?php }elseif( $NomeGiornoAbbreviato == "sab" ){ ?>    
									  
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
										   <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                         </div>                                                                  
										 
									  <?php }elseif( $NomeGiornoAbbreviato == "dom" ){ ?>    
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int">
										  &nbsp;
										 </div>
										 <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
										   <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                         </div>                                                                
			  
									  <?php }
						  
						        }elseif( $i == $giorni ){
							  
									 if( $NomeGiornoAbbreviato == "lun" ): ?>
										
										   <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
											 <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                           </div>                                                                 
										   <div class="box-int">
											&nbsp;
										   </div>
										   <div class="box-int">
											&nbsp;
										   </div>
										   <div class="box-int">
											&nbsp;
										   </div> 
										   <div class="box-int">
											&nbsp;
										   </div> 
										   <div class="box-int">
											&nbsp;
										   </div>   
										   <div class="box-int">
											&nbsp;
										   </div> 
										
										 
									  <?php elseif( $NomeGiornoAbbreviato == "mar" ): ?>   
									 
										   <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
											 <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                           </div>                                                               
										   <div class="box-int">
											&nbsp;
										   </div>
										   <div class="box-int">
											&nbsp;
										   </div>
										   <div class="box-int">
											&nbsp;
										   </div> 
										   <div class="box-int">
											&nbsp;
										   </div> 
										   <div class="box-int">
											&nbsp;
										   </div>   
										
																   
									  <?php elseif( $NomeGiornoAbbreviato == "mer" ): ?>    
								 
										   <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
											 <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                           </div>                                                                
										   <div class="box-int">
											&nbsp;
										   </div>
										   <div class="box-int">
											&nbsp;
										   </div>
										   <div class="box-int">
											&nbsp;
										   </div> 
										   <div class="box-int">
											&nbsp;
										   </div> 
										 
										   
									  <?php elseif( $NomeGiornoAbbreviato == "gio" ): ?>    
										   
										   <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
											 <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                           </div>                                                                
										   <div class="box-int">
											&nbsp;
										   </div>
										   <div class="box-int">
											&nbsp;
										   </div>
										   <div class="box-int">
											&nbsp;
										   </div> 
										 
										   
														   
									   <?php elseif( $NomeGiornoAbbreviato == "ven" ): ?>    
										   
										  <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
										   <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                          </div>                                                                 
										   <div class="box-int">
											&nbsp;
										   </div>
										   <div class="box-int">
											&nbsp;
										   </div>
										   
									   <?php elseif( $NomeGiornoAbbreviato == "sab" ): ?>    
										  
										   
										   <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
											 <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                           </div>                                                                 
										   <div class="box-int">
											&nbsp;
										   </div>
										   
									   <?php elseif( $NomeGiornoAbbreviato == "dom" ): ?>    
										   
										   <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
											 <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                           </div>     
													   
										<?php endif; 
						  
							  }else{ ?>
								  
								 <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
								   <?php  if( $countArticolo2 >= 1 ):  echo "<a data-id='$paginaId' rel='$dataArt' >".$i."</a>"; else:  echo $i; endif;  ?>
                                 </div>                                                                  
                                        
                        <?php	
                                }
                        
                           }
                  
                        ?>
     
                	 </div>
                 </div>
                 

               </div>
               
             
           </section>