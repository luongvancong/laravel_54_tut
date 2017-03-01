<li class="item first fadeIn animated">
    <a class="product-image" title="{{ $item['name'] }}" href="">
        <img src="/uploads/{{ $item['image'] }}" width="249" height="180" alt="{{ $item['name'] }}">
    </a>
    <h2 class="product-name"> <a title="{{ $item['name'] }}" href="/"> {{ $item['name'] }} </a> </h2>
    <div class="actions">
        <a class="btn-circle first-bg-hover" href="{{ route('cart.add', $item->id) }}"> <i class="icon-shopping-cart"></i> </a>
    </div>
</li>