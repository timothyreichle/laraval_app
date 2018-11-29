$(document).ready(function(){

    $.get("/note/list", {}, function(data){
   	showNotes(data);
    }).fail(function(){
	failure();
    });
		
		

});


function showNotes(data){
	alert(data);
}

function failure(){
	alert("Failed to Load Notes");
}

