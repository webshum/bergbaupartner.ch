<?php 

/**
 * Template Name: Kontakt
 */

get_header();

?>

<!-- KONTAKT CONTENT -->
<?php $agb = get_field('agb'); ?>
<section class="kontact-content">
	<div class="center">
		<div class="impressum show-mob" hidden>
			<?php if (!empty($agb['title_mobile'])) : ?>
				<h2 class="title an an-top"><?= $agb['title_mobile']; ?></h2>
			<?php endif; ?>

			<?php if (!empty($agb['subtitle_mobile'])) : ?>
				<p class="subtitle an an-top"><?= $agb['subtitle_mobile']; ?></p>
			<?php endif; ?>
		</div>

		<?php if (!empty($agb['title'])) : ?>
			<h2 class="title an an-top"><?= $agb['title']; ?></h2>
		<?php endif; ?>

		<?php if (!empty($agb['subtitle'])) : ?>
			<p class="subtitle an an-top"><?= $agb['subtitle']; ?></p>
		<?php endif; ?>

		<?php if (!empty($agb['row'])) : ?>
			<ul>
				<?php foreach ($agb['row'] as $item) : ?>
				<li class="an an-top">
					<div>
						<?php if (!empty($item['title'])) : ?><h3><?= $item['title']; ?></h3><?php endif; ?>
						<?php if (!empty($item['text'])) : ?><p><?= $item['text']; ?></p><?php endif; ?>
					</div>

					<?php if (!empty($item['button'])) : ?>
						<a href="<?= $item['button']['url']; ?>" <?= (!empty($item['button']['target'])) ? "target='_blank'" : ""; ?>><?= $item['button']['title']; ?></a>
					<?php endif; ?>					
				</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>		
	</div>
</section>
<!-- // KONTAKT CONTENT -->

<!-- BG CONTENT -->
<?php get_template_part('template-parts/content/content', 'bgcontent'); ?>
<!-- // BG CONTENT -->

<?php get_footer(); ?>