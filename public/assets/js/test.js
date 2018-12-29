function getHeightWindow(windowHeight){
	$(".content-center").css({"height": windowHeight + "px"});
}

$(window).on("load ready resize", function(){
	var windowHeight = $(window).height();
	getHeightWindow(windowHeight);
});

//ajax send url
$(document).on("ready", function(){
	$(".form-custom").submit(function(e){
		e.preventDefault();
		var urlSite = $(this).find("input#url_site").val();
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});

		$.ajax({
		    method: 'POST',
		    url: '/testpage',
		    data: {'urlSite': urlSite}
		});
	});
});







