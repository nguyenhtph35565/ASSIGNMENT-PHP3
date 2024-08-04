<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function getNewsByCategory($categoryId)
    {

        $news = News::where('category_id', $categoryId)->get();

        return response()->json($news);
    }


    public function getNewsDetails($id)
    {

        $news = News::find($id);

        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        return response()->json($news);
    }
}
