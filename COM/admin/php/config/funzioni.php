<?php 

/* LISTA QUERY DIVISE PER PAGINE */

if($pag == "account"):

	$sqlAccount = "SELECT * FROM `admin`"; 

	$rAccount = $mysqli->query($sqlAccount);

	$countAccount =  $rAccount->num_rows;

endif;

if($pag == "pagina" || $pag == "" ):

	$sqlPagina = "SELECT * FROM `pagina`"; 

	$rPagina = $mysqli->query($sqlPagina);
	
	$sqlPagina2 = "SELECT * FROM `pagina`"; 

	$rPagina2 = $mysqli->query($sqlPagina);
	
	$sqlPagina3 = "SELECT * FROM `pagina`"; 

	$rPagina3 = $mysqli->query($sqlPagina);

	$countPagina =  $rPagina->num_rows;

endif;

if($pag == "categorie"):

	$sqlCategoria = "SELECT * FROM `categoria`"; 

	$rCategoria = $mysqli->query($sqlCategoria);

	$countCategoria = $rCategoria->num_rows;

endif;

if( $pag == "crea-pagina" ):

   $sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ";
   
   $rArticolo = $mysqli->query($sqlArticolo);
   
   $countArticolo =  $rArticolo->num_rows;
   
endif;


?>