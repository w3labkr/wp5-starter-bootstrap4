;(function ( $, window, document, undefined ) {
    Starter = window.Starter || {};
    Starter.Maps = window.Starter.Maps || {};
    Starter.Maps.Google = window.Starter.Maps.Google || {};

    Starter.Maps.Google.Options = {
        api : {
            uri : 'https://maps.googleapis.com/maps/api/js',
            key : '', // API KEY
            language : 'en',
            region : 'AU',
            container : '.map-google'
        },
        map : {
            center: {
                lat: -34.397,         // (int)
                lng: 150.644          // (int)
            },
            zoom : 8,                 // (int)
            icon : '',                // (string) /path/marker.png
            draggable : true,         // (boolean)
            scrollwheel : false,      // (boolean)
            styleWizard : 'standard', // (string) standard, silver, retro, dark, night, aubergine
            zoomControl: true,        // (boolean)
            mapTypeControl: false,    // (boolean)
            scaleControl: false,      // (boolean)
            streetViewControl: false, // (boolean)
            rotateControl: false,     // (boolean)
            fullscreenControl: false  // (boolean)
        }
    }

    Starter.Maps.Google.onInit = function() {

        var api = Starter.Maps.Google.Options.api;
        var param = api.uri + '?key='+ api.key +'&language='+ api.language +'&region='+ api.region +'';

        if ( ! $(api.container).length ) {
            return;
        }

        $.getScript( param ).done(function( script, textStatus ) {
            $(api.container).each(function(){

                var element = this;
                var $element = $(this);

                // Merge defaults and options, without modifying defaults
                var opts = $.extend( {}, Starter.Maps.Google.Options.map, $element.data('starter-map-google') );

                // Styles a map
                var styleWizard = opts.styleWizard.toLowerCase();
                switch(styleWizard) {
                    case 'standard':
                        opts.styles = Starter.Maps.Google.Style.Standard;
                        break;
                    case 'silver':
                        opts.styles = Starter.Maps.Google.Style.Silver;
                        break;
                    case 'retro':
                        opts.styles = Starter.Maps.Google.Style.Retro;
                        break;
                    case 'dark':
                        opts.styles = Starter.Maps.Google.Style.Dark;
                        break;
                    case 'night':
                        opts.styles = Starter.Maps.Google.Style.Night;
                        break;
                    case 'aubergine':
                        opts.styles = Starter.Maps.Google.Style.Aubergine;
                        break;
                }

                // disable draggable mobile only 
                if((/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
                    mapOptions.draggable = false;
                }

                var map = new google.maps.Map( element, opts );

                // Marker
                if ( opts.icon !== '' ) {
                    var marker = new google.maps.Marker({
                        map      : map,
                        position : map.getCenter(),
                        icon     : opts.icon
                    });
                }

                // responsive position center
                google.maps.event.addDomListener(window, "resize", function() {
                    google.maps.event.trigger(map, "resize");
                    map.setCenter(map.getCenter()); 
                });
                
            });

        })
        .fail(function( jqxhr, settings, exception ) {
            console.log( jqxhr );
        });
                
    };

    Starter.Maps.Google.onInit();
})( jQuery, window, document );