<?php

namespace App\Controllers;

use App\Models\Category;

class HomeController
{
    public function index()
    {
        $categories = Category::all();
        var_dump($categories);
        return view('home');
    }
}
