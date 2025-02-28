<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;


class AdminController extends BaseController
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page';
        return view('admin.index')->with("viewData",$viewData);
    }
    public function products()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Products';
        $viewData['products'] = Product::all();
        return view('admin.products')->with("viewData",$viewData);
    }
    public function detailProduct($id)
    {
        $viewData = [];
        $viewData['title'] = 'Admin Product Detail';
        $viewData['product'] = Product::find($id);
        return view('admin.productDetail')->with("viewData",$viewData);
    }
    public function updateProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);

        $product = Product::find($request->input("id"));
        if($request->hasFile("image")){
            Storage::disk("public")->delete($product->getImage());
            $imageName = "{$request->input("name")}.".$request->file("image")->extension();
            Storage::disk("public")->put($imageName,
                file_get_contents($request->file("image")->getRealPath()));
            $product->image = $imageName;
        }
        $product->setName($request->input("name"));
        $product->setDescription($request->input("description"));
        $product->setPrice($request->input("price"));
        $product->save();

        return redirect()->route('admin.products');
    }
    public function deleteProduct($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products');
    }
    public function createProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);
        $product = new Product();
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->image = "noImage.png";
        if($request->hasFile("image")){
            $imageName = "{$request->input("name")}.".$request->file("image")->extension();
            Storage::disk("public")->put($imageName,
                file_get_contents($request->file("image")->getRealPath()));
            $product->image = $imageName;
        }
        $product->save();
        return redirect()->route('admin.products');
    }
}
?>
