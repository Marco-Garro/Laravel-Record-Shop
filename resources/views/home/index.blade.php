@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="row ">
        <div class="col-4">
            <img src="{{ asset('storage/Lahai.png') }}"/>
        </div>
        <div class="col-4">
            <img src="{{ asset('storage/Amnesiac.png') }}"/>
        </div>
        <div class="col-4">
            <img src="{{ asset('storage/Post.png') }}"/>
        </div>
    </div>
@endsection
