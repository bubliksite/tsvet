<?php get_header(); ?>

<div class="container pt-5">
	<h1 class="d-block d-md-none font-family-lora text-center pb-5"><?php echo the_title(); ?></h1>
	<?php echo CFS()->get('description'); ?>
</div>	

<?php get_footer(); ?>