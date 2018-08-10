<?php ?>

<script type="text/javascript">
	jQuery( document ).ready( function() {
		//upgrade styles
		um_add_upgrade_log( '<?php echo esc_js( __( 'Upgrade Privacy Settings...', 'ultimate-member' ) ) ?>' );

		jQuery.ajax({
			url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'um_privacy2023'
			},
			success: function( response ) {
				if ( typeof response.data != 'undefined' ) {
					um_add_upgrade_log( response.data.message );
					//switch to the next package
					um_run_upgrade();
				} else {
					um_wrong_ajax();
				}
			},
			error: function() {
				um_something_wrong();
			}
		});
	});
</script>