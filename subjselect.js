window.alert = function (text) { 
	console.log("alert : " +text); 
};

delButton = document.getElementsByClassName("delete");
addButton = document.getElementsByClassName("add");
del = Array(0, 1);

function clickAdd (i){ 
	addButton[i].click();
	if(i>0)
		setTimeout(clickAdd(i-1), 10); 
}

function clickDel(i){
	delButton[del[i]].click();
	if(i>0)
		setTimeout(clickDel(i-1), 10);
}

clickDel(del.length-1);
clickAdd(addButton.length-1);
