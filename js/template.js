<!--

<!--Inizio Template-->

$(document).ready(function() {
    
	inizializza(); // Funzione Inizializzazione
	transizioni(); // Funzione Transizioni
	
});


// Funzione Inizializzazione

function inizializza() {
	
	// Carousel Home
	
	$('#home_slides').superslides({
		
		animation: "fade",
		play: 3000,
		pagination: true
		
	});
	
	// Carousel News
	
	$('#news_slides').superslides({
		
		animation: "slide",
		pagination: false,
		play: 5000
		
	});
	
	// Menu Principale
	
	//$('.toggle-menu').jPushMenu();
	
}


// Funzione Transizioni 

function transizioni() {
	
	$("#pulsante_menu").on("click tap", function() { // Al click del pulsante
		
		$("#container").toggleClass("menu_attivo"); // Riduci margine
		$(this).toggleClass("pulsante_attivo"); // "
		$("#freccia_menu").toggleClass("animated flip"); // Anima icona
		
	});	
	$("#menu_lingua li").on("click tap", function() { // Al click sulla voce
	
		$(this).siblings().removeClass("lingua_attiva"); // Rimuovi precedenti selezioni
		$(this).addClass("lingua_attiva"); // Rendi la voce attiva
		
	});
	
}

<!--Fine Template-->

//-->