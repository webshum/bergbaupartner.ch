<?php 

/**
 * Template Name: Showcases
 */

get_header();

?>

<!-- PORTFOLIO -->
<section class="portfolio" id="portfolio">
	<div class="center">
		<h2 class="title an an-top"><?php the_field('title'); ?></h2>
		<p class="subtitle an an-top"><?php the_field('subtitle'); ?></p>

		<?php get_template_part('template-parts/content/content', 'gallery'); ?>
	</div>		
</section>
<!-- // PORTFOLIO -->

<?php get_footer(); ?>