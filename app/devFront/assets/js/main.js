$( document ).ready(function() {




    //send input
    function resultPage() {
        // $("#search-input").hide();
        $(".input-container").hide();
        $(".result-container").show();
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
        $("."+data.data[0].data.temps+"").show();


        $('.temperature').text(data.data[0].data.temperature+'°');
        $('.ville').text(data.data[0].data.ville);

        $('.distance_result').text(data.data[2].data.distance);
        $('.start_address_result').text(data.data[2].data.start_address_name);
        $('.end_address_result').text(data.data[2].data.end_address_name);
        $('.duration_result').text(data.data[2].data.duration);
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
});