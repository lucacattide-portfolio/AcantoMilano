 <div class="page-title"> <i class="icon-custom-left IconR_A"></i>
   <h3 >Aggiorna - <span class="semi-bold">Categoria</span> <a href="index1.php?name=categorie" class="btn btn-default btn-cons"><b> < </b></a>  </h3>
 </div>
 
 

 
 <?php if($_GET["cat"]  == "Gallery"){ ?>
 
 
 
  <div class="row">
 
 <?php $result = $mysqli->query("SELECT * FROM `categorie` WHERE id_cat = '".$_GET["id"]."' "); while ( $row = $result->fetch_array()){  ?> 
   
   <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
   
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Fill in info - <span class="semi-bold"><?php echo $_GET["cat"]; ?></span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="<?php echo $row["titolo_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="<?php echo $row["citta_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class="form-control tagsinput"  name="tag[]" value="" data-role="tagsinput" ><?php echo $row["tags_cat"]; ?></textarea>
              </div>
            </div>
            
            
            </div>
            
            
            



          </div>
          
          
          
           <button class="btn btn-block btn-success" type="submit" name="mCat"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Upload</span>
            </button>
            
            
           
       
           
          
        </div>
        <!-- end grid left -->
        <div class="col-md-4">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Drag n Drop <span class="semi-bold">Uploader</span></h4>
                  
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    
                      <div class="fallback">
                        <input name="imgS[]" type="file"  multiple >
                      </div>
                     
                      
                      
                      
                      
                    
                  </div>
                </div>
              </div>
            </div>
           </div>
            
            
             
        </form> 
        
        
    
        
      
        
</div>   


<div class="row">

   <?php $result = $mysqli->query("SELECT * FROM `gallery-photo` WHERE id_cat = '".$_GET["id"]."'  "); while ( $row = $result->fetch_array()){ ?>
                     
                     
                      <div class="col-md-4">    
                       <div class="grid simple"> 
                          
                        <div class="row-fluid">   
                          <form action="action.php" method="post" enctype="multipart/form-data">     
                          
                          <input type="hidden" name="id" value="<?php echo $row["id_g"]; ?>" />    
                         <div class="grid-title no-border">  
                           <img src="../imgs/pics/<?php echo $row["img_g"]; ?>" height="280" />
                          </div>   
                           <button class="btn btn-block btn-danger" type="submit" name="eliminaIMG"> 
                              <i class="icon-remove"></i>
                              <span class="bold">Delete</span>
                          </button>
                                   
                           </form> 
                            
                          </div>  
                        </div>    
                       </div>
                           
        <?php } ?> 
        
        
</div>        
        



<?php } ?>


<?php }elseif($_GET["cat"] == "Video"){?>


  <div class="row">
   
   
   <?php $result = $mysqli->query("SELECT * FROM `categorie` WHERE id_cat = '".$_GET["id"]."' "); while ( $row = $result->fetch_array()){  ?> 
   
   <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
   
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Fill in info - <span class="semi-bold"><?php echo $_GET["cat"]; ?></span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="<?php echo $row["titolo_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="<?php echo $row["citta_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" value="" data-role="tagsinput" ><?php echo $row["tags_cat"]; ?></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Video Code</label>
              
              <div class="controls">
                <textarea class="form-control"  name="video" value="" data-role="tagsinput" ><?php echo $row["video_cat"]; ?></textarea>
              </div>
            
            </div>
            
            
            </div>
            
            
        </div>
          
          
          
           <button class="btn btn-block btn-success" type="submit" name="mCat"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Upload</span>
            </button>
       
           
          
        </div>
        <!-- end grid left -->
        
            
            
             
      </form> 
        
      
        
</div>   



<?php } ?>

<?php }elseif($_GET["cat"] == "Register"){ ?>

  <div class="row">
   
   
   <?php $result = $mysqli->query("SELECT * FROM `categorie` WHERE id_cat = '".$_GET["id"]."' "); while ( $row = $result->fetch_array()){  ?> 
   
   
   <form action="action.php" method="post" enctype="multipart/form-data">
   
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
   
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Fill in info - <span class="semi-bold"><?php echo $_GET["cat"]; ?></span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="<?php echo $row["titolo_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="<?php echo $row["citta_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" value="" data-role="tagsinput" ><?php echo $row["tags_cat"]; ?></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Link (EVENT PAGE)</label>
              
              <div class="controls">
                <input type="text" class="form-control"  name="link" value="<?php echo $row["link_cat"]; ?>" >
              </div>
              
              
            </div>
            
            
            <div class="form-group">
            
            <label class="form-label">Data / Start</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataIn" value="<?php echo $row["data_start"]; ?>">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
            
             <div class="form-group">
            
            <label class="form-label">Data / End</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataEnd" value="<?php echo $row["data_end"]; ?>">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
			</div>  
            
            </div> 
            
            
              
            
            </div>
            
          
           
            
           
        </div>
          
          
          
          <button class="btn btn-block btn-success" type="submit" name="mCat"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Upload</span>
            </button>
       
           
          
        </div>
        
        
       
       
        <!-- end grid left -->
        
        
        
        <div class="col-md-4">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Drag n Drop <span class="semi-bold">Uploader</span></h4>
                  
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    
                      <div class="fallback">
                        <input name="imgA" type="file" >
                      </div>
                      
                      <br>
                      <br>

                     <img src="../imgs/pics/<?php echo $row["img_cat"]; ?>" width="100"  />
                    
                  </div>
                </div>
              </div>
            </div>
           </div>
        
            
            
             
      </form> 
        
      
        
</div>   


<?php } ?>

<?php }elseif($_GET["cat"] == "Seminario"){ ?>



  <div class="row">
   
   
   <?php $result = $mysqli->query("SELECT * FROM `categorie` WHERE id_cat = '".$_GET["id"]."' "); while ( $row = $result->fetch_array()){  ?> 
   
   
       <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
   
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Fill in info - <span class="semi-bold"><?php echo $_GET["cat"]; ?></span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="<?php echo $row["titolo_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="<?php echo $row["citta_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" data-role="tagsinput" ><?php echo $row["tags_cat"]; ?></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Video Code</label>
              
              <div class="controls">
                <textarea class="form-control"  name="video" value="" data-role="tagsinput" ><?php echo $row["video_cat"]; ?></textarea>
              </div>
            
            </div>
            
            
            
             <div class="form-group">
            
            <label class="form-label">Data / Start</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataIn" value="<?php echo $row["data_start"]; ?>">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
            
             <div class="form-group">
            
            <label class="form-label">Data / End</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataEnd" value="<?php echo $row["data_end"]; ?>">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
              
            
            </div>
            
            
           
            
           
        </div>
          
          
          
           <button class="btn btn-block btn-success" type="submit" name="mCat"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Upload</span>
            </button>
       
           
          
        </div>
        <!-- end grid left -->
        <div class="col-md-4">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Drag n Drop <span class="semi-bold">Uploader</span></h4>
                  
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    
                      <div class="fallback">
                        <input name="imgS[]" type="file"  multiple >
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
           </div>
            
            
             
      </form> 
        
      
        
</div>   


<?php } ?>


<?php }elseif($_GET["cat"] == "Talks"){ ?>





  <div class="row">
   
   
   <?php $result = $mysqli->query("SELECT * FROM `categorie` WHERE id_cat = '".$_GET["id"]."' "); while ( $row = $result->fetch_array()){  ?> 
   
   
       <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Fill in info - <span class="semi-bold"><?php echo $_GET["cat"]; ?></span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="<?php echo $row["titolo_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="<?php echo $row["citta_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" value="" data-role="tagsinput" ><?php echo $row["tags_cat"]; ?></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Video</label>
              
              <div class="controls">
                <textarea class="form-control"  name="video" value="" data-role="tagsinput" ><?php echo $row["video_cat"]; ?></textarea>
              </div>
            
            </div>
            
            
            
              
            
            </div>
            
            
           
            
           
        </div>
          
          
          
           <button class="btn btn-block btn-success" type="submit" name="mCat"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Upload</span>
            </button>
       
           
          
        </div>
        <!-- end grid left -->
        <div class="col-md-4">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Drag n Drop <span class="semi-bold">Uploader</span></h4>
                  
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    
                      <div class="fallback">
                        <input name="imgS[]" type="file"  multiple >
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
           </div>
            
            
             
      </form> 
        
      
        
</div>   

<?php } ?>


<?php }elseif($_GET["cat"] == "WIP"){ ?>



  <div class="row">
   
   
   <?php $result = $mysqli->query("SELECT * FROM `categorie` WHERE id_cat = '".$_GET["id"]."' "); while ( $row = $result->fetch_array()){  ?> 
   
   
       <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
   
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Fill in info - <span class="semi-bold"><?php echo $_GET["cat"]; ?></span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="<?php echo $row["titolo_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="<?php echo $row["citta_cat"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" data-role="tagsinput" ><?php echo $row["tags_cat"]; ?></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Video Code</label>
              
              <div class="controls">
                <textarea class="form-control"  name="video" value="" data-role="tagsinput" ><?php echo $row["video_cat"]; ?></textarea>
              </div>
            
            </div>
            
            
            
             <div class="form-group">
            
            <label class="form-label">Data / Start</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataIn" value="<?php echo $row["data_start"]; ?>">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
            
             <div class="form-group">
            
            <label class="form-label">Data / End</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataEnd" value="<?php echo $row["data_end"]; ?>">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
              
            
            </div>
            
            
           
            
           
        </div>
          
          
          
           <button class="btn btn-block btn-success" type="submit" name="mCat"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Upload</span>
            </button>
       
           
          
        </div>
        <!-- end grid left -->
        <div class="col-md-4">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Drag n Drop <span class="semi-bold">Uploader</span></h4>
                  
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    
                      <div class="fallback">
                        <input name="imgS[]" type="file"  multiple >
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
           </div>
            
            
             
      </form> 
        
      
        
</div>   


<?php } ?>


<?php } ?>
