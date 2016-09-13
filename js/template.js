<!--

$(document).ready(function() {
    
	inizializza(); // Funzione Inizializzazione
	transizioni(); // Funzione Transizioni
	navigazione(); // Funzione Navigazione
	
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
	
	// Menu Principale - Voce Attiva
	
	/*$.each($("#menu_voci a"), function() { // Per ogni voce del menu
	
		$(this).siblings().removeClass("voce_attiva"); // Deseleziona altre voci
		
		if ($("#container").find($(this).attr("rel").length > 0)) { // Se il contenuto caricato corrisponde ad una voce del menu
			
			$(this).addClass("voce_attiva"); // Allora rendila attiva

		}	
		
	});*/
	
}


// Funzione Transizioni 

function transizioni() {
	
	// Menu Principale
	
	$("#pulsante_menu").on("click tap", function() { // Al click del pulsante
		
		//$("#container").toggleClass("menu_attivo"); // Riduci margine
		$(this).toggleClass("pulsante_attivo"); // "
		$("#freccia_menu").toggleClass("freccia_attiva"); // Anima icona
		$("#container_menu").toggleClass("container_chiuso"); // Nasconde Menu
		$("#menu_voci").toggleClass("container_chiuso"); // Nasconde Voci
		$("#links_outbound").toggleClass("container_chiuso"); // Nasconde Links Outbound
		$("#separatore_menu").toggleClass("separatore_out"); // Nasconde Separatore
		$("#container").toggleClass("container_full"); // Contenuto tutto schermo
		$(".anteprima_news").toggleClass("anteprima_ridotta"); // Contenuto tutto schermo
		$(".container_claim").toggleClass("claim_ridotto"); // Contenuto tutto schermo

	});	
	$(".menu_livello_2").on("click tap", function() { // Al click su una voce di livello 2
		
		$(".container_menu_livello_2").slideDown(); // Mostra il menu di livello 2
		
	});
	
	// Menu Lingua
	
	$("#menu_lingua li").on("click tap", function() { // Al click sulla voce
	
		$(this).siblings().removeClass("lingua_attiva"); // Rimuovi precedenti selezioni
		$(this).addClass("lingua_attiva"); // Rendi la voce attiva
		
	});
	
	
}


// Funzione Navigazione

function navigazione() {
	
	$("#menu_voci a").on("click tap", function(e) { // Al click sy una voce di menu
		
		e.preventDefault(); // Disabilita funzionalità standard link
		
		$(this).siblings().removeClass("voce_attiva voce_livello_2_attiva"); // Deseleziona altre voci
		//$(".container_menu_livello_2").slideUp(); // Chiude altri sottomenu
		if ($("#container").find($(this).attr("rel").length > 0)) { // Se il contenuto caricato corrisponde alla voce cliccata
			
			if ($(this).hasClass("voce_livello_2")) { // Se la voce è di secondo livello
			
				//$(this).parent().siblings(".container_menu_livello_2").slideUp(); // Chiude altri sottomenu
				$(this).addClass("voce_livello_2_attiva"); // Allora rendila attiva con stile 2
				$("#container_contenuti").animate({ // Scorri al contenuto selezionato
				
					scrollTop: $("." + $(this).attr("rel") + "").offset().top 
					
				});
			
			} else { // Altrimenti applica default
				
				
				$(this).addClass("voce_attiva"); // Allora rendila attiva
				
				caricaContenutiClick($(this)); // Invocazione Funzione Caricamento Contenuti AJAX
        
        		return false; // Blocca il refresh
				
			}
			
		}
				
	});
	
}

// Funzione Caricamento Contenuti AJAX al Click

function caricaContenutiClick(cliccato) {
    
    //var urlPagina = cliccato.attr('href'); // Dichiarazione ed inizializzazione variabile pagina invocata
	
	var urlPagina = "include/" + cliccato.attr('rel') + ".php"; // Dichiarazione ed inizializzazione variabile pagina invocata
    
    contenutiAjax(urlPagina); // Invocazione Funzione iniezione Contenuti AJAX    
    
}

// Funzione iniezione Contenuti AJAX  

function contenutiAjax(urlPagina) {

    // Dichiarazione Variabili
    
    var href = ""; // Inizializzazione Variabile URL attuale
    var path = ""; // Inizializzazione Variabile URL Finale
    var pathFinale = ""; // "
    
    // Controllo Contenuti
    
    $("#container").empty(); // Rimuovi contenuti precedenti

    // Chiamata AJAX
    
    $.ajax({
  
        url: urlPagina + '?get=ajax', // URL da invocare
        success: function(data) { // A chiamata avvenuta
            
            $("#container").append($(data).addClass("animated fadeIn")); // Inietta il contenuto della pagina nella scheda con transizione
            inizializza(); // Reinizializza plugins
            //transizioni(); // Reinizializza Transizioni Schede dopo chiamata
  
        }

    });
    
    // Controllo URL
    
    if (($("#container_contenuti").length > 0) && (urlPagina !== window.location.href)) { // Se siamo in una pagina di secondo livello e se la path caricata è diverso dall'URL visualizzato

        href = window.location.href.replace(/#.*$/, ''); // Assegnazione radice URL attuale
        urlPagina = "#" + urlPagina.replace("include/", ""); // Assegnazione deep link
        path = href + urlPagina; // Assegnazione URL finale
        
        // Assegnazione URL finale in modalità SEF senza l'estensione
        
        pathFinale = path.replace(/.php([^/.php]*)$/,'$1', "");
  
        window.history.pushState({ // Allora aggiorna l'URL
            
            path: path // Assegna l'attuale path filtrando l'URL e convertendolo in un deep link eliminando i precedenti
            
        }, '', pathFinale); // Imposta l'URL aggiornato 

    }
    
                
    // Sovrascrittura funzione Back browser e recupero contenuto precedente

    $(window).bind('popstate', function() { // Al cambio di stato del browser
  
        // Chiamata AJAX
  
        $.ajax({
    
            url: location.pathname + '?get=ajax', // Recupera il precedente URL
            success: function(data) { // A chiamata avvenuta
      
                $("#container").append($(data).addClass("animated fadeIn")); // Inietta il contenuto della pagina nella scheda con transizione
               // inizializzaScroll(); // Reinizializza Custom Scroll
                //transizioniSchede(); // Reinizializza Transizioni Schede dopo chiamata
    
            }
  
        });

    });
    
}

//-->