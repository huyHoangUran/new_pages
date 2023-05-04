<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('admin.category.list', compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }
 
    public function store(Request $request) {
        $categories = Category::all();
        $formfields = $request->validate([
            'name' => 'required|max:225|unique:categories,name',
        ]);

        Category::create($formfields);

        return redirect('admin/category/list')->with('message', 'Create category successfully');
    }

    public function edit($id) {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $categories = Category::all();
        $formfields = $request->validate([
            'name' => 'required|max:225|unique:categories,name',
        ]);

        Category::where('id', $id)->update($formfields);
        return redirect('admin/category/list')->with('message', 'Update category successfully');
    }

    public function delete($id) {
        Category::where('id', $id)->delete();
        return redirect('admin/category/list')->with('message', 'Delete category successfully');
    }
}
 