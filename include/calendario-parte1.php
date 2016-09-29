

    <section class="sezione-calendario1">
         <section class="box-calendario numGiorni">
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
                       $NomeGiornoAbbreviato = strftime("%a", strtotime("".date("Y")."-".date("m")."-".$i.""));
					   $GiorniRicerca = date("Y-m-d", strtotime("".date("Y")."-".date("m")."-".$i.""));
					   
				       
					   $sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND date(articolo_data_modifica) = '".$GiorniRicerca."' AND articolo_id != 22 AND articolo_visibile = 1  ";
					   $rArt2 = $mysqli->query($sqlArticolo2);
					   $countArticolo2 =  $rArt2->num_rows;
					   if( $countArticolo2 >= 1 ):
					     while ($articolo2 = $rArt2->fetch_array()):  
						   $dataArt = date("Y-m-d", strtotime($articolo2["articolo_data_modifica"]));
						 endwhile;
					   endif;
					   
		
						  if( $i == 1 ){
						  
								 if( $NomeGiornoAbbreviato == "lun" ){ ?>
									   <div class="box-int <?php if( $countArticolo2 >= 1 ): echo 'hover';  if( $dataArt == $dataNow ): echo ' InData'; endif;   endif; ?>">
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
         </section>
         <section class="box-calendario">
           <h2 class="box-intestazione"> Eventi in Evidenza </h2>
           <div class="lista-blocco">
             
             <?php
               $sqlArticolo5 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND date(articolo_data_modifica) >= '".$dataNow."' AND articolo_id != 22 AND articolo_visibile = 1  ORDER BY articolo_data_modifica ASC LIMIT 0,1 ";
					   $rArt5 = $mysqli->query($sqlArticolo5);
					   $countArticolo5 =  $rArt5->num_rows;
					   if( $countArticolo5 >= 1 ):
					     while ($articolo5 = $rArt5->fetch_array()):  
						   
						 
			   ?>	
               <div class="box-list">   
                 <h2><?php echo $articolo5["articolo_titolo"]; ?></h2>
                 <div class="button-box">
                   <span class="ore">
                    Ore <?php echo date("H:i", strtotime($articolo5["articolo_data_modifica"])); ?>
                   </span>
                   <a href="<?php echo $siteurl_base; ?>include/pop-up3.php" rel="<?php echo $articolo5["articolo_id"]; ?>" data-id="">
                     Leggi Tutto
                   </a>
                 </div>
               </div>
               <?php 
			   endwhile;
					   endif;
			   ?>
           
           </div>
         </section>
         <section class="box-calendario ajax3">
         <?php
               $sqlArticolo6 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND date(articolo_data_modifica) >= '".$dataNow."' AND articolo_id != 22 AND articolo_visibile = 1  ORDER BY articolo_data_modifica ASC LIMIT 0,1 ";
					   $rArt6 = $mysqli->query($sqlArticolo6);
					   $countArticolo6 =  $rArt6->num_rows;
					   if( $countArticolo6 >= 1 ):
					     while ($articolo6 = $rArt6->fetch_array()):  
						 
						 $dateArt6 = utf8_encode( strftime("%d %B %Y", strtotime($articolo6["articolo_data_modifica"])) ); 
						 
				$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo6["articolo_id"]." AND immagine_tipo NOT LIKE 'application/pdf' LIMIT 0,1 ";
				$rImg = $mysqli->query($sqlImg);
				$countImg =  $rImg->num_rows;
				
				if( $countImg >= 1):
				
				   while ($immagine = $rImg->fetch_array()):
				   
				   $immagine4 = $immagine["immagine_label"];
				   
				  endwhile;
			   endif;  
						   
						 
			   ?>	
             <section class="box-calendario-3" style="background-image:url(<?php echo $siteurl_base; ?>img/<?php echo $immagine4; ?>)">
               <h2 class="box-intestazione"><?php echo $dateArt6  ?></h2>
             </section>
           <?php 
				 endwhile;
			   endif;
		   ?>  
             
         </section>
    </section>

