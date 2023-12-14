<?php $portfolio = get_field('portfolio'); ?>
<section class="portfolio">
	<div class="center">
		<?php if (!empty($portfolio['title'])) : ?>
			<h2 class="title an an-top"><?= $portfolio['title']; ?></h2>
		<?php endif; ?>

		<?php if (!empty($portfolio['subtitle'])) : ?>
			<p class="subtitle an an-top"><?= $portfolio['subtitle']; ?></p>
		<?php endif; ?>

		<div class="gallery">
			<div class="gallery-view">
				<?php if (!empty($portfolio['image']['url'])) : ?>
					<img src="<?= $portfolio['image']['url']; ?>" alt="<?= $portfolio['image']['alt']; ?>">
				<?php endif ?>

				<?php if (!empty($portfolio['image_before']['url'])) : ?>
					<div class="gallery-resize">
						<img src="<?= $portfolio['image_before']['url']; ?>" alt="<?= $portfolio['image_before']['alt']; ?>">
						<div class="btn-after"><div></div></div>
					</div>
				<?php endif; ?>

				<input type="range" min="0" max="100" value="0">
			</div>
			
			<div class="gallery-content">
				<?php if (!empty($portfolio['bottom']['title'])) : ?>
					<h3 class="an an-top"><?= $portfolio['bottom']['title']; ?></h3>
				<?php endif; ?>

				<?php if (!empty($portfolio['bottom']['text'])) : ?>
					<p class="an an-top"><?= $portfolio['bottom']['text']; ?></p>
				<?php endif; ?>
			</div>
		</div>

		<?php if (!empty($portfolio['bottom']['button']['url'])) : ?>
			<div class="tx-center an an-top">
				<a href="<?= $portfolio['bottom']['button']['url']; ?>" class="btn"><?= $portfolio['bottom']['button']['title']; ?></a>
			</div>
		<?php endif; ?>
	</div>		
</section>