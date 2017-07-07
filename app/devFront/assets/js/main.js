$( document ).ready(function() {

    //send input
    function resultPage() {
        // $("#search-input").hide();
        $(".input-container").hide();
        $(".result-container").show();

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
    $.getJSON( "test.json", function( data ) {
        // console.log(data.data[0].type);
        // console.log(data.data[0].data.temperature);
         //console.log(data.data[0].data.temps);

        $('.result_type').text(data.data[0].type);

        $(".temps").hide();
        $("."+data.data[0].data.temps+"").show();


        $('.temperature').text(data.data[0].data.temperature+'°');
        $('.ville').text(data.data[0].data.ville);
    });



    $("#menu_connexion").click(function() {
        $(".input-container").hide();
        $(".connexion-container").show();
    });

    $("#menu_acceuil").click(function() {
        $(".connexion-container").hide();
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