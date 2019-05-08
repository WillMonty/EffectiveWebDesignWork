$(document).ready(function() {
	$(".art").click(function(e) {
		changeArt(e.target)
	});


	$("#submit").click(function(e) {
		validateForm(e);
	});

	$("#interestInput").val($("#mainTitle").text());
});

let currSelected;
function changeArt(targetArt){
	if(currSelected != null)
		$(currSelected).css("border", "3px solid black")

	let txt = targetArt.parentNode.title;
	let src = targetArt.src;

	$(targetArt).css("border", "3px solid yellow");

	$("#mainTitle").text(txt);
	$("#mainArt").attr('src', src);
	$("#interestI").val(txt);

	currSelected = targetArt;
}

function validateForm(e){
	//Clear old error messages
	$('.errorText').remove();
	$('.invalid').removeClass('invalid');
	
	let isValid = true;
	let fields = [$("#interestI"), $("#nameI"), $("#emailI")];

	//Test for blanks
	for(let i = 0; i < fields.length; i++){
		if(fields[i].val() == ""){
			fields[i].addClass("invalid");
			isValid = false;
		}
	}

	if(!isValid){
		$("#submit").before("<h4 class='errorText'>All fields required.</h4>");
		$("#submit").before("<h4 class='errorText'>Please try again.</h4>");
		e.preventDefault();	
		return;
	}


	//Test against regex
	let textRegex = new RegExp("^[A-Za-z' -]{1,100}$");
	for(let i = 0; i < 2; i++){
		if(!textRegex.test(fields[i].val())){
			fields[i].addClass("invalid");
			isValid = false;
		}
	}

	let emailRegex = new RegExp("^.+@.+\..+$");
	if(!emailRegex.test($("#emailI").val())){
		$("#emailI").addClass("invalid");
		isValid = false;
	}

	if(!isValid){
		$("#submit").before("<h4 class='errorText'>Form invalid. Please try again.</h4>")
		e.preventDefault();	
	}

}