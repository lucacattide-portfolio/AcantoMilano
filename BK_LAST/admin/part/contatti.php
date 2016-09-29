<?php
                $query = "SELECT * FROM `info` WHERE id_info = 3 "; 
  
                $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ ?>

<!-- BEGIN --> 
		<div class="col-md-3  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione <span class="semi-bold">Contatti</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                <input type="hidden" name="idinfo" value="<?php echo $row["id_info"]; ?>" />
                
                
                
                <h4>Indirizzo</h4>
                <textarea class="tiny" name="title"><?php echo $row["txt_info"]; ?></textarea>
                
                
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="contMod" type="submit">Modifica</button>
                
   
              
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END --> 
    
  <?php } ?>    
  
  
  
  
  
  <?php
                $query = "SELECT * FROM `info` WHERE id_info = 4 "; 
  
                $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ ?>

<!-- BEGIN --> 
		<div class="col-md-3  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione <span class="semi-bold">Contatti</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                <input type="hidden" name="idinfo" value="<?php echo $row["id_info"]; ?>" />
                
                
                
                
                
                
               <h4>Telefono</h4>
                <textarea class="tiny" name="title"><?php echo $row["txt_info"]; ?></textarea>
                
                
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="contMod" type="submit">Modifica</button>
                
   
              
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END --> 
    
  <?php } ?>  
  
  
  
  
  <?php
                $query = "SELECT * FROM `info` WHERE id_info = 5 "; 
  
                $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ ?>

<!-- BEGIN --> 
		<div class="col-md-3  allineamentoBox no-border">
			<!-- BEGIN TITLE --> 
			<div class="grid-title no-border">
				<h4>Sezione <span class="semi-bold">Contatti</span></h4>
			</div>
			<!-- END TITLE --> 
			<!-- BEGIN BODY --> 
			<div class="grid-body no-border">
				<div class="row-fluid">
				<form action="action.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="pag" value="<?php echo $_GET["pag"]; ?>" />
                
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
                
                <input type="hidden" name="idinfo" value="<?php echo $row["id_info"]; ?>" />
                
                
                
                
                
                
                <h4>Email</h4>
                <textarea class="tiny" name="title"><?php echo $row["txt_info"]; ?></textarea>
                
                
                <hr/>
                
                <button class="btn btn-primary btn-cons pull-right Btn-color" name="contMod" type="submit">Modifica</button>
                
   
              
                
                
                </form>
				</div>
			</div>
			<!-- END BODY --> 
		</div>
	<!-- END --> 
    
  <?php } ?>      