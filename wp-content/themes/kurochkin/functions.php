<?php
// Connect the styles and scripts
function my_theme_scripts() {
    wp_enqueue_style( 'my-css', get_stylesheet_uri() );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '0.1' );
    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.js', array('jquery'), '0.1' );
    function enqueue_scripts () {
    wp_register_script('jquery-latest', 'http://code.jquery.com/jquery-latest.min.js');
    wp_enqueue_script('jquery-latest');
    }

}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Произвольное меню
if ( function_exists( 'register_nav_menus' ) )
{
	register_nav_menus(
		array(
			'custom-menu'=>__('Custom menu'),
		)
	);
}

function custom_menu(){
	echo '<ul>';
	wp_list_pages('title_li=&');
	echo '</ul>';
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Кастомный post type "КУРСЫ"
// function custom_post_courses() {
//     $labels = array(
//         'name'               => _x( 'Курсы', 'post type general name' ),
//         'singular_name'      => _x( 'Курсы', 'post type singular name' ),
//         'add_new'            => _x( 'Добавить новый', 'courses' ),
//         'add_new_item'       => __( 'Добавить новый курс' ),
//         'edit_item'          => __( 'Редактировать курс' ),
//         'new_item'           => __( 'Новый курс' ),
//         'all_items'          => __( 'Все курсы' ),
//         'view_item'          => __( 'Просмотр курса' ),
//         'search_items'       => __( 'Поиск курса' ),
//         'not_found'          => __( 'Курс не найден' ),
//         'not_found_in_trash' => __( 'Курс не найден в Корзине' ),
//         'parent_item_colon'  => '',
//         'menu_name'          => 'Курсы'
//     );
//     $args = array(
//         'labels'        => $labels,
//         'description'   => 'Для добавления нового курса',
//         'public'        => true,
//         'menu_position' => 5,
//         'menu_icon'     => 'dashicons-welcome-learn-more',
//         'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
//         'has_archive'   => true,
//     );
//     register_post_type( 'courses', $args );    
// }
// add_action( 'init', 'custom_post_courses' );

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//добавляем миниатюры к страницам и записям в админке
add_theme_support( 'post-thumbnails' );

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
Логотип сайта. Там где нужно подставлять логотип необходимо вставить:
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">
*/
$args = array(
    'width'         => 0, //Максимальный размер ширины логотипа (px)
    'height'        => 0, //Максимальный размер высоты логотипа (px)
    'default-image' => get_template_directory_uri() . '/images/logo.png',//по умолчанию путь к логотипу
    'uploads'       => true, // Возможность загрузить свой логотип
);
add_theme_support( 'custom-header', $args );
/*
Background сайта. Для того чтобы работало необходимо в header.php вставить:
<style type="text/css" id="custom-background-css">
body.custom-background { background-color: #bdd96e; }
</style>
*/


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Регистрируем сайдбары
    if ( function_exists('register_sidebar') ) {

    register_sidebar(array(
        'id' => 'sidebar-right',
        'name' => 'sidebar-right',
        'before_widget' => '<aside class="right-sidebar">',
        'before_title' => '<h5 class="sidebar">',
        'after_title' => '</h5>',
        'after_widget' => '</aside>'
    ));
// При регистрации нового сайдбара код ТУТ (до фигурной скобки "}")    
}

// Theme Customization API
function geekhub_customize_register( $wp_customize ) {
$wp_customize->add_section( 'geekhub_copyright' , array(
'title'      => __( 'Copyright', 'geekhub' ),
'priority'   => 30,
));

$wp_customize->add_setting( 'copyright_details' , array(
'default'     => 'Geekhub',
'transport'   => 'refresh',
));

$wp_customize->add_control( 'copyright_details', array(
'label'        => __( 'Copyright info', 'geekhub' ),
'section'    => 'geekhub_copyright',
'settings'   => 'copyright_details',
));

}

add_action( 'customize_register', 'geekhub_customize_register' );





// Footer copyright
function devise_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = " " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}

//Comments 
    
?>