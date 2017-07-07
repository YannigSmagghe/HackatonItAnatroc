$( document ).ready(function() {




    //send input
    function resultPage() {
        // $("#search-input").hide();
        $(".input-container").hide();
        $(".result-container").show();
        google.maps.event.trigger(map, 'resize');
        getLocation();

    }
    var timer = null;
    $("#search-input").on("keyup", function() {
        console.log(timer);
        if (timer) {
            clearTimeout(timer); //cancel the previous timer.
        }
        timer = setTimeout(resultPage, 3000);
        return timer;
    });
    
    //Traitement Json
    $.getJSON( "result.json", function( data ) {
        // console.log(data.data[0].type);
        // console.log(data.data[0].data.temperature);
         //console.log(data.data[0].data.temps);

        $('.result_type').text(data.data[0].type);

        $(".temps").hide();
        $("#"+data.data[0].data.temps+"").show();


        $('#temperature').text(data.data[0].data.temperature+'°');
        $('#ville').text(data.data[0].data.ville);

        $('#distance_result').text(data.data[2].data.distance);
        $('#start_address_result').text(data.data[2].data.start_address_name);
        $('#end_address_result').text(data.data[2].data.end_address_name);
        $('#duration_result').text(data.data[2].data.duration);
    });



    $("#menu_connexion").click(function() {
        $(".input-container").hide();
        $(".connexion-container").show();
    });

    $("#menu_acceuil").click(function() {
        $(".connexion-container").hide();
        $(".meteo-container").hide();
        $(".input-container").show();
    });




    function getLocation() {
        if (navigator.geolocation) {
            console.log("oui");
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert('Votre navigateur ne supporte pas la geolocalisation')
        }
    }

    function showPosition(position) {
        /*   x.innerHTML = "Latitude: " + position.coords.latitude +
         "<br>Longitude: " + position.coords.longitude;*/
        console.log(position.coords.longitude+ 'longitude');
        console.log(position.coords.latitude+ 'latitude');
    }



    //title Animation

    $('.tlt').textillate( {

        loop: false,
        autoStart: true,

        in: {
            effect: "flipInX",
            delayScale: 3,
            delay: 50,
            sync: false,
            sequence: true,
            reverse: false
        },
        type: 'char',
    });


    /* MAP GOOGLE */


    var map;
    window.initMap = function() {
        map = new google.maps.Map(document.getElementById('map-container'), {
            center: {lat: 45.7702825, lng: 4.861604 },
            zoom: 8
        });

        var styles = [
            {
                "featureType": "administrative",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#a7a7a7"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#737373"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#efefef"
                    },
                    {
                        "lightness": "20"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "visibility": "off"
                    },
                    {
                        "color": "#dadada"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#696969"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#ffffff"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#b3b3b3"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#ffffff"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#d6d6d6"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#ffffff"
                    },
                    {
                        "weight": 1.8
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#d7d7d7"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#808080"
                    },
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#bfcdd5"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "saturation": "-47"
                    }
                ]
            }
        ]

        map.setOptions({styles: styles});
        geocodeAddress(geocoder, map);
    }




});
