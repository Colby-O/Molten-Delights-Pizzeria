/* requestTime.js */ 

// Time interval upon whioch to check for an update from time.php.
const UPDATE_TIME_INTERVAL = 1000;

/*
 * Sends a request to update the time on a interval.
 */
function timer() {
    setInterval(updateTime, UPDATE_TIME_INTERVAL);
}

/*
 * Sends a request to time.php to update the time on the banner.
 */
function updateTime() {
    let objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = () => {
        if(objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200)  {
            document.getElementById("datetime").innerHTML = objXMLHttpRequest.responseText;
        }
    }
    objXMLHttpRequest.open("GET", "./scripts/time.php", true);
    objXMLHttpRequest.send(null);
}
    
timer()