<div class="container pt-5 pb-5">
	<h1 class="font-family-lora pb-3 center-in-mobile">Напишите нам</h1>
	<?php echo do_shortcode('[caldera_form id="CF5e1f56c16571f"]'); ?>
</div>
<footer class="container-fluid bg-dark py-5">
	<div class="container text-white" style="font-size: 14px;">
		<div class="d-flex justify-content-between align-items-center">
			<div class="">
				©TSVET :: Цветочная мастерская, <?php echo date("Y"); ?> <br>
				<?php 
					wp_nav_menu( array(
						'theme_location'=>'m_contacts',
						'container' => 'false',
						'menu_class' => 'list-unstyled'
					) );
				?>			
			</div>
			<div class="">
				<?php 
					wp_nav_menu( array(
						'theme_location'=>'m_social',
						'container' => 'false',
						'menu_class' => 'nav d-flex justify-content-between text-white'
					) );
				?>
			</div>
		</div>
	</div>
</footer>



</body>
</html>

<?php wp_footer(); ?>