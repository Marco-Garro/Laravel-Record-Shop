<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Products";
        $viewData['subtitle'] = "List of products";
        $viewData['products'] = Product::all();
        $viewData['user'] = auth()->user();
        return view('product.index')->with("viewData", $viewData);
    }
    public function detail($id)
    {
        $viewData = [];
        $viewData['product'] = Product::find($id);
        $viewData['title'] = $viewData['product']['name'];
        $viewData['subtitle'] = "Product detail";
        $viewData['user'] = auth()->user();
        return view('product.detail')->with("viewData", $viewData);
    }
}
?>
