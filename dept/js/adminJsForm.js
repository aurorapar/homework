$(document).ready(function(){
    
    if(window.location.pathname == '/dept/adminFac.php')
    {
        $( ".content-focus" ).css("float", "none").width("70%").css("margin-left", "auto").css("margin-right", "auto").css("display", "block");
    }
    
	var days =["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
		//hides extras
		$.each(days, function(index, value){
			$('#' + value +'2').hide();
			$('#'+ value +'3').hide();
		});
		// First Step Add button
		 $.each(days,function(index,item){
			$('#button'+ item +'1').on("click",function(){
			$('#'+ item +'2').show();
			$('#button'+ item +'1').hide();
			$('#clear'+ item +'2').show();
		 });
			});
		//Secound step Add Button
		$.each(days,function(index,item){
			$('#button'+ item +'2').on("click",function(){
			$('#'+ item +'3').show();
			$('#button'+ item +'2').hide();
			$('#clear' + item +'2').hide();
		 });
			});
			
		//secound remove step
		$.each(days,function(index,item){
			$('#clear'+ item +'2').on("click",function(){
			$('#start'+ item + '2').val("null");
			$('#end'+ item + '2').val("null");
			$('#'+ item +'2').hide();
			$('#clear'+ item +'2').hide();
			$('#button' + item +'1').show();
		 });
			});
			
			$.each(days,function(index,item){
			$('#clear'+ item +'3').on("click",function(){
				$('#start'+ item + '3').val("null");
			$('#end'+ item + '3').val("null");
			$('#'+ item +'3').hide();
			$('#button' + item +'2').show();
			$('#clear'+ item +'2').show();
		 });
			});
			
		
		});

