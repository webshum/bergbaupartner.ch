<?php 

$gallery = new WP_Query(['post_type' => 'portfolio', 'posts_per_page' => 5, 'order' => 'ASC']);

?>

<div class="gallery-2">
	<div class="row">
		<?php $count = 0; if ($gallery->have_posts()) : ?>
			<?php while ($gallery->have_posts()) : $gallery->the_post(); ?>
				<div class="col-6">
					<a href="<?php the_permalink(); ?>">
						<div class="image an an-opacity">
							<?php the_post_thumbnail('full'); ?>
						</div>
			            <h4 class="an an-top"><?php the_title(); ?></h4>
			            <p class="an an-top"><?= get_field('label'); ?></p>
					</a>					
				</div>
				<?php if ($count == 1) break; ?>
			<?php $count++; endwhile; wp_reset_query(); ?>
		<?php endif; ?>
	</div>

	<div class="row">
		<?php $count = 0; if ($gallery->have_posts()) : ?>
			<?php while ($gallery->have_posts()) : $gallery->the_post(); ?>
				<div class="col-4">
					<a href="<?php the_permalink(); ?>">
						<div class="image an an-opacity">
							<?php the_post_thumbnail('full'); ?>
						</div>
			            <h4 class="an an-top"><?php the_title(); ?></h4>
			            <p class="an an-top"><?= get_field('label'); ?></p>
					</a>					
				</div>
			<?php $count++; endwhile; wp_reset_query(); ?>
		<?php endif; ?>
	</div>
</div>