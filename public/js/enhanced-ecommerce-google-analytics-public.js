jQuery(document).ready(function($){
	
	if(js_data.page == "shop"){

		items_array = [];
        imp_items_array = [];
        var i = 1;
        jQuery.each(js_data.js_items_imp, function(index, items) {
            imp_items_array[index] = js_data.js_items_imp[index];
        });
        jQuery.each(js_data.js_items, function(index, items) {
            items_array[index] = items;
        });
        var imp_items_obj = [];
        jQuery(document).on('click', '.woocommerce-loop-product__link', function(e) {

            var button = jQuery(this);
            var link = button.attr('href');
            imp_items_obj.push(imp_items_array[link]);
            fbq('track', 'ViewContent', {
            	value: imp_items_array[link]['price'],
            	currency: js_data.currency,
            	content_ids: imp_items_array[link]['id'],
            	content_type: imp_items_array[link]['category'],
            	contents:imp_items_obj
            });
        });

        var click_count = 1 ; 
        jQuery(document).on('click', '.ajax_add_to_cart', function() {
            var button = jQuery(this);
            var productId = button.attr('data-product_id');
            var event_array = [];
            event_array.push(items_array[productId]);
            fbq('track', 'AddToCart', {
                value:  event_array[0]['price'],
                currency: js_data.currency,
                content_ids:  event_array[0]['id'] + click_count,
                content_type: event_array[0]['category'],
                contents: event_array,
            });
            click_count++ ; 
        });

    }

    if (js_data.page == 'checkout') {

        var checkout_info_focus = 0;
        var checkout_place_order = 0;

        var billing_email = jQuery('#billing_email').val();
        jQuery(document).on('focusout change', '#billing_email', function() {
            if (billing_email != jQuery(this).val()) {
                if (checkout_info_focus == 0) {
                    fbq('track', 'InitiateCheckout', {
                      value: js_data.value,
                      currency: js_data.currency,
                      email:jQuery(this).val(),
                      contents:js_data.js_items,
                  });
                    checkout_info_focus++;
                }
            }
        });

        jQuery(document).on('click', '#place_order', function() {
        	if (checkout_place_order == 0) {

        		if (checkout_info_focus == 0) {
        			fbq('track', 'InitiateCheckout', {
        				value: js_data.value,
        				currency: js_data.currency,
        				email:jQuery(this).val(),
        				contents:js_data.js_items,
        			});
        			checkout_info_focus++;
        		}

        		fbq('track', 'AddPaymentInfo', {
                   value: js_data.value,
                   currency: js_data.currency,
                   email:jQuery(this).val(),
                   contents:js_data.js_items,
               });

        		checkout_place_order++;
        	}
        });
    }

    if (js_data.page == 'thankyou') {

        if (js_data.order_tracked == 'false') {

            fbq('track', 'Purchase', {
            	value: js_data.value,
            	currency: js_data.currency,
            	id:js_data.order_id,
            	coupon:js_data.coupon,
            	contents:js_data.js_items
            });

            gtag('event', 'conversion', {
              'send_to': 'AW-875536637/ORSxCJ6Xg3sQ_cG-oQM',
              'value': js_data.value,
              'currency': js_data.currency,
              'transaction_id': js_data.order_id,
            });
        }
    }
});


