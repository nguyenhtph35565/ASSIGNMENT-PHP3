<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function table()
    {
        return view('admin.news.table');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function update()
    {
        return view('admin.news.update');
    }

    public function details()
    {
        return view('admin.news.details');
    }

    public function createCate()
    {

        return view('admin.categories.create');
    }
}
