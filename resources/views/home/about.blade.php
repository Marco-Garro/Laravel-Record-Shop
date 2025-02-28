@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section("content")
    <div class="row">
        <div class="col">
            <p>
                {{$viewData["description"]}}
            </p>
        </div>
    </div>
@endsection
