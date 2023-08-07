<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index()
    {
       echo 'categoryController index';
    }


    public function create()
    {
        echo 'categoryController create';
    }

    public function edit($id)
    {
        echo "categoryController edit";
    }
}