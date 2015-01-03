<body>
<div id='getAC'>
<script>var user = [], nickname = []; </script>
<?php
	for($i=0;;$i++){
		if(!isset($_POST['user_'.$i]))
			break;
		echo file_get_contents("http://134.208.3.114/JudgeOnline/userinfo.php?user={$_POST['user_'.$i]}"); 
		echo "<script>\nuser[$i] = \"{$_POST['user_'.$i]}\"; \nnickname[$i] = \"{$_POST['name_'.$i]}\"; \n</script>"; 
	}
?>

</div>

<script type="text/javascript">
	var data = document.getElementsByClassName('table table-striped'); 
	var text, ACs; 
	var AC = []; 
	var require = [1000, 1001, 1002, 1003, 1005, 1007, 1009, 1011, 1016, 1018, 1019, 1020, 1021, 1022, 1023, 1024, 1025, 1027, 1029, 1030, 1031, 1034, 1035, 1037, 1039, 1040, 1041, 1042, 1043, 1044, 1049, 1051, 1052, 1054, 1056, 1057, 1058, 1061, 1062, 1063, 1064, 1065, 1068, 1075, 1076, 1078, 1079, 1083, 1084, 1085, 1086, 1087, 1088, 1089, 1091, 1092, 1093, 1094, 1095, 1096, 1097, 1098, 1099, 1103, 1124, 1159, 1162, 1469, 1549]; 
	var PID = []; 
	for(var i=0;i<require.length;i++)
		PID[i] = require[i].toString(10); 
	for(var i=0;i<data.length;i++){
		text = data[i].childNodes[3].childNodes[2].childNodes[2].innerText; 
		ACs = text.split(" ");  
		AC[i] = 0; 
		for(var j=0, k=0;j<ACs.length;j++){	// j-> users, k-> requirements
			while(ACs[j]>PID[k]){
				k++; 
				if(k>=PID.length)
					break;
			}
			if(k>=PID.length)
				break; 
			if(ACs[j]==PID[k]){
				AC[i]++; 
				k++; 
			}
		}
	}

	document.getElementById('getAC').innerHTML = ""; 

	var form = document.createElement("form"); 
	form.setAttribute("method","post"); 
	form.setAttribute("action", "index.php"); 
	for(var i=0;i<AC.length;i++){
		var XD = document.createElement("input"); 
		var QQ = document.createElement("input");
		var Orz = document.createElement("input");  
		XD.setAttribute("type", "hidden"); 
		XD.setAttribute("name", "AC_"+i); 
		XD.setAttribute("value", AC[i]); 
		QQ.setAttribute("type", "hidden"); 
		QQ.setAttribute("name", "user_"+i); 
		QQ.setAttribute("value", user[i]); 
		Orz.setAttribute("type", "hidden"); 
		Orz.setAttribute("name", "name_"+i); 
		Orz.setAttribute("value", nickname[i]); 
		form.appendChild(XD); 
		form.appendChild(QQ); 
		form.appendChild(Orz); 
	}
	document.body.appendChild(form); 
	form.submit(); 

</script>
</body>
