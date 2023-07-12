<?php

namespace App\Http\Controllers;
class UserController extends Controller
{
    public function index()
    {
        echo "userController index";
    }

    public function create()
    {
        echo "userController create";
    }

    public function store()
    {
        echo "userController store";
    }

    public function edit($id)
    {
        echo "userController edit";
    }

    public function update($id)
    {
        echo "userController update";
    }

    public function delete($id)
    {
        echo "userController delete";
    }


}