<?php
function theme_styles() {
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700|Open+Sans:300,400,600,700|Raleway:300,400,500,600|Roboto:100,300,400,500,700|Lato:100,300,400,700', false );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', false );
	wp_enqueue_style( 'main_css', get_stylesheet_uri() );
	wp_enqueue_style( 'fancybox_css', get_template_directory_uri() . '/assets/css/jquery.fancybox.css' );
	wp_enqueue_style( 'slicknav_css', get_template_directory_uri() . '/assets/css/slicknav.css' );
	wp_enqueue_style( 'jquery_bxslider_css', get_template_directory_uri() . '/assets/css/jquery.bxslider.css' );
	wp_enqueue_style( 'animate_css', get_template_directory_uri() . '/assets/css/animate.css' );

	wp_enqueue_style( 'styleMax320_css', get_template_directory_uri() . '/assets/css/styleMax320.css', array(),(mt_rand(10,100)),'only screen and (max-width: 320px)');
	wp_enqueue_style( 'styleMax480_css', get_template_directory_uri() . '/assets/css/styleMax480.css', array(),(mt_rand(10,100)),'only screen and (min-width: 321px) and (max-width: 480px)');
	wp_enqueue_style( 'styleMax768_css', get_template_directory_uri() . '/assets/css/styleMax768.css', array(),(mt_rand(10,100)),'only screen and (min-width: 481px) and (max-width: 768px)');
	wp_enqueue_style( 'styleMax992_css', get_template_directory_uri() . '/assets/css/styleMax992.css', array(),(mt_rand(10,100)),'only screen and (min-width: 769px) and (max-width: 992px)');
	wp_enqueue_style( 'styleMax1024_css', get_template_directory_uri() . '/assets/css/styleMax1024.css', array(),(mt_rand(10,100)),'only screen and (min-width: 993px) and (max-width: 1025px)');
	wp_enqueue_style( 'styleMax1280_css', get_template_directory_uri() . '/assets/css/styleMax1280.css', array(),(mt_rand(10,100)),'only screen and (min-width: 1026px) and (max-width: 1290px)');
	wp_enqueue_style( 'styleMax1440_css', get_template_directory_uri() . '/assets/css/styleMax1440.css', array(),(mt_rand(10,100)),'only screen and (min-width: 1291px) and (max-width: 1450px)');
	wp_enqueue_style( 'styleMax1600_css', get_template_directory_uri() . '/assets/css/styleMax1600.css', array(),(mt_rand(10,100)),'only screen and (min-width: 1451px) and (max-width: 1620px)');
	wp_enqueue_style( 'styleMax1680_css', get_template_directory_uri() . '/assets/css/styleMax1680.css', array(),(mt_rand(10,100)),'only screen and (min-width: 1621px) and (max-width: 1690px)');
	wp_enqueue_style( 'styleMax1920_css', get_template_directory_uri() . '/assets/css/styleMax1920.css', array(),(mt_rand(10,100)),'only screen and (min-width: 1691px) and (max-width: 1920px)');
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {
	global $wp_scripts;
	wp_enqueue_script( 'html5_js', get_template_directory_uri() . '/assets/js/html5.js');
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js');
	wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/assets/js/jquery.fancybox.pack.js');
	wp_enqueue_script( 'fancybox_media_js', get_template_directory_uri() . '/assets/js/helpers/jquery.fancybox-media.js');
	wp_enqueue_script( 'slicknav_js', get_template_directory_uri() . '/assets/js/jquery.slicknav.js');
	wp_enqueue_script( 'jquery_matchHeight_min_js', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js');
	wp_enqueue_script( 'jquery_bxslider_min_js', get_template_directory_uri() . '/assets/js/jquery.bxslider.min.js');
	wp_enqueue_script( 'jquery_wow_min_js', get_template_directory_uri() . '/assets/js/wow.min.js');

	wp_enqueue_script( 'theme_script_js', get_template_directory_uri() . '/assets/js/theme.script.js');
}
add_action( 'wp_enqueue_scripts', 'theme_js');

add_filter('wp_mail_from_name', 'new_mail_from_name'); 
function new_mail_from_name($old) {
	$site_title = get_bloginfo( 'name' );
	return $site_title;
}

register_nav_menus( array(
    'mainmenu' => __( 'Main Menu'),
    'footer_navigation' => __('Footer Navigation')
));

register_sidebar(array('name'=>'Blog Sidebar',
'id' => 'blog_sidebar',
'before_widget' => '<div class="sidebar_content %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

register_sidebar(array('name'=>'Newsletter',
'id' => 'newsletter',
'before_widget' => '<div class="newsletter_wrapper %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2 style="display:none;">',
'after_title' => '</h2>',
));

register_sidebar(array('name'=>'',
'id' => '',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2 style="display:none;">',
'after_title' => '</h2>',
));

function encripted($data){
	$key1 = '644CBEF595BC9';
	$final_data = $key1.'|'.$data;
	$val = base64_encode(base64_encode(base64_encode($final_data)));
	return $val;
}
function decripted($data){
	$val = base64_decode(base64_decode(base64_decode($data)));
	$final_data = explode('|', $val);
	return $final_data[1];
}

add_theme_support( 'post-thumbnails' );
add_image_size( 'homepage-thumb', 288, 151, true );

function content($limit, $postid) {
    $post = get_page($postid);
    $fullContent = $post->post_content; 
    $content = explode(' ', $fullContent, $limit);
    if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
    } else {
		$content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

function custom_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					//echo get_avatar( $comment, 44 );
                ?>
                <div class="comment-text">
                <p class="meta">
                <?php
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( ' - ' ) . '</span>' : ''
					);
                ?>
    			<?php if ( '0' == $comment->comment_approved ) : ?>
    				<?php _e( 'Your comment is awaiting moderation.' ); ?>
    			<?php endif; ?>
        			<section class="comment-content comment">
        				<?php comment_text(); ?>
        				<?php edit_comment_link( __( 'Edit' ), '<strong class="edit-link">', '</strong>' ); ?>
        			</section><!-- .comment-content -->
        				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply' ), 'after' => ' <span></span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        <?php
        					printf( '<time datetime="%2$s">%3$s</time>',
        						esc_url( get_comment_link( $comment->comment_ID ) ),
        						get_comment_time( 'c' ),
        						/* translators: 1: date, 2: time */
        						sprintf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() )
        					);
        				?>
                        <div style="clear: both;"></div>
                    </p>
                </div>
			</div><!-- .comment-meta -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}

if (!current_user_can('administrator')):
    show_admin_bar(false);
endif;

function mytheme_setup() {
	update_option('image_default_align', 'center' );
	update_option('image_default_link_type', 'none' );
	update_option('image_default_size', 'large' );
}

function get_user_role($userid){ 
	$user_info = get_userdata($userid);
 	$role = implode(', ', $user_info->roles);
 	return $role;
}

require_once dirname( __FILE__ ) . '/frameworks/tgm/class-tgm-plugin-activation.php';
require_once dirname( __FILE__ ) . '/frameworks/tgm/tgm-activation-config.php';

/*require_once dirname( __FILE__ ) . '/frameworks/redux/ReduxCore/framework.php';
require_once dirname( __FILE__ ) . '/frameworks/redux/admin-config.php';*/

//**********************************************
//
// Usage 
// [grid_section]
// [grid_col size=""]content[/grid_col]
// [/grid_section]
//
//**********************************************

// Don't get run over.
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

/*************************/
add_filter('manage_users_columns', 'pippin_add_user_id_column');
function pippin_add_user_id_column($columns) {
    $columns['user_status'] = 'User Status';
    return $columns;
}
 
add_action('manage_users_custom_column',  'pippin_show_user_id_column_content', 10, 3);
function pippin_show_user_id_column_content($value, $column_name, $user_id) {
    if($user_id >1){
        $user = get_userdata( $user_id );
        $current_url = 'http://';
        $current_url .= $_SERVER['HTTP_HOST']; // Get host
        $path = explode( '?', $_SERVER['REQUEST_URI'] ); // Blow up URI
        $current_url .= $path[0]; // Only use the rest of URL - before any parameters
    	if ( 'user_status' == $column_name ){
    	   if($user->user_status == 2){
    	       $status = "<form method='GET' action='$current_url'><input type='hidden' name='uid' value='$user_id' /><input type='submit' class='button button-secondary button-large' name='up_user_status' value='Deactivate' /></form>";
    	   }
    	   if(($user->user_status == 3) || ($user->user_status == 0)){
    	       $status = "<form method='GET' action='$current_url'><input type='hidden' name='uid' value='$user_id' /><input type='submit' class='button button-primary button-large' name='up_user_status' value='Activate' /></form>";
    	   }
    	}
    		return $status;
        return $value;
    }
}
function add_scripts() {
    $current_screen = get_current_screen();

    if ( $current_screen = 'users.php' ) {
        global $wpdb;
        if($_GET['up_user_status'] == 'Deactivate') {
            $uid = $_GET['uid'];
            $user_status = 3;
            $wpdb->update($wpdb->users, array('user_status' => $user_status), array('ID' => $uid));
            $current_url = 'http://';
            $current_url .= $_SERVER['HTTP_HOST']; // Get host
            $path = explode( '?', $_SERVER['REQUEST_URI'] ); // Blow up URI
            $current_url .= $path[0]; // Only use the rest of URL - before any parameters
            //$current_url = urlencode( $current_url ); // Encode it for use
            ?>
                <script>window.location="<?php echo $current_url; ?>";</script>            
            <?php            
        }
        if($_GET['up_user_status'] == 'Activate') {
            $uid = $_GET['uid'];
            $user_status = 2;
            $wpdb->update($wpdb->users, array('user_status' => $user_status), array('ID' => $uid));
            $current_url = 'http://';
            $current_url .= $_SERVER['HTTP_HOST']; // Get host
            $path = explode( '?', $_SERVER['REQUEST_URI'] ); // Blow up URI
            $current_url .= $path[0]; // Only use the rest of URL - before any parameters
            //$current_url = urlencode( $current_url ); // Encode it for use
            ?>
                <script>window.location="<?php echo $current_url; ?>";</script>            
            <?php
        }
    }
}
add_action( 'admin_head', 'add_scripts' );

	/* This is for client testimonial */
	add_action('init', 'services_register');
	function services_register() {
		$labels = array(
			'name' => __('Services'),
			'singular_name' => __('Service'),
			'add_new' => __('Add New'),
			'add_new_item' => __('Add New Service'),
			'edit_item' => __('Edit Service'),
			'new_item' => __('New Service'),
			'view_item' => __('View Service'),
			'search_items' => __('Search Service'),
			'not_found' =>  __('Nothing found'),
			'not_found_in_trash' => __('Nothing found in Trash'),
			'parent_item_colon' => ''
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon' => 'dashicons-admin-tools',
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail')
		);
		register_post_type( 'marina-services' , $args );
	}

	add_action('init', 'amenities_register');
	function amenities_register() {
		$labels = array(
			'name' => __('Amenities'),
			'singular_name' => __('Amenity'),
			'add_new' => __('Add New'),
			'add_new_item' => __('Add New Amenity'),
			'edit_item' => __('Edit Amenity'),
			'new_item' => __('New Amenity'),
			'view_item' => __('View Amenity'),
			'search_items' => __('Search Amenity'),
			'not_found' =>  __('Nothing found'),
			'not_found_in_trash' => __('Nothing found in Trash'),
			'parent_item_colon' => ''
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon' => 'dashicons-admin-multisite',
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail')
		);
		register_post_type( 'marina-amenity' , $args );
	}
?>