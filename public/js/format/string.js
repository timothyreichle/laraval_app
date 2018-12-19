function newLineToHtml(oldStr){
	return  oldStr.replace(/(?:\r\n|\r|\n)/g, '<br>');
}

function htmlToNewLine(oldStr){
	var regex = /<br\s*[\/]?>/gi;

	return oldStr.replace(regex,"\n");
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