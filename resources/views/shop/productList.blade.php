<div class="productContainer" >
    @foreach ($products as $product)
		@include('shop.components.productSmall')
    @endforeach
</div>

<div class="links" >
	{{ $products->links() }}
</div>