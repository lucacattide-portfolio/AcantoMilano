<div id="container_contenuti" rel="contatti"> <!--Inizio Container contatti -->

	<?php
	
		include ("form.php"); // Inclusione Script Form
		
	?>

    <h1 class="titolo-contatti">
     <center>
      <p>CONTACTS</p>
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
      <p>Use the following form to email us, we will get back to you within 24 hours at the most.</p>
     </center> 
    </div>
    
  
    
    <form class="form-contatti" action="<?php echo @htmlspecialchars($_SERVER['PHP_SELF']."?pag=".$_GET['pag']); ?>" method="post" enctype="application/x-www-form-urlencoded" autocomplete="on">
      <label for="name">
       <p>Your name</p>
       <input id="name" name="name" type="text" pattern="[a-zA-Zàèìòù' ]+" required placeholder="Insert name">
      </label>
      <label for="email">
       <p>Your e-mail</p>
       <input id="email" name="email" type="email" pattern="^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})" required placeholder="Insert e-mail (es. m.rossi@email.it)">
      </label>
      <label for="text">
       <p>Your message</p>
       <textarea id="text" name="text" placeholder="Insert message"></textarea>
      </label>
      <label for="check">
       
       <input name="check" id="check" type="checkbox" required>
       I agree Privacy policy DLgs. 196/03
      </label>
      <button type="submit">Send</button>
    </form>
    
    <!--Inizio Credits-->
    
    <div id="credits">
    
    	<small>
        
        	Credits by 
        
            <a href="http://www.laboratorio-a.it" title="laboratorio-a" target="new">
            
                laboratorio-a
                
            </a>
            
            <span id="iva_mobile">
            
            	P. IVA 04396280960
            
			</span>
            
        </small>
    
    </div>
    
    <!--Fine Credits-->

</div> <!--Fine Container contatti -->