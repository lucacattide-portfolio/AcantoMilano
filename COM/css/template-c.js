// JavaScript Document

$(document).ready(function() {
	
	// Read More - Visibilità
	
	if ($(".mostre-grid .itemContainer .testoContainer").height() < 132) { // Se il container è più piccolo della misura fissata
		
		$(".read_more").css("display", "none"); // Nasscondi read more
		
	}
	$(".mostre-grid .itemContainer .testoContainer .leggi").on("click tap", function() { // Al click del pulsante
		
		$(this).fadeOut(); // Nascondilo
		
	});
	
	
    $(document).on("click", ".numGiorni .box-intestazione a.arrow", function(){
	 
	 	var dataRiferimento = $(this).attr("rel");
	    var dataId = $(this).attr("data-id");
		
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$(".sezione-calendario1 .numGiorni").empty();
			$(".sezione-calendario1 .numGiorni").fadeIn(500).html( data );
			
			disponibile();
	
		});
		
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario4.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$("#dettagli_contenuti").empty();
			$("#dettagli_contenuti").fadeIn(500).html( data );
			
			disponibile();
	
		});
		
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario5.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$("#titolo_dettagli").empty();
			$("#titolo_dettagli").fadeIn(500).html( data );
			
			disponibile();
	
		});
	
	});
	
	
	
	$(document).on("click", ".numGiorni .calendario .box-int a", function(){
	 
	 	var dataRiferimento = $(this).attr("rel");
	    var dataId = $(this).attr("data-id");
		
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$(".sezione-calendario1 .numGiorni").empty();
			$(".sezione-calendario1 .numGiorni").html( data );
			
			disponibile();
	
		});
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario2.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$(".sezione-calendario1 .lista-blocco").empty();
			$(".sezione-calendario1 .lista-blocco").html( data );
			
			disponibile();
	
		});
		
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario3.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$(".sezione-calendario1 .ajax3").empty();
			$(".sezione-calendario1 .ajax3").html( data );
			
			disponibile();
	
		});
	
	});
	
	
	
    
});


$(window).on("load resize",function(){
	 
	 var heightBox = $(".itemContainer");
	 
	 $(".ImgContent").height(heightBox);
	 
	 
	 if( $(window).width() > 980 ){
	 
		 $(".mostre-grid").mCustomScrollbar({
			  
				axis: "y",
				autoHideScrollbar: true,
				mouseWheel: { 
				
					enable: true,
					axis: "y"	
				},
				theme: "rounded-dark"
			  
			});
	
	  }
	 
	
});