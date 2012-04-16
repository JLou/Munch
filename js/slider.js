(function() {
    var currentValue = 1;
    $("#slidernav li").click(function()
			     {
			       if ($(this).val() != currentValue)
			       {
				   var old = currentValue;
				   currentValue = $(this).val();
				   $("#slider img[value='" + $(this).val() + "']").addClass("next").fadeIn("200", function(){
				       $("#slider img[value=" + old + "]").fadeOut().removeClass("current");
				       $("#slidernav li.current").removeClass("current");
				       $("#slidernav li[value=" + currentValue + "]").addClass("current");
				       $("#slider img[value=" + currentValue + "]").removeClass("next").addClass("current");
			       });
			       }

			       return false;
			   });
})();