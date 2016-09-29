
  
 <div class="page-title"> <i class="icon-custom-left IconR_A"></i>
   <h3>Insert Vimeor - <span class="semi-bold">video code number </span> </h3> 
 </div>
 
 
 
<div class="row">
 
       
       
       
       <form action="action.php" method="post" enctype="multipart/form-data">

        <!-- grid left -->
        <div class="col-md-12">
        

        
         <!-- insert img -->
         <div class="grid simple">
            <div class="grid-title no-border">
              <h4>New - <span class="semi-bold">Gallery</span></h4>
            </div>
            <div class="grid-body no-border">
              <div class="row-fluid">
                <div class="span8">
                 <textarea name="code"  class="text-editor form-control" rows="10"></textarea>
                </div>
               </div>
             </div>
            
            
            
            
            
             <div class="grid-title no-border">
              <h4>New- <span class="semi-bold">Name</span></h4>
            </div>
            <div class="grid-body no-border">
              <div class="row-fluid">
                <div class="span8">
                 <input name="name" type="text" class="form-control">
                </div>
               </div>
              </div>
            
            
            
            
            
          </div>
          <!-- end insert img -->
          
          

          
           
          
          
          
          <button class="btn btn-block btn-success" type="submit" name="nuovoGv"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">New</span>
          </button>
          
          
        </div>
        <!-- end grid left -->
        
        </form> 
        
        <br>
        <br>
  
        
        
</div>


<div class="clearfix"></div>



<div class="page-title"> <i class="icon-custom-left IconR_A"></i>
   <h3>Modifica - <span class="semi-bold">Codice </span> </h3> 
 </div>



  
      
   <?php $result = $mysqli->query("SELECT * FROM `gallery-video` ORDER BY id_gv DESC "); while ( $row = $result->fetch_array()){ ?>



        <!-- grid left -->
        <div class="col-md-5">
        
         <form action="action.php" method="post" enctype="multipart/form-data">
         
         
         
         <input name="id" type="hidden" value="<?php echo $row["id_gv"]; ?>">
        
         <!-- insert img -->
         <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Edit - <span class="semi-bold">Gallery</span></h4>
            </div>
            <div class="grid-body no-border">
              <div class="row-fluid">
                <div class="span8">
                 <?php echo $row["code_gv"]; ?>  <textarea name="code"  class="text-editor form-control" rows="6"> <?php echo $row["code_gv"]; ?> </textarea>
                </div>
                
           
                
               </div>
             </div>
            
            
            
            
            
             <div class="grid-title no-border">
              <h4>Edit - <span class="semi-bold">Name</span></h4>
            </div>
            <div class="grid-body no-border">
              <div class="row-fluid">
                <div class="span8">
                 <input name="name" type="text" class="form-control" value="<?php echo $row["name_gv"]; ?>">
                </div>
               </div>
               
               <br>
               <br>

               
               
           <button class="btn btn-block btn-primary" type="submit" name="modificaGv"> 
              <i class="icon-cloud-upload"></i>
              <span class="bold">update</span>
          </button>
          
          
          <button class="btn btn-block btn-danger" type="submit" name="eliminaGv"> 
              <i class="icon-remove"></i>
              <span class="bold">delete</span>
          </button>
               
               
               
              </div>
            
          </div>
          <!-- end insert img -->
          
          </form>
          
        </div>
        <!-- end grid left -->


<?php } ?>




