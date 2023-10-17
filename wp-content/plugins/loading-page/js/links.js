jQuery(
    function () {
    var $ = jQuery;
    function _valid(a, u) {
        return 	u &&
				!(/^((javascript\:)|(\#))/i.test(u)) &&
				typeof a.attr('data-elementor-open-lightbox') == 'undefined' &&
				! a.hasClass('lp-exclude-link');
    };

    $(document).on(
        'click',
        'a',
        function () {
        try {
            var a = $(this),
            u = a.attr('href'),
            t = a.attr('target');
            if (
                (typeof cp_loadingpage != 'undefined' && 'displayScreen' in cp_loadingpage) &&
                (typeof u != 'undefined' && _valid(a, u)) &&
                (typeof t == 'undefined' || t.toLowerCase() == '_self')) {
                cp_loadingpage.displayScreen();
				$('body').addClass('lp_loading_screen_body');
                if (
					typeof loading_page_settings == 'undefined' ||
					!('triggerLinkScreenNeverClose' in loading_page_settings) ||
					!(loading_page_settings['triggerLinkScreenNeverClose'] * 1)
				) {
					setTimeout(
						function () {
							cp_loadingpage.onLoadComplete();
						},
						(typeof loading_page_settings != 'undefined' && 'triggerLinkScreenCloseAfter' in loading_page_settings && loading_page_settings['triggerLinkScreenCloseAfter'] * 1) ? Math.round(loading_page_settings['triggerLinkScreenCloseAfter'] * 1000) : 4000
					);
				}
                document.location.href = u;
            }
        } catch (err) {}
        return true;
    });
});
