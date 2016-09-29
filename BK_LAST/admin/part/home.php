<!-- link alle sezioni -->
<div class="row">


<?php
		   
   $query3 = "SELECT * FROM `voce_menu_1`"; 
   $result3 = $mysqli->query($query3); while ( $row3 = $result3->fetch_array()){
	   
   
   
  ?>


    <div class="col-md-2 itemBoxMenu no-border">
       
        <div class="grid-title">
         <h4><span class="semi-bold"><?php echo $row3["nome_vm1"]; ?></span></h4>
        </div>
        
        <div class="grid-body">
          
          <div class="col-md-12"><a href="index1.php?pag=contenuti&id=<?php echo $row3["id_vm1"]; ?>"><i class="fa fa-align-justify"></i> <span class="title">Gestione Contenuto</span></a></div><br><br>
          
        </div>
        
    </div>
    

<?php } ?>


</div>
<!-- end link alle sezioni -->