
$( document ). ready(function() {
    $("#button").click(callBack)
});

function callBack()
{
    var changeMe = $( ".db-data" );
    
    var request = $.ajax({
            url: "fac.php",
            type: "POST",
            data: {
                "faculty_id": $( "#faculty_id" ).val(),
            },
            dataType: "html"
    });
    request.done(function(msg) {
        changeMe.html(msg);
    });
    request.fail(function(msg) {
        alert("AJAX CALL FAILED");
    });
    
    event.preventDefault();
}