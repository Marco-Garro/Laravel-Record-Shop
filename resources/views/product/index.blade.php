@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section("content")
    <div class="container">
        <div class="row">
            @foreach($viewData["products"] as $product)
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="{{asset("/storage/".$product->getImage())}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->getName()}}</h5>
                            <p class="card-text"></p>
                            <a href="{{route("product.detail", ["id"=>$product->getId()])}}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
