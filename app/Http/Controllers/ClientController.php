<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $data = DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.titel', 'news.description', 'news.image', 'news.view', 'news.created_at', 'categories.name as category_name')
            ->get();

        $collections = DB::table('categories')->get();

        return view('client.index', compact('data', 'collections'));
    }

    public function about()
    {
        return view('client.about');
    }

    public function shop()
    {
        return view('client.shop');
    }

    public function details($id)
    {
        $data = DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.titel', 'news.description', 'news.image', 'news.view', 'news.created_at', 'categories.name as category_name')
            ->where('news.id', $id)
            ->first();

        $collections = DB::table('categories')->get();

        return view('client.details', compact('data', 'collections'));
    }

    public function category($id)
    {

        $data = DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.titel', 'news.description', 'news.image', 'news.view', 'news.created_at', 'categories.name as category_name')
            ->where('categories.id', $id)
            ->get();

        $collections = DB::table('categories')->get();

        return view('client.category', compact('data', 'collections'));
    }
}
