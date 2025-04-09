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

// function permettant d'afficher le compteur de commande

// functions.php

function compteur_commande_shortcode()
{
  $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

  if (isset($_POST['increment'])) {
    $quantity++;
  }
  if (isset($_POST['decrement'])) {
    $quantity = max(0, $quantity - 1); // S'assurer que la quantité n'est jamais inférieure à 0
  }

  ob_start();
  ?>

  <form method="post" class="quantity-form">
    <div class="quantity-single-button"
      style="display: inline-flex; flex-direction: column; align-items: center; gap: 5px; margin-bottom: 20px;">

      <input type="number" name="quantity" value="<?php echo esc_attr($quantity >= 0 ? $quantity : 0); ?>"
        style="width: 60px; text-align: center; border: solid 1px #ccc; background-color: #fff; font-size: 20px;">

    </div>
  </form>



  <?php
  return ob_get_clean();
}
add_shortcode('compteur_commande', 'compteur_commande_shortcode');


?>