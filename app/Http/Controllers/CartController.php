<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class CartController extends BaseController
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Cart';
        $viewData['subtitle'] = 'Your cart';
        $viewData['user'] = auth()->user();
        $viewData['products'] = [
            [
                'image' => '',
                'name' => 'Product 1',
                'price' => 100,
                'quantity' => 2
            ],
            [
                'image' => '',
                'name' => 'Product 2',
                'price' => 200,
                'quantity' => 1
            ],
            [
                'image' => '',
                'name' => 'Product 3',
                'price' => 300,
                'quantity' => 3
            ]
        ];
        return view('cart.index' )->with("viewData", $viewData);
    }
}
