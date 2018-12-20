
<div class="product">
	<p class="title"><a href="/shop/product/{{$product["id"]}}" > {{$product["name"]}}</a> ${{number_format($product["price"],2)}}</p>
	
	<p class="description">
		{{$product["description"]}}
	</p>
	
	<p class="addButton">
		<button class="addCart" data-id="{{$product["id"]}}">Add to Cart</button>
	</p>

</div>
 
 