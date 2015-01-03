<?php if(!isset($_POST['user_1'])){
	header('Location: getRank.php');
	exit;
}
else{

	// sorting by AC


?>
<table border=0 align="center">
<tr align="center" valign="middle"><th width="150">UserID</th><th width="250">UserName</th><th width="100">AC</th></tr>

<?php
	for($i=0;;$i++){
		if(!isset($_POST["user_".$i]))
			break;
		echo '<tr><td align="center">'; 
		echo "<a href=\"http://134.208.3.114/JudgeOnline/userinfo.php?user={$_POST['user_'.$i]}\">"; 
		echo $_POST['user_'.$i]; 
		echo '</a></td><td align="center">'; 
		echo $_POST['name_'.$i]; 
		echo '</td><td align="center">'; 
		echo $_POST['AC_'.$i]; 
		echo '</td></tr>'; 
	}	

echo '</table>'; 
}
?>
