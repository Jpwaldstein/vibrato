<?php
namespace ZGM\Vibrato\Classes;

class Setup
{

  public function init()
  {
    add_action('after_setup_theme', array($this,'setup') );
    add_action('widgets_init', array($this,'widgets_init') );
    add_action('wp_enqueue_scripts', array($this,'assets'), 100);
  }
  /**
   * Theme setup
   */
  public function setup()
  {
    // Enable features from Soil when plugin is activated
    // https://roots.io/plugins/soil/
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-relative-urls');

    // Make theme available for translation
    // Community translations can be found at https://github.com/roots/sage-translations
    load_theme_textdomain('vibrato', get_template_directory() . '/lang');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 190,
        'width'       => 190,
        'flex-width'  => false,
        'flex-height' => false,
      )
    );

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus([
      'primary_navigation' => __('Primary Navigation', 'vibrato')
    ]);

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );
    add_image_size( 'logo', '', 100, false );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 190,
        'width'       => 190,
        'flex-width'  => false,
        'flex-height' => false,
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );

    // Add custom editor font sizes.
    add_theme_support(
      'editor-font-sizes',
      array(
        array(
          'name'      => __( 'Small', 'vibrato' ),
          'shortName' => __( 'S', 'vibrato' ),
          'size'      => 19.5,
          'slug'      => 'small',
        ),
        array(
          'name'      => __( 'Normal', 'vibrato' ),
          'shortName' => __( 'M', 'vibrato' ),
          'size'      => 22,
          'slug'      => 'normal',
        ),
        array(
          'name'      => __( 'Large', 'vibrato' ),
          'shortName' => __( 'L', 'vibrato' ),
          'size'      => 36.5,
          'slug'      => 'large',
        ),
        array(
          'name'      => __( 'Huge', 'vibrato' ),
          'shortName' => __( 'XL', 'vibrato' ),
          'size'      => 49.5,
          'slug'      => 'huge',
        ),
      )
    );

    // Editor color palette.
    add_theme_support(
      'editor-color-palette',
      array(
        array(
          'name'  => __( 'Primary', 'vibrato' ),
          'slug'  => 'primary',
          'color' => '#333',
        ),
        array(
          'name'  => __( 'Secondary', 'vibrato' ),
          'slug'  => 'secondary',
          'color' => '#333',
        ),
        array(
          'name'  => __( 'Dark Gray', 'vibrato' ),
          'slug'  => 'dark-gray',
          'color' => '#111',
        ),
        array(
          'name'  => __( 'Light Gray', 'vibrato' ),
          'slug'  => 'light-gray',
          'color' => '#767676',
        ),
        array(
          'name'  => __( 'White', 'vibrato' ),
          'slug'  => 'white',
          'color' => '#FFF',
        ),
      )
    );

    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );

    // Use main stylesheet for visual editor
    // To add custom styles edit /assets/styles/layouts/_tinymce.scss
    add_editor_style(Theme::asset_path('styles/main.css'));
  }

  /**
   * Register sidebars
   */
  public function widgets_init()
  {
    register_sidebar([
      'name'          => __('Primary', 'vibrato'),
      'id'            => 'sidebar-primary',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>'
    ]);

    register_sidebar([
      'name'          => __('Footer', 'vibrato'),
      'id'            => 'sidebar-footer',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);

    register_sidebar([
      'name'          => __('Footer Column 1', 'vibrato'),
      'id'            => 'footer-column-1',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);

    register_sidebar([
      'name'          => __('Footer Column 2', 'vibrato'),
      'id'            => 'footer-column-2',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);

    register_sidebar([
      'name'          => __('Footer Column 3', 'vibrato'),
      'id'            => 'footer-column-3',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);

    register_sidebar([
      'name'          => __('Footer Copyright', 'vibrato'),
      'id'            => 'footer-copyright',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ]);
  }


  /**
   * Determine which pages should NOT display the sidebar
   */
  public static function display_sidebar()
  {
    static $display;

    isset($display) || $display = in_array(true, [
      // The sidebar will NOT be displayed if ANY of the following return true.
      // @link https://codex.wordpress.org/Conditional_Tags
    ]);

    return apply_filters('sage/display_sidebar', $display);
  }

  /**
   * Theme assets
   */
  function assets()
  {
    wp_enqueue_style('sage/css', Theme::asset_path('styles/main.css'), false, null);
    wp_enqueue_style('sage/googlefonts', '//fonts.googleapis.com/css?family=Open+Sans:400,500,700', false, null);

    if (is_single() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('sage/js', Theme::asset_path('scripts/main.js'), ['jquery'], null, true);

    wp_localize_script('sage/js', 'WPREST', array(
      'root' => esc_url_raw( rest_url() ),
      'nonce' => wp_create_nonce('wp_rest'),
      'current_ID' => get_the_ID()
    ));

  }
}

