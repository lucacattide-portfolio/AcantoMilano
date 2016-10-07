<div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper">
      <div class="user-info-wrapper">
    
    
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      
      <ul>
        <?php
		   
		   $query = "SELECT * FROM `voce_menu_1`"; 
           $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ 
		
		?>
        <li class="<?php if($row["id_vm1"] == $_GET["id"] ){ echo "active"; }else{ } ?>"> <a href="index1.php?pag=contenuti&id=<?php echo $row["id_vm1"]; ?>" > <i class="fa fa-circle-o"></i> <span class="title"><?php echo $row["nome_vm1"]; ?></span> <span class="selected"></span> </a> </li> 
        <?php } ?>
      </ul>
    
      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <div class="footer-widget">
    <div class="pull-right">
      <a href="index.php?logoff">Logout &nbsp;&nbsp; <i class="fa fa-power-off"></i></a></div>
  </div>
  <!-- END SIDEBAR -->