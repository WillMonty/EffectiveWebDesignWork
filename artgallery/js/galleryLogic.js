$(document).ready(function() {
	$(".art").click(function(e) {
		changeArt(e.target)
	});

	$("#interestInput").val($("#mainTitle").text());
});

let currSelected;
function changeArt(targetArt)
{
	if(currSelected != null)
		$(currSelected).css("border", "3px solid black")

	let txt = targetArt.parentNode.title;
	let src = targetArt.src;
	console.log($("#mainTitle").text());

	$(targetArt).css("border", "3px solid yellow");

	$("#mainTitle").text(txt);
	$("#mainArt").attr('src', src);
	$("#interestInput").val(txt);

	currSelected = targetArt;
}