<!--Inizio Containers-->
    
<div id="container_menu" class="<?php if( $_SESSION['vista'] == 0 ): if( $pag == 1 || $pag == "" ):  ?>container_chiuso<?php else:  endif; endif; ?>"> <!--Menu-->

    <?php
    
        include "menu.php"; // Inclusione Menu Principale
        
    ?>
    
    <div id="separatore_menu" class="<?php if( $_SESSION['vista'] == 0 ): if( $pag == 1 || $pag == "" ):  ?>separatore_out<?php else:  endif; endif; ?>"> <!--Separatore-->
    </div>

</div>

<div id="container" class="<?php if( $_SESSION['vista'] == 0 ): if( $pag == 1 || $pag == "" ):  ?>container_full<?php else:  endif; endif; ?> animated fadeIn"> <!--Contenuti-->

<!--Inizio Prenota Popup-->

<aside id="prenota_popup" class="secondo_piano">
</aside>

<!--Fine Prenota Popup-->