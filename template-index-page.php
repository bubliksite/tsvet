<?
/*
Template name: Главная страница
Template Post Type: page
Theme URI: http://bublik.site
Description: Тема главной страницы
Author: Serge Solntsev
Author URI: http://bublik.site
Version: 1.0
*/

 ?>

 <?php get_header(); ?>

<div id="content" class="container py-5">
	<div class="d-none d-md-block">
	<?php $categories =  get_categories();?>
	<?php $numersOfCategories = count($categories); ?>
	<?php for($i = 0; $i < $numersOfCategories; $i++) : ?>
		<h1 class="font-family-lora"><?php echo $categories[$i]->name; ?></h1>
		<ul id="carousel<?php echo $categories[$i]->term_id; ?>" class="pb-5 pt-3"> 
		<?php $posts = new WP_Query(array('post_type'=>'post', 'category_name' => $categories[$i]->slug)); ?>
			<?php if ( $posts->have_posts() ) :  while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<li>
					<a data-target="#modal-<?php echo the_id(); ?>" data-toggle="modal" class="no-link">
						<?php if (has_post_thumbnail()): ?>
							<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-responsive" />
						<?php else : ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/no-photo.png" alt="Нет фото" class="img-responsive" />
						<?php endif ?>
						<div class="d-flex justify-content-between mt-2 mx-4">
							<div class="ml-1 font-family-lora" style="font-size: 18px;">
								<?php echo the_title(); ?>
							</div>
							<div class="mr-1 font-family-lora text-pink font-weight-bold" style="font-size: 20px;">
								<?php if (CFS()->get('price')): ?>
									<?php echo CFS()->get('price'); ?> ₽
								<?php endif ?>
							</div>
						</div>
					</a>
					
				</li>
				
			<?php endwhile; ?>
			<?php endif; ?>
		<?php wp_reset_query(); ?>
		</ul>
		<?php $posts = new WP_Query(array('post_type'=>'post', 'category_name' => $categories[$i]->slug)); ?>
			<?php if ( $posts->have_posts() ) :  while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<div class="modal fade" id="modal-<?php echo the_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo the_id(); ?>-title" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content px-5 pt-4">
						<div class="modal-header d-flex align-items-center">
							<h1 class="modal-title font-family-lora"><?php echo the_title(); ?></h1>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<img src="<?php echo get_template_directory_uri(); ?>/images/icon-close.svg" style="margin: 0;">
							</button>
						</div>
						<div class="modal-body">
							<div id="carousel-<?php echo the_id(); ?>" class="carousel slide pb-2" data-ride="carousel">
								<?php $j = 0; $k = 0; $l = 0; ?>
								<?php $images = CFS()->get('images'); ?>
								<?php if ($images): ?>
								<div class="carousel-inner">
									<?php foreach($images as $image) : ?>
										<div class="carousel-item <?php echo($k == 0 ? 'active' : ''); ?>">
											<img src="<?php echo $image['image']; ?>" class="d-block w-100" alt="<?php echo the_title(); ?>">
										</div>
										<?php $k++; ?>
									<?php endforeach ?>
								</div>	
								<ol class="carousel-indicators pt-2">
									<?php foreach($images as $image) : ?>
										<li data-target="#carousel-<?php echo the_id(); ?>" data-slide-to="<?php echo $j; ?>" class="<?php echo($j == 0 ? 'active' : ''); ?>">
											<img src="<?php echo $image['image']; ?>" class="d-none d-md-block">
										</li>
										<?php $j++; ?>
									<?php endforeach ?>
								</ol>
								<?php else : ?>
									<p>Эти букеты закончились :(</p>
								<?php endif ?>
							</div>
							<?php echo the_content(); ?>
							<div class="d-flex justify-content-between align-items-center">
								<?php if (CFS()->get('price')): ?>
									<h1 class="font-family-lora font-weight-bold" style="font-size: 48px;"><?php echo CFS()->get('price'); ?> ₽</h1>
								<?php endif ?>
								
								<button id="order-<?php echo the_id(); ?>" class="btn btn-pink" style="height: 80%;" <?php echo (CFS()->get('price') ? '' : 'disabled') ?>>Заказать</button>
							</div>
						</div>
						<div class="modal-footer">
							<div id="order-form-<?php echo the_id(); ?>" class="pb-3" style="display: none; width: 100%;">
								<?php echo do_shortcode('[caldera_form id="CF5e1f7e534e65e"]'); ?>
							</div>
						</div>
						<script>
							$('#order-<?php echo the_id(); ?>').click(function(){
								$('#order-form-<?php echo the_id(); ?>').show();
								$(this).hide();
							});
						</script>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>	
		<?php wp_reset_query(); ?>	
		<script type="text/javascript">
		$(window).on('load', function() {
			$("#carousel<?php echo $categories[$i]->term_id; ?>").flexisel();
		});
		</script>
	<?php endfor ?>
	</div>
	<div class="d-block d-md-none">
		<div class="tab-content" id="pills-tabContent">
			<?php $categories =  get_categories();?>
			<?php $numersOfCategories = count($categories); ?>
			<?php for($i = 0; $i < $numersOfCategories; $i++) : ?>
				<div class="text-center tab-pane <?php echo ($i == 0 ? ' show active' : ''); ?>" id="pills-<?php echo $categories[$i]->slug; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $categories[$i]->slug; ?>-tab">
					<h1 class="font-family-lora"><?php echo $categories[$i]->name; ?></h1>
					<?php $posts = new WP_Query(array('post_type'=>'post', 'category_name' => $categories[$i]->slug)); ?>
					<?php if ( $posts->have_posts() ) :  while ( $posts->have_posts() ) : $posts->the_post(); ?>
						<a data-target="#modal-<?php echo the_id(); ?>-mobile" data-toggle="modal" class="no-link">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-responsive mt-5" style="border-radius: 8px;" />
							<div class="d-flex justify-content-around mt-2 mx-4">
								<div class="ml-1 font-family-lora" style="font-size: 18px;">
									<?php echo the_title(); ?>
								</div>
								<div class="mr-1 font-family-lora text-pink font-weight-bold" style="font-size: 20px;">
									<?php if (CFS()->get('price')): ?>
										<?php echo CFS()->get('price'); ?> ₽
									<?php endif ?>
								</div>
							</div>
						</a>
					<?php endwhile; ?>
					<?php endif; ?>	
				</div>
			<?php $posts = new WP_Query(array('post_type'=>'post', 'category_name' => $categories[$i]->slug)); ?>
			<?php if ( $posts->have_posts() ) :  while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<div class="modal fade" id="modal-<?php echo the_id(); ?>-mobile" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo the_id(); ?>-title" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content px-5 pt-4">
						<div class="modal-header d-flex align-items-center">
							<h1 class="modal-title font-family-lora"><?php echo the_title(); ?></h1>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<img src="<?php echo get_template_directory_uri(); ?>/images/icon-close.svg" style="margin: 0;">
							</button>
						</div>
						<div class="modal-body">
							<div id="carousel-<?php echo the_id(); ?>" class="carousel slide pb-2" data-ride="carousel">
								<?php $j = 0; $k = 0; $l = 0; ?>
								<?php $images = CFS()->get('images'); ?>
								<?php if ($images): ?>
								<div class="carousel-inner">
									<?php foreach($images as $image) : ?>
										<div class="carousel-item <?php echo($k == 0 ? 'active' : ''); ?>">
											<img src="<?php echo $image['image']; ?>" class="d-block w-100" alt="<?php echo the_title(); ?>">
										</div>
										<?php $k++; ?>
									<?php endforeach ?>
								</div>
								<ol class="carousel-indicators pt-2">
									<?php foreach($images as $image) : ?>
										<li data-target="#carousel-<?php echo the_id(); ?>" data-slide-to="<?php echo $j; ?>" class="<?php echo($j == 0 ? 'active' : ''); ?>">
											<img src="<?php echo $image['image']; ?>" class="d-none d-md-block">
										</li>
										<?php $j++; ?>
									<?php endforeach ?>
								</ol>
								<?php else : ?>
									<p>Эти букеты закончились :(</p>
								<?php endif ?>
							</div>
							<?php echo the_content(); ?>
							<div class="d-flex justify-content-between align-items-center">
								<?php if (CFS()->get('price')): ?>
									<h1 class="font-family-lora font-weight-bold" style="font-size: 48px;"><?php echo CFS()->get('price'); ?> ₽</h1>
								<?php endif ?>
								<button id="order-<?php echo the_id(); ?>-mobile" class="btn btn-pink" style="height: 80%;" <?php echo (CFS()->get('price') ? '' : 'disabled') ?>>Заказать</button>
							</div>
						</div>
						<div class="modal-footer">
							<div id="order-form-<?php echo the_id(); ?>-mobile" class="pb-3" style="display: none; width: 100%;">
								<?php echo do_shortcode('[caldera_form id="CF5e1f7e534e65e"]'); ?>
							</div>
						</div>
						<script>
							$('#order-<?php echo the_id(); ?>-mobile').click(function(){
								$('#order-form-<?php echo the_id(); ?>-mobile').show();
								$(this).hide();
							});
						</script>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>	
		<?php wp_reset_query(); ?>	
			<?php endfor ?>
		</div>
	</div>
</div>

 <?php get_footer(); ?>