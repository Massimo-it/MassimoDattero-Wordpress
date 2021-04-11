<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="tema WP con BIOlab">
  
  <!-- link ai fogli di stile - viene richiamato con functions.php
  <link rel="stylesheet" type="text/css" href="style.css">  -->
  
  <!-- FAVICON  -->
	<link rel="shortcut icon" href="" type="image/x-icon">
  
  <!-- non necessario perche' tichiamato in functions.php con add_theme_support("title-tag");
	<title>BIOlab</title>  -->
  
  <?php wp_head(); ?>  <!-- serve per richiamare gli stili dei plugin -->

</head>

<body <?php body_class(); ?>>  <!-- serve per itilizzare le classi di WP per il body -->

  <div class="container">
    <header class="header">
      <a href="http://localhost/biolab/" class="logo"> <?php bloginfo('name'); ?> </a>
      <input class="menu-btn" type="checkbox" id="menu-btn" />
      <label class="menu-icon" for="menu-btn"><span class="navicon"> &#8801 </span><span class="cross"> &#9932 </span></label>
      
      <?php /* Main Navigation */
        wp_nav_menu(array(
          'theme_location' => 'header',
          'depth' => 2,
          'container' => false,
          'menu_class' => 'menu'
          )
        );
      ?>
      
    </header>
    
    
     <?php if(is_front_page()){ ?>

      <h1 class="main-title"><?php bloginfo('description'); ?></h1>

    <?php } else if ( is_category() || is_tag() ) { ?>

			<h1 class="main-title"><?php echo single_cat_title() ?></h1>

		<?php } else if ( is_search() ) { ?>

      <h1 class="main-title"> <?php esc_html_e('Results for:', 'biolab'); ?> <strong><i><?php echo $s; ?></i></strong></h1>

    <?php } ?>