<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CartController extends BaseController
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData['title'] = 'Cart';
        $viewData['subtitle'] = 'Your cart';
        $viewData['user'] = auth()->user();
        $viewData['products'] = [];
        $productsSession = $request->session()->get("products");
        $viewData['productsSession'] = $productsSession;
        if($productsSession)
            $viewData['products'] = Product::findMany(array_keys($productsSession));

        $viewData['totalPrice'] = 0;
        foreach ($viewData['products'] as $product)
            $viewData['totalPrice'] += $productsSession[$product->getId()] * $product->getPrice();
        return view('cart.index' )->with("viewData", $viewData);
    }

    public function add(Request $request, int $id){

        $productsSession = $request->session()->get("products");    # key/value array
        $quantity = $request->input("quantity");
        $productsSession[$id] = $quantity;
        $request->session()->put("products", $productsSession);
        return redirect()->route("cart.index");
    }

    public function removeProduct(Request $request, int $id){

        $request->session()->forget("products.{$id}");
        return redirect()->route("cart.index");
    }

    public function emptyCart(Request $request)
    {
        $request->session()->forget("products");
        return redirect()->route("cart.index");
    }

    public function buy(Request $request)
    {
        $productsSession = $request->session()->get("products");
        $products = [];
        if($productsSession)
            $products = Product::findMany(array_keys($productsSession));
        $order = new Order();
        $order->setUserId(auth()->user()["id"]);
        $total = 0;
        foreach ($products as $product)
            $total += $productsSession[$product->getId()] * $product->getPrice();
        $order->setTotal($total);
        $order->save();
        $request->session()->forget("products");
        return $this->orders();
    }
    public function order(Request $request, $id)
    {
        $order = Order::find($id);
        $viewData = [];
        $viewData['title'] = "Order confirmation";
        $viewData['subtitle'] = "Your order has been confirmed!";
        $viewData['id'] = $order->getId();
        $viewData['date'] = date("m/d/Y",time());
        $viewData['total'] = $order->getTotal();
        $viewData['user'] = auth()->user();
        return view('cart.order')->with("viewData", $viewData);
    }
    public function orders()
    {
        $viewData = [];
        $viewData['title'] = "Your Orders";
        $viewData['subtitle'] = "List of orders";
        $viewData['orders'] = Order::all()->where("user_id", "=", auth()->user()["id"]);
        $viewData['user'] = auth()->user();
        return  view('cart.orders')->with("viewData", $viewData);
    }
}
