<?php $portfolio = get_field('portfolio'); ?>
<section class="portfolio">
	<div class="center">
		<h2 class="title an an-top"><?= $portfolio['title']; ?></h2>
		<p class="subtitle an an-top"><?= $portfolio['subtitle']; ?></p>

		<div class="gallery">
			<div class="gallery-view">
				<img src="<?= $portfolio['image']['url']; ?>" alt="<?= $portfolio['image']['alt']; ?>">

				<div class="gallery-resize">
					<img src="<?= $portfolio['image_before']['url']; ?>" alt="<?= $portfolio['image_before']['alt']; ?>">
					<div class="btn-after"><div></div></div>
				</div>

				<input type="range" min="0" max="100" value="0">
			</div>
			
			<div class="gallery-content">
				<h3 class="an an-top"><?= $portfolio['bottom']['title']; ?></h3>
				<p class="an an-top"><?= $portfolio['bottom']['text']; ?></p>
			</div>
		</div>

		<div class="tx-center an an-top">
			<a href="<?= $portfolio['bottom']['button']['url']; ?>" class="btn"><?= $portfolio['bottom']['button']['title']; ?></a>
		</div>
	</div>		
</section>