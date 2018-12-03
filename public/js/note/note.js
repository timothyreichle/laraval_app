$(document).ready(function(){
	if(!jQuery.ui)
	{
	   alert("Failed to load UI")
	}

    $.get("/note/list", {}, function(data){
		showNotes(JSON.parse(data));
    }).fail(function(){
		FailMessage("Could not load Notes");
    });
		
		
	$("#addNote").click(newNote);
});

function newNote(){

    $.post("/note/new", {}, function(data){
		
		$("#noteContainer").html('');
		
		showNotes(JSON.parse(data));
    }).fail(function(){
		FailMessage("Could not insert new Note");
    });

}

function updatePostion(obj){

	data = {
		noteid : obj.data('noteid'),
		left : obj.css('left'),
		top : obj.css('top'),
		width : obj.css('width'),
		height : obj.css('height'),
	}
		
    $.post("/note/postion", data, function(data){
	
	}).fail(function() {
	
		FailMessage("Could Not Save Postion")
	});

}


function showNotes(data){

	noteContainer = $("#noteContainer");

	$.each(data,function(index, note){
		
		noteDiv = $('<div class="noteDiv" data-noteid="'+note.id+'">');
		
		
		noteDiv.html(
			'<div class="noteTitle">'+
				'<div class="delete">X</div>'+
			'</div>'+
			'<Div class="noteContents">'+note.text+'</div>'
		);
	
		noteDiv.css("position","absolute")
		noteDiv.css("left",note.x)
		noteDiv.css("top",note.y);
		noteDiv.css("width",note.width)
		noteDiv.css("height",note.height);
		
		noteContainer.append(noteDiv);
		$(noteDiv).draggable({
			stop: function(){
				updatePostion($(this))
			}
		}).resizable({
			stop: function(){
				updatePostion($(this))
			}			
		});
		
		noteContent = noteDiv.find('.noteContents')
				
		noteDiv.find('.delete').click(function(event) {
			$.post("/note/delete", {noteid : noteDiv.data('noteid')} , function(data){
			
				noteDiv.remove()
			
			}).fail(function() {
			
				FailMessage("Could Not Delete Note")
			});
	
	
			event.stopPropagation();
		});
		
		
		
		noteDiv.click(function(event) {
		
			editing = noteContent.data("editing")
			
			
			if (!editing) {
			
				noteContent.data("editing",true)
			
				text = noteContent.html()
				
				input = $("<textarea style='width:100%; height:100%' >"+text+"</textarea>")
				
				input.keydown(function(event) {
					if (event.which == 13 && !event.shiftKey) {
					
						event.preventDefault();
					}
				});
				
				input.keyup(function(event) {
				
					if (event.which == 13 && !event.shiftKey) {
					
					
	
						text = noteContent.find('textarea').val()
						
						data = {
							noteid : noteDiv.data('noteid'),
							text : text
						}
							
						$.post("/note/text", data, function(data){
						
							noteContent.html(text)
							noteContent.data("editing",false)
						
						}).fail(function() {
						
							FailMessage("Could Not Save Text")
						});
	
						
					}
				});
				
				noteContent.html(input)
			
			}
		
		});
		
	})
		
}


