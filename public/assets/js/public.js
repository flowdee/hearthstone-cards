(function ( $ ) {
	"use strict";

    $(document).ready(function() {

        $('.hcfw-card').each(function() {
            var card_id = $( this ).data( "hcfw-card-id" );
            var card_lang = $( this ).data( "hcfw-lang" );
            var card_width = $( this ).data( "hcfw-width" );
            var card_height = $( this ).data( "hcfw-height" );
            var card_gold = $( this ).data( "hcfw-gold" );

            //var imagePath = $( this ).data( "hcfw-image-path" ); // Deprecated
            var imageUrl = $( this ).data( "hcfw-image-url" );

            if ( ! imageUrl )
                return false;

            //var replace = '<div class="hcfw-overlay" style="width: '+card_width+'px"><img src="http://media.services.zam.com/v1/media/byName/hs/cards/enus/'+card_id+'.png" width="'+card_width+'" height="'+card_height+'"/></div>';

            //var gold = '<div class="hcfw-overlay" style="width: '+card_width+'px"><img src="http://media.services.zam.com/v1/media/byName/hs/cards/enus/animated/'+card_id+'_premium.gif" width="'+card_width+'" height="'+card_height+'"/></div>';

            //var replace = '<div class="hcfw-overlay" style="width: '+card_width+'px"><img src="https://cdn.rawgit.com/schmich/hearthstone-card-images/'+imagePath+'" width="'+card_width+'" height="'+card_height+'"/></div>'; //  Deprecated

            var replace = '<div class="hcfw-overlay" style="width: '+card_width+'px"><img src="'+imageUrl+'" width="'+card_width+'" height="'+card_height+'"/></div>';

            /*
            if ( card_gold ) {
                replace = gold;
            }
            */

            $( this ).append( $( replace ) );
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