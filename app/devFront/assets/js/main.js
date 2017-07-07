$( document ).ready(function() {

    //send input
    function resultPage() {
        // $("#search-input").hide();
        $(".input-container").fadeOut();
        $(".result-container").fadeIn();

    }
    var timer = null;
    $("#search-input").on("keyup", function() {
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
        type: 'char'
    });


    //Swap voice inpu
    window.setInterval(function(){
        var voiceSpan = '#interim_span';
        if ($(voiceSpan).text().length > 0){
            $('#search-input').hide();
        }

    }, 1000);

    //Swap to result page
    window.setInterval(function(){
        var voiceSpan = '#final_span';
        if ($(voiceSpan).text().length > 0){
            resultPage();
        }

    }, 100);


});