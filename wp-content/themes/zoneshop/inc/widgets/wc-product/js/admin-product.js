jQuery(function ($) {
	product_select();
  	function product_select() {
		/* sticky config */
		$('.thim-widget-field-cats').hide();
 		$('.thim-widget-field-show  .thim-widget-select').on('change', function () {
			if ($(this).val() == "category") {
				$('.thim-widget-field-cats').slideDown(300, 'linear');
 			} else {
				$('.thim-widget-field-cats').slideUp(300, 'linear');
 			}
		}).trigger('change');
 	}
});