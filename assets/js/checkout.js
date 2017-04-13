/* global wc_checkout_params */
jQuery( function( $ ) {

	var wc_checkout_giftcards = {
		init: function() {
			$( document.body ).on( 'click', 'a.showgiftcard', this.show_giftcard_form );
			$( 'form.checkout_giftcard' ).hide().submit( this.submit );
		},
		show_giftcard_form: function() {
			console.log( "Clicked");
			$( '.checkout_giftcard' ).slideToggle( 400, function() {
				$( '.checkout_giftcard' ).find( ':input:eq(0)' ).focus();
			});
			return false;
		},
		submit: function() {
			var $form = $(this);

			if ( $form.is('.processing') ) return false;

			$form.addClass('processing').block({
				message: null, 
				overlayCSS: {
					background: '#fff',
					opacity: 0.6
				}
			});

			var data = {
				action: 			'woocommerce_apply_giftcard',
				security: 			'apply-giftcard',
				giftcard_code:		$form.find('input[name=giftcard_code]').val()
			};

			$.ajax({
				type: 		'POST',
				url: 		woocommerce_params.ajax_url,
				data:		data,
				success: 	function( code ) {
					$('.woocommerce-error, .woocommerce-message').remove();
					$form.removeClass('processing').unblock();

					if ( code ) {
						$form.before( code );
						$form.slideUp();

						$('body').trigger('update_checkout');
					}
				},
				dataType: 	"html"
			});
			return false;
		}
	};

	wc_checkout_giftcards.init();

});



