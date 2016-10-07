<!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu"> 
  <!-- BEGIN MINI-PROFILE -->

   
   <!-- BEGIN SIDEBAR MENU -->	
    <ul>	
      <li class="start  <?php if(empty($_GET["name"])){?> active <?php }elseif($_GET["name"] == "home"){ ?> active <?php }else{ ?> <?php } ?> "> <a href="index1.php?name=home"> <i class="icon-cogs"></i> <span class="title">HOME</span> </a> </li>
      
      <li class="start <?php if($_GET["name"] == "galleryV"){ ?> active <?php }else{ ?> <?php } ?> "> <a href="index1.php?name=galleryV"> <i class="icon-cogs"></i> <span class="title">MEMBERS VIDEO GALLERY</span> </a> </li>
      
      <li class="start <?php if($_GET["name"] == "categorie"){ ?> active <?php }else{ ?> <?php } ?>   "> <a href="index1.php?name=categorie"> <i class="icon-cogs"></i> <span class="title">CATEGORIES / BOXES</span> </a> </li>  
      
      <li class="start <?php if($_GET["name"] == "mappa"){ ?> active <?php }else{ ?> <?php } ?>   "> <a href="index1.php?name=mappa"> <i class="icon-cogs"></i> <span class="title">EVENT MAP</span> </a> </li>  
      
       
     </ul>
	
	
	<div class="clearfix"></div>
    <!-- END SIDEBAR MENU --> 
  </div>