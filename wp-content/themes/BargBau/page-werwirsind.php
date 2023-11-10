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

<?php get_footer(); ?>