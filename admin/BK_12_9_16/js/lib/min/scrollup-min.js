!function(l){"function"==typeof define&&define.amd?define(["jquery"],l):l(jQuery)}(function($){$.fn.scrollUp=function(l){$.data(document.body,"scrollUp")||($.data(document.body,"scrollUp",!0),$.fn.scrollUp.init(l))},$.fn.scrollUp.init=function(l){var o=$.fn.scrollUp.settings=$.extend({},$.fn.scrollUp.defaults,l),e=!1,r,t,s,n,c,i,a;switch(a=o.scrollTrigger?$(o.scrollTrigger):$("<a/>",{id:o.scrollName,href:"#top"}),o.scrollTitle&&a.attr("title",o.scrollTitle),a.appendTo("body"),o.scrollImg||o.scrollTrigger||a.html(o.scrollText),a.css({display:"none",position:"fixed",zIndex:o.zIndex}),o.activeOverlay&&$("<div/>",{id:o.scrollName+"-active"}).css({position:"absolute",top:o.scrollDistance+"px",width:"100%",borderTop:"1px dotted"+o.activeOverlay,zIndex:o.zIndex}).appendTo("body"),o.animation){case"fade":r="fadeIn",t="fadeOut",s=o.animationSpeed;break;case"slide":r="slideDown",t="slideUp",s=o.animationSpeed;break;default:r="show",t="hide",s=0}n="top"===o.scrollFrom?o.scrollDistance:$(document).height()-$(window).height()-o.scrollDistance,c=$(window).scroll(function(){$(window).scrollTop()>n?e||(a[r](s),e=!0):e&&(a[t](s),e=!1)}),o.scrollTarget?"number"==typeof o.scrollTarget?i=o.scrollTarget:"string"==typeof o.scrollTarget&&(i=Math.floor($(o.scrollTarget).offset().top)):i=0,a.click(function(l){l.preventDefault(),$("html, body").animate({scrollTop:i},o.scrollSpeed,o.easingType)})},$.fn.scrollUp.defaults={scrollName:"scrollUp",scrollDistance:300,scrollFrom:"top",scrollSpeed:300,easingType:"linear",animation:"fade",animationSpeed:200,scrollTrigger:!1,scrollTarget:!1,scrollText:"Scroll to top",scrollTitle:!1,scrollImg:!1,activeOverlay:!1,zIndex:2147483647},$.fn.scrollUp.destroy=function(l){$.removeData(document.body,"scrollUp"),$("#"+$.fn.scrollUp.settings.scrollName).remove(),$("#"+$.fn.scrollUp.settings.scrollName+"-active").remove(),$.fn.jquery.split(".")[1]>=7?$(window).off("scroll",l):$(window).unbind("scroll",l)},$.scrollUp=$.fn.scrollUp});