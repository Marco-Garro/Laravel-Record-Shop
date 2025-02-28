@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <h3>Product Detail</h3>
    <form action="{{route("admin.updateProduct", $viewData['product']->getId())}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row mb-4">
            <div class="col">
                <label>
                    Id:
                </label>
                <input name="id" type="number" readonly value="{{$viewData['product']->getId()}}">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label>
                    Name:
                </label>
                <input value="{{$viewData['product']->getName()}}" name="name" type="text">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label>
                    Description:
                </label>
                <textarea name="description">
                    {{$viewData['product']->getDescription()}}
                </textarea>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <img src="{{ asset('storage/'.$viewData['product']->getImage()) }}"/>
                <label>
                    Image:
                </label>
                <input value="{{$viewData['product']->getImage()}}" name="image" type="file">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label>
                    Price:
                </label>
                <input value="{{$viewData['product']->getPrice()}}" name="price" type="number">
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
