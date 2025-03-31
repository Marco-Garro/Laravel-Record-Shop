@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <table class="table table-striped">
        <tr>
            <th>
                Id
            </th>
            <th>
                Total
            </th>
            <th>
                Date
            </th>
        </tr>
        @foreach($viewData['orders'] as $order)
            <tr>
                <td>
                    {{$order->getId()}}
                </td>
                <td>
                    {{$order->getTotal()}}
                </td>
                <td>
                    {{$order->getCreatedAt()}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
