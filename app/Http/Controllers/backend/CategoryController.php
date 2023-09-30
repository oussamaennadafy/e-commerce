<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.category.index', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "icon" => ["required", "not_in:empty"],
            "name" => ["required", "max:100", "unique:categories,name"],
            "status" => ["required"],
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;

        $category->save();

        toastr('category create successfully');

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "icon" => ["required", "not_in:empty"],
            "name" => ["required", "max:100", "unique:categories,name,$id"],
            "status" => ["required"],
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->icon = $request->icon;
        $category->status = $request->status;

        $category->save();

        toastr("updated successfully", "success");

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $childs_count = SubCategory::where("category_id", $id)->count();
        if ($childs_count > 0) {
            return response(["status" => "error", "message" => "this category contains sub categories, please delete all related sub categories first"]);
        }
        Category::findOrFail($id)->delete();

        return response(["status" => "success", "message" => "deleted successfully"]);
    }

    /**
     * update the status of a category.
     */
    public function updateStatus(Request $request)
    {
        $status = $request->json()->all()['status'];

        $id = $request->json()->all()['id'];

        $category = Category::findOrFail($id);

        $category->status = $status;

        $category->save();

        return response(["status" => "success", "message" => "updated successfully"]);
    }
}
