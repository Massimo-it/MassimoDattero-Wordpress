<?php 

// THEME SETUP

if ( ! function_exists('biolab-theme')) {
  function biolab_setup() {
    add_theme_support("title-tag");
    
    // Enable automatic feed links
    add_theme_support("automatic-feed-links");
    
    //Enable feature image2
    add_theme_support("post-thumbnails");
    
    //Thumbnails size
    add_image_size("biolab_single", 800,493, true);
    add_image_size("biolab_big", 1400, 928, true);
    
    //Custom menu areas
    register_nav_menus(array("header" => esc_html__("header", "biolab")));
    
    //Load theme languages
    load_theme_textdomain("biolab", get_template_directory(), "/languages");
  }
}
add_action("after_setup_theme", "biolab_setup");

/*  Register sidebars
/* ------------------------------------ */
if ( ! function_exists( 'biolab_sidebars' ) ) {

	function biolab_sidebars()	{
		register_sidebar(array( 
      'name' => esc_html__( 'Primary', 'biolab' ),
      'id' => 'primary',
      'description' => esc_html__( 'Normal full width sidebar.', 'biolab' ), 
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'));
	}

}
add_action( 'widgets_init', 'biolab_sidebars' );

// Include style and scripts

if ( ! function_exists("biolab_style_scripts")) {
  function biolab_style_scripts() {
    wp_enqueue_style("biolab", get_template_directory_uri() . '/style.css');
  }
}
add_action("wp_enqueue_scripts", "biolab_style_scripts");  


?>