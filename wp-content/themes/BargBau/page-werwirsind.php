<?php 

/**
 * Template Name: Werwirsind
 */

get_header();

?>

<!-- GALLERY 4 -->
<?php $portfolio = get_field('portfolio'); ?>
<section class="gallery-4" id="gallery">
	<div class="center">
		<h2 class="title an an-top"><?= $portfolio['title']; ?></h2>
		<p class="subtitle an an-top"><?= $portfolio['subtitle']; ?></p>

        <div class="row">
        	<?php foreach ($portfolio['gallery'] as $gallery) : ?>
        		<div class="col-4">
        			<div class="image an an-opacity">
        				<img src="<?= $gallery['image']['url'] ?>" alt="<?= $gallery['image']['alt'] ?>">
        			</div>

        			<div class="show-mob an an-top">
        				<h3><?= $gallery['name']; ?></h3>
        				<p><?= $gallery['title']; ?></p>
        				<div class="address">
        					<?= $gallery['address']; ?>
        				</div>
        			</div>            		
        		</div>
        	<?php endforeach; ?>
        </div>
	</div>
</section>
<!-- // GALLERY 4 -->

<!-- MACHEN -->
<?php get_template_part('template-parts/content/content', 'icons'); ?>
<!-- // MACHEN -->

<!-- PHOTO -->
<?php $photo = get_field('photo'); ?>

<?php if (!empty($photo)) : ?>
<div class="photo-partner">
	<?php if (!empty($photo['image'])) : ?>
		<img src="<?= $photo['image']['url'] ?>" alt="<?= $photo['image']['alt'] ?>">
	<?php endif; ?>

	<div class="center">
		<?php if (!empty($photo['title'])) : ?>
			<h3><?= $photo['title']; ?></h3>
		<?php endif; ?>

		<?php if (!empty($photo['text'])) : ?>
			<p><?= $photo['text']; ?></p>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<!-- // PHOTO -->

<?php get_footer(); ?>