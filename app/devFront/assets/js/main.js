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
});

//Title Animation

$(function () {

    $('.tlt').textillate({

        // enable looping
        loop: false,

        // set whether or not to automatically start animating
        autoStart: true,


        // in animation settings
        in: {
                effect: 'flipInX',
                delayScale: 1.5,
                delay: 75,
                sync: false,
                shuffle: false,
                reverse: false,
                callback: function () {}

        },



        // set the type of token to animate (available types: 'char' and 'word')
        type: 'char'
    });
});
