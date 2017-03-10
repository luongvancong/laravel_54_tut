<li class="item first fadeIn animated">
    <a class="product-image" title="{{ $item['name'] }}" href="{{ route('product.detail', [$item->id, removeTitle($item->name)]) }}">
        <img src="/uploads/{{ $item['image'] }}" width="249" height="180" alt="{{ $item['name'] }}">
    </a>
    <h2 class="product-name"> <a title="{{ $item['name'] }}" href="/"> {{ $item['name'] }} </a> </h2>
    <div class="actions">
        <a class="btn-circle first-bg-hover" href="{{ route('cart.update', ['product_id' => $item->id, 'product_name' => $item->name, 'action' => 'add', 'quantity' => 1]) }}"> <i class="icon-shopping-cart"></i> </a>
    </div>
</li>