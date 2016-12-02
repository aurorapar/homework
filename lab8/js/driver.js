var url = "http://localhost/lab8/php/driver.php";

$(document).ready(function(){  
    $("#submitselect").click(submitQuery);

});

function submitQuery(event)
{
    var country = $('#countryselect').val();
    var city = $('#cityselect').val();
    var population = $('#popselect').val();
    
    var self = this;
    event.preventDefault();    
    $.ajax({
        type: "POST",
        url: url,
        data: "country="+country+"&city="+city+"&population="+population,
        success: function(response)
        {               ;
            $("#result").html(response);
        }
    });    
    
}