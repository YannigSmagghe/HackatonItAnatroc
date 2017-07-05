//send input
function getInputTimer() {
    // $("#search-input").hide();
    //
}
var timer = null;
$("#search-input").on("keyup", function() {
    console.log(timer);
    if (timer) {
        clearTimeout(timer); //cancel the previous timer.
    }
    timer = setTimeout(getInputTimer, 3000);
    return timer;
});