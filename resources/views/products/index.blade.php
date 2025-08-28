@extends('layout.base')
@section("main_content")
<div class="main cards-section">
    @if(session("success"))
    <div class="alert alert-success">
        {{session("success")}}
    </div>
    @endif
    @foreach($products->chunk(3) as $chunk)
        <div class="row mt-2">
            @foreach($chunk as $product)
                <div class="card col-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <h6 class="card-subtitle mb-2">{{$product->price}}</h6>
                    <p class="card-text">{{$product->description}}</p>
                    <form method="POST" action="cart/add/{{$product->id}}">
                        @csrf
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>
                </div>
                </div>
            @endforeach

        </div>

    @endforeach
</div>
@endsection