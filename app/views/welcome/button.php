<section class="content-wrapper" id="button-control">
	<a class="content-container" href="#" id="update-button">
		<img id="instagram-button" src="<?php echo \helpers\url::template_path() . '/img/selfie-btn.png' ?>" />
	</a>
</section>
<script>
$(window).load(function(){
	//InstagramWindow.ajax();
	$('#instagram-window').click(function(){
		InstagramWindow.next();
	});
});
</script>