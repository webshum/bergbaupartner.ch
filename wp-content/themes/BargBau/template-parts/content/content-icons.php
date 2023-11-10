<?php $icons = get_field('icons'); ?>
<section class="machen">
	<div class="center">
		<?php if (!empty($icons['title'])) : ?>
			<h2 class="title an an-top"><?= $icons['title']; ?></h2>
		<?php endif; ?>
		
		<?php if (!empty($icons['row'])) : ?>
			<ul class="row">
				<?php $count = 1; foreach ($icons['row'] as $icon) : ?>
					<li class="col-2 an an-top">
						<div class="hover">
							<a href="<?= $icon['link']['url']; ?>" class="icon hoverEffects">
								<span>
									<lottie-player src="<?= bloginfo('template_url'); ?>/icons/<?= $count ?>.json"  background="transparent" speed="1"></lottie-player>
								</span>
							</a>
							<p><?= $icon['title']; ?></p>
						</div>					
						<div class="opacity"><?= $icon['text']; ?></div>
					</li>
				<?php $count++; endforeach; ?>
			</ul>
		<?php endif; ?>		
	</div>
</section>