<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Home';
        $viewData['subtitle'] = 'Welcome to our website';
        $viewData['user'] = auth()->user();
        return view('home.index' )->with("viewData", $viewData);
    }
    public function about()
    {
        $viewData = [];
        $viewData['title'] = 'About';
        $viewData['subtitle'] = 'About us';
        $viewData['description'] = 'lorem ipsum dolor sit amet';
        $viewData['user'] = auth()->user();
        return View('home.about')->with("viewData", $viewData);
    }
}
