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
    



    $("#menu_connexion").click(function() {
        $(".input-container").hide();
        $(".connexion-container").show();
    });

    $("#menu_accueil").click(function() {
        $(".connexion-container").hide();
        $(".meteo-container").hide();
        $(".input-container").show();
    });







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
