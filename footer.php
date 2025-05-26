<footer>
	<div id="mentions">
		<a href="<?php echo esc_url(home_url('/mentions-legales')); ?>" rel="noopener noreferrer">
			Mentions Légales
		</a>
	</div>

</footer>

<!-- le point d'accroche (hook) pour exécuter toutes les fonctions enregistrées à l'acction wp_footer -->

<?php wp_footer(); ?>