<?php 

/**
 * Template Name: Leistungen 2
 */

get_header();

?>

<!-- PORTFOLIO -->
<section class="portfolio">
	<div class="center">
		<h2 class="title an an-top"><?php the_field('title'); ?></h2>
		<p class="subtitle an an-top"><?php the_field('subtitle'); ?></p>

		<?php $images_row = get_field('images_row'); ?>
		<div class="image-row">
			<?php $icon = [1,'column','bottle']; $count = 0; ?>
			<?php foreach ($images_row as $section): ?>
				<a href="<?= $section['link']['url']; ?>" <?= (!empty($section['link']['target'])) ? 'target="_blank"' : ''; ?> class="section hover-image">
					<div class="image">
						<img src="<?= $section['image']['url']; ?>" alt="<?= $section['image']['alt']; ?>">
					</div>	

					<div class="cont">
						<h3><?= $section['title']; ?></h3>
						<div class="text"><?= $section['text']; ?></div>

						<div class="link">
							<lottie-player src="<?= bloginfo('template_url'); ?>/icons/<?= $icon[$count]; ?>.json"  background="transparent" speed="1" autoplay></lottie-player>
							<span><?= $section['link']['title']; ?></span>
							<i></i>
						</div>
					</div>		
				</a>
			<?php $count++; endforeach ?>
		</div>

		<?php $images_col = get_field('images_col'); ?>
		<div class="image-col">
			<?php $icon = ['glass',2,5]; $count = 0; ?>
			<?php foreach ($images_col as $section): ?>
				<div class="section hover-image">
					<a class="image" href="<?= $section['link']['url']; ?>" <?= (!empty($section['link']['target'])) ? 'target="_blank"' : ''; ?> >
						<img src="<?= $section['image']['url']; ?>" alt="<?= $section['image']['alt']; ?>">

						<div class="link">
							<lottie-player src="<?= bloginfo('template_url'); ?>/icons/<?= $icon[$count]; ?>.json"  background="transparent" speed="1" autoplay></lottie-player>
							<span><?= $section['link']['title']; ?></span>
							<i></i>
						</div>
					</a>

					<h3><?= $section['title']; ?></h3>
					<p class="subtitle"><?= $section['subtitle']; ?></p>
				</div>
			<?php $count++; endforeach ?>
		</div>

		<?php $button_2 = get_field('button_2'); ?>
		<?php if ($button_2) : ?>
			<div class="tx-center">
				<a href="<?= $button_2['url']; ?>" class="btn"><?= $button_2['title']; ?></a>
			</div>
		<?php endif; ?>

		<?php $portfolio = get_field('portfolio'); ?>
		<?php if ($portfolio['title']) : ?>
			<div class="portfolio-foot">
				<h3><?= $portfolio['title'] ?></h3>
				<div class="text"><?= $portfolio['text'] ?></div>

				<a class="btn" href="<?= $portfolio['button']['url']; ?>" <?= (!empty($portfolio['button']['target'])) ? 'target="_blank"' : ''; ?>>
					<?= $portfolio['button']['title']; ?>
				</a>
			</div>
		<?php endif; ?>
	</div>		
</section>
<!-- // PORTFOLIO -->

<!-- MACHEN -->
<?php get_template_part('template-parts/content/content', 'icons'); ?>
<!-- // MACHEN -->

<?php get_footer(); ?>