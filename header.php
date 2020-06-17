<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php bloginfo('name'); wp_title(); ?></title>

	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Roboto:300,400,700&display=swap&subset=cyrillic" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/logo-white.png">

	<?php wp_head(); ?>

</head>
<body>
	<header style="background-image: url('<? echo CFS()->get('main_image') ?>'); position: relative; background-size: cover; background-repeat: no-repeat;">
		<div class="container py-3">
			<div class="d-none d-md-block">
				<?php 
					wp_nav_menu( array(
						'theme_location'=>'m_contacts',
						'container' => 'false',
						'menu_class' => 'nav d-flex justify-content-between text-white'
					) );
				?>
			</div>
			<div class="d-flex align-items-center justify-content-center" id="mobile-menu">
				<?php if (is_front_page()) : ?>
				<div class="d-block d-md-none" style="width: 21px; white-space: nowrap;" id="openMenuCatalog">
					<img src="<?php echo get_template_directory_uri(); ?>/images/icon-cat.svg" alt=""> <span class="text-white">Каталог</span>
				</div>
				<?php else : ?>
				<div class="d-block d-md-none" style="width: 21px; white-space: nowrap;">
					<a href="/" class="no-link"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-cat.svg" alt=""> <span class="text-white">Каталог</span></a>
				</div>
				<?php endif ?>
				<a class="d-flex justify-content-center" style="transform: translateY(-0.3rem); z-index: 6;" href="/">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.png" alt="Логотип" class="mx-auto">
				</a>
				<div class="d-block d-md-none" style="width: 21px;" id="openMenuMain">
					<img src="<?php echo get_template_directory_uri(); ?>/images/icon-menu.svg" alt="">
				</div>
			</div>
			<div class="d-block d-md-none shadow-bottom">
				<?php 
					wp_nav_menu( array(
						'theme_location'=>'m_contacts',
						'container' => 'false',
						'menu_class' => 'nav d-flex justify-content-between text-white'
					) );
				?>
			</div>
			<div class="d-none d-md-block" style=" transform: translateY(-3rem);">
				<div class="row" style="opacity: 0.4;">
					<div class="col-5 border-white border-bottom"></div>
					<div class="col-2"></div>
					<div class="col-5 border-white border-bottom"></div>
				</div>
				<?php 
					wp_nav_menu( array(
						'theme_location'=>'m_main',
						'container' => 'false',
						'menu_class' => 'mt-4 nav d-flex justify-content-between trext-white text-lowercase'
					) );
				?>
				<div class="row mt-4">
					<div class="col-12 border-top border-white" style="opacity: 0.4;"></div>
				</div>
			</div>
			<div class="d-none d-md-block">
				<div class="d-flex align-items-center <?php echo(is_front_page() ? '' : 'text-center') ?>" style="height: 40vh;">
					<div class="text-white <?php echo(is_front_page() ? '' : 'w-100') ?>">
						<h1 class="font-family-lora font-weight-bold" style="font-size: 48px;"><?php echo CFS()->get('main_head') ?></h1>
						<h5 style="line-height: 140%; font-weight: 300;"><?php echo CFS()->get('main_subhead') ?></h5>
					</div>
				</div>
			</div>
		</div>
		<div id="menuCatalog">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon-close-white.svg" id="closeMenuCatalog">
			<div class="d-flex align-items-center justify-content-center h-100">
				<ul class="nav flex-column list-unstyled text-center nav-pills" id="pills-tab" role="tablist">
				<?php $categories =  get_categories();?>
				<?php $numersOfCategories = count($categories); ?>
				<?php for($i = 0; $i < $numersOfCategories; $i++) : ?>
					<li>
						<a class="tabCloseMenu no-link text-white<?php echo ($i == 0 ? ' active' : ''); ?>" id="pills-<?php echo $categories[$i]->slug; ?>-tab" data-toggle="pill" href="#pills-<?php echo $categories[$i]->slug; ?>" role="tab" aria-controls="pills-<?php echo $categories[$i]->slug; ?>" aria-selected="<?php echo ($i == 0 ? 'true' : 'false'); ?>" ><?php echo $categories[$i]->name; ?></a>
					</li>
				<?php endfor ?>
				</ul>
			</div>
		</div>
		<div id="menuMain">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon-close-white.svg" id="closeMenuMain">
			<div class="d-flex align-items-center justify-content-center h-100">
				<div class="">
				<?php 
					wp_nav_menu( array(
						'theme_location'=>'m_main',
						'container' => 'false',
						'menu_class' => 'list-unstyled text-center trext-white text-lowercase'
					) );
				?>
				<?php 
					wp_nav_menu( array(
						'theme_location'=>'m_contacts',
						'container' => 'false',
						'menu_class' => 'list-unstyled text-center text-white text-lowercase'
					) );
				?>
				</div>
			</div>
		</div>
	</header>