<?php

function pageBanner($args = NULL) {
  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">Hello</h1>
      <div class="page-banner__intro">
        <p>This is a placeholder</p>
      </div>
    </div>  
  </div>
<?php }

function blog_files() {
  wp_enqueue_script('main-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'blog_files');

function blog_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('pageBanner', 1500, 350, true);
  add_theme_support('editor-styles');
  add_editor_style(array('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i', 'build/style-index.css', 'build/index.css'));
}

add_action('after_setup_theme', 'blog_features');

class PlaceholderBlock {
  function __construct($name) {
    $this->name = $name;
    add_action('init', [$this, 'onInit']);
  }

  function ourRenderCallback($attributes, $content) {
    ob_start();
    require get_theme_file_path("/blocks/{$this->name}.php");
    return ob_get_clean();
  }

  function onInit() {
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/blocks/{$this->name}.js", array('wp-blocks', 'wp-editor'));
    
    register_block_type("mkoneblock/{$this->name}", array(
      'editor_script' => $this->name,
      'render_callback' => [$this, 'ourRenderCallback']
    ));
  }
}

new PlaceholderBlock("blogindex");
new PlaceholderBlock("singlepost");
new PlaceholderBlock("header");
new PlaceholderBlock("footer");
class JSXBlock {
  function __construct($name)
  {
    $this->name = $name;
    add_action('init', [$this, 'onInit']);
  }

  function onInit() {
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/build/{$this->name}.js", array('wp-blocks', 'wp-editor'));
    register_block_type("mkoneblock/{$this->name}", array(
      'editor_script' => $this->name
    ));
  }
}

new JSXBlock('banner');
new JSXBlock('genericheading');