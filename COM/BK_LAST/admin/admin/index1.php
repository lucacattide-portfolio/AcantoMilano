<?php include("connessione_sql.php"); ?>
<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8" />
<title>Junction</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />


<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/ios-switch/ios7-switch.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8">
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-superbox/css/style.css" rel="stylesheet" type="text/css" media="screen"/>

<!-- END PLUGIN CSS -->

<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->

<link href="assets/plugins/boostrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>





</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<?php include("part/header_top.php"); ?>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
  <!-- BEGIN SIDEBAR -->
  
  <?php include("part/menu.php"); ?>
  
  <!-- logout --> 
  <div class="footer-widget">			
	<a href="lockscreen.html"><i class="icon-off"></i></a>
  </div>
  <!-- end logout -->
  
 </div>
  <!-- END SIDEBAR --> 
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
    
     <ul class="breadcrumb">
      <li>
        <p>Section</p>
      </li>
      <i class="icon-angle-right"></i>
      <li><a class="active"><?php if(empty($_GET["name"])){ echo "home";}elseif($_GET["name"] == "galleryV"){ echo "MEMBERS VIDEO GALLERY";  }elseif($_GET["name"] == "ncategoria"){ echo "nuova categoria";  }elseif($_GET["name"] == "mcategoria"){ echo "modifica categoria";  }elseif($_GET["name"] == "categorie"){ echo "CATEGORIES / BOXES";  }else{  echo $_GET["name"]; } ?>  </a> </li>
      <li> <?php if( empty($_GET["ob5"])){ }elseif($_GET["ob5"] == "ok"){ ?><p class="text-success"><i class="icon-angle-right"></i> Aggiornamento completato</p> <?php }else{?> <p class="text-error"> <i class="icon-angle-right"></i>Aggiornamento non riuscito</p> <?php } ?> </li>
    </ul>
    
    <?php 
	     
		
		if(empty($_GET["name"])){
		  
		  include("part/home.php");	
			
	     }elseif( $_GET["name"] == "home"){
			 
			include("part/home.php");	 
		
		 }elseif( $_GET["name"] == "galleryV"){
			 
			include("part/galleryVideo.php");	 
		
		 }elseif( $_GET["name"] == "categorie"){
			 
			include("part/categorie.php");	 
		
		 }elseif( $_GET["name"] == "ncategoria"){
			 
			include("part/ncategoria.php");	 
		
		 }elseif( $_GET["name"] == "mcategoria"){
			 
			include("part/mcategoria.php");	 
		
		 }elseif( $_GET["name"] == "mappa"){
			 
			include("part/mappa.php");	 
		
		 }else{
			 
			 
		 }
	  
	
	
	
	?>
    
    </div>
    
    
 </div>
<!-- END CONTAINER --> 

<!-- END CONTAINER -->

<!-- BEGIN CORE JS FRAMEWORK-->

<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>


<!-- END CORE JS FRAMEWORK -->
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/ios-switch/ios7-switch.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- <script src="assets/js/form_elements.js" type="text/javascript"></script> -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/demo.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->


<script type="text/javascript" src="assets/tiny_mce/jquery.tinymce.js"></script>


<script type="text/javascript">

$(".Zindex").draggable();



$('.APPA').datepicker({
			format: "yyyy-mm-dd",
			startView: 1,
			daysOfWeekDisabled: "3,4",
			autoclose: true,
			todayHighlight: true
    });



  $('textarea.tinymce_small').tinymce({
				  // Location of TinyMCE script
				  script_url : 'assets/tiny_mce/tiny_mce.js',
	  
				  // General options
				  theme : "advanced",
				  plugins: "table,fullscreen,style,paste,autolink",
				  plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
		  
				  // Theme options
				  theme_advanced_buttons1 : "bold,italic,underline,|,pasteword,|,removeformat,undo,redo,|,fullscreen|",
				  theme_advanced_buttons2 : "",
				  theme_advanced_buttons3 : "",
				  theme_advanced_toolbar_location : "top",
				  theme_advanced_toolbar_align : "left",
				  theme_advanced_statusbar_location : "none",
				  theme_advanced_resizing : true,
			  });


    
	$(document).ready(function() {
        
	  $.post( "action.php", { mappa3: "" },function(data){
	   
	   $("#wrapper2").html(data);
	  
	  });
	  
	  
	 /*  $.post( "action.php", { mappa2: "" },function(data){
	   
	   $(".result").html(data);
	  
	  });	*/
		
		
    });
	
	
	
   $("#wrapper2").click(function(e) {
  
	 var offset = $(this).offset();
	 var relativeX = (e.pageX - offset.left);
	 var relativeY = (e.pageY - offset.top);
  
      $.post( "action.php", { mappa: "", x: relativeX, y: relativeY},function(data){
	   
	   $("#wrapper2").html(data);
	  
	  });
	  
	  
	 /*  $.post( "action.php", { mappa2: "" },function(data){
	   
	   $(".result").html(data);
	  
	  });*/
  
    });




</script>
<!-- END CORE TEMPLATE JS -->
</body>
</html>