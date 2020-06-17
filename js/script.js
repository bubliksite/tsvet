$(document).ready(function(){

	$('#openMenuCatalog').click(function(){
		$('#menuCatalog').animate({
			'left' : '100vw'
		});
	});

	$('#closeMenuCatalog').click(function(){
		$('#menuCatalog').animate({
			'left' : '-100vw'
		});
	});

	$('#openMenuMain').click(function(){
		$('#menuMain').animate({
			'left' : '-100vw'
		});
		$('#menuMain').show();
	});

	$('#closeMenuMain').click(function(){
		$('#menuMain').animate({
			'left' : '0'
		});
		$('#menuMain').fadeOut(800);
	});

	$('.tabCloseMenu').click(function(){
		$('#menuCatalog').animate({
			'left' : '-100vw'
		});
	});
})