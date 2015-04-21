$( document ).ready(function() {

	var publicidadNoticia = function() {

		var publicidad = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8629542769595128" data-ad-slot="1421908493" data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>';

		$(".texto-nota p:first").after(publicidad);

	};
   
	var countBackgroundSpeed = function() {
		var url = $('body').css('background-image').replace('url(', '').replace(')', '').replace("'", '').replace('"', '');
		
		windowHeight = $(window).height();
		contentHeight = $('html').height();
	    var bkImg = new Image();
		    bkImg.onload = function() {
		       var  H = this.height,
           			W = this.width;
           		ratio = (H-windowHeight)/(contentHeight-windowHeight);
           		
           		$( "body" ).attr( "data-stellar-background-ratio", ratio);
           		$('body').stellar();
		    }
		    bkImg.src = url;
		
	};

	var flickrLoad = function(){
		var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		$( ".flickr a" ).remove();
		if(width>=768 && width<=979){
			$('.flickr').flickrush({
				limit:20,
				id:'124559478@N06',
				random:true
			}); 
		}
		if(width>979){
			$('.flickr').flickrush({
				limit:12,
				id:'124559478@N06',
				random:true
			}); 
		}
		if(width>640 && width<=767){
			$('.flickr').flickrush({
				limit:16,
				id:'124559478@N06',
				random:true
			}); 
		}
		if(width>480 && width<=640){
			$('.flickr').flickrush({
				limit:14,
				id:'124559478@N06',
				random:true
			}); 
		}
		if(width>320 && width<=480){
			$('.flickr').flickrush({
				limit:15,
				id:'124559478@N06',
				random:true
			}); 
		}
		if(width<=320){
			$('.flickr').flickrush({
				limit:12,
				id:'124559478@N06',
				random:true
			}); 
		}
	}

	var initSliders = function(){
		$('.news').bxSlider({
		  speed: 600,
		  touchEnabled: true,
		  nextSelector: ".breaking>.controls .next",
		  prevSelector: ".breaking>.controls .prev",
		  pager: false,
		  infiniteLoop: true,
		  adaptiveHeight: true,
		  auto: true,
		  pause: 4000

		});

		var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		
		$('.post-slider .slides').bxSlider({
		  speed: 1000,
		  touchEnabled: true,
		  pager: false,
		  infiniteLoop: true,
		  nextSelector: ".post-slider .controls .next",
		  prevSelector: ".post-slider .controls .prev",
		  fadeText: true,
		  auto: true,
		  pause: 8000

		});
	}

	$(window).load(function(){
		var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		if(width>767){
	  		countBackgroundSpeed();
	  	};
	  	publicidadNoticia();
	  	flickrLoad();
	  	initSliders();	  
	});
		

	$('.form-search .search-query').focusin(function (e) {
		$( this ).parent().find(".btn").css("borderLeft","1px solid #0091ff")
	});

	$('.form-search .search-query').focusout(function (e) {
		$( this ).parent().find(".btn").css("borderLeft","1px solid #ddd")
	});

	$("#menu-button").on('click', function(e) {  
        e.preventDefault();  
        $('ul.menu').slideToggle();  
    });  

    $("#header-menu-button").on('click', function(e) {  
        e.preventDefault();  
        $('header nav>ul').slideToggle();  
    });

});