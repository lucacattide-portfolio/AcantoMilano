<div id="container_contenuti" rel="contatti"> <!--Inizio Container contatti -->

	<?php
	
		include ("form.php"); // Inclusione Script Form
		
	?>

    <h1 class="titolo-contatti">
     <center>
      <p>CONTATTI</p>
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
      <p>Raggiungici facilmente con una email, puoi farlo usando il form.</p>
     </center> 
    </div>
    
  
    
    <form class="form-contatti" action="<?php echo @htmlspecialchars($_SERVER['PHP_SELF']."?pag=".$_GET['pag']); ?>" method="post" enctype="application/x-www-form-urlencoded" autocomplete="on">
      <label for="name">
       <p>Il tuo nome</p>
       <input id="name" name="name" type="text" pattern="[a-zA-Zàèìòù' ]+" required placeholder="Inserire il nome (es. Mario Rossi)">
      </label>
      <label for="email">
       <p>La tua e-mail</p>
       <input id="email" name="email" type="email" pattern="^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})" required placeholder="Inserire l'indirizzo e-mail (es. m.rossi@email.it)">
      </label>
      <label for="text">
       <p>Il tuo messaggio</p>
       <textarea id="text" name="text" placeholder="Inserire il testo della richiesta"></textarea>
      </label>
      <label for="check">
       
       <input name="check" id="check" type="checkbox" required>
       Acconsento al trattamento dei dati personali ai sensi del DLgs. 196/03
      </label>
      <button type="submit">Invia</button>
    </form>
    
    <!--Inizio Credits-->
    
    <div id="credits">
    
    	<small>
        
        	Credits by 
        
            <a href="http://www.laboratorio-a.it" title="laboratorio-a" target="new">
            
                laboratorio-a
                
            </a>
            
            <span id="iva_mobile">
            
            	P. IVA 04284580968
            	
			</span>
            
        </small>
    
    </div>
    
    <!--Fine Credits-->

</div> <!--Fine Container contatti -->