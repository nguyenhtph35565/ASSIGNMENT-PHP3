<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    public function index()
    {
        $data = DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.titel', 'news.description', 'news.image', 'news.view', 'news.created_at', 'categories.name as category_name')
            ->get();

        return view('admin.news.table', compact('data'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();

        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text-input' => 'required|string|max:255',
            'file-input' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'view-input' => 'required|integer',
            'created-at-input' => 'required|date',
            'select' => 'required|exists:categories,id',
            'textarea-input' => 'required|string',
        ]);

        if ($request->hasFile('file-input')) {
            $imageName = time() . '.' . $request->file('file-input')->extension();
            $request->file('file-input')->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        DB::table('news')->insert([
            'titel' => $request->input('text-input'),
            'description' => $request->input('textarea-input'),
            'image' => $imageName,
            'view' => $request->input('view-input'),
            'created_at' => $request->input('created-at-input'),
            'category_id' => $request->input('select'),
        ]);

        return redirect()->route('admin.table')->with('success', 'Created successfully');
    }

    public function details($id)
    {
        $data = DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.titel', 'news.description', 'news.image', 'news.view', 'news.created_at', 'categories.name as category_name')
            ->where('news.id', $id)
            ->first();

        return view('admin.news.details', compact('data'));
    }

    public function edit($id)
    {
        $news = DB::table('news')->find($id);
        $categories = DB::table('categories')->get();

        if (!$news) {
            abort(404);
        }

        return view('admin.news.update', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text-input' => 'required|string|max:255',
            'file-input' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'view-input' => 'required|integer',
            'created-at-input' => 'required|date',
            'select' => 'required|exists:categories,id',
            'textarea-input' => 'required|string',
        ]);

        $news = DB::table('news')->find($id);

        if (!$news) {
            abort(404);
        }

        if ($request->hasFile('file-input')) {
            $imageName = time() . '.' . $request->file('file-input')->extension();
            $request->file('file-input')->move(public_path('images'), $imageName);
        } else {
            $imageName = $news->image;
        }

        DB::table('news')->where('id', $id)->update([
            'titel' => $request->input('text-input'),
            'description' => $request->input('textarea-input'),
            'image' => $imageName,
            'view' => $request->input('view-input'),
            'created_at' => $request->input('created-at-input'),
            'category_id' => $request->input('select'),
        ]);

        return redirect()->route('admin.table')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {

        DB::table('news')->where('news.id', $id)->delete();

        return redirect()->route('admin.table')->with('success', 'Created successfully');
    }
}
