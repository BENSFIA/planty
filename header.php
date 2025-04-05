<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Bienvenue sur planty </title>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


	<?php wp_body_open(); ?>

	<header>
		<nav id="nav-bar">
			<div id="logo">
				<a href=""><img src="/wp-content/themes/planty/images/logo.png" alt="Planty boisson énergisante"></a>

			</div>

			<div id="menu" role="navigation">

				<?php
				wp_nav_menu(array('theme_location' => 'topbar_menu'));
				?>

			</div>
		</nav>
	</header>