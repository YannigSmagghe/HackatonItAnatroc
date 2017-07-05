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