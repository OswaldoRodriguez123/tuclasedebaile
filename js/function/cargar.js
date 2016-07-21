$("html, body").animate({ scrollTop: 0},0, "slow", function() {});
//$("#contenido").fadeIn(1000);
/*$(".icono").mouseover(function(){
    var code=$(this).data('codeico');	
   
    $("#icono-img-"+code).addClass("icono-inicio-hover");
    }).mouseout(function() {
    	$("#icono-img-"+code).addClass("icono-inicio");
    }) 
}); */

$(".icono").mouseover(function() { 
$(this).addClass("icono-inicio-hover"); 
}).mouseout(function() { 
$(this).removeClass("icono-inicio-hover"); 
}); 

$(".nav a").click(function () {
    if ($(".navbar-collapse").hasClass("in")) {
        $('[data-toggle="collapse"]').click();
    }
});

$("#contenido").click(function () {
    if ($(".navbar-collapse").hasClass("in")) {
        $('[data-toggle="collapse"]').click();
    }
});