
<!-- INCLUDE JQUERY -->
<script src="js/jquery-1.11.1.js" charset="utf-8"></script>

<!-- MIGRATE -->
<script src="js/jquery-migrate-1.2.1.js"></script>

<!-- SCROLL PAGE -->
<script src="js/jquery.corner.js" charset="utf-8"></script>

<!-- SCROLL CALENDAR -->
<script src="js/jquery.tools.min.js" charset="utf-8"></script>

<!-- SUPER SLIDE -->
<script src="js/jquery.superslides.js" charset="utf-8"></script>

<!-- READ MORE -->
<script src="js/jquery.readmore.js" charset="utf-8"></script>

<!-- CIRCLE PROGRESS -->
<script src="js/circle-progress.js" charset="utf-8"></script>

<!-- COOKIE -->
<script src="js/jquery.cookie.js" charset="utf-8"></script>




<!-- SCRIPT -->
<script type="text/javascript">
/*! Lazy Load 1.9.3 - MIT license - Copyright 2010-2013 Mika Tuupola */
!function(a,b,c,d){var e=a(b);a.fn.lazyload=function(f){function g(){var b=0;i.each(function(){var c=a(this);if(!j.skip_invisible||c.is(":visible"))if(a.abovethetop(this,j)||a.leftofbegin(this,j));else if(a.belowthefold(this,j)||a.rightoffold(this,j)){if(++b>j.failure_limit)return!1}else c.trigger("appear"),b=0})}var h,i=this,j={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!0,appear:null,load:null,placeholder:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"};return f&&(d!==f.failurelimit&&(f.failure_limit=f.failurelimit,delete f.failurelimit),d!==f.effectspeed&&(f.effect_speed=f.effectspeed,delete f.effectspeed),a.extend(j,f)),h=j.container===d||j.container===b?e:a(j.container),0===j.event.indexOf("scroll")&&h.bind(j.event,function(){return g()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,(c.attr("src")===d||c.attr("src")===!1)&&c.is("img")&&c.attr("src",j.placeholder),c.one("appear",function(){if(!this.loaded){if(j.appear){var d=i.length;j.appear.call(b,d,j)}a("<img />").bind("load",function(){var d=c.attr("data-"+j.data_attribute);c.hide(),c.is("img")?c.attr("src",d):c.css("background-image","url('"+d+"')"),c[j.effect](j.effect_speed),b.loaded=!0;var e=a.grep(i,function(a){return!a.loaded});if(i=a(e),j.load){var f=i.length;j.load.call(b,f,j)}}).attr("src",c.attr("data-"+j.data_attribute))}}),0!==j.event.indexOf("scroll")&&c.bind(j.event,function(){b.loaded||c.trigger("appear")})}),e.bind("resize",function(){g()}),/(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion)&&e.bind("pageshow",function(b){b.originalEvent&&b.originalEvent.persisted&&i.each(function(){a(this).trigger("appear")})}),a(c).ready(function(){g()}),this},a.belowthefold=function(c,f){var g;return g=f.container===d||f.container===b?(b.innerHeight?b.innerHeight:e.height())+e.scrollTop():a(f.container).offset().top+a(f.container).height(),g<=a(c).offset().top-f.threshold},a.rightoffold=function(c,f){var g;return g=f.container===d||f.container===b?e.width()+e.scrollLeft():a(f.container).offset().left+a(f.container).width(),g<=a(c).offset().left-f.threshold},a.abovethetop=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollTop():a(f.container).offset().top,g>=a(c).offset().top+f.threshold+a(c).height()},a.leftofbegin=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollLeft():a(f.container).offset().left,g>=a(c).offset().left+f.threshold+a(c).width()},a.inviewport=function(b,c){return!(a.rightoffold(b,c)||a.leftofbegin(b,c)||a.belowthefold(b,c)||a.abovethetop(b,c))},a.extend(a.expr[":"],{"below-the-fold":function(b){return a.belowthefold(b,{threshold:0})},"above-the-top":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-screen":function(b){return a.rightoffold(b,{threshold:0})},"left-of-screen":function(b){return!a.rightoffold(b,{threshold:0})},"in-viewport":function(b){return a.inviewport(b,{threshold:0})},"above-the-fold":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-fold":function(b){return a.rightoffold(b,{threshold:0})},"left-of-fold":function(b){return!a.rightoffold(b,{threshold:0})}})}(jQuery,window,document);




$(document).ready(function(){

	<?php
	
	if ( $_SESSION['vista'] == 1 ){?>
	
	var Animazione = 1;
	
	<?php }else{?>
	
	var Animazione = 0;
	
	<?php }
	
	?>
	
	$("img.lazy").show().lazyload();
	
	var imgW =   $(".text-readmore .title").width();
	
	console.log( imgW ); 
	
	var CalcHimg =  imgW - Math.ceil( imgW * 0.48 );
	
	$("img.lazy").height(CalcHimg); 
	
	$(document).resize(function(){
		
		
		var imgW =   $(".text-readmore .title").width();
	
	console.log( imgW ); 
	
	var CalcHimg =  imgW - Math.ceil( imgW * 0.48 );
		
		
		});
	
	
	
	
	if(Animazione==1){
	
		$('.second.circle strong').hide();
		$('.second.circle').hide();
		$('#slides').show();
		$('.shoulder').css({
			"left": "0",
			"top" : "0"
		});
		$('.round,.social').css({
			"display":"table"
		});

	}else{
	
		// loading
		$('.second.circle').circleProgress({
			value: 1,
			size: 100,
			fill: { color: "#aa9061" },
			thickness: 5,
			animation: { duration: 1000, ease: "circleProgressEase" }
		}).on('circle-animation-progress', function(event, progress) {
			$(this).find('strong').html(parseInt(100 * progress) + '<i>%</i>');
		}).on('circle-animation-end',function(){
		
			// animazione home page
			$('.second.circle strong').fadeOut();
			$('.second.circle').fadeOut(500,function(){
			
			   $('#slides').fadeIn(1000,function(){
			   
					$('.shoulder').animate({
						"left": "0",
						"top" : "0"
					}, "slow", function(){
					
						$('.round,.social').fadeIn(1000).css({
							"display":"table"
						});
					
					});
			   
			   });
			
			});
	
		});

	}
		
	//slides
	$('#slides,#slides-first-level').superslides({
		play: false,
		animation: 'fade',
		pagination: false,
		animation_speed: 5000,
		hashchange: false
	});

	//menu mobile
	$('#menu-icon-open').on('click', function() {
		$('ul.menu-first').animate({
			'width': 'toggle',
			'height' : 'toggle'
		}, 1000);
		$("#menu-icon-open").addClass("no-active");
		$("#menu-icon-closed").removeClass("no-active");
	});

	$('#menu-icon-closed').on('click', function() {
		$('ul.menu-first').animate({
			'width': 'toggle',
			'height' : 'toggle'
		}, 1000);
		$("#menu-icon-closed").addClass("no-active");
		$("#menu-icon-open").removeClass("no-active");
	});

	//calendar
	$(".calendar").scrollable();
	$(".btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});
	
	// selected menu second		
	$('ul.menu-second li a').click(function (){
		$('.sel-second').removeClass('sel-second');
		$(this).addClass('sel-second');
	});
	$('.gallery-link a').click(function (){
	     var Rel = $(this).attr("rel");
		$('.sel-second').removeClass('sel-second');
		$('ul.menu-second li#submenu'+Rel+' a').addClass('sel-second');
	});
	
	// selected date calendar		
	$('ul.css-tabs li a').click(function (){
		$('.sel-calendar').removeClass('sel-calendar');
		$(this).addClass('sel-calendar');
	});
	
	// read more
	$('.text-readmore .text').readmore({
		moreLink: '<a href="#">Read More...</a>',
		lessLink: '<a href="#">Close</a>',
		maxHeight: 99,
		speed: 2500
	});
	
	//effetto scroll body
	$('a[href*=#]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
			&& location.hostname == this.hostname) {
				var $target = $(this.hash);
				$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
				if ($target.length) {
					var targetOffset = $target.offset().top;
					$('html,body').animate({scrollTop: targetOffset}, 1000);
					return false;
				}
			}
	});
	
	// form contatti
	function isEmail(string) {
		if (string.search(/^\w+((-\w+)|(\.\w+))*\@\w+((\.|-)\w+)*\.\w+$/) != -1){
			return false;
		} else {
			return true;
		}	
	}

	$("#inviaform").click(function() {
		$(".error").remove();
		$("#txtdati").css("visibility","visible");
		$("input").removeClass("error-input");
		$("label").removeClass("error-title");
		$("textarea").removeClass("error-input");
	
		if( $("#nome").val() == "" ) {
			$("#nome").addClass("error-input");
			$("#field1").addClass("error-title");
			$("#nome").focus(); 
			return false;
		}
		if( $("#email").val() == "" ) {
			$("#email").addClass("error-input");
			$("#field2").addClass("error-title");
			$("#email").focus(); 
			return false;
		}
		if( isEmail($("#email").val()) ) {
			$("#email").addClass("error-input");
			$("#field2").addClass("error-title");
			$("#email").focus(); 
			return false;
		}
		if( $("#message").val() == "" ) {
			$("#message").addClass("error-input");
			$("#field3").addClass("error-title");
			$("#message").focus(); 
			return false;
		} 
		
		if (!($("#dati-personali").attr('checked'))){
			$("#dati-personali").addClass("error-input");
			$("#txtdati").addClass("error-title");
			$("#dati-personali").focus(); 
			return false;
		}
		
		$('#formContatti').submit();
	});
});

</script>
