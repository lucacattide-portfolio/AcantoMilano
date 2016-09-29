 <div class="page-title"> <i class="icon-custom-left IconR_A"></i>
   <h3 >Add - <span class="semi-bold">New</span> <a href="index1.php?name=categorie" class="btn btn-default btn-cons"><b> < </b></a>  </h3>
 </div>
 
 
 
 
 <?php if($_GET["cat"]  == "Gallery"){ ?>
 
  <div class="row">
   
       <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Fill in info  - <span class="semi-bold">photo</span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class="form-control tagsinput"  name="tag[]" value="" data-role="tagsinput" ></textarea>
              </div>
            </div>
            
            
            </div>
            
            
            



          </div>
          
          
          
          <button class="btn btn-block btn-success" type="submit" name="nCat"> 
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






<?php }elseif($_GET["cat"] == "Video"){?>


  <div class="row">
   
       <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   
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
                <input type="text" class="form-control" name="titolo" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" value="" data-role="tagsinput" ></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Video code</label>
              
              <div class="controls">
                <textarea class="form-control"  name="video" value="" data-role="tagsinput" ></textarea>
              </div>
            
            </div>
            
            
            </div>
            
            
        </div>
          
          
          
          <button class="btn btn-block btn-success" type="submit" name="nCat"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Upload</span>
            </button>
       
           
          
        </div>
        <!-- end grid left -->
        
            
            
             
      </form> 
        
      
        
</div>   





<?php }elseif($_GET["cat"] == "Register"){ ?>

  <div class="row">
   
       <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   
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
                <input type="text" class="form-control" name="titolo" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" value="" data-role="tagsinput" ></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Link (EVENT PAGE)</label>
              
              <div class="controls">
                <input type="text" class="form-control" placeholder="http://www.example.com" name="link" value="" >
              </div>
              
              
            </div>
            
            
            <div class="form-group">
            
            <label class="form-label">Data / Start</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataIn">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
            
             <div class="form-group">
            
            <label class="form-label">Data / End</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataEnd">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
              
            
            </div>
            
            
           
            
           
        </div>
          
          
          
          <button class="btn btn-block btn-success" type="submit" name="nCat"> 
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
                    
                  </div>
                </div>
              </div>
            </div>
           </div>
        
            
            
             
      </form> 
        
      
        
</div>   


<?php }elseif($_GET["cat"] == "Seminario"){ ?>



  <div class="row">
   
       <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Compila - <span class="semi-bold"><?php echo $_GET["cat"]; ?></span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" value="" data-role="tagsinput" ></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Video Code</label>
              
              <div class="controls">
                <textarea class="form-control"  name="video" value="" data-role="tagsinput" ></textarea>
              </div>
            
            </div>
            
            
            <div class="form-group">
            
            <label class="form-label">Data / Start</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataIn">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
            
             <div class="form-group">
            
            <label class="form-label">Data / End</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataEnd">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
            
              
            
            </div>
            
            
           
            
           
        </div>
          
          
          
          <button class="btn btn-block btn-success" type="submit" name="nCat"> 
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





<?php }elseif($_GET["cat"] == "Talks"){ ?>





  <div class="row">
   
       <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Compila - <span class="semi-bold"><?php echo $_GET["cat"]; ?></span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" value="" data-role="tagsinput" ></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Video Code</label>
              
              <div class="controls">
                <textarea class="form-control"  name="video" value="" data-role="tagsinput" ></textarea>
              </div>
            
            </div>
            
            
            
              
            
            </div>
            
            
           
            
           
        </div>
          
          
          
          <button class="btn btn-block btn-success" type="submit" name="nCat"> 
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

<?php }elseif($_GET["cat"] == "WIP"){ ?>



  <div class="row">
   
       <form action="action.php" method="post" enctype="multipart/form-data">
   <input type="hidden"  name="cat" value="<?php echo $_GET["cat"]; ?>" >
   
    <!-- grid left -->
    <div class="col-md-8">
    

        
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Compila - <span class="semi-bold"><?php echo $_GET["cat"]; ?></span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label">Title</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="titolo" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">City</label>
              
              <div class="controls">
                <input type="text" class="form-control" name="citta" value="" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Tags</label>
              
              <div class="controls">
                <textarea class=" tagsinput form-control"  name="tag[]" value="" data-role="tagsinput" ></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label">Video Code</label>
              
              <div class="controls">
                <textarea class="form-control"  name="video" value="" data-role="tagsinput" ></textarea>
              </div>
            
            </div>
            
            
            <div class="form-group">
            
            <label class="form-label">Data / Start</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataIn">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
            
             <div class="form-group">
            
            <label class="form-label">Data / End</label>
            
            <div class="clearfix"></div>
            
            <div class="APPA input-append success date ">
                      <input type="text" class="form-control" name="dataEnd">
                      <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
					</div>  
            
            </div> 
            
            
            
              
            
            </div>
            
            
           
            
           
        </div>
          
          
          
          <button class="btn btn-block btn-success" type="submit" name="nCat"> 
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
