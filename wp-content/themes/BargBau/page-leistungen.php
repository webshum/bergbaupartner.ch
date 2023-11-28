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

		<?php $images_row = get_field('images_row'); ?>

		<?php if (!isArrayEmpty($images_row)) : ?>
			<div class="image-row">
				<?php $icon = [1,2,'bottle']; $count = 0; ?>
				<?php foreach ($images_row as $section): ?>
					<?php if (!empty($section['link'])) : ?>
						<a href="<?= $section['link']['url']; ?>" <?= (!empty($section['link']['target'])) ? 'target="_blank"' : ''; ?> class="section hover-image">
							<div class="image">
								<img src="<?= $section['image_black']['url']; ?>" alt="<?= $section['image_black']['alt']; ?>">
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
					<?php endif; ?>
				<?php $count++; endforeach ?>
			</div>
		<?php endif; ?>

		<?php $images_col = get_field('images_col'); ?>

		<?php if (!isArrayEmpty($images_col)) : ?>
			<div class="image-col">
				<?php $icon = ['glass',3,5]; $count = 0; ?>
				<?php foreach ($images_col as $section): ?>
					<div class="section hover-image">
						<?php if (!empty($section['link'])) : ?>
							<a class="image" href="<?= $section['link']['url']; ?>" <?= (!empty($section['link']['target'])) ? 'target="_blank"' : ''; ?> >
								<img src="<?= $section['image_black']['url']; ?>" alt="<?= $section['image_black']['alt']; ?>">
								<img src="<?= $section['image']['url']; ?>" alt="<?= $section['image']['alt']; ?>">

								<div class="link">
									<lottie-player src="<?= bloginfo('template_url'); ?>/icons/<?= $icon[$count]; ?>.json"  background="transparent" speed="1" autoplay></lottie-player>
									<span><?= $section['link']['title']; ?></span>
									<i></i>
								</div>
							</a>
						<?php endif; ?>

						<?php if (!empty($section['title'])) : ?>
							<h3><?= $section['title']; ?></h3>
						<?php endif; ?>

						<?php if (!empty($section['subtitle'])) : ?>
							<p class="subtitle"><?= $section['subtitle']; ?></p>
						<?php endif; ?>
					</div>
				<?php $count++; endforeach ?>
			</div>
		<?php endif; ?>

		<?php $button_2 = get_field('button_2'); ?>

		<?php if (!empty($button_2)) : ?>
			<div class="tx-center">
				<a href="<?= $button_2['url']; ?>" class="btn"><?= $button_2['title']; ?></a>
			</div>
		<?php endif; ?>

		<?php $portfolio = get_field('portfolio'); ?>

		<?php if (!isArrayEmpty($portfolio)) : ?>
			<div class="portfolio-foot">
				<?php if (!empty($portfolio['title'])) : ?>
					<h3><?= $portfolio['title'] ?></h3>
				<?php endif; ?>

				<?php if (!empty($portfolio['text'])) : ?>
					<div class="text"><?= $portfolio['text'] ?></div>
				<?php endif; ?>

				<?php if (!empty($portfolio['button'])) : ?>
					<a class="btn" href="<?= $portfolio['button']['url']; ?>" <?= (!empty($portfolio['button']['target'])) ? 'target="_blank"' : ''; ?>>
						<?= $portfolio['button']['title']; ?>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>		
</section>
<!-- // PORTFOLIO -->

<!-- MACHEN -->
<?php get_template_part('template-parts/content/content', 'icons'); ?>
<!-- // MACHEN -->

<?php get_footer(); ?>