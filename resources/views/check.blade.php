<div id ="check"></div>
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript">
	console.log("ASDFAS")

	$.ajax({
		    type: 'get',
		    url: 'http://dukcapil-api.e-gov-bandung.tk/check/authenticated',
		    success: function(data) {
		    		console.log("ASDF")
		    		// console.log({{url()}});
		    	if (data != 'false') {
		    		var url = "{{url()}}/home?id="+data;
		    		window.location.href = url;
		    	} else {
		    		var url = "{{url()}}/home"
		    		window.location.href = url
		    	}
		    },
		    error: function(data) {
		    	alert(data);
		    }
		});
</script>