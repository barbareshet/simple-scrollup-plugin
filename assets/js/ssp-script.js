(function ($) {
    console.log('ok');
    /**
     * scrollup
     *
     */

    function scroll_up() {
        $(window).scroll(function(){
            function scrollUpInit(){
                if( $('.ssp-scrollup').hasClass('active')){

                    $('.ssp-scrollup').removeClass('active');
                };
            }
            if ($(this).scrollTop() > 450) {
                setTimeout( scrollUpInit, 1000 );

                $('.ssp-scrollup').fadeIn();

            } else {
                $('.ssp-scrollup').fadeOut();
            }

        });
        $('.ssp-scrollup').click(function(){
            $(this).toggleClass('active');
            $("html, body").animate({ scrollTop: 0 }, 1000);
            return false;
        });
    }//scroll_up
    scroll_up();
})(jQuery);