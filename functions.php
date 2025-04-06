<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


/* Fonction permettant de situer le CSS du thème actif et le CSS du thème enfant. */
function theme_enqueue_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}
function mon_theme_support()
{
  add_theme_support('custom-logo', array());

}
add_action('after_setup_theme', 'mon_theme_support');

function mon_theme_register_nav_menu()
{
  register_nav_menus(array(
    'topbar_menu' => 'Menu Principal (Topbar)', // Vous pouvez changer le nom affiché dans l'admin
    'footer_menu' => 'Menu Pied de Page', // Exemple d'un autre emplacement
  ));
}
add_action('after_setup_theme', 'mon_theme_register_nav_menu');
?>