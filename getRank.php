<script type="text/javascript">
	window.alert = function (text) { 
		console.log("alert : " +text); 
	};

</script>
<body>
<div id='getUser'>
<?php
	$mem = 319; 
	
	for($i=0;$i<$mem;$i+=50)
		echo file_get_contents("http://134.208.3.114/JudgeOnline/ranklist.php?start=$i"); 

?>
</div>

<script type="text/javascript">
	var data1, data2;
	var user = [];
	var nickname = [];  
	var unum = 0;  
	data1 = document.getElementsByClassName('evenrow'); 
	data2 = document.getElementsByClassName('oddrow');
	
	for(var i=0;i<data1.length;i++){
		if(data1[i].childNodes[2].childNodes[0].innerText.match('103程式設計AA')!=null){
			user[unum] = data1[i].childNodes[1].childNodes[0].innerText; 
			nickname[unum] = data1[i].childNodes[2].childNodes[0].innerText; 
			unum++; 
		}
	}
	for(var i=0;i<data2.length;i++){
		if(data2[i].childNodes[2].childNodes[0].innerText.match('103程式設計AA')!=null){
			user[unum] = data2[i].childNodes[1].childNodes[0].innerText; 
			nickname[unum] = data2[i].childNodes[2].childNodes[0].innerText; 
			unum++; 		
		}
	}


	document.getElementById('getUser').innerHTML = "";  

	
	var form = document.createElement("form"); 
	form.setAttribute("method", "post"); 
	form.setAttribute("action", "getUserInfo.php"); 
	for(var i=0;i<user.length;i++){
		var child = document.createElement("input"); 
		var kid = document.createElement("input"); 
		child.setAttribute("type", "hidden"); 
		child.setAttribute("name", "user_"+i); 
		child.setAttribute("value", user[i]); 
		kid.setAttribute("type", "hidden"); 
		kid.setAttribute("name","name_"+i); 
		kid.setAttribute("value", nickname[i]); 
		form.appendChild(child); 
		form.appendChild(kid); 
	}

	document.body.appendChild(form); 
	form.submit(); 

</script>


</body>
