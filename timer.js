let milli = 0;
let seconds = 0;
let minutes = 0;

let displayMilli = 0;
let displaySeconds = 0;
let displayMinutes = 0;

let interval = null;

let status = "stopped";

stopWatch = function() {
    milli++;
    if (milli / 100 === 1) {
        milli = 0;
        seconds++;
        if (seconds / 60 === 1) {
            seconds = 0;
            minutes++;
        }
    }
    if(milli < 10) {
        displayMilli = "0" + milli.toString();
    } else {
        displayMilli = milli;
    }
    if(seconds < 10) {
        displaySeconds = "0" + seconds.toString();
    } else {
        displaySeconds = seconds;
    }
    if (minutes < 10) {
        displayMinutes = "0" + minutes.toString();
    } else {
        displayMinutes = minutes;
    }
    document.getElementById("display").innerHTML = displayMinutes + ":" + displaySeconds + ":" + displayMilli;
}
function startStop(){

    if (status === "stopped") {
        interval = window.setInterval(stopWatch, 10);
        document.getElementById("startStop").innerHTML = "Stop";
        status = "started";
    } else {
        window.clearInterval(interval);
        document.getElementById("startStop").innerHTML = "Start";
        status = "stopped";
    }
}