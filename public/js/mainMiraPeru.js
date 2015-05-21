$(document).on("ready", function(){

	/* CONTENEDORES */
	var central = $("#mira-peru-central");
	var inferior = $("#mira-peru-inferior");
	var inferiorhor = $("#mira-peru-inferior-horizontal");


	/* MEDIDAS FOTO NOTICIAS */

	var bigImg = "540x450/";
	var midImg = "280x290/";

	
	/* NOTICIAS */
	var not3 = $("#3");
	var not4 = $("#4");
	var not5 = $("#5");
	var not6 = $("#6");
	var not7 = $("#7");
	var not8 = $("#8");
	var not9 = $("#9");
	var publicidad = $("#publicidad-central");

	
	/* OCULTAR ELEMENTOS */
	not3.detach();
	not4.detach();
	not5.detach();
	not6.detach();
	not7.detach();
	not8.detach();
	not9.detach();
	publicidad.detach();

	
	/* MOVIENDO ELEMENTOS */
	central.append(publicidad);
	central.append(not3);
	central.append(not4);
	inferior.append(not5);
	inferior.append(not6);
	inferiorhor.append(not7);
	inferiorhor.append(not8);
	inferiorhor.append(not9);


	/* DISEÑO DE NOTICIAS */
	// SUPERIOR
	var carpeta1 = $("#1 .img a img").attr("data-carpeta");
    var imagen1 = $("#1 .img a img").attr("data-imagen");
	$("#1 .img a img").attr("src", carpeta1 + bigImg + imagen1);
	$("#1 .info2 .text").hide();
    $("#1").addClass("col-lg-8 col-md-8 col-sm-8 big");

    var carpeta2 = $("#2 .img a img").attr("data-carpeta");
    var imagen2 = $("#2 .img a img").attr("data-imagen");
	$("#2 .img a img").attr("src", carpeta2 + midImg + imagen2);
    $("#2").addClass("col-lg-4 col-md-4 col-sm-4 mid");

    //CENTRAL
    var carpeta3 = $("#3 .img a img").attr("data-carpeta");
    var imagen3 = $("#3 .img a img").attr("data-imagen");
	$("#3 .img a img").attr("src", carpeta3 + midImg + imagen3);
    $("#3").addClass("col-lg-4 col-md-4 col-sm-6 mid");

    var carpeta4 = $("#4 .img a img").attr("data-carpeta");
    var imagen4 = $("#4 .img a img").attr("data-imagen");
	$("#4 .img a img").attr("src", carpeta4 + midImg + imagen4);
    $("#4").addClass("col-lg-4 col-md-4 col-sm-6 mid");

    //INFERIOR
    var carpeta5 = $("#5 .img a img").attr("data-carpeta");
    var imagen5 = $("#5 .img a img").attr("data-imagen");
	$("#5 .img a img").attr("src", carpeta5 + midImg + imagen5);
    $("#5").addClass("col-lg-4 col-md-4 col-sm-4 mid");

    var carpeta6 = $("#6 .img a img").attr("data-carpeta");
    var imagen6 = $("#6 .img a img").attr("data-imagen");
	$("#6 .img a img").attr("src", carpeta6 + bigImg + imagen6);
	$("#6 .info2 .text").hide();
    $("#6").addClass("col-lg-8 col-md-8 col-sm-8  big");  
    
    //INFERIOR HORIZONTAL
    var carpeta7 = $("#7 .img a img").attr("data-carpeta");
    var imagen7 = $("#7 .img a img").attr("data-imagen");
	$("#7 .img a img").attr("src", carpeta7 + midImg + imagen7);
    $("#7").addClass("col-lg-4 col-md-4 col-sm-4 mid");

    var carpeta8 = $("#8 .img a img").attr("data-carpeta");
    var imagen8 = $("#8 .img a img").attr("data-imagen");
	$("#8 .img a img").attr("src", carpeta8 + midImg + imagen8);
    $("#8").addClass("col-lg-4 col-md-4 col-sm-4 mid");

    var carpeta9 = $("#9 .img a img").attr("data-carpeta");
    var imagen9 = $("#9 .img a img").attr("data-imagen");
	$("#9 .img a img").attr("src", carpeta9 + midImg + imagen9);
    $("#9").addClass("col-lg-4 col-md-4 col-sm-4 mid");

});