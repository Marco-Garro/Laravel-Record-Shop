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
                <label for="">Quantity:</label>
                <form method="POST" action="{{route("cart.add", $viewData["product"]->getId())}}">
                    @csrf
                    <input value="1" name="quantity" type="number" min="1"><br>
                    <input value="Add to cart" type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
