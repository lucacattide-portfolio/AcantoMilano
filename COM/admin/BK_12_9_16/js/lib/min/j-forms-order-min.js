$(document).ready(function(){function e(){var e=r()+s()+i()+t();return e}var r=function(){var e=$('#order-forms .cake-size input[type="radio"]'),r=0;return e.each(function(){this.checked&&$.each(this.attributes,function(){"data-price"===this.name&&(r+=parseFloat(this.value))})}),r=Math.round(100*r)/100},s=function(){var e=$("#order-forms .filling option:selected"),r=0;return e.each(function(){$.each(this.attributes,function(){"data-price"===this.name&&(r+=parseFloat(this.value))})}),r=Math.round(100*r)/100},i=function(){var e=$('#order-forms .lovely-things input[type="checkbox"]'),r=0;return e.each(function(){this.checked&&$.each(this.attributes,function(){"data-price"===this.name&&(r+=parseFloat(this.value))})}),r=Math.round(100*r)/100},t=function(){var e=0;return e=$("#order-forms .delivery option:selected").attr("data-price"),e=parseFloat(e),e=Math.round(100*e)/100};$(".cake-size, .filling, .lovely-things, .delivery").change(function(){$("#total-cake-price").removeClass("hidden"),$("#total-cake-price span").html(" $"+e())}),$("#show-inscription").change(function(){$("#show-inscription").is(":checked")?$("#inscription").removeClass("hidden"):($("#inscription").addClass("hidden"),$('#inscription input[type="text"]').val(""))}),$("#delivery").change(function(){var e="";$("#delivery option:selected").each(function(){e=$(this).val()}),"Delivery-5$"==e?$("#delivery-address").hasClass("hidden")&&$("#delivery-address").removeClass("hidden"):($("#delivery-address").hasClass("hidden")||$("#delivery-address").addClass("hidden"),$('#delivery-address input[type="text"]').val(""))}),$("#phone").mask("(999) 999-9999",{placeholder:"x"}),$("#order-forms").validate({errorClass:"error-view",validClass:"success-view",errorElement:"span",onkeyup:!1,onclick:!1,ignore:"",rules:{cake_size:{required:!0},"filling[]":{required:!0},inscription:{required:"#show-inscription:checked"},name:{required:!0},phone:{required:!0},email:{required:!0,email:!0},address:{required:'#delivery option[value="Delivery-5$"]:selected'}},messages:{cake_size:{required:"Please select a cake size"},"filling[]":{required:"Please select a filling"},inscription:{required:"Please enter your inscription"},name:{required:"Please enter your name"},phone:{required:"Please enter your phone"},email:{required:"Please enter your email",email:"Incorrect email format"},address:{required:"Please enter your address"}},highlight:function(e,r,s){$(e).closest(".input").removeClass(s).addClass(r),($(e).is(":checkbox")||$(e).is(":radio"))&&$(e).closest(".check").removeClass(s).addClass(r)},unhighlight:function(e,r,s){$(e).closest(".input").removeClass(r).addClass(s),($(e).is(":checkbox")||$(e).is(":radio"))&&$(e).closest(".check").removeClass(r).addClass(s)},errorPlacement:function(e,r){$(r).is(":checkbox")||$(r).is(":radio")?$(r).closest(".check").append(e):$(r).closest(".unit").append(e)},submitHandler:function(){$("#order-forms").ajaxSubmit({target:"#order-forms #response",error:function(e){$("#order-forms #response").html("An error occured: "+e.status+" - "+e.statusText)},beforeSubmit:function(){$('#order-forms button[type="submit"]').attr("disabled",!0).addClass("processing")},success:function(){$('#order-forms button[type="submit"]').attr("disabled",!1).removeClass("processing"),$("#order-forms .success-message").length&&($("#order-forms .input").removeClass("success-view error-view"),$("#order-forms .check").removeClass("success-view error-view"),$("#inscription").hasClass("hidden")||$("#inscription").addClass("hidden"),$("#order-forms").resetForm(),$("#total-cake-price").addClass("hidden"),$('#order-forms button[type="submit"]').attr("disabled",!0),setTimeout(function(){$("#order-forms #response").removeClass("success-message").html(""),$('#order-forms button[type="submit"]').attr("disabled",!1)},5e3))}})}})});