<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = DB::table('categories');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $data = $query->get();

        return view('admin.categories.table', compact('data'));
    }


    public function create()
    {

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('categories')->insert([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.categories.table')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = DB::table('categories')->find($id);

        if (!$category) {
            return redirect()->route('admin.categories.table')->with('error', 'Category not found');
        }

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $affected = DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
            ]);

        if ($affected) {
            return redirect()->route('admin.categories.table')->with('success', 'Category updated successfully!');
        }

        return redirect()->route('admin.categories.table')->with('error', 'Failed to update category');
    }

    public function destroy($id)
    {
        $deleted = DB::table('categories')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.categories.table')->with('success', 'Category deleted successfully!');
        }

        return redirect()->route('admin.categories.table')->with('error', 'Failed to delete category');
    }
}
