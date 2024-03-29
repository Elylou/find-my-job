<?php
//**********************************************All Styles and Script****************************************** */
if (!function_exists('fmj_scripts')):
  // On ajoute ici ce qui sera executé dans les hooks WP_HEAD & WP_FOOTER
  function fmj_scripts() {
    // Mon fichier de style css
    wp_enqueue_style(
      'fmj-app-css',
      get_theme_file_uri('/public/css/app.css'),
      ['fmj-vendor-css']
      );
    wp_enqueue_style(
      'fmj-vendor-css',
      get_theme_file_uri('/public/css/vendor.css'),
      []
      );
    // Je déclare mon app.js après vendor.js & dans le footer
    wp_enqueue_script(
      'fmj-app-js',
      get_theme_file_uri('/public/js/app.js'),
      ['fmj-vendor-js'],
      '1.0.0',
      true);
    // Je déclare mon vendor.js dans le footer
    wp_enqueue_script(
      'fmj-vendor-js',
      get_theme_file_uri('/public/js/vendor.js'),
      [],
      '1.0.0',
      true);
  }
  endif;
  add_action('wp_enqueue_scripts', 'fmj_scripts');
  
  function university_files() {
    wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyBVUhd_xCTLYT2u7YSMOfEIniKZ9EAxRIM', NULL, '1.0', true);
    wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('fmj_main_styles', get_stylesheet_uri());
    wp_localize_script('main-university-js', 'universityData', array(
      'root_url' => get_site_url(),
      //security
      'nonce' => wp_create_nonce('wp_rest')
    ));
  }




/*************************************MAP GOOGLE***************************************/
add_action('pre_get_posts', 'university_adjust_queries');

function universityMapKey($api) {
  $api['key'] = 'AIzaSyBVUhd_xCTLYT2u7YSMOfEIniKZ9EAxRIM';
  return $api;
}

add_filter('acf/fields/google_map/api', 'universityMapKey');

/*************************************************Menu ********************************************/
//Create menu footer
function wppln_mes_menus() {
  register_nav_menus(
    array(
      'menu-nav' => __( 'menu-nav' ),
      'footer-list' => __( 'footer-list'),
      'privacy' => __( 'privacy' )
    )
  );
}
add_action( 'init', 'wppln_mes_menus' );
add_action('wp_enqueue_scripts', 'university_files');

//Size for images
function university_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}
add_action('after_setup_theme', 'university_features');

/*****************************EVENTS****************************************/
function university_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('campus') AND is_main_query()) {
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() AND is_post_type_archive('program') AND is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() AND is_post_type_archive('event') AND is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              )
            ));
  }
}
//Custom format date
function display_french_date($date) {
  $dateformatstring_day = "l ";
  $dateformatstring_date = "d ";
  $dateformatstring_month = " F Y";
  $unixtimestamp = strtotime($date);
  echo date_i18n($dateformatstring_day, $unixtimestamp);
  echo intval(date_i18n($dateformatstring_date, $unixtimestamp));
  echo date_i18n($dateformatstring_month, $unixtimestamp);
}
//time 
function display_time($time) {
  echo date("H:i", strtotime($time));
}
// event for one day complet
function get_date($date) {
  return date("d m Y", strtotime($date));
}
// Redirect subscriber accounts out of admin and into homepage
add_action('admin_init', 'redirectSubsToFrontend');


/************************USER and Admin adjust************************/
function redirectSubsToFrontend() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}
//delete the admin bar for subcriber
add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}

/*************************LOGIN page ***************************/

// Customize Login Screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl() {
  return esc_url(site_url('/'));
}
//delete the WordPress logo to my "logo"
add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}

add_filter('login_headertitle', 'ourLoginTitle');
// delete "powered by WordPress"
function ourLoginTitle() {
  return get_bloginfo('name');
}



//****************************Banner******************************************************
add_action('rest_api_init', 'university_custom_rest');
function pageBanner($args = NULL) {
  
  if (!$args['title']) {
    $args['title'] = get_the_title();
  }

  if (!$args['subtitle']) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if (!$args['photo']) {
    if (get_field('page_banner_background_image')) {
      $args['photo'] = get_field('page_banner_background_image');
    } else {
      $args['photo'] = get_theme_file_uri('/images/bus.jpg');
    }
  }

  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>  
  </div>
<?php }

/***********************NOTES********************************************/
function university_custom_rest() {
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));

  register_rest_field('note', 'userNoteCount', array(
    'get_callback' => function() {return count_user_posts(get_current_user_id(), 'note');}
  ));
}


// Force note posts to be private
add_filter('wp_insert_post_data', 'makeNotePrivate', 10, 2);

function makeNotePrivate($data, $postarr) {
  if ($data['post_type'] == 'note') {
    if(count_user_posts(get_current_user_id(), 'note') > 4 AND !$postarr['ID']) {
      die("Vous avez attends la limite de notes");
    }

    $data['post_content'] = sanitize_textarea_field($data['post_content']);
    $data['post_title'] = sanitize_text_field($data['post_title']);
  }

  if($data['post_type'] == 'note' AND $data['post_status'] != 'trash') {
    $data['post_status'] = "private";
  }
  
  return $data;
}


require get_theme_file_path('/inc/like-route.php');
require get_theme_file_path('/inc/search-route.php');