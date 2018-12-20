$(document).ready(function(){
	
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');  
        getProducts(url);
        window.history.pushState("", "", url);
    });
	
	
    $('body').on('click', '.addCart', function(e) {
		console.log(e)
	});

});

var productAjax = null;

function getProducts(url){

	if(productAjax){
		productAjax.abort();
		productAjax = null
	}
	
	$("#products .container").html('<i class="fas fa-spinner fa-spin"></i>');
	

    productAjax = $.get(url, {}, function(data){
		$("#products").html(data);
    }).fail(function(){
		FailMessage("Could not load Products");
    });
}