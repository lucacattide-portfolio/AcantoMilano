<!--Inizio Containers-->
    
<div id="container_menu" class="<?php if( $_SESSION['vista'] >= 0 ): if( $pag == 1 || $pag == "" ):  ?>container_chiuso<?php else:  endif; endif; ?> occulta"> <!--Menu-->

    <?php
    
        include "menu.php"; // Inclusione Menu Principale
        
    ?>
    
    <div id="separatore_menu" class="<?php if( $_SESSION['vista'] >= 0 ): if( $pag == 1 || $pag == "" ):  ?>separatore_out<?php else:  endif; endif; ?>"> <!--Separatore-->
    </div>

</div>

<div id="container" class="<?php if( $_SESSION['vista'] >= 0 ): if( $pag == 1 || $pag == "" ):  ?>container_full<?php else:  endif; endif; ?> animated fadeIn occulta"> <!--Contenuti-->