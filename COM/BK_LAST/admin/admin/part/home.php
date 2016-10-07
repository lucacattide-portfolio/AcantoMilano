
  
 <div class="page-title"> <i class="icon-custom-left IconR_A"></i>
   <h3>Background - <span class="semi-bold">Image </span> </h3> 
 </div>
 
 
 
 <div class="row">
 
         <form action="action.php" method="post" enctype="multipart/form-data">
 <?php $result = $mysqli->query("SELECT * FROM `home`"); while ( $row = $result->fetch_array()){ ?>
 
 
       
        <!-- grid left -->
        <div class="col-md-8">
        

        
         <!-- insert img -->
         <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Change- <span class="semi-bold">Immagine </span></h4>
            </div>
            <div class="grid-body no-border">
              <div class="row-fluid">
                <div class="span8">
                 <input name="imgH"  type="file" >
                </div>
              </div>
            </div>
          </div>
          <!-- end insert img -->
          
          
 <div class="page-title"> <i class="icon-custom-left IconR_A"></i>
   <h3>Social - <span class="semi-bold">Link</span></h3>
 </div>
          
          <!-- insert link social -->
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Change - <span class="semi-bold">Link</span></h4>
            </div>
            <div class="grid-body no-border">
              
             <div class="form-group">
              <label class="form-label"><img src="../imgs/blackFb.png" width="25"/></label>
              <span class="help"> Facebook </span>
              <div class="controls">
                <input type="url" class="form-control" name="link1" value="<?php echo $row["link1_home"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label"><img src="../imgs/blackVimeo.png" width="25"/></label>
              <span class="help"> Vimeo </span>
              <div class="controls">
                <input type="url" class="form-control" name="link2" value="<?php echo $row["link2_home"]; ?>" >
              </div>
            </div>
            
            
            
            <div class="form-group">
              <label class="form-label"><img src="../imgs/blackTwitter.png" width="25"/></label>
              <span class="help"> Twitter </span>
              <div class="controls">
                <input type="url" class="form-control" name="link3"  value="<?php echo $row["link3_home"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label"><img src="../imgs/blackInstagram.png" width="25"/></label>
              <span class="help"> Instagram </span>
              <div class="controls">
                <input type="url" class="form-control" name="link4"  value="<?php echo $row["link4_home"]; ?>" >
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="form-label"><img src="../imgs/blackLinkedin.png" width="25"/></label>
              <span class="help"> Linkedin </span>
              <div class="controls">
                <input type="url" class="form-control" name="link5"  value="<?php echo $row["link5_home"]; ?>" >
              </div>
            </div>
            
            
            
            
            </div>
            
            
            
          </div>
          <!-- end insert link social -->
          
          
          <button class="btn btn-block btn-success" type="submit" name="homeMod"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">Update</span>
            </button>
          
          
        </div>
        <!-- end grid left -->
        

        
        <!-- img preview -->
        <div class="col-md-4">
          <div class="grid simple">
          
            <div class="grid-title no-border">
              <h4>Image - <span class="semi-bold">Selected</span></h4>
            </div>
            
            <div class="grid-body no-border">
              <div class="row-fluid">
               <br>

               <img src="../imgs/pics/<?php echo $row["img_home"]; ?>"  width="460"/>
				
              </div>
            </div>
          </div>
        </div>
        <!-- end img preview -->
        
        

        
     <?php } ?>   
     </form>   
        
        
</div>