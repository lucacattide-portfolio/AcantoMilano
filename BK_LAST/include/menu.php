<!-- SHOULDER SX -->
<div class="shoulder">
    <header>
        <nav>
            
            <!-- MENU -->
        	<div id="menu-icon-open"></div>
        	<div id="menu-icon-closed" class="no-active"></div>

            <!-- MENU 1° LIVELLO -->
            <ul class="menu-first">
                <li rel="home"><a href="index.php">home</a></li>
                <li rel="chi-siamo"><a href="chi-siamo.php">chi siamo</a></li>
                <li rel="leonardo"><a href="leonardo.php">leonardo</a></li>
                <li rel="anticipazioni"><a href="anticipazioni.php">anticipazioni</a></li>
                <li rel="calendario"><a href="calendario.php">calendario</a></li>
                <li rel="tour-guidati"><a href="tour-guidati.php">tour guidati</a></li>
                <li rel="scuole"><a href="scuole.php">scuole</a></li>
                <li rel="viaggi"><a href="viaggi.php">viaggi</a></li>
                <li rel="aziende"><a href="aziende.php">aziende</a></li>
                <li rel="contatti"><a href="contatti.php">contatti</a></li>
            </ul>
    
            <!-- MENU 2°LIV CHI SIAMO -->
            <div id="menu-chisiamo">
                <hr class="separator">
                <ul class="menu-second">
           <?php 
				$query5 = "SELECT * FROM `testo` LEFT JOIN `immagini` USING( id_txt ) WHERE `testo`.`id_vm1` = 2 "; 
	
	            $result5 = $mysqli->query($query5); while ( $row5 = $result5->fetch_array()){ ?>
                
                    <li><a href="#sez<?php echo $row5["id_txt"]; ?>" ><?php echo $row5["titolo_txt"]; ?></a></li>
                   
               
               <?php } ?>     
                    
                </ul>
            </div>
            
            <!-- MENU 2°LIV CALENDARIO -->
            <div id="menu-calendario">
                <hr class="separator">
                <div class="calendar">
                    <a href="#" class="btn-slide">Mostra calendario</a>
                    <div id="panel">
                        <div class="button-calendar">
                            <a class="next browse right">&gt;</a>
                            <a class="prev browse left">&lt;</a>
                            <div class="clear"></div>
                        </div>
                        <div class="items">
                        
                         <?php 
								
								  $dataMesiAnno = "12";
								  
								  $dataMeseCorrente = date("m"); 
								  
								  $dataGiornoCorrente = date("d"); 
								  
								  $dataAnno = date("Y"); 
								    
						
						 for($i = $dataMeseCorrente; $i <= $dataMesiAnno; $i++){
							   
							  
							 $newDate2 = $i;
							  
						   
						     if( $newDate2 == 1 ){ $newDate2 = "Gennaio"; }elseif( $newDate2 == 2 ){ $newDate2 = "Febbraio"; }elseif( $newDate2 == 3 ){ $newDate2 = "Marzo"; }elseif( $newDate2 == 4 ){ $newDate2 = "Aprile"; }
                             elseif( $newDate2 == 5 ){ $newDate2 = "Maggio"; }elseif( $newDate2 == 6 ){ $newDate2 = "Giugno"; }elseif( $newDate2 == 7 ){ $newDate2 = "Luglio"; }elseif( $newDate2 == 8 ){ $newDate2 = "Agosto"; }
                             elseif( $newDate2 == 9 ){ $newDate2 = "Settembre"; }elseif( $newDate2 == 10 ){ $newDate2 = "Ottobre"; }elseif( $newDate2 == 11 ){ $newDate2 = "Novebre"; }elseif( $newDate2 == 12 ){ $newDate2 = "Dicembre"; }
  
		 
						     $num = cal_days_in_month(CAL_GREGORIAN, $i, date("y")); 
									
									
							?>
                        
                           
                            <!-- OTTOBRE -->
                            <div id="ottobre">
                                <div class="months">
                                    <h3><?php echo $newDate2; ?></h3>
                                </div>
                                <div class="clear_both"></div>
                                <ul class="css-tabs skin">
                                
                                
                                <?php for($j = 1; $j <= $num; $j++){ 
								
								
								$query4 = "SELECT `testo`.`id_txt` AS IDTXT,`testo`.`data_txt`, `data`.`data_data`  FROM `testo` LEFT JOIN `data` ON `data`.`id_txt`=`testo`.`id_txt` WHERE `testo`.`id_vm1` = '5' "; 

                                $result4 = $mysqli->query($query4); while ( $row4 = $result4->fetch_array()){  
								
								 $idTxt = $row4["IDTXT"];  
								 
								 $originalDate3 = $row4["data_txt"]; 
                                 $newDate3 = date("d", strtotime($originalDate3));
								 
								 $newDate4 = date("m", strtotime($originalDate3));
								 
								 
								 $originalDate5 = $row4["data_data"]; 
                                 $newDate5 = date("d", strtotime($originalDate5));
								 
								 $newDate6 = date("m", strtotime($originalDate5));
								 
								 
								 
								if( $newDate3 == $j && $i == $newDate4 && $newDate3 == $dataGiornoCorrente  ){ $JJ = $j 
								
								
								?>
                                
                                <li class="active"><a href="#news<?php echo $idTxt;  ?>" class="sel-calendar"><?php echo $j; ?></a></li>
                              
                                
								
								<?php }elseif($newDate3 == $j && $i == $newDate4 && $newDate3 < $dataGiornoCorrente){ $JJ = $j ?>  
								
								
								   <li class="active"><a href="#news<?php echo $idTxt;  ?>"><?php echo $j; ?></a></li>
								
								<?php }elseif($newDate3 == $j && $i == $newDate4 && $newDate3 > $dataGiornoCorrente){ $JJ = $j ?>  
								
								
								   <li class="active"><a href="#news<?php echo $idTxt; ?>"><?php echo $j; ?></a></li>
								
								<?php }elseif( $newDate5 == $j && $i == $newDate6 && $newDate5 == $dataGiornoCorrente  ){ $JJ = $j  ?>
									 
								
                                
                                
                                <li class="active"><a href="#news<?php echo $idTxt;  ?>" class="sel-calendar"><?php echo $j; ?></a></li>
                              
                                
								
								<?php }elseif($newDate5 == $j && $i == $newDate6 && $newDate5 < $dataGiornoCorrente){ $JJ = $j ?>  
								
								
								   <li class="active"><a href="#news<?php echo $idTxt;  ?>"><?php echo $j; ?></a></li>
								
								<?php }elseif($newDate5 == $j && $i == $newDate6 && $newDate5 > $dataGiornoCorrente){ $JJ = $j ?>  
								
								
								   <li class="active"><a href="#news<?php echo $idTxt; ?>"><?php echo $j; ?></a></li>
								
								<?php } 
								
								
								
								
								}
								
								
								?>
                                
                                 <?php if($JJ == $j ){}else{ ?> <li class="disable"><?php  echo $j; ?> </li> <?php } ?>
                                   
                              
                                <?php } ?>
                                 
                                
                                <?php for($k = $num; $k <= 34; $k++){ ?>
                                
                                
                                   <li class="disable">&nbsp;</li>
                               
                                <?php } ?>
                                
                                    
                                </ul>
                            </div> 
                            
                            <?php 
							    
							} 
								
						 ?>
        
                          
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- MENU 2°LIV TOUR GUIDATI -->
            <div id="menu-tourguidati">
                <hr class="separator">
                <ul class="menu-second">
                <?php 
				$query5 = "SELECT * FROM `testo` WHERE `testo`.`id_vm1` = 6 "; 
	
	            $result5 = $mysqli->query($query5); while ( $row5 = $result5->fetch_array()){ 
				
				$idTxt = $row5["id_txt"];
				
				
					$query6 = "SELECT * FROM `voce_menu_2` WHERE id_txt = '".$idTxt."' "; 
		
					$result6 = $mysqli->query($query6); while ( $row6 = $result6->fetch_array()){ ?>
                    
                    
                    
                    <li id="submenu<?php echo $row6["id_vm2"]; ?>"><a href="#sez<?php echo $row6["id_vm2"]; ?>"><?php echo $row6["nome_vm2"]; ?></a></li>
					
					
					
					
					<?php }
			  
			   } ?>  
               
                <li id="submenu6"><a href="calendario.php">Calendario</a></li>   
             
                </ul>
            </div>

            <!-- MENU 2°LIV SCUOLE -->
            <div id="menu-scuole">
                <hr class="separator">
                <ul class="menu-second">
                    <?php 
				$query5 = "SELECT * FROM `testo` WHERE `testo`.`id_vm1` = 7 "; 
	
	            $result5 = $mysqli->query($query5); while ( $row5 = $result5->fetch_array()){ 
				
				$idTxt = $row5["id_txt"];
				
				
					$query6 = "SELECT * FROM `voce_menu_2` WHERE id_txt = '".$idTxt."' "; 
		
					$result6 = $mysqli->query($query6); while ( $row6 = $result6->fetch_array()){ ?>
                    
                    
                    
                    <li id="submenu<?php echo $row6["id_vm2"]; ?>"><a href="#sez<?php echo $row6["id_vm2"]; ?>"><?php echo $row6["nome_vm2"]; ?></a></li>
					
					
					
					
					<?php }
			  
			   } ?>  
                </ul>
            </div>

            <!-- MENU 2°LIV SCUOLE -->
            <div id="menu-viaggi">
                <hr class="separator">
                <ul class="menu-second">
                        <?php 
				$query5 = "SELECT * FROM `testo` WHERE `testo`.`id_vm1` = 8 "; 
	
	            $result5 = $mysqli->query($query5); while ( $row5 = $result5->fetch_array()){ 
				
				$idTxt = $row5["id_txt"];
				
				
					$query6 = "SELECT * FROM `voce_menu_2` WHERE id_txt = '".$idTxt."' "; 
		
					$result6 = $mysqli->query($query6); while ( $row6 = $result6->fetch_array()){ ?>
                    
                    
                    
                    <li id="submenu<?php echo $row6["id_vm2"]; ?>"><a href="#sez<?php echo $row6["id_vm2"]; ?>"><?php echo $row6["nome_vm2"]; ?></a></li>
					
					
					
					
					<?php }
			  
			   } ?>  
                </ul>
            </div>
        </nav>
    </header>

    <!-- FOOTER -->
    <footer>
    
        <!-- LOGO -->
        <img src="img/acanto.png" alt="Acanto" class="logo" />
        
        <!-- LINGUE -->
        <ul class="menu-languages">
            <li class="sel">Italiano</li>
            <li><a href="http://www.acantomilano.com">English</a></li>
        </ul>
        
        <!-- LINK -->
        <a href="http://www.laboratorioa.it/acanto2" class="link-sito">www.acantomilano.com</a>
        
        <!-- PIVA -->
        <p class="text">P. IVA 0000000000<br />Tutti i diritti riservati.</p>
    </footer>
</div>
