<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Bienvenue sur planty </title>
	<!--  est un point d'ancrage crucial pour WordPress, permettant au CMS d'injecter des scripts, des feuilles de style et d'autres éléments nécessaires au bon fonctionnement du site et de ses plugins -->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


	<?php wp_body_open(); ?>

	<header>
		<nav id="nav-bar">
			<div id="logo" role="navigation">
				<?php

				if (has_custom_logo()) {
					the_custom_logo();
				} else {
					// Optionnel : Afficher le nom du site si aucun logo n'est pas défini
					?>
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<?php bloginfo('name'); ?>
					</a>
					<?php
				}
				?>

			</div>

			<div id="menu" role="navigation">

				<?php
				wp_nav_menu(array('theme_location' => 'topbar_menu'));
				?>

			</div>
		</nav>
	</header>