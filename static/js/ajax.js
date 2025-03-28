function dis()
		{
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "select.php", false);
			xmlhttp.send(null);
			document.getElementById('getdata').innerHTML = xmlhttp.responseText;
		}
		dis ();
		setInterval(function(){
			dis();
		},2000);