$(document).ready(function() {
    var currentValue = 1;
    var refreshIntervalId = null;
    
    function interval()
    {
	refreshIntervalId = setInterval(function() {
	var old = currentValue;
	if (currentValue == 4)
	    currentValue = 1;
	else
	    currentValue = currentValue + 1;
	$("#slider img[value='" + currentValue + "']").addClass("next").fadeIn("600", function() {
	    $("#slider img[value=" + old + "]").fadeOut("600").removeClass("current");
	    $("#slidernav li.current").removeClass("current");
	    $("#slidernav li[value=" + currentValue + "]").addClass("current");
	    $("#slider img[value=" + currentValue + "]").removeClass("next").addClass("current")});}, 4000);
    }
    
    interval();
    
    $("#slidernav li").click(function()
			     {
				 clearInterval(refreshIntervalId);
				 if ($(this).val() != currentValue)
				 {
				     var old = currentValue;
				     currentValue = $(this).val();
				     $("#slider img[value='" + $(this).val() + "']").addClass("next").fadeIn("600", function(){
					 $("#slider img[value=" + old + "]").fadeOut("600").removeClass("current");
					 $("#slidernav li.current").removeClass("current");
					 $("#slidernav li[value=" + currentValue + "]").addClass("current");
					 $("#slider img[value=" + currentValue + "]").removeClass("next").addClass("current");
				     });
				 }
				 interval();

			       return false;
	});
})();