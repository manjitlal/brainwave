$(function(){
	$(document).ready(function(){
		$("body,html").on("contextmenu",function(e){
			e.preventDefault();
		})

		$('body,html').bind('cut copy paste',function(e){
			e.preventDefault();
		});
	});
});