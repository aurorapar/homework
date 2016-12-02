$( document ).ready(function() {
	$( "#button" ).click(callBack) 
});
    
function callBack()
{
    var changeMe = $( ".content-focus" );
    
    
    
    var request = $.ajax({
        url: "fac.php",
        type: "POST",
        data: {
                "faculty_id": $( "#faculty_id" ).val(),
        },
        dataType: "html"
    });
    request.done(function(msg) {
        type(changeMe);
        changeMe.html(msg);
    });
    request.fail(function(msg) {
        alert(type(changeMe));
        alert("FAIL");
    });
    
    event.preventDefault();
}

function type(obj)
{
    alert(jQuery.type(obj));
}