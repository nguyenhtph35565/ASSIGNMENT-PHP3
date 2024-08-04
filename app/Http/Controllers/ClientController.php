<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\Category;

class ClientController extends Controller
{
    public function index()
    {
        // tin mới
        $latestNews = DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.titel', 'news.description', 'news.image', 'news.view', 'news.created_at', 'categories.name as category_name')
            ->orderBy('news.created_at', 'desc')
            ->limit(5)
            ->get();

        // tin nổi bật
        $mostViewedNews = DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.titel', 'news.description', 'news.image', 'news.view', 'news.created_at', 'categories.name as category_name')
            ->orderBy('news.view', 'desc')
            ->limit(5)
            ->get();

        $collections = DB::table('categories')->get();

        return view('client.index', compact('latestNews', 'mostViewedNews', 'collections'));
    }


    public function about()
    {
        $collections = DB::table('categories')->get();

        return view('client.about', compact('collections'));
    }

    public function shop()
    {
        $collections = DB::table('categories')->get();

        return view('client.shop', compact('collections'));
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
            ->paginate(10);

        $collections = DB::table('categories')->get();

        return view('client.category', compact('data', 'collections'));
    }

    public function search(Request $request)
    {
        $query = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.titel', 'news.description', 'news.image', 'news.view', 'news.created_at', 'categories.name as category_name');

        if ($request->has('search') && $request->search != '') {
            $query->where('news.titel', 'like', '%' . $request->search . '%')
                ->orWhere('news.description', 'like', '%' . $request->search . '%');
        }

        $news = $query->paginate(5);
        $categories = Category::query()->get();
        $collections = DB::table('categories')->get();

        return view('client.search-results', compact('categories', 'news', 'collections'));
    }
}
