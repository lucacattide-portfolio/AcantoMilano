<!doctype html> <!--Dichiarazione DOCTYPE-->

<!--Inizio HTML-->

<html>

    <!--Inizio Head-->
    
    <head>
    
        <!--Inizio Meta Tags-->
    
        <meta charset="utf-8"> <!--Impostaizione Codifica Caratteri-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Compatibilità Explorer-->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> <!--Impostazione Viewport-->
        
        <title>Shubiri | Amministrazione</title> <!--Titolo-->
        
        <!--Fine Meta Tags-->
        
        <!--Inizio Inclusioni CSS-->
        
        <!--Inizio Template-->
        
        <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
        <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="css/animate.css">
        <link type="text/css" rel="stylesheet" href="css/layout.css">
        <link type="text/css" rel="stylesheet" href="css/components.css">
        <link type="text/css" rel="stylesheet" href="css/widgets.css">
        <link rel="stylesheet" type="text/css" href="css/components.css" />
        <link type="text/css" rel="stylesheet" href="css/plugins.css">
        <link type="text/css" rel="stylesheet" href="css/pages.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap-extend.css">
        <link type="text/css" rel="stylesheet" href="css/common.css">
        <link type="text/css" rel="stylesheet" href="css/responsive.css">
        <link type="text/css" rel="stylesheet" href="css/basic.css">
        <link type="text/css" rel="stylesheet" href="css/basic.min.css">
        <link type="text/css" rel="stylesheet" href="css/dropzone.css">
        <link type="text/css" rel="stylesheet" href="css/dropzone.min.css">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/style_custom.css">
        
        
        <!--Fine Template-->
        
        <link type="text/css" rel="stylesheet" href="css/style_custom.css"> <!--CSS Custom-->
        <link rel="icon" type="image/png" href="favicon.png" /> <!--FavIcon-->
        
        <!--Fine Inclusioni CSS-->
        
    </head>
    
    <!--Fine Head-->
    
    <!--Inizio Body-->
    
    <body class="leftbar-view">

    <!--Topbar Start Here-->
    
    <header class="topbar clearfix"> 
      
      <!--Topbar Left Branding With Logo Start-->
      
      <div class="topbar-left pull-left">
        <div class="clearfix">
        
          <ul class="left-branding pull-left clickablemenu ttmenu dark-style menu-color-gradient">
          
            <li>
            
              <span class="left-toggle-switch">
                
                <i class="zmdi zmdi-menu"> <!--Icona-->
                </i>
              
              </span> 
            
            </li>
            
            <!--Inizio Logo-->
           
            <span class="logo"> 
            
                <a href="index.php" title="Shubiri"> 
         
                	<img src="images/logo_shubiri.svg" alt="Shubiri" /> 
                     
                </a> 
                
            </span> 
            
            <!--Fine Logo-->
           
          </ul>
          
          <!--Mobile Search and Rightbar Toggle-->
          
          <ul class="branding-right pull-right">
          
            <li>
            
            	<a href="#" class="btn-mobile-search btn-top-search">
                
                	<i class="zmdi zmdi-search">
                    </i>
                    
                </a>
                
            </li>
            <li>
            
            	<a href="#" class="btn-mobile-bar">
                
                	<i class="zmdi zmdi-menu">
                    </i>
                    
                </a>
                
            </li>
          
          </ul>
          
        </div>
      </div>
      
      <!--Topbar Left Branding With Logo End--> 
      
      <?php
	  
	  		include "moduli/toolbar.php"; // Inclusione Modulo Toolbar
      
	  ?>
      
    </header>
    
    <!--Topbar End Here--> 
    
    <!--Leftbar Start Here-->
    
    <aside class="leftbar material-leftbar">
    
      <div class="left-aside-container"> 
             
        <?php 
		
			include("moduli/toolbar-menu.php"); // Inclusione Modulo Menu
			
		?>

        <div class="tabby-leftbar">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="menu">
            
            	<!--Inizio Voci-->
            
                <ul class="list-accordion">
                
                    <li class="list-title">
                    
                        Sezioni
                        
                    </li>
                    <li class="list-title">
                    
                        <a href="index.php?pag=pagina">
                        
                            Gestisci Pagine
                            
                        </a>
                        
                    </li>
                    <li class="list-title">
                    
                        <!-- Categorie -->
                        
                        IN EVIDENZA
                        
                    </li>
                    <li class="list-title">
                    
                        <a href="index.php?pag=categorie">
                        
                            BOX HOME - COPERTINE
                            
                        </a>
                        
                    </li>
                    <li class="list-title">
                    
                        Pagine
                        
                    </li>
                    <li class="acc-parent active"> 
                    
                        <a href="#" class="acc-parent active">
                    
                            <i class="zmdi zmdi-link"> <!--Icona-->
                            </i>
                            
                            <span class="list-label">
                            
                                Pagine attive
                                
                            </span>
                        
                        </a>
                      
                        <ul style="display: block;">
                        
                        	<!--Inizio Inclusione Dati-->
                        
                            <?php
                            
                                $sqlListPagina = "SELECT * FROM `pagina`"; // Assegnazione Query
                                $rListPagina = $mysqli->query($sqlListPagina); // Assegnazione esecuzione Query
                                $countListPagina =  $rListPagina->num_rows; // Assegnazione conteggio records
								
                                if ($countListPagina >= 1): // Se esiste almeno un record
								
                                	while ($rowListPagina = $rListPagina->fetch_array()): // Finchè esistono dati nei record allora stampa i dati
                            
                            ?>
                            
                            <li > 
                            
                            	<a <?php if( $rowListPagina["pagina_id"] == $_GET["id"] && $pag == "crea-pagina" ): ?>  class="active" <?php endif; ?> href="index.php?pag=crea-pagina&id=<?php echo $rowListPagina["pagina_id"];  ?>">
                                
                                	<i class="zmdi zmdi-link">
                                    </i> 
									
									<?php 
									
										echo $rowListPagina["pagina_url"]; // Stampa URL
										
									?> 
                                    
                                </a> 
                                
                            </li>
                        	
							<?php 
							
									endwhile; 
								
								endif;  
								
							?>
                                
                            <!--Fine Inclusione Dati-->
                            
                      </ul>
                      
                    </li>
                    
                </ul>
                
                <!--Fine Voci-->
                
            </div>
        </div>
      </div>
      
    </aside>
    
    <!--Leftbar End Here--> 

    <!--Page Container Start Here-->
    
    <section class="main-container">
    
        <div class="container-fluid">
        
        	<!--Inizio Inclusione Sezioni-->
        
			<?php 
                      
                 switch($pag):
                 
                    case "":
                    
                        include("pagina.php");
						
                        break;
        
                    case "account":
					
                     	include("account.php");
						
						break;
                    
                    case "pagina":
                     
					 	include("pagina.php");
                    
						break;
                    
                    case "crea-pagina":
					
                     	include("crea-pagina.php");
                    
						break;
						
					case "categorie":
					
                     	include("categorie.php");
                    
						break;	
                     
                 endswitch;	 
                        
            ?>
            
            <!--Fine Inclusione Sezioni-->
            
        </div>
      
    </section>
    
    <!--Page Container End Here-->
    
	<?php
	
		include "moduli/footer.php";
		
	?>
    
    <!--Rightbar Start Here-->
    
    <aside class="rightbar">
    
      <div class="rightbar-container">
        <div class="aside-chat-box">
          <div class="coversation-toolbar">
            <div class="chat-back"> 
            
            	<i class="zmdi zmdi-long-arrow-left">
                </i> 
                
            </div>
            <div class="active-conversation">
              <div class="chat-avatar"> 
              	
                <img src="images/avatar/amarkdalen.jpg" alt="user"> 
                </div>
              
              <div class="chat-user-status">
              
                <ul>
                  <li>Feeling Blessed</li>
                  <li>Amarkdalen</li>
                  
                </ul>
              
              </div>
            </div>
            <div class="conversation-action">
              <ul>
                <li class="dropdown"> <a href="#" class="btn-more dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><i class="zmdi zmdi-attachment-alt"></i>Allega File</a></li>
                    <li><a href="#"><i class="zmdi zmdi-mic"></i>Voce</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <div class="conversation-container">
            <div class="conversation-row even">
              <ul class="conversation-list">
                <li>
                  <p> Hi! this is mike how can I help you? </p>
                </li>
                <li>
                  <p> Hello Sir! </p>
                </li>
              </ul>
            </div>
            <div class="conversation-row odd">
              <ul class="conversation-list">
                <li>
                  <p> Hi! Mike I need a support my account is suspended but I don't know why? </p>
                </li>
              </ul>
            </div>
            <div class="conversation-row even">
              <ul class="conversation-list">
                <li>
                  <p> Ok Sir! Let me check this issue please wait a min </p>
                </li>
              </ul>
            </div>
            <div class="conversation-row odd">
              <ul class="conversation-list">
                <li>
                  <p> Ok sure :) </p>
                </li>
              </ul>
            </div>
          </div>
          <div class="chat-text-input">
            <input type="text" class="form-control">
          </div>
        </div>
        <ul class="nav nav-tabs material-tabs rightbar-tab" role="tablist">
          <li class="active"><a href="#chat" aria-controls="message" role="tab" data-toggle="tab">Ticket</a></li>
          <li><a href="#activities" aria-controls="notifications" role="tab" data-toggle="tab">Attività</a></li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="chat">
            <div class="chat-user-container">
              <h3 class="clearfix"><span class="pull-left">Operatori</span><span class="pull-right online-counter">3 Online</span></h3>
              <ul class="chat-user-list">
                <li>
                  <div data-trigger="hover" title="Robertoortiz" data-content="<div class='chat-user-info'>
                                            <div class='chat-user-avatar'>
                                            <img src='images/avatar/robertoortiz.jpg' alt='Avatar'>
                                            </div>
                                            <div class='chat-user-details'>
                                            <ul>
                                            <li>Stato: <span>Online</span></li>
                                            <li>Ruolo: <span>(Ruolo -> Amministratore | Utente)</span></li>
                                            <li></li>
                                            </ul>
                                            </div>
                                            </div>
                                            " data-placement="left"><span class="chat-avatar"><img src="images/avatar/robertoortiz.jpg" alt="Avatar"></span><span class="chat-u-info">Adellecharles<cite>New York</cite></span> </div>
                  <span class="chat-u-status"><i class="fa fa-circle"></i></span> </li>
                <li class="chat-u-online">
                  <div data-trigger="hover" title="Kurafire" data-content="<div class='chat-user-info'>
                                             <div class='chat-user-avatar'>
                                            <img src='images/avatar/robertoortiz.jpg' alt='Avatar'>
                                            </div>
                                            <div class='chat-user-details'>
                                            <ul>
                                            <li>Stato: <span>Online</span></li>
                                            <li>Ruolo: <span>(Ruolo -> Amministratore | Utente)</span></li>
                                            <li></li>
                                            </ul>
                                            </div>
                                            </div>
                                            " data-placement="left"><span class="chat-avatar"><img src="images/avatar/kurafire.jpg" alt="Avatar"></span><span class="chat-u-info">Kurafire<cite>New York</cite></span> </div>
                  <span class="chat-u-status"><i class="fa fa-circle"></i></span> </li>
                <li class="chat-u-busy">
                  <div data-trigger="hover" title="Joostvanderree" data-content="<div class='chat-user-info'>
                                            <div class='chat-user-avatar'>
                                            <img src='images/avatar/robertoortiz.jpg' alt='Avatar'>
                                            </div>
                                            <div class='chat-user-details'>
                                            <ul>
                                            <li>Stato: <span>Online</span></li>
                                            <li>Ruolo: <span>(Ruolo -> Amministratore | Utente)</span></li>
                                            <li></li>
                                            </ul>
                                            </div>
                                            </div>
                                            " data-placement="left"> <span class="chat-avatar"><img src="images/avatar/joostvanderree.jpg" alt="Avatar"></span><span class="chat-u-info">Joostvanderree<cite>New York</cite></span> </div>
                  <span class="chat-u-status"><i class="fa fa-circle"></i></span> </li>
              </ul>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="activities">
            <div class="activities-timeline">
              <h3 class="tab-pane-header">Attività Recenti</h3>
              <ul class="activities-list">
                <li>
                  <div class="activities-badge"> <span class="w_bg_amber"><i class="zmdi zmdi-ticket-star"></i></span> </div>
                  <div class="activities-details">
                    <h3 class="activities-header"><a href="#">Resolved Tickets #LTK7865</a></h3>
                    <div class="activities-meta"> <i class="fa fa-clock-o"></i> 30 min ago </div>
                  </div>
                </li>
                <li>
                  <div class="activities-badge"> <span class="w_bg_cyan"><i class="zmdi zmdi-file-plus"></i></span> </div>
                  <div class="activities-details">
                    <h3 class="activities-header"><a href="#">Files Uploaded</a></h3>
                    <div class="activities-meta"> <i class="fa fa-clock-o"></i> 1 hour ago </div>
                    <div class="activities-post">
                      <ul class="new-file-lists">
                        <li><a href="#"><i class="fa fa-file-text"></i> change-log.txt</a></li>
                        <li><a href="#"><i class="fa fa-file-audio-o"></i> skype-conversation.mp3</a></li>
                        <li><a href="#"><i class="fa fa-file-powerpoint-o"></i> presentation.ppt</a></li>
                        <li><a href="#"><i class="fa fa-file-video-o"></i> howtouse.avi</a></li>
                        <li><a href="#"><i class="fa fa-file-image-o"></i> screenshot.jpg</a></li>
                        <li><a href="#"><i class="fa fa-file-word-o"></i> nda.doc</a></li>
                        <li><a href="#"><i class="fa fa-file-pdf-o"></i> resume.pdf</a></li>
                        <li><a href="#"><i class="fa fa-file-archive-o"></i> all-files.zip</a></li>
                        <li><a href="#"><i class="fa fa-file-excel-o"></i> bill.xls</a></li>
                        <li><a href="#">+10</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="activities-badge"> <span class="w_bg_light_blue"><i class="zmdi zmdi-image"></i></span> </div>
                  <div class="activities-details">
                    <h3 class="activities-header"><a href="#">Images Uploaded</a></h3>
                    <div class="activities-meta"> <i class="fa fa-clock-o"></i> July 22 at 1:12pm </div>
                    <div class="activities-post">
                      <ul class="new-image-lists">
                        <li><a href="#"><img src="images/img-1-thumb.jpg" alt="image"></a></li>
                        <li><a href="#"><img src="images/img-2-thumb.jpg" alt="image"></a></li>
                        <li><a href="#"><img src="images/img-3-thumb.jpg" alt="image"></a></li>
                        <li><a href="#" class="more-list"><i class="zmdi zmdi-more-horiz"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="activities-badge"> <span class="w_bg_green"><i class="zmdi zmdi-accounts-alt"></i></span> </div>
                  <div class="activities-details">
                    <h3 class="activities-header"><a href="#">Users Approved</a></h3>
                    <div class="activities-meta"> <i class="fa fa-clock-o"></i> July 22 at 1:12pm </div>
                    <div class="activities-post">
                      <ul class="new-user-lists">
                        <li><a href="#"><img src="images/avatar/oykun.jpg" alt="image"></a></li>
                        <li><a href="#"><img src="images/avatar/mds.jpg" alt="image"></a></li>
                        <li><a href="#"><img src="images/avatar/robertoortiz.jpg" alt="image"></a></li>
                        <li><a href="#" class="more-list"><i class="zmdi zmdi-more-horiz"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="activities-badge"> <span class="w_bg_deep_purple"><i class="zmdi zmdi-file-text"></i></span> </div>
                  <div class="activities-details">
                    <h3 class="activities-header"><a href="#">Post New Article</a></h3>
                    <div class="activities-meta"> <i class="fa fa-clock-o"></i> July 22 at 1:12pm </div>
                    <div class="activities-post">
                      <ul class="new-post-lists">
                        <li><a href="#">Man in the Verde Valley</a></li>
                        <li><a href="#">Sinagua Pueblo Life</a></li>
                        <li><a href="#">Montezuma Well</a></li>
                        <li><a href="#">The Natural Scene</a></li>
                        <li><a href="#">+6</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="activities-badge"> <span class="w_bg_teal"><i class="zmdi zmdi-comments"></i></span> </div>
                  <div class="activities-details">
                    <h3 class="activities-header"><a href="#">Comments Replied</a></h3>
                    <div class="activities-meta"> <i class="fa fa-clock-o"></i> July 22 at 1:12pm </div>
                    <div class="activities-post">
                      <ul class="new-comments-lists">
                        <li><a href="#">As long as you are reasonably careful about where you step and avoid putting ...</a></li>
                        <li><a href="#">Montezuma Castle is 5 miles north of Camp Verde, 60 miles south...</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </aside>
    
    <!--MODAL FORM AGGIORNAMENTO-->
    
    <aside>
    
      <div class="dialogWindowMod">
    
        <div class="modal-dialog">
        </div>
    
      </div>
    
    </aside>
    
    <!--END MODAL FORM AGGIORNAMENTO--> 
    
    <!--Rightbar End Here--> 
    
    <!--Inizio Inclusioni JavaScript-->
    
    <!--Inizio Plugins-->
    
    <script src="js/lib/jquery.js">
    </script> 
    <script src="js/lib/jquery-migrate.js">
    </script> 
    <script src="js/lib/bootstrap.js">
    </script> 
    <script src="js/lib/jquery.ui.js">
    </script> 
    <script src="js/lib/jRespond.js">
    </script> 
    <script src="js/lib/nav.accordion.js">
    </script> 
    <script src="js/lib/hover.intent.js">
    </script> 
    <script src="js/lib/hammerjs.js">
    </script> 
    <script src="js/lib/jquery.hammer.js">
    </script> 
    <script src="js/lib/jquery.fitvids.js">
    </script> 
    <script src="js/lib/scrollup.js">
    </script> 
    <script src="js/lib/smoothscroll.js">
    </script> 
    <script src="js/lib/jquery.slimscroll.js">
    </script> 
    <script src="js/lib/jquery.syntaxhighlighter.js">
    </script> 
    <script src="js/lib/velocity.js">
    </script> 
    <script src="js/lib/smart-resize.js">
    </script> 
    
    <!--Ui Elements--> 
    
    <script src="js/lib/jquery.tagsinput.js">
    </script> 
    <script src="js/lib/bootbox.js">
    </script> 
    <script src="js/lib/jquery.mask.js">
    </script> 
    <script src="js/lib/jquery.bootstrap-touchspin.js">
    </script> 
    <script src="js/lib/bootstrap-filestyle.js"></script> 
    <script src="js/lib/selectize.js">
    </script> 
    <script src="js/tiny_mce/tiny_mce.js">
    </script> 
    <script src="js/lib/bootstrap-datepicker.js">
    </script>
    <script src="js/lib/icheck.js">
    </script>
    
    <!--Forms--> 
    
    <script src="js/lib/jquery.maskedinput.js">
    </script> 
    <script src="js/lib/jquery.validate.js">
    </script> 
    <script src="js/lib/jquery.form.js">
    </script> 
    <script src="js/lib/j-forms.js">
    </script> 
    <script src="js/lib/jquery.loadmask.js">
    </script> 
    <script src="js/apps.js">
    </script> 
    <script src="js/lib/dropzone-amd-module.js">
    </script>
    <script src="js/lib/dropzone.js">
    </script>
    <script src="js/lib/jquery.sortable.min.js" type="text/javascript">
    </script>
    
    <!--Fine Plugins-->
    
    <!--AJAX--> 
   <script type="text/javascript">
	
    
/* DOCUMENT READY */
$(document).ready(function(e) {
	
	
	
// DATEPIKER ///////////////////////////////////////////////////////////////

$('.addon-datepickers').DatePicker({
	orientation: "bottom",
	daysOfWeekDisabled: "1",
	calendarWeeks: true,
	autoclose: true,
	todayHighlight: true,
	format: "yyyy-mm-dd"
});	

// UPLOAD NEW IMG ON ARTICLE ///////////////////////////////////////////////////

$(".fileUpload2").on('change', function () {
  var fileCount = $(this)[0].files.length;
  var relAttr = $(this).attr("rel");
  for(  var i = 0; i < fileCount; i++   ){
	
	if (typeof (FileReader) != "undefined") {

		var image_holder = $(".image-holder2[rel="+ relAttr +"] .row");
		image_holder.empty();

		var reader = new FileReader();
		reader.onload = function (e) {
			
			$("<div class='col-sm-6 col-md-6 nopadding'><img class='thumb-image col-md-12' src='" + e.target.result +"' /></div>").appendTo(image_holder);

		}
		image_holder.show();
		reader.readAsDataURL($(this)[0].files[i]);
	} else {
		alert("This browser does not support FileReader.");
	}
   }
});
	
	
// EDITOR TESTO ///////////////////////////////////////////////////////////////
	 tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        
        // Theme options
		theme_advanced_buttons1 : "bold,italic,underline,|,cut,copy,pastetext,pasteword,|,styleselect,forecolor,|,link,unlink,image,code,|,forecolor|,fullscreen",
        //theme_advanced_buttons2 : "",
        //theme_advanced_buttons3 : "",
        //theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
		style_formats: [
			    {title : 'Bold text', inline : 'b'},
                {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
                {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
                {title : 'Example 1', inline : 'span', classes : 'example1'},
                {title : 'Example 2', inline : 'span', classes : 'example2'},
		  ],

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",
      });

	
	  
// EVENTI ///////////////////////////////////////////////////////////////////   

	  /* VARIABILE PASSAGGIO VALORI FORM DI MODIFICA */
	  $(document).on("click", 'a.modifica', function(e){
			 e.preventDefault(); 
			 var modId = $(this).parents();
			 var ID = modId.children(".formElement .idSelection").val();
			 $(".dialogWindowMod .modal-dialog").addClass("mWidth"); 
			 $.post("php/config/forms_modifica.php", { pag: "<?php echo $pag; ?>", id:ID, accesso: "<?php echo $_SESSION["accesso"]; ?>"  }, function(data){
			  $(".dialogWindowMod .modal-dialog").empty();	
			  $(".dialogWindowMod .modal-dialog").html(data);
			  $(".dialogWindowMod .modal-header .bootbox-close-button, .chiudi").on("click", function(){
				  $(".dialogWindowMod").fadeOut(1000);
				  $(".dialogWindowMod").removeClass("mWidth"); 
			  });
			     /**
				   * Tags Input
				   * jquery.tagsinput.js
				   * tagsinput.css
				   * */
				  if ($.fn.tagsInput) {
					  $('.tags-input').each(function() {
						  var tagsType = $(this).data('type')
						  var highlightColor = $(this).data('highlight-color')
						  if (tagsType === 'tags') {
							  $(this).tagsInput({
								  width: 'auto'
							  });
						  }
						  if (tagsType === 'highlighted-tags') {
							  $(this).tagsInput({
								  width: 'auto',
								  onChange: function(elem, elem_tags) {
									  var languages = ['php', 'ruby', 'javascript'];
									  $('.tag', elem_tags).each(function() {
										  if ($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0) $(this).css('background-color', highlightColor);
									  });
								  }
							  });
						  }
					  });
				  }
			 });
			 $(".dialogWindowMod").fadeToggle(1000);
			  
					 
	  });
	  
	  
	  
	  /* VARIABILE PASSAGGIO VALORI FORM DI AGGIUNTA */
	  $(document).on("click", 'a.aggiungi', function(e){
			 e.preventDefault();
			 $(".dialogWindowMod .modal-dialog").addClass("mWidth"); 
			 $.post("php/config/forms_aggiungi.php", { pag: "<?php echo $pag; ?>", id: "<?php if(empty($_GET["id"])):  else: echo $_GET["id"]; endif; ?>" }, function(data){
			  $(".dialogWindowMod .modal-dialog").empty();	
			  $(".dialogWindowMod .modal-dialog").html(data);
			  
			  // DATEPIKER ///////////////////////////////////////////////////////////////

			  $('.addon-datepickers').DatePicker({
				  orientation: "bottom",
				  daysOfWeekDisabled: "1",
				  calendarWeeks: true,
				  autoclose: true,
				  todayHighlight: true,
				  format: "yyyy-mm-dd"
			  });	
			  
			  $(".dialogWindowMod .modal-header .bootbox-close-button").on("click", function(){
				  $(".dialogWindowMod").fadeOut(1000);
				  $(".dialogWindowMod").removeClass("mWidth"); 
			  });
			  
			  // EDITOR TESTO ///////////////////////////////////////////////////////////////
			   tinyMCE.init({
				  // General options
				  mode : "textareas",
				  theme : "advanced",
				  plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
				  
				  // Theme options
				  theme_advanced_buttons1 : "bold,italic,underline,|,cut,copy,pastetext,pasteword,|,styleselect,forecolor,|,link,unlink,image,code,|,forecolor|,fullscreen",
				  //theme_advanced_buttons2 : "",
				  //theme_advanced_buttons3 : "",
				  //theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
				  theme_advanced_toolbar_location : "top",
				  theme_advanced_toolbar_align : "left",
				  theme_advanced_statusbar_location : "bottom",
				  theme_advanced_resizing : true,
				  style_formats: [
						  {title : 'Bold text', inline : 'b'},
						  {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
						  {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
						  {title : 'Example 1', inline : 'span', classes : 'example1'},
						  {title : 'Example 2', inline : 'span', classes : 'example2'},
					],
		  
				  // Example content CSS (should be your site CSS)
				  content_css : "css/example.css",
		  
				  // Drop lists for link/image/media/template dialogs
				  template_external_list_url : "js/template_list.js",
				  external_link_list_url : "js/link_list.js",
				  external_image_list_url : "js/image_list.js",
				  media_external_list_url : "js/media_list.js",
				});
				
		
		 		$("#fileUpload").on('change', function () {
                    var fileCount = $(this)[0].files.length;
					for(  var i = 0; i < fileCount; i++   ){
					  
					  if (typeof (FileReader) != "undefined") {
			   
						  var image_holder = $("#image-holder .row");
						  image_holder.empty();
			   
						  var reader = new FileReader();
						  reader.onload = function (e) {
							  
							  $("<div class='col-sm-6 col-md-6 nopadding'><img class='thumb-image col-md-12' src='" + e.target.result +"' /></div>").appendTo(image_holder);
			   
						  }
						  image_holder.show();
						  reader.readAsDataURL($(this)[0].files[i]);
					  } else {
						  alert("This browser does not support FileReader.");
					  }
					 }
				  });
							  
			     
			     /**
				   * Tags Input
				   * jquery.tagsinput.js
				   * tagsinput.css
				   * */
				  if ($.fn.tagsInput) {
					  $('.tags-input').each(function() {
						  var tagsType = $(this).data('type')
						  var highlightColor = $(this).data('highlight-color')
						  if (tagsType === 'tags') {
							  $(this).tagsInput({
								  width: 'auto'
							  });
						  }
						  if (tagsType === 'highlighted-tags') {
							  $(this).tagsInput({
								  width: 'auto',
								  onChange: function(elem, elem_tags) {
									  var languages = ['php', 'ruby', 'javascript'];
									  $('.tag', elem_tags).each(function() {
										  if ($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0) $(this).css('background-color', highlightColor);
									  });
								  }
							  });
						  }
					  });
				  }				   
			 });
			 $(".dialogWindowMod").fadeToggle(1000);
					 
	  });

	  // SUBMIT FORM
	  $(document).on("submit", '.formElement', function(e) {
			e.preventDefault(); 
			var data = new FormData(this);
			
			if( $(".formElement .required").val() != "" ){
			
				  $.ajax({
					  url: 'php/config/ajax.php',
					  data: data,
					  cache: false,
					  contentType: false,
					  processData: false,
					  dataType: "html",
					  type: 'POST',
					  success: function(data) {
						bootbox.alert(""+data+"", function () {});
						$.post("php/config/caricamento.php", {pag: "<?php echo $pag; ?>"}, function(data){
						  $(".insertContentQuery").empty();	
						  $(".insertContentQuery").html(data);
						  $(".dialogWindowMod").removeClass("mWidth"); 
						  $(".dialogWindowMod").fadeOut(1000);	
						});
						$(".bootbox.modal, .modal-footer button, .modal-body button").on("click",function(){
						   location.reload();
						});
					  }
				 });
				 
		     }else{
				 
				 
				 $(".formElement .req").css({"border":"1px solid #FAA"});
				
			 }		 
				 
	   }); 
	   
	   //SORTABLE TAB
	   $('.thumbnail-sortable').sortable({
           placeholderClass: 'col-md-12 margin-auto-sortable',
       });
	   
	   //SORTABLE IMAGES UPDATE
	   $('.thumbnail-img-sortable').sortable({
           placeholderClass: 'col-md-6 margin-auto-sortable',
       });
	   
	   
	  
	      
  });	
 

</script>
</body>
</html>