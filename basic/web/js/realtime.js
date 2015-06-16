/**
 * Realtime KidCare logger
 * Polls the server and displays messages directly
 *
 * Created by Dennis Eikelenboom on 17-6-2015.
 */
$(document).ready(function() {

    // poll the server every 5 seconds for new messages
    setInterval(pollServer, 5000);

});

/**
 * Poll the server, process the data and show the data to the user's screen
 */
function pollServer(){
    $.ajax({
        url: 'index.php?r=analyzer&log=true',
        dataType: 'json'
    }).done(function(data) {
        $.each(data, function(index, element)
        {
            prependLogItem(element.timestamp, element.characters);
        });
    });
}

/**
 * Prepend a new log item to the realtime logger
 * @param time
 * @param message
 */
function prependLogItem(time, message){
    $('.realtime ul').prepend('<li><strong>' + time + '</strong> - ' + message + '</li>');
}