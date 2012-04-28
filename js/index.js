(function() {
    //FORM
    var check = {};
    
    check['passwd'] = function() {
	var password = $("#passwd");
	var reg1 = /[0-9]+/;
	
	if (reg1.test(password.val()) && password.val().length >= 6) {
	    $("#ppasswd").html("Ok");
	    $("#ppasswd").removeClass("incorrect");
	    $("#ppasswd").addClass("correct");
	    return true;
	}
	else {
	    $("#ppasswd").html("Length >= 6 + digit");
	    $("#ppasswd").removeClass("correct");
	    $("#ppasswd").addClass("incorrect");
	}
	return false;
    };
    
    check['birth'] = function() {
	var reg1 = /^(0[1-9]|[12][0-9]|3[01])[\/](0[1-9]|1[012])[\/](19|20)\d\d$/;
	var date = $("#birth");
	
	if (reg1.test(date.val())) {
	    $("#pbirth").html("Ok");
	    $("#pbirth").removeClass("incorrect");
	    $("#pbirth").addClass("correct");
	    return true;
	}
	else {
	    $("#pbirth").html("DD/MM/YYYY");
	    $("#pbirth").removeClass("correct");
	    $("#pbirth").addClass("incorrect");
	}
	return false;
    };
	
    check['passwd2'] = function() {
	var password2 = $("#passwd2");
	var password = $("#passwd");
	
	if (password2.val() == password.val()) {
	    $("#ppasswd2").html("Ok"); 
	    $("#ppasswd2").removeClass("incorrect");
	    $("#ppasswd2").addClass("correct");
	    return true;
	}
	else {
	    $("#ppasswd2").html("Doesn't match");
	    $("#ppasswd2").removeClass("correct");
	    $("#ppasswd2").addClass("incorrect");
	}
	return false;
    };
    
    check['email'] = function() {
	var email = $("#email");
	var reg = new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$");
	if (reg.test(email.val())) {
	    $("#pemail").html("Ok"); 
	    $("#pemail").removeClass("incorrect");
	    $("#pemail").addClass("correct");
	    return true;
	}
	else {
	    $("#pemail").html("Invalid email"); 
	    $("#pemail").removeClass("correct");
	    $("#pemail").addClass("incorrect");
	}
	return false;
    };

    check['email2'] = function() {
	var email2 = $("#email2");
	var email = $("#email");
	
	if (email2.val() == email.val()) {
	    $("#pemail2").html("Ok"); 
	    $("#pemail2").removeClass("incorrect");
	    $("#pemail2").addClass("correct");
	    return true;
	}
	else {
	    $("#pemail2").html("Doesn't match");
	    $("#pemail2").removeClass("correct");
	    $("#pemail2").addClass("incorrect");
	}
	return false;
    };
   
    check['name'] = function(id) {
	var name = document.getElementById("name");
	if (name.value.length >= 2)
	{
	    $("#pname").html("Ok"); 
	    $("#pname").removeClass("incorrect");
	    $("#pname").addClass("correct");
	    return true;
	}
	else
	{
	    $("#pname").html("Length >= 2");
	    $("#pname").removeClass("correct");
	    $("#pname").addClass("incorrect");
	}
	return false;
    };

    check['surname'] = function(id) {
	var name = document.getElementById("surname");
	if (name.value.length >= 2)
	{
	    $("#psurname").html("Ok"); 
	    $("#psurname").removeClass("incorrect");
	    $("#psurname").addClass("correct");
	    return true;
	}
	else
	{
	    $("#psurname").html("Length >= 2");
	    $("#psurname").removeClass("correct");
	    $("#psurname").addClass("incorrect");
	}
	return false;
    };
    
    //We launch every check function
    var inputs = document.getElementsByTagName('input'),
    inputsLength = inputs.length,
    form = document.getElementById("#register");
    for (var i = 0 ; i < inputsLength ; i++) {
	inputs[i].onkeyup = function() {
	    check[this.id](this.id);
        };
    }
    

/*    $("#submit").click(function () {
	var result = true;
	
	for (var i in check) {
            result = check[i](i) && result;
	}
	if (result)
	    document.register.submit();
	
    });*/

    //SLIDE DOWN FOR THE FORMS
    var slide = false;
    var slidelogin = false;
    var addCoef = false;
    var coefHeight = 1;
    $(".blockcontainer").hide();
    $("#homeforms h2").addClass("pointer");
    $(".blockcontainer, #loginform").addClass("hidden");
    $("#registercontainer h2").click(function() 
			       {
				   coefUpdated = false;
				   $("#box_left, #box_right").fadeOut("50");
				   if (slide)
				   {
				       coefHeight -= 2;
				       $(".blockcontainer").slideToggle("200", function(){$(".blockcontainer").toggleClass("hidden");});
				   } 
				   else
				   {
				       coefHeight += 2;
				       $(".blockcontainer").toggleClass("hidden");
				       $(".blockcontainer").slideToggle("200");
				   }
				   //$("#logincontainer").toggle("200");	
	
				   slide = !slide;
			       });

    $("#loginform").hide();
    $("#logincontainer h2").click(function() 
			       {
				   coefUpdated = false;
				   $("#box_left, #box_right").fadeOut("50");
				   if (slidelogin)
				   {
			      	       $("#loginform").slideToggle("200", function(){$("#loginform").toggleClass("hidden");});
				       coefHeight -= 2;
				   }
				   else
				   {
				       coefHeight += 2;
				       $("#loginform").toggleClass("hidden");
				       $("#loginform").slideToggle("200");
				   }
				  				   
				   slidelogin = !slidelogin;
			       });

    var coefUpdated = true;
    $("html").mousemove(function(e)
		    {
			var morelessY = "+=";
			if (!coefUpdated)
			{
			    $("#box_left, #box_right").fadeIn();
			}
			else
			{
			    $("#box_left, #box_right").fadeIn();
			}
			var coef = coefHeight * 0.1;
			var coefX = 0.1;
			var newCssl = {
			    'top' : coef * e.pageY,
			    'left' : coefX * e.pageX
			}
			var newCssr = {
			    'top' : coef * e.pageY,
			    'right' : coefX * (e.pageX + 200)
			}
			$("#box_left").css(newCssl);
			$("#box_right").css(newCssr);
		    });

    
    
})();