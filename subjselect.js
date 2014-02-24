// 強制讓 alert 不跳出，直接將訊息顯示於 Console Log
window.alert = function (text) { 
	console.log("alert : " +text); 
};

// 從選課畫面抓到按鈕位置
// 注意：需先進行好課程預選，並將預選之課程顯示於下方窗格
delButton = document.getElementsByClassName("delete");
addButton = document.getElementsByClassName("add");
// 欲退選之課程，從已選課程由上往下數，0開始，切記請勿打錯不然會退錯課喔！
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

// 以上可以在搶課前先丟進 Chrome F12 之 Console，以下請抓准第一瞬間Enter進去
// 若沒有要退選，請不要扔clickDel這行
clickDel(del.length-1);
// 依照預排課程，由下往上選課
clickAdd(addButton.length-1);
