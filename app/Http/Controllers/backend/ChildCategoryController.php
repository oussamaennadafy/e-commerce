<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $child_categories = ChildCategory::paginate(10);
        return view("admin.child-category.index", compact("child_categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin.child-category.create', compact("sub_categories", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "subCategory" => ["required"],
            "name" => ["required", "max:100", "unique:child_categories,name"],
            "status" => ["required"],
        ]);

        $childCategory = new ChildCategory();

        $childCategory->subCategory_id = $request->subCategory;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;

        $childCategory->save();

        toastr("created successfully!", "success");

        return redirect()->route('admin.child-category.index');
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
        $categories = Category::all();
        $childCategory = ChildCategory::findOrFail($id);
        $sub_categories = SubCategory::where("category_id", $childCategory->subCategory->category->id)->get();


        return view("admin.child-category.edit", compact("childCategory", "sub_categories", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
        $request->validate([
            "subCategory" => ["required"],
            "name" => ["required", "max:100", "unique:child_categories,name,$id"],
            "status" => ["required"],
        ]);

        $childCategory = ChildCategory::findOrFail($id);

        $childCategory->subCategory_id = $request->subCategory;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;

        $childCategory->save();

        toastr("updated successfully!", "success");

        return redirect()->route('admin.child-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        ChildCategory::findOrFail($id)->delete();

        return response(["status" => "success", "message" => "deleted successfully"]);
    }

    /**
     * update the status of a sub category.
     */
    public function updateStatus(Request $request)
    {
        $status = $request->json()->all()['status'];

        $id = $request->json()->all()['id'];

        $category = ChildCategory::findOrFail($id);

        $category->status = $status;

        $category->save();

        return response(["status" => "success", "message" => "updated successfully"]);
    }
}
