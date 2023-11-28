<?php get_header(); ?>

<div class="breadcrumbs">
	<div class="center">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
		?>
	</div>
</div>

<!-- PORTFOLIO -->
<section class="portfolio">
	<div class="center">
		<!-- GALLERY 1 -->
		<?php $gallery = get_field('gallery'); ?>
		
		<?php if (!empty($gallery) && (bool) array_filter($gallery)) : ?>
		<div class="gallery">
			<div class="gallery-view d-none">
				<img src="<?= get_the_post_thumbnail_url(); ?>" alt="">

				<div class="gallery-resize">
					<img src="<?= $gallery['gallery_1']['image_before']['url'] ?>" alt="<?= $gallery['gallery_1']['image_before']['alt'] ?>">
					<div class="btn-after"><div></div></div>
				</div>

				<input type="range" min="0" max="100" value="0">
			</div>
			
			<div class="gallery-content">
				<h3 class="an an-top"><?php the_title(); ?></h3>
				<div class="an an-top"><?php the_excerpt(); ?></div>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="gallery-3 mt100">
			<?php $gallery_1 = get_field('gallery')['gallery_1']; ?>
			<div class="row reverse">
				<div class="col-6 an an-left">
					<div class="gallery mt0">
						<div class="gallery-view">
							<img src="<?= $gallery_1['image']['url'] ?>" alt="<?= $gallery_1['image']['alt'] ?>">

							<div class="gallery-resize">
								<img src="<?= $gallery_1['image_before']['url'] ?>" alt="<?= $gallery_1['image_before']['alt'] ?>">
								<div class="btn-after"><div></div></div>
							</div>

							<input type="range" min="0" max="100" value="0">
						</div>
					</div>
				</div>

				<div class="col-6">
					<h3 class="an an-top"><?= $gallery_1['title'] ?></h3>
					<p class="an an-top"><?= $gallery_1['text'] ?></p>
				</div>
			</div>

			<?php $gallery_1 = get_field('gallery')['gallery_1_2']; ?>
			<div class="row">
				<div class="col-6 an an-left">
					<div class="gallery mt0">
						<div class="gallery-view">
							<img src="<?= $gallery_1['image']['url'] ?>" alt="<?= $gallery_1['image']['alt'] ?>">

							<div class="gallery-resize">
								<img src="<?= $gallery_1['image_before']['url'] ?>" alt="<?= $gallery_1['image_before']['alt'] ?>">
								<div class="btn-after"><div></div></div>
							</div>

							<input type="range" min="0" max="100" value="0">
						</div>
					</div>
				</div>

				<div class="col-6">
					<h3 class="an an-top"><?= $gallery_1['title'] ?></h3>
					<p class="an an-top"><?= $gallery_1['text'] ?></p>
				</div>
			</div>
			
			<?php $gallery_2 = get_field('gallery')['gallery_2']; ?>
			<div class="row reverse">
				<div class="col-6 an an-right">
					<?php $slider = $gallery_2['slider']; ?>
					
					<?php if (array_filter($slider)) : ?>
						<div class="slider">
							<div class="slider-container">
								<button class="prev slide-arrow">PREV</button>

								<div class="track-wrap">
									<ul class="track">
										<?php foreach ($slider as $slide) : ?>
											<?php if (!empty($slide)) : ?>
												<li class="slide-item">
													<img src="<?= $slide['url'] ?>" alt="<?= $slide['alt'] ?>">
												</li>
											<?php endif; ?>
										<?php endforeach; ?>							
									</ul>
								</div>

								<button class="next slide-arrow">NEXT</button>
							</div>
						</div>
					<?php endif; ?>
					
					<?php if (!empty($gallery_2['image'])) : ?>
					<div class="image">
						<img src="<?= $gallery_2['image']['url'] ?>" alt="<?= $gallery_2['image']['alt'] ?>">
					</div>
					<?php endif; ?>
				</div>
				
				<div class="col-6">
					<h3 class="an an-top"><?= $gallery_2['title'] ?></h3>
					<p class="an an-top"><?= $gallery_2['text'] ?></p>
				</div>
			</div>

			<?php $gallery_2 = get_field('gallery')['gallery_2_2']; ?>
			<div class="row reverse">
				<div class="col-6 an an-right">
					<?php $slider = $gallery_2['slider']; ?>
					
					<?php if (array_filter($slider)) : ?>
						<div class="slider">
							<div class="slider-container">
								<button class="prev slide-arrow">PREV</button>

								<div class="track-wrap">
									<ul class="track">
										<?php foreach ($slider as $slide) : ?>
											<?php if (!empty($slide)) : ?>
												<li class="slide-item">
													<img src="<?= $slide['url'] ?>" alt="<?= $slide['alt'] ?>">
												</li>
											<?php endif; ?>
										<?php endforeach; ?>							
									</ul>
								</div>

								<button class="next slide-arrow">NEXT</button>
							</div>
						</div>
					<?php endif; ?>
					
					<?php if (!empty($gallery_2['image'])) : ?>
					<div class="image">
						<img src="<?= $gallery_2['image']['url'] ?>" alt="<?= $gallery_2['image']['alt'] ?>">
					</div>
					<?php endif; ?>
				</div>
				
				<div class="col-6">
					<h3 class="an an-top"><?= $gallery_2['title'] ?></h3>
					<p class="an an-top"><?= $gallery_2['text'] ?></p>
				</div>
			</div>
		</div>
		
		<?php $slider_portfolio = get_field('slider_portfolio'); ?>
		
		<?php if (!empty($slider_portfolio)) : ?>
			<div class="slider-portfolio">
				<div class="slider-container">
					<button class="prev slide-arrow">PREV</button>

					<div class="track-wrap">
						<ul class="track">
							<?php foreach ($slider_portfolio as $slide) : ?>
								<?php if (!empty($slide)) : ?>
									<li class="slide-item">
										<img src="<?= $slide['url'] ?>" alt="<?= $slide['alt'] ?>">
									</li>
								<?php endif; ?>
							<?php endforeach; ?>							
						</ul>
					</div>

					<button class="next slide-arrow">NEXT</button>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<!-- // PORTFOLIO -->

<!-- BG CONTENT -->
<?php get_template_part('template-parts/content/content', 'bgcontent'); ?>
<!-- // BG CONTENT -->

<?php get_footer(); ?>