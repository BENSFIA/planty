<?php


// add_action() est une fonction WordPress qui permet d'attacher une fonction personnalisée à une action spécifique de WordPress.
// 'wp_enqueue_scripts' est une action (un "hook") qui se déclenche au moment où WordPress charge les scripts et les styles pour l'affichage des pages.

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * Enqueue les styles CSS du thème parent et du thème enfant.
 */
function theme_enqueue_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array('parent-style'), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

/**
 * Ajoute la prise en charge de fonctionnalités du thème.
 */
function mon_theme_support()
{
  add_theme_support('custom-logo', array(
    'height' => 100,
    'width' => 400,
    'flex-height' => true,
    'flex-width' => true,
  ));
}
add_action('after_setup_theme', 'mon_theme_support');

/**
 * Enregistre les emplacements de menus de navigation.
 */
function mon_theme_register_nav_menu()
{

  register_nav_menus(array(
    'topbar_menu' => __('Menu Principal (Affiché en haut)', 'Planty'),
    'footer_menu' => __('Menu Pied de Page (Affiché dans le footer)', 'Planty'),
  ));
}
add_action('after_setup_theme', 'mon_theme_register_nav_menu');

/**
 * Ajoute un élément "Admin" au menu principal si l'utilisateur est connecté et administrateur.
 *
 * @param string   $items Les éléments HTML du menu.
 * @param stdClass $args  Les arguments du menu.
 * @return string Les éléments HTML du menu modifiés.
 */
function ajout_element_menu($items, $args)
{
  if ($args->theme_location == 'topbar_menu' && is_user_logged_in() && current_user_can('administrator')) {

    $admin_url = esc_url(admin_url()); // Sécuriser l'URL
    $admin_item = "<li class='lien-admin'><a href='$admin_url'>Admin</a></li>";
    // Convertir les items du menu en tableau pour insérer l'élément à la deuxième place
    $items_array = explode('</li>', $items);

    // Insérer l'élément admin à la deuxième position
    array_splice($items_array, 1, 0, $admin_item);

    // Rejoindre les éléments du tableau en chaîne de caractères
    $items = implode('</li>', $items_array);



  }
  return $items;
}
add_filter('wp_nav_menu_items', 'ajout_element_menu', 10, 2);

?>