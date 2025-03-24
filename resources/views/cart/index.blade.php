@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <table class="table table-striped text-center align-middle">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Remove from cart</th>
        </tr>
            @foreach($viewData['products'] as $product)
            <tr>
                <td class="w-25"><img class="img-fluid w-25" src="{{asset("storage/{$product->getImage()}")}}"></td>
                <td>{{$product->getName()}}</td>
                <td>{{$product->getPrice()}}</td>
                <td>{{$viewData["productsSession"][$product->getId()]}}</td>
                <td>{{$product->getPrice() * $viewData["productsSession"][$product->getId()]}}</td>
                <td>
                    <form method="POST" action="{{route("cart.removeProduct", $product->getId())}}">
                        @method("DELETE")
                        @csrf
                        <input type="submit" value="remove" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
    <div class="d-flex justify-content-end">
        <b>Total price: {{$viewData["totalPrice"]}}</b>
    </div>
    <br>
    <form method="POST" action="{{route("cart.emptyCart")}}">
        @method("DELETE")
        @csrf
        <div class="d-flex justify-content-end">
            <input value="Empty Cart" type="submit" class="btn btn-danger">
        </div>
    </form>
@endsection
