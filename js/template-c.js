// JavaScript Document

$(document).ready(function() {
	
	
    $(document).on("click", ".numGiorni .box-intestazione a.arrow", function(){
	 
	 	var dataRiferimento = $(this).attr("rel");
	    var dataId = $(this).attr("data-id");
		
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$(".sezione-calendario1 .numGiorni").empty();
			$(".sezione-calendario1 .numGiorni").fadeIn(500).html( data );
	
		});
	
	});
	
	
	
	$(document).on("click", ".numGiorni .calendario .box-int a", function(){
	 
	 	var dataRiferimento = $(this).attr("rel");
	    var dataId = $(this).attr("data-id");
		
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$(".sezione-calendario1 .numGiorni").empty();
			$(".sezione-calendario1 .numGiorni").html( data );
	
		});
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario2.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$(".sezione-calendario1 .lista-blocco").empty();
			$(".sezione-calendario1 .lista-blocco").html( data );
	
		});
		
		
		$.post('http://www.acantomilano.it/beta/include/ajax-calendario3.php', { datarif: ""+ dataRiferimento +"", dataId: ""+ dataId +"" } ).done(function( data ){
			
			$(".sezione-calendario1 .ajax3").empty();
			$(".sezione-calendario1 .ajax3").html( data );
	
		});
	
	});
	
	
	
    
});