function FailMessage(msg){


	console.log(msg)

	mesDiv = $('<div class="failMsg">');
	
	mesDiv.html(msg)
	
	mesDiv.fadeOut(3000)

	$("#messages").append(mesDiv)

}


function questionBox(text , confirmFunction){
	if (confirm(text)){
		confirmFunction();
	}
}