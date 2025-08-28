@extends('layout.base')
@section("main_content")
<div class="main cards-section">
    @if(session("success"))
    <div class="alert alert-success">
        {{session("success")}}
    </div>
    @endif
        <div class="row mt-2">
            <table>
                <th>
                    <tr>name</tr>
                    <tr>price</tr>
                    <tr>Action</tr>
                </th>
            @foreach($cart as $key => $item )
                <tr>
                    <td class="card-title">{{$item["name"]}}</td>
                    <td class="card-subtitle mb-2">{{$item["price"]}}</td>
                    <td class="card-subtitle mb-2">{{$item["quantity"]}}</td>
                    <td>
                    <form method="POST" action="cart/add/{{$key}}">
                        @csrf
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>

                    </td>
                    <td>
                    <form method="POST" action="cart/remove/{{$key}}">
                        @csrf
                        <button type="submit" class="btn btn-success">Remove from Cart</button>
                    </form>
                    </td>
                    <td>
                    <form method="POST" action="cart/update/{{$key}">
                        @csrf
                        <input name="quantity">
                        <button type="submit" class="btn btn-success">Update quantity</button>
                    </form>
                    </td>
                </div>
            </tr>
            @endforeach
            </table>
        </div>

</div>
@endsection