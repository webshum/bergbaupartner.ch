<?php 

/**
 * Template Name: Showcases
 */

get_header();

?>

<!-- PORTFOLIO -->
<section class="portfolio">
	<div class="center">
		<h2 class="title an an-top"><?php the_field('title'); ?></h2>
		<p class="subtitle an an-top"><?php the_field('subtitle'); ?></p>

		<?php 
			$portfolio = get_field('portfolio');
		?>

		<?php if (!isArrayEmpty($portfolio)) : ?>
			<?php foreach ($portfolio as $item) : ?>
				<div class="gallery-potfolio">
					<?php if (!empty($item['title'])) : ?>
						<h3 class="title"><?= $item['title'] ?></h3>
					<?php endif; ?>

					<?php if (!empty($item['title'])) : ?>
						<p class="subtitle"><?= $item['subtitle'] ?></p>
					<?php endif; ?>

					<?php if (!isArrayEmpty($item['images'])) : ?>
						<div class="wrap">
							<?php foreach ($item['images'] as $image) : ?>
								<?php if (!empty($image['image'])) : ?>
									<a href="<?= $image['image']['url']; ?>" data-fslightbox="gallery" class="image">
										<img src="<?= $image['image']['url']; ?>" alt="<?= $image['image']['alt']; ?>">
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>		
</section>
<!-- // PORTFOLIO -->

<!-- MACHEN -->
<?php get_template_part('template-parts/content/content', 'icons'); ?>
<!-- // MACHEN -->

<?php get_footer(); ?>