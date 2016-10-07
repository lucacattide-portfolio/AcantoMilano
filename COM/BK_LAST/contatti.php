<?php include("admin/connessione_sql.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<title>Acanto</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body id="contatti">

<?php include 'include/menu.php' ?>

<!-- CONTAINER -->
<section class="container" id="page-contatti">

    <!-- BLOCK 1 -->
	<div class="text-block">
        <h2 class="title">contatti</h2>
        <div class="contact">
        	<h3>Indirizzo</h3>
            <hr>
            <?php
                $query = "SELECT * FROM `info` WHERE id_info = 3 "; 
  
                $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ 
				
				
				echo $row["txt_info"];
				
				
				}
				
				?>
                
                
        </div>
        <div class="contact">
        	<h3>telefono</h3>
            <hr>
            <p>
                Per maggiori informazioni, chiamateci al numero
                 <?php
                $query = "SELECT * FROM `info` WHERE id_info = 4 "; 
  
                $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ 
				
				
				echo $row["txt_info"];
				
				
				}
				
				?>
            </p>
        </div>
        <div class="contact">
        	<h3>Email</h3>
            <hr>
            <p>
                Oppure scrivete agli indirizzi e-mail
                 <?php
                $query = "SELECT * FROM `info` WHERE id_info = 5 "; 
  
                $result = $mysqli->query($query); while ( $row = $result->fetch_array()){ 
				
				
				echo $row["txt_info"];
				
				
				}
				
				?>
            </p>
        </div>
        <div class="clear"></div>
    </div>
	<hr>
    
    <!-- BLOCK 2 -->
	<div class="text-block">
        <h2 class="title form">form</h2>
        <h3 class="subtitle">Aperiam, eaque ipsa quae ab  inventore. Nemo ipsam  <br>quia aspernatur dit aut fugit,  sequi nesciunt.</h3>

        <!-- FORM -->
        <?php
            if (isset($_POST['formsend'])){
            
                $txt_mail  = "<b>Nome: </b>".$_POST["nome"]."<br/>";
                $txt_mail .= "<b>E-Mail: </b>".$_POST["email"]."<br/>";
                $txt_mail .= "<b>Messaggio: </b>".$_POST["message"]."<br/><br/>";
                
                $mailTo = "tony.iannelli85@gmail.com";	
                $subject = "Contatto da Acanto";
                
                $headers = "From: ".$_POST["email"]."\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Return-Path: ".$_POST["email"]."\r\n";
                $headers .= "Reply-To: ".$_POST["email"]."\r\n";
                $headers .= "Content-Type: text/html; charset=\"utf-8\"\r\n";
                $headers .= "X-Mailer: PHP v".phpversion()."\r\n";
                $headers .= "Content-Transfer-Encoding: 7bit\n\n";
                
                if(@mail($mailTo, $subject, $txt_mail, $headers)){
                    echo "<div class='invio_ok'>Messaggio inviato con successo!</div>";
                } else {
                    echo "<div class='invio_ok'>Errore durante l'invio!<br>Riprovare o contattate l'amministratore del sito.</div>";
        
                }
            }
        ?>
        
        <form method="post" id="formContatti" name="formContatti" action="contatti.php" enctype="multipart/form-data">
            <input type="hidden" name="formsend" value="1">
            <input type="hidden" name="formtype" value="Contatti">
            <label id="field1">Il tuo nome *</label>
            <input id="nome" name="nome" type="text" />
            <label id="field2">La tua Email *</label>
            <input id="email" name="email" type="email" />
            <label id="field3">Il tuo messaggio *</label>
            <textarea id="message" name="message"></textarea>
            <div class="privacy"><input id="dati-personali" name="dati-personali" type="checkbox" checked /><span id="txtdati">Acconsento al trattamento dei dati personali</span></div>
            <div class="send"><input id="inviaform" type="button" value="invia" /></div>
            <p>* campi obbligatori</p> 
            <div class="clear"></div>
        </form>
    </div>
    
    <?php include 'include/social.php' ?>

</section>

<?php include 'include/script.php' ?>

</body>
</html>
