$( document ).ready(function() {

    $.getJSON( "test.json", function( data ) {
        console.log(data.data[0].type);
        console.log(data.data[0].data.temperature);
        console.log(data.data[0].data.ville);

        $('.result_type').text(data.data[0].type);
        $('.result_temperature').text(data.data[0].data.temperature+'°');
        $('.result_ville').text(data.data[0].data.ville);
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