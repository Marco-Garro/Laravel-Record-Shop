@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <table class="table table-striped">
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
                <td>{{$product["image"]}}</td>
                <td>{{$product["name"]}}</td>
                <td>{{$product["price"]}}</td>
                <td>{{$product["quantity"]}}</td>
                <td>SUBTOTAL</td>
                <td>REMOVE</td>
            </tr>
            @endforeach
    </table>
@endsection
