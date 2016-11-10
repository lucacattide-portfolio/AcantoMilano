// JavaScript Document

$(document).ready(function() {
	
	// Read More - Visibilità
	
	$(".mostre-grid .itemContainer").each(function() { // Per ogni articolo
				
		if ($('.testoContainer .big', this).prop('scrollHeight') > $('.testoContainer', this).prop('clientHeight')) {// Se il container ha del contenuto in overflowing

			$('.gradiente_testo', this).removeClass("nascondi"); // Aggiungi gradiente
			
		} else { 
		
			$(".read_more", this).addClass("nascondi");

		}
		if (($(this).height() < 388 && $(window).height() > 640)) { // Se il container è più piccolo della misura fissata

			$(this).addClass("spazio_read");  // Aumenta spaziatura container
			//$(".read_more", this).css("display", "none"); // Nasscondi read more

		} else if ((($(this).height() < 388) || ($(".ImgContent", this).height() < 388)) && $(".testoContainer", this).height() < 320 && $(".testoContainer", this).height() < 320 && $(window).height() <= 700) { // Altrimenti Se il container o l'immagine è più piccolo della misura fissata
			
			$(this).addClass("spazio_read"); // Aumenta spaziatura container
			//$(".read_more", this).css("display", "none"); // Nasscondi read more

		} else if ($(this).height() < 388 && $(".testoContainer", this).height() >= 320 && $(window).height() <= 700) { // Altrimenti Se il container o l'immagine è più piccolo della misura fissata
			
			$(this).addClass("spazio_read"); // Aumenta spaziatura container

		}
		
	});
	$(".read_more").on("click tap", function() { // Al click del pulsante
		
		$(this).fadeOut(); // Nascondilo
		$(this).siblings(".mostre-grid .itemContainer .testoContainer").addClass("tutto_leggi"); // Allarga box
		$(this).siblings('.testoContainer').find(".gradiente_testo").addClass("nascondi"); // Rimuovi gradiente

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