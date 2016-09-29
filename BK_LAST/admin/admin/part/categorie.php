 <div class="page-title"> <i class="icon-custom-left IconR_A"></i>
   <h3 >Categories  - <span class="semi-bold">list</span> 
   
    <div class="btn-group"> 
     <a class="btn dropdown-toggle btn-demo-space" data-toggle="dropdown" href="#"> Add Box <span class="caret"></span> </a>
      <ul class="dropdown-menu">
        <li><a href="index1.php?name=ncategoria&cat=Gallery">Photo</a></li>
        <li><a href="index1.php?name=ncategoria&cat=Video">Video</a></li>
        <li><a href="index1.php?name=ncategoria&cat=Register">Register</a></li>
        <li><a href="index1.php?name=ncategoria&cat=Seminario">Seminario</a></li>
        <li><a href="index1.php?name=ncategoria&cat=Talks">Talks</a></li>
        <li><a href="index1.php?name=ncategoria&cat=WIP">W.I.P Session</a></li>
        <li class="divider"></li>
      </ul>
    </div>
    
    <a href="index1.php?name=categorie&cat=Gallery" class="btn btn-primary">Photo</a>
    <a href="index1.php?name=categorie&cat=Video" class="btn btn-primary">Video</a>
    <a href="index1.php?name=categorie&cat=Register" class="btn btn-primary">Register</a>
    <a href="index1.php?name=categorie&cat=Seminario" class="btn btn-primary">Seminar</a>
    <a href="index1.php?name=categorie&cat=Talks" class="btn btn-primary">Talks</a>
    <a href="index1.php?name=categorie&cat=WIP" class="btn btn-primary">W.I.P Session</a>
    
   </h3>
 </div>
 
 
 <?php 
 
 if(empty($_GET["cat"])){
	 $query = "SELECT * FROM `categorie` ORDER BY id_cat DESC "; 
 }elseif( $_GET["cat"] == "Gallery"){
	 $query = "SELECT * FROM `categorie` WHERE nome_cat LIKE '%".$_GET["cat"]."%' ORDER BY id_cat DESC ";
 }elseif( $_GET["cat"] == "Video"){
	 $query = "SELECT * FROM `categorie` WHERE nome_cat LIKE '".$_GET["cat"]."' ORDER BY id_cat DESC ";
 }elseif( $_GET["cat"] == "Register"){
	 $query = "SELECT * FROM `categorie` WHERE nome_cat LIKE '".$_GET["cat"]."' ORDER BY id_cat DESC ";
 }elseif( $_GET["cat"] == "Seminario"){
	 $query = "SELECT * FROM `categorie` WHERE nome_cat LIKE '".$_GET["cat"]."' ORDER BY id_cat DESC ";
 }elseif( $_GET["cat"] == "Talks"){
	 $query = "SELECT * FROM `categorie` WHERE nome_cat LIKE '".$_GET["cat"]."' ORDER BY id_cat DESC ";
 }elseif( $_GET["cat"] == "WIP"){
	 $query = "SELECT * FROM `categorie` WHERE nome_cat LIKE '".$_GET["cat"]."' ORDER BY id_cat DESC ";
 }
 
 
 
 ?>
 
 
<?php $result = $mysqli->query($query); while ( $row = $result->fetch_array()){  $idCat = $row["id_cat"]; $nCat = $row["nome_cat"];



if( $nCat == "Gallery" ){

?>


<div class="col-md-6">
      <div class="grid simple vertical green">
							<div class="grid-title no-border">
								<h4>Category <span class="semi-bold"><?php echo $row["nome_cat"]; ?></span></h4>
							</div>
							<div class="grid-body no-border">
							<div class="row-fluid">
								<div>
								<h3><span class="semi-bold"><?php echo $row["titolo_cat"]; ?></span></h3 >
									<div class="color-bands green"></div>
									<div class="color-bands purple"></div>
									<div class="color-bands red"></div>
									<div class="color-bands blue"></div>									
									<br>
									
                                 
								</div>
								</div><br>

                                
              
              <a class="btn btn-block btn-primary"  href="index1.php?name=mcategoria&cat=<?php echo $nCat; ?>&id=<?php echo $idCat; ?>" > 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Update</span>
          </a>
          
       <form action="action.php" method="post" enctype="multipart/form-data">  
       
       <input type="hidden" name="id" value="<?php echo $idCat; ?>">
        
         
        
       <button class="btn btn-block btn-danger" type="submit" name="eliminaCat"> 
              <i class="icon-remove"></i>
              <span class="bold">Delete</span>
          </button>
       </form>
      
              
                                
                                
							</div>
                            
                            
              
                            
                            
						</div>
        </div>

<?php }elseif( $nCat == "Video" ){?> 


<div class="col-md-6">
      <div class="grid simple vertical green">
							<div class="grid-title no-border">
								<h4>Category <span class="semi-bold"><?php echo $row["nome_cat"]; ?></span></h4>
							</div>
							<div class="grid-body no-border">
							<div class="row-fluid">
								<div>
								<h3><span class="semi-bold"><?php echo $row["titolo_cat"]; ?></span></h3 >
									<div class="color-bands green"></div>
									<div class="color-bands purple"></div>
									<div class="color-bands red"></div>
									<div class="color-bands blue"></div>									
									<br>
									
                                    
                                  <?php echo $row["video_cat"]; ?>  
                                    
                                    
                                    
								</div>
								</div>
                                
                               <br>

                                
              
            <a class="btn btn-block btn-primary"  href="index1.php?name=mcategoria&cat=<?php echo $nCat; ?>&id=<?php echo $idCat; ?>" > 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Update</span>
          </a>
          
          
           <form action="action.php" method="post" enctype="multipart/form-data">  
       
       <input type="hidden" name="id" value="<?php echo $idCat; ?>">
        
       <button class="btn btn-block btn-danger" type="submit" name="eliminaCat"> 
              <i class="icon-remove"></i>
              <span class="bold">Delete</span>
          </button>
       </form>
                                
                                
							</div>
						</div>
        </div>









<?php }elseif( $nCat == "Talks" ){ ?>




<div class="col-md-6">
      <div class="grid simple vertical green">
							<div class="grid-title no-border">
								<h4>Category <span class="semi-bold"><?php echo $row["nome_cat"]; ?></span></h4>
							</div>
							<div class="grid-body no-border">
							<div class="row-fluid">
								<div>
								<h3><span class="semi-bold"><?php echo $row["titolo_cat"]; ?></span></h3 >
									<div class="color-bands green"></div>
									<div class="color-bands purple"></div>
									<div class="color-bands red"></div>
									<div class="color-bands blue"></div>									
									<br>
									
                                    
                                  <?php if($row["video_cat"] != ""){ echo $row["video_cat"]; }else{
									  
									  $result = $mysqli->query("SELECT * FROM `gallery-photo` WHERE id_cat = '".$idCat."' LIMIT 1 "); while ( $row = $result->fetch_array()){ $idCat = $row["id_cat"]; 
									  
							       ?>  
                                  
                                  
                                   <img src="../imgs/pics/<?php echo $row["img_g"]; ?>" width="350" />  
								  
								  
								  <?php } } ?>  
                                    
                                    
                                    
								</div>
								</div>
                                
                               <br>

                                
              
            <a class="btn btn-block btn-primary"  href="index1.php?name=mcategoria&cat=<?php echo $nCat; ?>&id=<?php echo $idCat; ?>" > 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Update</span>
          </a>
          
          
           <form action="action.php" method="post" enctype="multipart/form-data">  
       
       <input type="hidden" name="id" value="<?php echo $idCat; ?>">
        
       <button class="btn btn-block btn-danger" type="submit" name="eliminaCat"> 
              <i class="icon-remove"></i>
              <span class="bold">Delete</span>
          </button>
       </form>
                                
                                
							</div>
						</div>
        </div>







<?php }else{ ?>

<div class="col-md-6">
      <div class="grid simple vertical green">
							<div class="grid-title no-border">
								<h4>Category <span class="semi-bold"><?php echo $row["nome_cat"]; ?></span></h4>
							</div>
							<div class="grid-body no-border">
							<div class="row-fluid">
								<div>
								<h3><span class="semi-bold"><?php echo $row["titolo_cat"]; ?></span></h3 >
									<div class="color-bands green"></div>
									<div class="color-bands purple"></div>
									<div class="color-bands red"></div>
									<div class="color-bands blue"></div>									
									<br>
									
                                  <h3>City <span class="semi-bold"><?php echo $row["citta_cat"]; ?></span></h3 >  
                                 
                                    
                                    
								</div>
								</div>
                                
                               <br>

                                
              
            <a class="btn btn-block btn-primary"  href="index1.php?name=mcategoria&cat=<?php echo $nCat; ?>&id=<?php echo $idCat; ?>" > 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Update</span>
          </a>
          
          
           <form action="action.php" method="post" enctype="multipart/form-data">  
       
       <input type="hidden" name="id" value="<?php echo $idCat; ?>">
        
       <button class="btn btn-block btn-danger" type="submit" name="eliminaCat"> 
              <i class="icon-remove"></i>
              <span class="bold">Delete</span>
          </button>
       </form>
                                
                                
							</div>
						</div>
        </div>
<?php } } ?>