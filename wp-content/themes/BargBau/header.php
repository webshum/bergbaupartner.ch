<?php 

$cls = '';

if (is_front_page()) {
	$cls = 'page-home';
} else if (is_page('leistungen')) {
	$cls = 'page-leistungen';
} else if (is_page('showcases')) {
	$cls = 'page-showcases';
} else if (is_page('wer-wir-sind')) {
	$cls = 'page-werwirsind';
} else if (is_page('kontakt')) {
	$cls = 'page-kontakt';
} else if (is_single()) {
	$cls = 'page-detail';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class($cls); ?>>

<div class="wrapper">
	<!-- HEADER -->
	<?php $header = get_field('header'); ?>
	<header class="header <?= (is_single()) ? 'header-mini' : ''; ?>" <?= (!empty($header['background'])) ? "style='background-image: url(" . $header['background']['url'] . ");'" : ''; ?>>
		<div class="bg show-mob" hidden <?= (!empty($header['background_mobile'])) ? "style='background-image: url(" . $header['background_mobile']['url'] . ");'" : ''; ?>></div>
		<div class="btn-nav">
			<span></span>
			<span></span>
			<span></span>
		</div>

		<a href="/" class="logo an an-top"></a>

		<div class="header-content">
			<?php if (!empty($header['title'])) : ?>
				<h1 class="an an-top"><?= $header['title']; ?></h1>
			<?php endif; ?>

			<?php if (!empty($header['subtitle'])) : ?>
				<p class="subtitle an an-top"><?= $header['subtitle']; ?></p>
			<?php endif; ?>

			<?php if (!empty($header['subtitle_2'])) : ?>
				<p class="subtitle an an-top"><?= $header['subtitle_2']; ?></p>
			<?php endif; ?>

			<?php if (!empty($header['button'])) : ?>
				<a href="<?= $header['button']['url']; ?>" <?= (!empty($header['button']['target'])) ? "target='_blank'" : ""; ?> class="btn an an-top"><?= $header['button']['title']; ?></a>
			<?php endif; ?>	

			<?php if (!empty($header['address'])) : ?>
				<div class="contacts an an-top">
	            	<div>
		            	<?= $header['address']; ?>
	            	</div>            	
	            </div>   
            <?php endif; ?>	  		
		</div>

		<?php if (is_page('showcases')) : ?>
			<a href="#portfolio" class="btn-down"></a>
		<?php elseif (is_page('wer-wir-sind')) : ?>	
			<a href="#gallery" class="btn-down"></a>	
		<?php endif; ?>		

		<nav>
			<a href="/" class="logo an an-top"></a>
			<?php
				wp_nav_menu([
					'theme_location'  => 'header_menu',
				]);
			?>
		</nav>
	</header>
	<!-- // HEADER -->