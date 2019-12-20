<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/


// USE TO SWITCH BETWEEN transcontinental and zenith themes
if (defined('WEBSITE_THEME')) {
    $website_theme = WEBSITE_THEME;
} else {
    $website_theme = 'Transcontinental';
}

function get_website_theme() {
    global $website_theme;
    return $website_theme;
}

function is_zenith(){
  return (get_website_theme()  == 'zenith' );
}
// USE TO SWITCH BETWEEN transcontinental and zenith themes



if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 1600, '', true); // Large Thumbnail
    add_image_size('medium', 800, '', true); // Medium Thumbnail
    add_image_size('small', 400, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/


function wf_version(){
  return '0.1.2';
}




function google_maps_key() {

    echo 'AIzaSyAsIAIeE3FYSHQMTi-PNd5EURPDhQCfxfw';

}



// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul >%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

          wp_deregister_script('jquery');


        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!




    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        // wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        // wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles() {

    // remove gutenberg css
    wp_dequeue_style( 'wp-block-library' );


    $tdu = get_template_directory_uri();
    wp_register_style('reset', $tdu . '/css/reset.css', array(), wf_version(), 'all');
    wp_enqueue_style('reset'); // Enqueue it!

    wp_register_style('html5blank', $tdu . '/style.css', array(), wf_version(), 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

     wp_register_style('unslider', $tdu . '/css/unslider.css', array(), wf_version(), 'all');
     wp_enqueue_style('unslider'); // Enqueue it!

     wp_register_style('featherlight', $tdu . '/css/featherlight.min.css', array(), wf_version(), 'all');
     wp_enqueue_style('featherlight'); // Enqueue it!

     wp_register_style('justifiedGallery', $tdu . '/css/justifiedGallery.min.css', array(), wf_version(), 'all');
     wp_enqueue_style('justifiedGallery'); // Enqueue it!

     wp_register_style('slick', $tdu . '/css/slick.css', array(), wf_version(), 'all');
     wp_enqueue_style('slick'); // Enqueue it!



     if (get_website_theme() == 'zenith') {
         wp_register_style('zenith', $tdu . '/zenith.css', array(), wf_version(), 'all');
         wp_enqueue_style('zenith'); // Enqueue it!
     }

}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank') // Main Navigation

    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{


    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Sidebar', 'html5blank'),
        'description' => __('Sidebar', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

	<div class="row comment-body">

	<div class="col-sm-2 comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="col-sm-10 comment-meta commentmetadata">
        <?php echo get_comment_author_link() ?> on <?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>

            <?php comment_text() ?>

     <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
	</div>


<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu

add_action('init', 'create_post_type_slide'); // Add our Slide Type

add_action( 'admin_menu', 'remove_menus' );



add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
// add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_slide()
{

    register_post_type('slide', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Slide', 'html5blank'), // Rename these to suit
            'singular_name' => __('Slide', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Nouvelle Slide', 'html5blank'),
            'edit' => __('Modifier', 'html5blank'),
            'edit_item' => __('Modifier Slide', 'html5blank'),
            'new_item' => __('Nouvelle Slide', 'html5blank'),
            'view' => __('Afficher Slide', 'html5blank'),
            'view_item' => __('Afficher Slide', 'html5blank'),
            'search_items' => __('Chercher Slides', 'html5blank'),
            'not_found' => __('Aucune Slide trouvée', 'html5blank'),
            'not_found_in_trash' => __('Aucune Slide trouvée dans la Corbeille', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array(
            'title',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(

        ) // Add Category and Post Tags support
    ));
}


// Create 1 Custom Post type for a Demo, called HTML5-Blank
add_action('init', 'create_custom_post_types'); // Add our HTML5 Blank Custom Post Type
function create_custom_post_types()
{




  $labels_offre_cat = array(
        'name'                       => 'Catégories',
        'singular_name'              => 'Catégorie',
        'menu_name'                  => 'Catégorie',
        'all_items'                  => 'Toutes les Catégories',
        'parent_item'                => 'Catégorie parente',
        'parent_item_colon'          => 'Catégorie parente:',
        'new_item_name'              => 'Nom de la nouvelle catégorie',
        'add_new_item'               => 'Ajouter une catégorie',
        'edit_item'                  => 'Modifier catégorie',
        'update_item'                => 'Mettre à jour la catégorie',
        'separate_items_with_commas' => 'Séparer les catégories avec des virgules',
        'search_items'               => 'Chercher dans les catégories',
        'add_or_remove_items'        => 'Ajouter ou supprimer des catégories',
        'choose_from_most_used'      => 'Choisir parmi les catégories les plus utilisées',
    );
    $args_offre_cat = array(
        'labels'                     => $labels_offre_cat,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'offre_cat', array( 'offre' ), $args_offre_cat );



    // register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    // register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('media-pdf', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Medias / PDFs', 'webfactor'), // Rename these to suit
            'singular_name' => __('Media / PDF', 'webfactor'),
            'add_new' => __('Ajouter', 'webfactor'),
            'add_new_item' => __('Ajouter Media / PDF', 'webfactor'),
            'edit' => __('Modifier', 'webfactor'),
            'edit_item' => __('Modifier Media / PDF', 'webfactor'),
            'new_item' => __('Nouveau Media / PDF', 'webfactor'),
            'view' => __('Afficher Media / PDF', 'webfactor'),
            'view_item' => __('Afficher Media / PDF', 'webfactor'),
            'search_items' => __('Chercher un Media / PDF', 'webfactor'),
            'not_found' => __('Aucun Media / PDF trouvé', 'webfactor'),
            'not_found_in_trash' => __('Aucun Media / PDF trouvé dans la Corbeille', 'webfactor')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'menu_icon' => 'dashicons-media-interactive',
        'supports' => array(
            'title',
            'editor'//,
            //'excerpt',
            //'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        //    'post_tag',
        //    'category'
        ) // Add Category and Post Tags support
    ));

    register_post_type('offre', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('Offres', 'html5blank'), // Rename these to suit
            'singular_name' => __('Offre', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Ajouter une offre', 'html5blank'),
            'edit' => __('Modifier', 'html5blank'),
            'edit_item' => __('Modifier l\'offre', 'html5blank'),
            'new_item' => __('Nouvelle offre', 'html5blank'),
            'view' => __('Afficher l\'offre ', 'html5blank'),
            'view_item' => __('Afficher l\'offre', 'html5blank'),
            'search_items' => __('Chercher une offre', 'html5blank'),
            'not_found' => __('Aucune offre trouvée', 'html5blank'),
            'not_found_in_trash' => __('Aucune offre trouvée dans la corbeille', 'html5blank')
        ),
        'public' => true,
        'exclude_from_search' => false,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'menu_icon' => 'dashicons-palmtree',
        'supports' => array(
            'title',
            'thumbnail',
            'excerpt'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
          'offre_cat'
        ) // Add Category and Post Tags support
    ));

}




/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}




function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Ajouter ';
    $labels->add_new_item = 'Ajouter';
    $labels->edit_item = 'Modifier';
    $labels->new_item = 'Nouvelle News';
    $labels->view_item = 'Afficher';
    $labels->search_items = 'Chercher News';
    $labels->not_found = 'Aucune News trouvée';
    $labels->not_found_in_trash = 'Aucune News trouvée dans la Corbeille';
    $labels->all_items = 'Toutes les News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );



// ONLY SHOW PAGE AND POST IN SEARCH RESULTS
add_filter('pre_get_posts','search_filter');
function search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', array('page', 'post' ) );
    }
    return $query;
}



function get_page_siblings($id){
    global $wpdb;
    $search_id = ( wp_get_post_parent_id(  $id   ) > 0  ) ? wp_get_post_parent_id( $id ) :  $id ;
    $siblings = $wpdb->get_results(
        "SELECT ID, post_title
        FROM $wpdb->posts
        WHERE ID = $search_id
        OR post_parent = $search_id
        AND post_type = 'page'
        AND post_status = 'publish'
       ORDER BY post_parent ASC, post_date DESC

        "
    );

    return $siblings;


}


define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);



// include_once('functions_upload_news.php');




function remove_menus(){

  remove_menu_page( 'index.php' );                  //Dashboard
  // remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
  // add_menu_page('Menu', 'Menu', 'manage_sites', 'nav-menus.php' );                 //Appearance
  remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );               //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
  remove_menu_page( 'profile.php' );        //Settings

}
add_action( 'admin_menu', 'remove_menus' );

// add_filter('acf/settings/show_admin', '__return_false');

function remove_wpcf7() {
   // remove_menu_page( 'wpcf7' );
}
//add_action( 'admin_menu', 'remove_menus' );
add_action('admin_menu', 'remove_wpcf7');



function thumbnail_of_post_url( $post_id,  $size='large'  ) {

    $image_id = get_post_thumbnail_id(  $post_id );
    $image_url = wp_get_attachment_image_src($image_id, $size  );
    $image = $image_url[0];
    return $image;

}


function chilly_site_favicons() {
    $tdu = get_template_directory_uri();

    if ( get_website_theme() == 'zenith' ) {
        $icon_dir = $tdu . '/img/faviconzenith';
    } else {
        $icon_dir = $tdu . '/img/favicon';
    }
    $icons = array(
        '<link rel="apple-touch-icon" sizes="57x57" href="' . $icon_dir . '/apple-icon-57x57.png">',
        '<link rel="apple-touch-icon" sizes="60x60" href="' . $icon_dir . '/apple-icon-60x60.png">',
        '<link rel="apple-touch-icon" sizes="72x72" href="' . $icon_dir . '/apple-icon-72x72.png">',
        '<link rel="apple-touch-icon" sizes="76x76" href="' . $icon_dir . '/apple-icon-76x76.png">',
        '<link rel="apple-touch-icon" sizes="114x114" href="' . $icon_dir . '/apple-icon-114x114.png">',
        '<link rel="apple-touch-icon" sizes="120x120" href="' . $icon_dir . '/apple-icon-120x120.png">',
        '<link rel="apple-touch-icon" sizes="144x144" href="' . $icon_dir . '/apple-icon-144x144.png">',
        '<link rel="apple-touch-icon" sizes="152x152" href="' . $icon_dir . '/apple-icon-152x152.png">',
        '<link rel="apple-touch-icon" sizes="180x180" href="' . $icon_dir . '/apple-icon-180x180.png">',
        '<link rel="icon" type="image/png" sizes="192x192" href="' . $icon_dir . '/android-icon-192x192.png">',
        '<link rel="icon" type="image/png" sizes="32x32" href="' . $icon_dir . '/favicon-32x32.png">',
        '<link rel="icon" type="image/png" sizes="96x96" href="' . $icon_dir . '/favicon-96x96.png">',
        '<link rel="icon" type="image/png" sizes="16x16" href="' . $icon_dir . '/favicon-16x16.png">'
    );

    echo implode("\n", $icons);

}

function chilly_site_logo() {
    $tdu = get_template_directory_uri();
    if ( get_website_theme() == 'zenith' ) {
        echo '<img src="' .  $tdu. '/img/zenith.svg" alt="Zenith Voyages" />';
    } else {
        echo '<img src="' .  $tdu. '/img/logo.png" alt="Transcontinental" />';
    }

}


function social_meta_properties(){

    $smp =  new stdClass();

    if ( get_website_theme() == 'zenith' ) {
        $smp->site_name = 'Zenith Voyages';
        $smp->facebook_id = '250511685428818';
    } else {
        $smp->site_name = 'Transcontinental';
        $smp->facebook_id = '250511685428818';
    }

    global $post;


    if (is_single() || is_page()) {

        $post_id = get_the_ID();
        $smp->title = get_the_title();
        // $excerpt  =  get_the_excerpt();
        // if ($excerpt == '') $excerpt =  wp_trim_words($post->post_content,20);
        // $smp->description = $excerpt;
        $smp->description = get_bloginfo('description');
        $smp->image =  thumbnail_of_post_url( $post_id, 'large' );
        if ($smp->image == '') {
            $smp->image =   get_template_directory_uri() . '/img/transcontinental_share.jpg';
        }
        $smp->url = get_the_permalink();
        $smp->type = 'article';

    } else {
        $smp->title =    get_bloginfo('name');
        $smp->description = get_bloginfo('description');
        $smp->image =   get_template_directory_uri() . '/img/transcontinental_share.jpg';
        $smp->url = get_home_url();
        $smp->type = 'website';
    }


    return $smp;


}




function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    // add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );


function remove_json_api () {

    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    // Remove all embeds rewrite rules.
    // add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action( 'after_setup_theme', 'remove_json_api' );



function chilly_json_ld() {

    if( get_website_theme() == 'zenith'   ) {

        echo '<script type="application/ld+json">
        {
            "@context": {
                "@vocab": "http://schema.org/"
            },
            "@graph": [
                {
                    "@id": "https://zenithvoyages.ch/",
                    "@type": "Organization",
                    "name": "Zenith Voyages",
                    "email" : "info@zenithvoyages.ch",
                    "url" : "https://zenithvoyages.ch/",
                    "logo" : "https://zenithvoyages.ch/wp-content/themes/transcontinental-2019/img/faviconzenith/android-icon-192x192.png"
                },
                {
                    "@type": "LocalBusiness",
                    "parentOrganization": {
                        "name" : "Zenith Voyages"
                    },
                    "name" : "Agence de Gland",
                    "image" : "https://zenithvoyages.ch/wp-content/themes/transcontinental-2019/img/faviconzenith/android-icon-192x192.png",
                    "address": {
                        "@type" : "PostalAddress",
                        "streetAddress": "9, Avenue du Mont-Blanc",
                        "addressLocality": "Gland",
                        "addressRegion": "Vaud",
                        "postalCode": "CH-1196",
                        "telephone" : "+41 22 518 39 77",
                        "email" : "info@zenithvoyages.ch"
                    },
                    "openingHours": [ "Mo-Fr 08:30-18:00", "Sa 09:00-12:00"]
                },
                {
                    "@type": "LocalBusiness",
                    "parentOrganization": {
                        "name" : "Zenith Voyages"
                    },
                    "name" : "Agence de Nyon",
                    "image" : "https://zenithvoyages.ch/wp-content/themes/transcontinental-2019/img/faviconzenith/android-icon-192x192.png",
                    "address": {
                        "@type" : "PostalAddress",
                        "streetAddress": "6, place Bel-Air",
                        "addressLocality": "Nyon",
                        "addressRegion": "Vaud",
                        "postalCode": "CH-1260",
                        "telephone" : "+41 22 362 98 80",
                        "email" : "nyon@zenithvoyages.ch"
                    },
                    "openingHours": [ "Mo-Fr 09:00-18:00", "Sa 09:00-12:00"]
                }
            ]
        }
        </script>';

    }

}





?>
