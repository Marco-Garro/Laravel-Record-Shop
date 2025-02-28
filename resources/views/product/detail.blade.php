@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="{{asset("/storage/".$viewData["product"]->getImage())}}" alt="Card image cap">
            </div>
            <div class="col-4">
                <h5 class="card-title">{{$viewData["product"]->getName()}}</h5>
                <p class="card-text"> {{$viewData["product"]->getDescription()}}</p>
                <a href="#" class="btn btn-primary">Cart</a>
            </div>
        </div>
    </div>
@endsection
