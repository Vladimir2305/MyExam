<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta charset="UTF-8">
    <title> <?php bloginfo(name); ?> <?php wp_title('&raquo;', true, left); ?></title>
    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <header>

        <nav class="navbar navbar-default">
          <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <h1>
                  <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" class="logo">
                  </a>
                </h1>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
              if ( function_exists( 'wp_nav_menu' ) )
                  wp_nav_menu( 
                    array( 
                    'theme_location' => 'custom-menu',
                    'fallback_cb'=> 'custom_menu',
                    'container' => 'ul',
                    'menu_id' => 'nav',
                    'menu_class' => 'nav navbar-nav navbar-right') 
              );
                else custom_menu();
            ?>

                </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
        </nav>
     <div class="container kategory">
    <h2 class="name-kategory">Blog</h2>
    </div>      
  </header>
