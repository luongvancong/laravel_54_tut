@extends('layouts/default')

@section('content')
    <style type="text/css">
        .products-grid li.item {
            width: 260px;
        }
    </style>

    <div class="category-full-image">
        <ul class="category-slider">
            <li> <img src="/assets/media/page-title-bg.jpg"></li>
        </ul>
    </div>

    <div class="container_9 title-container">
       <div class="page-title first-bg"> <h1>{{ $category['name'] }}</h1> </div>
       <div class="breadcrumb"> <a title="return to Home" href="/">Home</a> <span class="navigation-pipe">/</span> <span class="navigation_page">Living Room</span> </div>
    </div>

    <section id="columns" class="container_9 clearfix col2-right">
       <!-- Center -->
       <article id="center_column" class=" grid_5">
            <ul class="products-grid">
                @foreach($products as $item)
                    @include('partials/product-item')
                @endforeach
            </ul>

            {!! $products->links() !!}
       </article>

        @include('partials/right_sidebar')
    </section>
@stop