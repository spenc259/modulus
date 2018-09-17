<?php
/**
 * Template Name: Ajax Demo
 * 
 */

get_header();

?>

<main id="main" class="site-main" role="main">

	<?php 
	
	while (have_posts()) { the_post();

		// the_content();

	}

	?>

	<div id="ajax-demo">
		Ajax demo.
	</div>

	<button class="ajax-button">CLICK ME</button>

	<script type="text/javascript">

		(function($) {

			$(document).ready(function() {

				$(document).on( 'click', '.ajax-button', function( event ) {
					event.preventDefault();
					$.ajax({
						url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php',
						type: 'post',
						dataType: 'json',
						data: {
							action: 'ajax_demo'
						},
						success: function( result ) {
							console.log(result);
							$('#ajax-demo').html(result.content);
						}
					})
				});

			});

		})(jQuery);

	</script>

</main>

<?php get_footer(); ?> 