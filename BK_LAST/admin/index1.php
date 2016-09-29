<!DOCTYPE html>
<html>
<?php 

include("connessione_sql.php"); 

session_start();     

/* Se l'utente non è accreditato 
if ( empty($_SESSION['id_utente']) ){

  echo "Non hai le credenziali per visualizzare il contenuto di questa pagina.";

?>
 <meta http-equiv="refresh" content="1; url=index.php "/>
<?php

}



// Altrimenti procedo con le variabili 
else{
	
 
 
 
 if( $_SESSION["lang"] != "eng" ){  
 
  $tab = "ita";

 

}else{
	
  $tab = "eng";
	
 

}  	
	

 $var = $_SESSION['id_utente'];

 $var2 = $_SESSION['nome_utente'];

 $code = $_SESSION['code'];
 
 $lang1 = $_SESSION["lang"];
 
 $tab = $_SESSION["lang"];
 
}

*/

/* logout */
if(isset($_GET["logoff"])){
	
    session_unset();
    session_destroy();
    session_start();//Apro una nuova sessione
	
?>
 <meta http-equiv="refresh" content="1; url=index.php "/>
<?php

}



?>

<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Admin |  Acanto </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="Motta arredamenti" name="description" />
<meta content="Claudio Veneri" name="author" />
<link href="assets/plugins/jquery-polymaps/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/shape-hover/css/demo.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/shape-hover/css/component.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.theme.css" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" >
<link href="assets/plugins/jquery-isotope/isotope.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style_mod.css" rel="stylesheet" type="text/css"/>
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/magic_space.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
    <div class="header-seperation">
      <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
        <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" >
          <div class="iconset top-menu-toggle-white"></div>
          </a> </li>
      </ul>
      <!-- BEGIN LOGO -->
      <a href="index1.php"><img src="assets/img/acanto.png" alt=""  data-src="assets/img/acanto.png" data-src-retina="assets/img/acanto.png" height="40"/></a>
      <!-- END LOGO -->
      
    </div>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <div class="header-quick-nav" ><!-- menu responsive -->
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="pull-left">
       <!-- barra bianca -->
      </div>
      <!-- END TOP NAVIGATION MENU -->
    </div><!-- menu responsive -->
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
  <!-- BEGIN SIDEBAR -->
  
  <?php include("part/menuFirst.php");  ?>
  
 <!-- BEGIN PAGE CONTAINER-->
 <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    
   <div class="content">
      
      
      <div class="page-title">
      <h3>Acanto</h3>
      </div>
	   <!-- BEGIN DASHBOARD TILES -->
	   
	 <?php 
	 
	 
			 if(isset($_GET["pag"])){ $pag = $_GET["pag"]; }else{ $pag = ""; } 
			 
			 switch($pag)
			 {
			  
			  case "":  
				 include("part/home.php");
				 break;
				   
				   
			  case "contenuti":  
				 include("part/contenuti.php");
				 break;	
				 
				 
				 
			   case "contenuti":  
				 include("part/gallery.php");
				 break;
				 
				 
			   case "sezioni":  
				 include("part/sezioni.php");
				 break;	
				 
				 
			   case "interni":  
				 include("part/interni.php");
				 break;		
				 
				 
				 
			   case "sezioni2":  
				 include("part/sezioni2.php");
				 break;	
				 
				 
			   case "interni2":  
				 include("part/interni2.php");
				 break;	
				 
				 
				  
				    
				 
				 
			   
					 
			 }
 
     ?>
	  
      
      
    
    

  </div>
 </div>
		  
</div>
 
<!-- END CONTAINER -->

<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
    
<!--[if lt IE 9]>
<script src="assets/plugins/respond.js"></script>
<![endif]-->

<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cookie.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
<script src="assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
<script src="assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
<script src="assets/plugins/skycons/skycons.js"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-polymaps/polymaps.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript" ></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script>
<script src="assets/js/demo.js" type="text/javascript"></script>
<script src="assets/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
<script type="text/javascript">
        
			
	tinymce.init({
    selector: '.tiny',
    plugins: [
        "link preview",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
		
		
      
        
    ],
	
	

    relative_urls: false,
   /* style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],
    formats: {
        alignleft: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'left'},
        aligncenter: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center'},
        alignright: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'right'},
        alignfull: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'full'},
        bold: {inline: 'span', 'classes': 'bold'},
        italic: {inline: 'span', 'classes': 'italic'},
        underline: {inline: 'span', 'classes': 'underline', exact: true},
        strikethrough: {inline: 'del'},
        customformat: {inline: 'span', styles: {color: '#00ff00', fontSize: '20px'}, attributes: {title: 'My custom format'}}
    }
	removeformat : [
		  {selector : 'b,strong,em,i,font,u,strike', remove : 'all', split : true, expand : false, block_expand : true, deep : true},
		  {selector : 'span', attributes : ['style', 'class'], remove : 'empty', split : true, expand : false, deep : true},
		  {selector : '*', attributes : ['style', 'class'], split : false, expand : false, deep : true}
    ]*/
});

			
           
 $(document).ready(function(){  
 
 
 //select form
 $(".selelectCover").select2();
 
 
 
$('.input-append.date').datepicker({
  autoclose: true,
  todayHighlight: true,
  format: "yyyy-mm-dd",
});
 
 
 
 });
</script>

<!-- END CORE TEMPLATE JS -->
</body>
</html>
