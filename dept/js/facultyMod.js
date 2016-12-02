$(document).ready( function() {
        $(".fac :nth-child(4)" ).css("clear", "both");
        $(".facItem").click(showInfo);
});

function showInfo()
{
    //$ ( ".fac" ).css();
    
    $( this ).css("float", "none");
    var thisChild = jQuery(this).find(".hours-table");
    thisChild.toggle();
    if(thisChild.css("display") == "none")
    {
        $( ".facItem ").toggle();
        $( this ).toggle();
        $( this ).css("float", "left");
        $( this ).width('30%');
        $( this ).css("margin-left", "1%");
        $( this ).css("margin-right", "0%");
    }
    else
    {
        $( ".facItem ").toggle();
        $( this ).toggle();        
        $( this ).css("float", "clear");
        $( this ).width('70%');
        $( this ).css("margin-left", "auto");
        $( this ).css("margin-right", "auto");
    }
}

/*

facItem defaults
    border-radius: 15px;
    float:left;
    outline-style: none;
    width:30%;  
    min-height: 155px;
    padding: 20px 1% 20px 1%;
    margin: 0px 0px 1% 1%;
*/