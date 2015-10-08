//Deixa o menu flutuante
    document.onscroll=function() {
      if(document.body.scrollTop>150) {
         document.getElementById('topo').className='fixed';
      }
      else {
        document.getElementById('topo').className='';
      }
    };

    $(document).ready(function(){
	    $('.mk-grid a').click(function(){
	      $('a').removeClass('current');
	      $(this).addClass('current');
	    });

 	});

//Adiciona a tag no menu para que ele troque a cor conforme o fundo da imagem
	$(document).ready(function(){
		$('.cycle-slideshow').on('cycle-before', function (event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
		var bg = $(incomingSlideEl).attr('rel');
		console.log(bg);
		$('#topo div.row').attr('id', bg);
		});  
  	});

//Adiciona o filtro na página portfolio
$(function() {
         /**
          * Atribui o evento click ao link #options a
          * Ao disparar o evento, é executado uma função anônima
          */
         $("#options a").click(function() {
             /**
              * Definimos uma variavel, que recebe
              * O valor do atributo rel
              */
             var type = $(this).attr('rel');
             /**
              * Verificamos se o valor do rel
              * é diferente de all
              */
             if(type !== 'all'){
                 /**
                  * Aqui selecionamos os itens que tem a classe
                  * igual do atributo rel
                  * Usamos o animate, para criar animação em atributos do CSS
                  * que no caso é a largura, e opacidade.
                  * No caso, se tiver oculto, definimos com largura com valor 150,
                  * opacidade valor 1
                  **/
                  $("#grid li."+type).animate({'opacity' : 1});
                  /**
                   * Aqui fazemos a mesma seleção, sendo usando :not,
                   * assim vamos selecionar os itens, que forem direrente
                   * do valor do atributo rel
                   * Usamos o animate, para definir o valor de largura como 0, e opacidade 0
                   */
                  $("#grid li:not(."+type+")").animate({'opacity' : 0.2});
             }else{
                 /**
                  * Caso o atributo rel do link clicado for all
                  * ele vai exibir todos os itens novamente
                  * definimos a largura, e a opacidade como 1
                  */
                  $("#grid li").animate({ 'opacity' : 1});
             }
             /**
              * Retorna como false, anular a ação padrão do link
              */
             return false;
         });
     });

//Lightbox do portfolio
 $(document).ready(function() {
          var $lightbox = $('#lightbox');
          
          $('[data-target="#lightbox"]').on('click', function(event) {
              img_home = $(this).attr('data-img');
              img_w = $(this).attr('data-w');
              img_h = $(this).attr('data-h');
              var $img = $(this).find('img'), 
                  src = $img.attr('src'),
                  alt = $img.attr('alt'),
                  css = {
                      'maxWidth': $(window).width() - 100,
                      'maxHeight': $(window).height() - 100
                  };
          
              $lightbox.find('.close').addClass('hidden');
              $lightbox.find('img').attr('src', img_home);
              $lightbox.find('img').attr('alt', alt);
              /*$lightbox.find('img').attr('width', img_w);*/
              $lightbox.find('img').attr('height', img_h);
              $lightbox.find('img').css(css);
          });
          
          $lightbox.on('shown.bs.modal', function (e) {
              var $img = $lightbox.find('img');
              $lightbox.find('.modal-dialog').css({'width': $img.width()});
              $lightbox.find('.close').removeClass('hidden');
          });

      });