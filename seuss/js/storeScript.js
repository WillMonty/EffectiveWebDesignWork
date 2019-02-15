$('.carousel').carousel({
		interval: 4000,
		pause: "hover"
	});

$('#scrollCheck').change(function() {
	if(this.checked)
		$('.carousel').carousel('cycle');
	else
		$('.carousel').carousel('pause');
});