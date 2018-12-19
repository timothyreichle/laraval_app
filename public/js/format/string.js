function newLineToHtml(oldStr){

	

	newStr =  oldStr.replace(/(?:\r\n|\r|\n)/g, '<br>');
	
	console.log(oldStr, newStr)
	
	return newStr;
}

function htmlToNewLine(oldStr){
	return oldStr.replace("/<br>/gi","\n");
}

var entityMap = {
  '&': '&amp;',
  '<': '&lt;',
  '>': '&gt;',
  '"': '&quot;',
  "'": '&#39;',
  '/': '&#x2F;',
  '`': '&#x60;',
  '=': '&#x3D;'
};

function escapeHtml (string) {
  return String(string).replace(/[&<>"'`=\/]/g, function (s) {
    return entityMap[s];
  });
}