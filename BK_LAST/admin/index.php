<!DOCTYPE html>
<html>
<head>
<?php


include("connessione_sql.php"); 

session_start();


if ( isset($_GET["login"]) == "ok" ) {

 $user = $_POST['user'];
 $pass = $_POST['psw'];
 //$pass = md5($_POST['psw']);

    if ( $user != "" && $pass != "" ) {
	
	// effettuo l'escape per i valori speciali per evitare problemi con le query
	
	//pulizia stringhe
	/*$user = mysql_real_escape_string($user);
	$pass = mysql_real_escape_string($pass);*/
	
	}
	else{
		
		echo "Inserisci user e password";
		
    }
	

    $result = $mysqli->query("SELECT * FROM admin WHERE user_admin = '".$user."' AND psw_admin = '".$pass."' ");

    if($result->num_rows < 1) { ?> 

   <meta http-equiv="refresh" content="1; url=index.php "/>

   <?php
   
   
   }
   else{ 

     $resultA = $mysqli->query("SELECT * FROM admin WHERE user_admin = '".$user."' AND psw_admin = '".$pass."' ");
 
     while ($rowA = $resultA->fetch_array()) { 
  
      $idutente = $rowA['id_admin'];

      $nomeutente = $rowA['user_admin'];
   
     }
 
   $_SESSION['id_utente'] = $idutente;

   $_SESSION['nome_utente'] = $nomeutente;
   
   $_SESSION["code"] = session_id();
   
   $_SESSION["lang"] = $_POST["lang"];
   
   


   // e infine reindirizzo l'utente nella pagina protetta da login

     header("location: index1.php");

   }
   
   // ora creo una sessione con l'id dell'utente  che lo farà restare connesso tutto il tempo della navigazione alle pagine protette da login

 
   
} 
?>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Webarch - Responsive Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style_mod.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top">
<div class="container">
  <div class="row login-container column-seperation">  
        
        <!-- logo Aziendale -->
        <div class="col-md-5 col-md-offset-1 login_custom_acanto">
         
          <img src="assets/img/acanto.png" width="200" />
          
        </div>
        <!-- end logo Aziendale -->
        
        <div class="col-md-5 "> <br>
		 <form id="login-form" class="login-form" action="index.php?login=ok" method="post">
		 <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">Username</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="user" id="txtusername" class="form-control">                                 
				</div>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Password</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="psw" id="txtpassword" class="form-control">                                 
				</div>
            </div>
          </div>
          </div>
          <!-- <div class="row">
               <div class="form-group col-md-10">
            <select name="lang">
             <option value="eng">Inglese</option>
             <option value="ita">Italiano</option>
            </select>
          </div> 
          </div> -->
		 
                  
         
          <div class="row">
            <div class="col-md-10">
              <button class="btn btn-primary btn-cons pull-right" name="login" type="submit">Login</button>
            </div>
          </div>
		  </form>
        </div>
     
    
  </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/js/login.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>
</html>