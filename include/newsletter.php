<div id="container_contenuti" rel="newsletter"> <!--Inizio Container Newsletter -->

	<?php
	
		include ("form_newsletter.php"); // Inclusione Script Form 
		
	?>

    <h1 class="titolo-contatti">
     <center>
      <p>NEWSLETTER</p>
     </center>
    </h1>
    
    
    <div class="infoContainer">
     <center>
      
<?php  
	if( $countArticolo >= 1 ):
	  while ($articolo = $rArt->fetch_array()): 
?>
      
      <div class="boxInfo">
        <h2>
         <?php echo $articolo["articolo_titolo"];  ?>
        </h2>
        <hr>
        <h3>
        	<?php echo $articolo["articolo_sottotitolo"];  ?>
        </h3>
      </div>
<?php 
  	  endwhile;
	 endif; 
?>     
     
     </center>
    </div>
    
    
    
    <div class="intestazione-form">
     <center>
      <hr>
       <h4>FORM</h4>
      <hr>
      <p>Tieniti aggiornato sulle nostre iniziative. Iscriviti con una email, puoi farlo usando il form.</p>
     </center> 
    </div>
    
  
    
    <form class="form-newsletter" action="<?php echo $siteurl_base."newsletter"; ?>" method="post" enctype="application/x-www-form-urlencoded" autocomplete="on">
      <label for="email_news">
       <p>La tua e-mail</p>
       <input id="email_news" name="email_news" type="email" pattern="^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})" required placeholder="Inserire l'indirizzo e-mail (es. m.rossi@email.it)">
      </label>
      <label for="check_news">
       
       <input name="check_news" id="check_news" type="checkbox" required>
       Acconsento al trattamento dei dati personali ai sensi del DLgs. 196/03
      </label>
      <button type="submit" name="iscritto">Iscriviti</button>
    </form>

</div> <!--Fine Container Newsletter -->