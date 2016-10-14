<!--

var ingresso = true; // Dichiarazione ed Inizializzazione Variabile controllo animazione

$(document).ready(function() {
    
	inizializza(); // Funzione Inizializzazione
	preloader(); // Invocazione Funzione Preloader
	transizioni(); // Funzione Transizioni
	navigazione(); // Funzione Navigazione
	validaInviaForm(); // Funzione Prenotazione Form
	
});

// Inizializzazione Custom Scrollbar Popup

function customScroll(){
	
		$(".elenco_popup").mCustomScrollbar({
		  
			axis: "y",
			autoHideScrollbar: true,
			mouseWheel: { 
			
				enable: true,
				axis: "y"	
			},
			theme: "rounded-dark"
		  
		});
	
}



// CHIUDI POPUP FUNCTION

function ChiudiPopUp(){
		
	$(".chiudi").on("click tap", function() { // Al click sul pulsante
	
		$(this).parent().removeClass("animated zoomIn"); // Chiudi la popup
		$(this).parent().addClass("animated zoomOut"); // "
		
		setTimeout(function() {

			$(".popup_verticale").addClass("secondo_piano"); // Rendi la voce attiva
		
		}, 500);
		
		$("#container_menu").removeClass("secondo_piano"); // Porta in primo piano header
		
	});

}


// Funzione Chiudi Prenotazione

function chiudiPrenota() {
	
	$(".chiudi_prenota").on("click tap", function() { // Al click sulla chiusura

		$("#prenota_popup").removeClass("animated zoomIn"); // Nascondi il form di prenotazione
		
		setTimeout(function() {
	
			$("#prenota_popup").addClass("animated zoomOut secondo_piano");	// "
		
		}, 500);
		
	});
	
}


// Funzione Inizializzazione

function inizializza() {
	
	// CUSTOM SCROLL
	customScroll();
	
	// Menu Principale
		
	$(window).on("load resize", function() { // Al caricamento o al ridimensionamento
		
		if ($(window).width() <= 1024) { // Se siamo su mobile
		
			//$("#menu_voci, #links_outbound, #separatore_menu").removeClass("nascondi no_animazione"); // Disattiva la transizione
			$("#pulsante_menu").addClass("pulsante_attivo"); // Allora anima l'ingresso del menu
			$("#freccia_menu").addClass("freccia_attiva"); // Anima icona
			$("#container_menu").addClass("container_chiuso"); // Nasconde Menu
			$("#menu_voci").addClass("container_voci_chiuso"); // Nasconde Voci
			$("#links_outbound").addClass("container_links_chiuso"); // Nasconde Links Outbound
			$(".iva").addClass("container_links_chiuso"); // Nasconde Links Outbound
			$("#separatore_menu").addClass("separatore_out"); // Nasconde Separatore
			$("#container").addClass("container_full"); // Contenuto tutto schermo
			$(".anteprima_news").removeClass("anteprima_ridotta"); // Contenuto tutto schermo
			$(".container_claim").removeClass("claim_ridotto"); // Contenuto tutto schermo
			$(".griglia-sezione-esterna").removeClass("griglia_centrata"); //Centra la griglia esterna delle 	
			
			if ($("#home_slides").length > 0) {
				
				$("#container").addClass("container_home");
				$("body").removeClass("blocca_scroll"); // Disabilita lo scroll
				
			} else {  
			
				$("#container").removeClass("container_home");
				$("body").addClass("blocca_scroll"); // Abilita lo scroll
			
			}
			
		} else {
			
			$("#menu_voci, #links_outbound, #separatore_menu").removeClass("nascondi no_animazione"); // Disattiva la transizione
		
		}
		 
		
	});
	
	
	// Carousel Home
	
	$('#home_slides, #popup_slides').superslides({
		
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
	
	// Box Centrale - Home 
	
	$(".pulsante_box[data-rel='1']").parent().addClass("box_home_centrale"); // Ritarda la transizione
		
	// Menu Principale - Voce Attiva
	
	$.each($("#menu_voci > a"), function() { // Per ogni voce del menu di livello 1
			
		if ($("#container").find("[rel='" + $(this).attr("rel") + "']").length > 0) { // Se il contenuto caricato corrisponde ad una voce del menu
		
			$(this).siblings().removeClass("voce_attiva"); // Deseleziona altre voci
			$(this).addClass("voce_attiva"); // Allora rendila attiva
			
		}	
		
	});
	$.each($(".container_menu_livello_2 a"), function() { // Per ogni voce del menu di livello 2
	
		var vocePadre = $(this).parents(".container_menu_livello_2").prev(); // Dichiarazione ed Inizializzazione Variabile voce padre
			
		if (vocePadre.hasClass("voce_attiva")) { // Se una voce padre di un sottomenu è attiva
			
			$(".container_menu_livello_2 a").removeClass("voce_livello_2_attiva"); // Deseleziona altre sottovoci
			$(".container_menu_livello_2 a:first-child").addClass("voce_livello_2_attiva"); // Attiva prima sottovoce
			
		}	
		
	});
	
	// Menu Principale - Secondo livello
	
	if ($(".container_menu_livello_2.voce_attiva2").length > 0) { // Se un menu di secondo livello diventa attivo

		$(".container_menu_livello_2.voce_attiva2").slideDown(); // Allora mostralo
		
	}
	
	
	// MOSTRE READ MORE
	
	$(".testoContainer span.leggi").on("click",function(){
	
	 	var LivUp = $(this).parent();
		
		LivUp.toggleClass("expand");
	
	});
	
	// Disponibilità
	
	disponibile(); 
	
	// PDF
	
	if (($(".pdf_interno").length > 0) && ($(".pdf_presente").length < 0)) { // Se il PDF dell'evento non è presente
	
		$(".azioni_evento .pulsante_pdf").addClass("pdf_disattivo"); // Allora disattiva pulsante
	
	} else { 
	
		$(".azioni_evento .pulsante_pdf").removeClass("pdf_disattivo"); // Altrimenti attiva
	
	
	}
	
}


// Funzione Transizioni 

function transizioni() {
	
	// Dichiarazione ed Inizializzazione Variabili
	
	var clicks = false; // Controllo Click
		
	// Menu Principale
	
	// Pulsante apertura
	
	$("#pulsante_menu").on("click tap", function() { // Al click del pulsante
		
		$("#menu_voci, #links_outbound, #separatore_menu").removeClass("nascondi no_animazione"); // Disattiva la transizione
		$(this).toggleClass("pulsante_attivo"); // "
		$("#freccia_menu").toggleClass("freccia_attiva"); // Anima icona
		$("#container_menu").toggleClass("container_chiuso"); // Nasconde Menu
		$("#menu_voci").toggleClass("container_voci_chiuso"); // Nasconde Voci
		$("#links_outbound").toggleClass("container_links_chiuso"); // Nasconde Links Outbound
		$(".iva").toggleClass("container_links_chiuso"); // Nasconde Links Outbound
		$("#separatore_menu").toggleClass("separatore_out"); // Nasconde Separatore
		$("#container").toggleClass("container_full"); // Contenuto tutto schermo
		$(".anteprima_news").toggleClass("anteprima_ridotta"); // Contenuto tutto schermo
		$(".container_claim").toggleClass("claim_ridotto"); // Contenuto tutto schermo
		$(".griglia-sezione-esterna").toggleClass("griglia_centrata"); //Centra la griglia esterna delle sottosezioni
		
		if (($(window).width() <= 1024) && ($("#home_slides").length > 0)) { // Se siamo su mobile in Home
			
			$("body").toggleClass("blocca_scroll"); // Blocca lo scroll a menu aperto
			
		}
		
		// Viaggi - Centratura
	
		$("#container_contenuti[rel='visite-guidate'] .griglia-sezione").toggleClass("centra");


	});	
		
	// Menu Lingua
	
	$("#menu_lingua li").on("click tap", function() { // Al click sulla voce

		$(this).siblings().removeClass("lingua_attiva"); // Rimuovi precedenti selezioni
		
	});
	
	// Popup
	
	$(document).on("click tap", ".boxBlock a, .popUpPage a, #correlati a, .box-list a, .leggi-tutto, .newsHome", function(e) { // Al click sul pulsante
	    
		var caso = $(this).attr("data-id"); // Dichiarazione ed Inizializzazione Variabile Riferimento elemento
	     
		if( caso === "1" ){} else { 
		
			e.preventDefault(); // Disabilita funzione standard elemento
			
			// Dichiarazione ed Inizializzazione Variabili
		
			var url = $(this).attr("href"); // URL
			var id = $(this).attr("rel"); // Riferimento elemento
			var popup = $(this).parents("#container_contenuti").next(); // Elemento Popup
			
			caricaContenutiClick(url,id); // Invocazione Funzione Caricamento Contenuti AJAX
			
			$(".popup_verticale").removeClass("secondo_piano");
			$(".popup_verticale").removeClass("animated zoomOut");
			$(".popup_verticale").addClass("animated zoomIn");
			
			popup.removeClass("secondo_piano"); // Porta il popup in primo piano
			popup.removeClass("animated zoomOut"); // Mostra il popup
			popup.addClass("animated zoomIn"); // "
		
			$("#container_menu").addClass("secondo_piano"); // Porta in secondo piano header
		
			return false; // Blocca il refresh della pagina
		
		}
		
	});
	
	// CHIUDI POPUP
	
	ChiudiPopUp();
	chiudiPrenota();
	
	// Prenota
	
	$(document).on("click tap", ".prenotazione", function(e) { // Al click su prenota
	
		var riferimento = $(this).attr("rel"); // Dichiarazione ed Inizializzazione Variabile Riferimento
		
		e.preventDefault(); // Disabilita funzione standard pulsante

		// Chiamata AJAX - Passaggio di parametro

		$.post('http://www.acantomilano.it/beta/include/prenota_popup.php', { 
		
			articoloId: ""+ riferimento +"" 
			
		}).done(function(data){ // A chiamata avvenuta
			
			$("#prenota_popup").empty(); // Svuota contenuti precedentemente caricati
			$("#prenota_popup").html(data); // Appendi contenuti 
			$("#prenota_popup, #prenota_form").removeClass("animated zoomOut secondo_piano"); // Mostra il form di prenotazione
			$("#prenota_popup").addClass("animated zoomIn");	 // "
			
			chiudiPrenota(); // inizializzazione Funzioni chiusura
	
		});

		return false;
		
	});
	
	// Calendario - Dettagli 
	
	$("#pulsante_apertura_cal").on("click tap", function() { // Al click sul pulsante
		
		if (clicks === true) { // Se i dettagli sono aperti 

			$(this).removeClass("pulsante_attivo"); // Attiva il pulsante
			$("#calendario_dettagli").slideUp(); // Allora chiudi la sezione
			
			clicks = false; // Segna come chiuso
			
		} else { // Altrimenti se sono chiusi

			clicks = true; // Segna come aperto
		
			$("#calendario_dettagli").slideDown(); // Apri la sezione
			$(this).addClass("pulsante_attivo"); // Disttiva il pulsante
			
		}
		
	});
		
}





// Funzione Navigazione

function navigazione() {
	
	$("#menu_voci a").on("click tap", function(e) { // Al click di una voce di menu
		
		//e.preventDefault(); // Disabilita funzionalità standard link
		
		$(this).siblings().removeClass("voce_attiva voce_livello_2_attiva"); // Deseleziona altre voci

		  if ($(this).hasClass("voce_livello_2")) { // Se la voce è di secondo livello

			  $(this).addClass("voce_livello_2_attiva"); // Allora rendila attiva come livello 2
			  $("#container_contenuti").animate({ // Scorri al contenuto selezionato
			  
				  scrollTop: $("." + $(this).attr("rel") + "").offset().top 
				  
			  });
		  
		  } else { // Altrimenti se è di livello 1 applica default

			  $(this).addClass("voce_attiva"); // Allora rendila attiva
			  			  
			  // caricaContenutiClick($(this)); // Invocazione Funzione Caricamento Contenuti AJAX
	  
			 //  return false; // Blocca il refresh
			  
		  }
				
	});
	
}


// Funzione Caricamento Contenuti AJAX al Click

function caricaContenutiClick(url,id) {
    
    var urlPagina = url; // Dichiarazione ed inizializzazione variabile pagina invocata
	   
    contenutiAjax(urlPagina,id); // Invocazione Funzione iniezione Contenuti AJAX    
    
}

// Funzione iniezione Contenuti AJAX  

function contenutiAjax(urlPagina,id) {

    // Dichiarazione Variabili
    
    var href = ""; // Inizializzazione Variabile URL attuale
    var path = ""; // Inizializzazione Variabile URL Finale
    var pathFinale = ""; // "
    
    // Controllo Contenuti
    
    $(".popup_verticale").empty(); // Rimuovi contenuti precedentemente caricati

    // Chiamata AJAX
    
    $.ajax({
  
        url: urlPagina + '?get=ajax&id=' + id  +'' , // URL da invocare
        success: function(data) { // A chiamata avvenuta
            
            $(".popup_verticale").append($(data).addClass("animated fadeIn")); // Inietta il contenuto della pagina nella scheda con transizione
            inizializza(); // Reinizializza plugins
			ChiudiPopUp();
  
        }

    });
    
    
}

// Funzione Validazione Form

function validaInviaForm() {
    
    $("#invia_prenota").on("click tap", function(e) { // All'invio del form

        e.preventDefault(); // Disabilita funzione di default dell'elemento
    
        var campi = []; // Dichiarazione Vettore campi form
            
        if ($("#prenota_form input[required], #prenota_form textarea[required]").val().length === 0) { // Se i campi richiesti risultano ancora vuoti

            $("#prenota_form input[required], #prenota_form textarea[required]").filter(function() { // Allora per ogni campo richiesto
                
                $(this).siblings().addClass("richiesto_invalido"); // All'etichetta corrispondente segnala l'errore
                
                return !this.value; // Restituisci i campi non compilati
                
            }).addClass("invalido"); // Al campo corrispondente segnala l'errore
                        
        } else { // Altrimenti invia

            // Assegna i campi compilati
            
            campi = [$("#nome_prenota").val(), $("#cognome_prenota").val(), $("#email_prenota").val(), $("#oggetto_prenota").val(), $("#data_prenota").val(), $("#ora_prenota").val(), $("#messaggio_prenota").val()];
            
            // Chiamata AJAX
            
            $.post("http://www.acantomilano.it/beta/include/form_prenota.php", { 
            
                nome: campi[0], 
                cognome: campi[1],
                email: campi[2],
                oggetto: campi[3],
                data: campi[4],
				ora: campi[5],
				messaggio: campi[6]
                
            }, function(data) { // A chiamata avenuta 
	
                $('#form_notifica').html(data).fadeIn(); // Output messaggio con animazione

                setTimeout(function() {
                
                    $("#form_notifica").fadeOut(); // Nascondi dopo 3 secondi
                    
                }, 3000); 
                
	            $('#prenota_form')[0].reset(); // Resetta i campi del form
				$(".richiesto").removeClass("richiesto_invalido"); // "
				$("#prenota_form input[required], #prenota_form textarea[required]").removeClass("invalido"); // "
                                    
            });
            
        }
        
        return false; // Blocca il refresh
        
    });    
    
}


// Funzione Preloader

function preloader() {
	
	if ($("section[rel='home']").length > 0 || $("div[rel='calendario']").length > 0) { // Solo su Home e Calendario inizializza il preloader

		$('.second.circle').fadeIn(); // Nascondi il preloader
		$('.second.circle strong').fadeIn(); // Nascondi il preloader
		
		$('.second.circle').circleProgress({ // Inizializzazione Plugin
			
			value: 1,
			size: 100,
			fill: { color: "#dfc37a" },
			thickness: 5,
			animation: { 
			
				duration: 1000, 
				ease: "circleProgressEase" 
				
			}
			
		}).on('circle-animation-progress', function(event, progress) { // Durante l'animazione 
			
			$(this).find('strong').html(parseInt(100 * progress) + '<i>%</i>'); // Visualizza la percentuale di caricamento
		
		}).on('circle-animation-end',function() { // A fine animazione
			
			$('.second.circle strong').fadeOut(); // Nascondi il preloader
			$('.second.circle').fadeOut(500, function() { // Anima l'ingresso dei contenuti
			
				$("#container_menu, #container").removeClass("occulta");
				$("#container, #container_contenuti").addClass("animated fadeIn");
				
			   if (($("#home_carousel").length > 0) && (ingresso === true) && $(window).width() > 1024) { // Se siamo in Home su Desktop e non è stata ancora effettuata l'animazione di ingresso
			
				  setTimeout(function() { // Anima ingresso Menu
					  
					  $("#pulsante_menu").removeClass("pulsante_attivo"); // Allora anima l'ingresso del menu
					  $("#freccia_menu").removeClass("freccia_attiva"); // Anima icona
					  $("#container_menu").removeClass("container_chiuso"); // Nasconde Menu
					  $("#menu_voci").removeClass("container_voci_chiuso"); // Nasconde Voci
					  $("#links_outbound").removeClass("container_links_chiuso"); // Nasconde Links Outbound
					  $(".iva").removeClass("container_links_chiuso"); // Nasconde Links Outbound
					  $("#separatore_menu").removeClass("separatore_out"); // Nasconde Separatore
					  $("#container").removeClass("container_full"); // Contenuto tutto schermo
					  $(".anteprima_news").addClass("anteprima_ridotta"); // Contenuto tutto schermo
					  $(".container_claim").addClass("claim_ridotto"); // Contenuto tutto schermo
					  $(".griglia-sezione-esterna").addClass("griglia_centrata"); //Centra la griglia esterna delle sottosezioni 
					  
				  }, 500);
				  
				  ingresso = false; // Disabilita animazione dopo l'esecuzione
				  
			  } 
			
		});
		
		});
		
	} else { // Altrimenti senza preloader

		$("#container_menu, #container").removeClass("occulta");
		$("#container, #container_contenuti").addClass("animated fadeIn");
					
	}
	
}


// Funzione Verifica Disponibilità 

function disponibile() {
	
	if (($(".dispo_icona").hasClass("disponibile_ico")) && ($(".dispo_label").hasClass("disponibile"))) { // Se l'icona risulta attiva - L'evento è disponibile
		
		$(".dispo_label").html("Disponibile"); // Segna come disponibile
		
	} else { 
	
		$(".dispo_icona").removeClass("disponibile_ico"); // Allora rendila attiva
		$(".dispo_label").html("Esaurito"); // Segna come disponibile
	
	}
	
}
	
//-->