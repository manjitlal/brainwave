<!DOCTYPE html>
<html>
<head>
	<title>Browser</title>
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		var show_close_alert = true;

// $("a").bind("mouseup", function() {
//     show_close_alert = false;
// });

// $("form").bind("submit", function() {
//     show_close_alert = false;
// });

$(window).bind("beforeunload", function() {
    // if (show_close_alert) {
    //     // return "Killing me won't bring her back...";
    //     return 1;
    // }
    return 1;
});
$(window).unload(function() {
	alert('hello world!');
});
	</script>
</head>
<body>

</body>
</html>