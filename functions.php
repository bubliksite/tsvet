<?
/** Перечень стилей и скриптов **/
function load_style_script () {
	wp_enqueue_style('bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('flexisel', get_template_directory_uri() . '/css/flexisel.css');

	wp_enqueue_script('jquery-3.4.1.min', '//code.jquery.com/jquery-3.4.1.min.js');
	wp_enqueue_script('jquery.flexisel', get_template_directory_uri() . '/js/jquery.flexisel.js');
	wp_enqueue_script('popper.min', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js');
	wp_enqueue_script('bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
}

/** Включаем миниатюры **/
add_theme_support('post-thumbnails');

/** Загрузка стилей и скриптов **/
add_action('wp_enqueue_scripts', 'load_style_script');

/** Отключаем визуальный редактор **/
function remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

/** Включаем меню **/
register_nav_menu('m_contacts', 'Контакты');
register_nav_menu('m_main', 'Основное');
register_nav_menu('m_social', 'Соцсети');