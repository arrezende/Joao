$(document).ready(function() {
	//Adiciona elemento no html
	var div = $("<div/>", {class: 'cover-lightbox'});
	var c_close = $('<a href="#" class="close">&#9421;</a>');
	var c_prev = $('<a href="#" class="prev">&lsaquo;</a>');
	var c_next = $('<a href="#" class="next">&rsaquo;</a>');

    $("body").append(div);

    $('.cover-lightbox').append(c_close);
    //$('.cover-lightbox').append(c_prev);
    //$('.cover-lightbox').append(c_next);
  
  
	var current = '.lightbox div span.current';

	//Função para verificar a posição atual da imagem e remover as setas(prev e next) conforme necessário
	/*function check_image_position(){				
		if ($(current).is(':last-child')) {
			$('.next').hide();
			$('.prev').show();
		}else if ($(current).is(':first-child')) {
			$('.next').show();
			$('.prev').hide();
		}else{
			$('.next, .prev').show();
		}
	}		*/	

	$('.lightbox div').on('click', 'a', function(event) {
		event.preventDefault();
		var big_image_href = $(this).attr('data-img');

		//$(this).parent().addClass('current');
		$('.cover-lightbox').fadeIn();
		$('.cover-lightbox').append('<img class="image-in-lightbox" src="'+big_image_href+'" alt=""></div>');

		//check_image_position();
	});
	//Fechar
	$('.cover-lightbox').on('click', '.close', function(event) {
		$('.cover-lightbox').fadeOut();
		$('.cover-lightbox .image-in-lightbox').remove();
		//$(current).removeClass('current');
	});
	//Função Next e Prev
	/*$('.cover-lightbox a').on('click', function(e){				
		if($(this).attr('class')=='next'){
			var big_image_href = $(current).next().find('a').attr('href');					

			$(current).next().addClass('current');
			$(current).prev().removeClass('current');

		}else if($(this).attr('class')=='prev'){
			var big_image_href = $(current).prev().find('a').attr('href');

			$(current).prev().addClass('current');
			$(current).next().removeClass('current');
		}
		check_image_position();

		$('.cover-lightbox .image-in-lightbox').remove();
		$('.cover-lightbox').append('<img class="image-in-lightbox" src="'+big_image_href+'" alt=""></div>');
	});*/
});