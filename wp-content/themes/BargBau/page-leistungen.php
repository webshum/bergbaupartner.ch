<?php 

/**
 * Template Name: Leistungen
 */

get_header();

?>

<!-- PORTFOLIO -->
<section class="portfolio">
	<div class="center">
		<h2 class="title an an-top"><?php the_field('title'); ?></h2>
		<p class="subtitle an an-top"><?php the_field('subtitle'); ?></p>

		<?php $button_1 = get_field('button_1'); ?>
		<div class="tx-center an an-top">
			<a href="<?= $button_1['url']; ?>" class="btn"><?= $button_1['title']; ?></a>
		</div>
	
		<?php get_template_part('template-parts/content/content', 'gallery'); ?>

		<?php $button_2 = get_field('button_2'); ?>
		<div class="tx-center">
			<a href="<?= $button_2['url']; ?>" class="btn"><?= $button_2['title']; ?></a>
		</div>
	</div>		
</section>
<!-- // PORTFOLIO -->

<!-- MACHEN -->
<?php get_template_part('template-parts/content/content', 'icons'); ?>
<!-- // MACHEN -->

<?php get_footer(); ?>