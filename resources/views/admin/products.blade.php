@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <h3>List of products</h3>
    <table class="table table-striped mb-4">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Delete</th>
            <th>Edit</th>
            </tr>
            @foreach($viewData['products'] as $product)
            <tr>
                <td>{{$product->getId()}}</td>
                <td>{{$product->getName()}}</td>
                <td><form action="{{route("admin.deleteProduct", $product->getId())}}" method="post">
                        @csrf
                        @method("DELETE")
                        <input class="btn-danger" type="submit" value="delete">
                    </form></td>
                <td><a href="{{route("admin.productDetail", ["id"=>$product->getId()])}}">EDIT</a></td>
            </tr>
        @endforeach
    </table>
    <form action="{{route("admin.createProduct")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
            <div class="col">
                <label>
                    Id:
                </label>
                <input name="id" type="number" readonly>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label>
                    Name:
                </label>
                <input name="name" type="text">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label>
                    Description:
                </label>
                <textarea name="description"></textarea>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label>
                    Image:
                </label>
                <input name="image" type="file">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label>
                    Price:
                </label>
                <input name="price" type="number">
            </div>
        </div>
        <input class="btn-primary" type="submit">
    </form>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endsection
