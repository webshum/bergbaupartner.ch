<?php $bg_content = get_field('bg_content'); ?>
<section class="bg-content" <?= (!empty($bg_content['background'])) ? "style='background-image: url(" . $bg_content['background']['url'] . ");'" : ''; ?>>
	<div class="center">
		<div class="tx-center">
			<?php if (!empty($bg_content['title'])) : ?>
				<h2 class="title an an-top"><?= $bg_content['title']; ?></h2>
			<?php endif; ?>

			<?php if (!empty($bg_content['subtitle_1'])) : ?>
				<p class="subtitle an an-top"><?= $bg_content['subtitle_1']; ?></p>
			<?php endif; ?> 

			<?php if (!empty($bg_content['subtitle_2'])) : ?>
				<p class="subtitle an an-top"><?= $bg_content['subtitle_2']; ?></p>
			<?php endif; ?>

			<?php if (!empty($bg_content['button'])) : ?>
				<a href="<?= $bg_content['button']['url']; ?>" <?= (!empty($bg_content['button']['target'])) ? "target='_blank'" : ""; ?> class="btn an an-top">
					<?= $bg_content['button']['title']; ?>						
				</a>
			<?php endif; ?>
		</div>			
	</div>
</section>