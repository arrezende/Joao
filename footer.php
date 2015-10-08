<?php  global $data;?>
<?php wp_footer(); ?>
<footer id="rodape" class="container-fluid">
  <div class="content container">
      <div class="row">
          <div class="col-sm-4">
              <?php
                  if(is_active_sidebar('1-widget-area')){
                  dynamic_sidebar('1-widget-area');
                  }
              ?>
          </div>
          <div class="col-sm-4">
              
              <?php
                  if(is_active_sidebar('2-widget-area')){
                  dynamic_sidebar('2-widget-area');
                  }
              ?>
          </div>
          <div class="col-sm-4">
              <?php
                  if(is_active_sidebar('3-widget-area')){
                  dynamic_sidebar('3-widget-area');
                  }
              ?>
          </div>          
      </div>
  </div>                 
</footer>
  <div id="pos-footer" class="container-fluid">
      <div class="content center container">
          <div class="row">
              <div class="col-sm-6 copy">
                  © Copyright 2015. <?php bloginfo('name'); ?>
              </div>
              <div class="col-sm-6 social">
                  <ul>
                      <?php if($data['link_fb']){ ?>
                        <li><a href="<?php echo $data['link_fb']; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
                      <?php } ?>
                      <?php if($data['link_tw']){ ?>
                        <li><a href="<?php echo $data['link_tw']; ?>" target="_blank"><i class="icon-twitter"></i></a></li>
                      <?php } ?>
                      <?php if($data['link_g+']){ ?>
                        <li><a href="<?php echo $data['link_g+']; ?>" target="_blank"><i class="icon-google-plus"></i></a></li>
                      <?php } ?>
                      <?php if($data['link_ins']){ ?>
                        <li><a href="<?php echo $data['link_ins']; ?>" target="_blank"><i class="icon-instagram"></i></a></li>
                      <?php } ?>
                      <?php if($data['link_pin']){ ?>
                        <li><a href="<?php echo $data['link_pin']; ?>" target="_blank"><i class="icon-pinterest"></i></a></li>
                      <?php } ?>
                  </ul>
              </div>
              
          </div>

      </div>
  </div>
  <script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js" type="text/javascript"></script>       
  </body>
</html>