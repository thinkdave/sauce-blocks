// BLOCK ACCORDION
	$('.block-accordion .item-title h3').on('click', function() {
		$(this).parent().next().slideToggle();
        $(this).toggleClass('active');
        return false;
    });
