!function(e){"function"==typeof define&&define.amd?define(["jquery","hammerjs"],e):"object"==typeof exports?e(require("jquery"),require("hammerjs")):e(jQuery,Hammer)}(function($,e){function t(t,n){var r=$(t);r.data("hammer")||r.data("hammer",new e(r[0],n))}$.fn.hammer=function(e){return this.each(function(){t(this,e)})},e.Manager.prototype.emit=function(e){return function(t,n){e.call(this,t,n),$(this.element).trigger({type:t,gesture:n})}}(e.Manager.prototype.emit)});