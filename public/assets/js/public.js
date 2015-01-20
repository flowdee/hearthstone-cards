(function ( $ ) {
	"use strict";

    $(document).ready(function() {

        $('.hcfw-card').each(function() {
            var card_id = $( this ).data( "hcfw-card-id" );
            var card_lang = $( this ).data( "hcfw-lang" )
            var card_width = $( this ).data( "hcfw-width" )
            var card_height = $( this ).data( "hcfw-height" )

            $( this ).append( $( '<div class="hcfw-overlay" style="width: '+card_width+'px"><img src="http://wow.zamimg.com/images/hearthstone/cards/'+card_lang+'/medium/'+card_id+'.png" width="'+card_width+'" height="'+card_height+'"/></div>' ) );
        });

        $('.hcfw-card').hover(function(e){
            $( this ).addClass("active");
        }, function() {
            $( this ).removeClass("active");
        });


        $(".hcfw-card").click(function(e){
            e.preventDefault();

            $( this).toggleClass("active");
        });

    });

}(jQuery));