<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sub_categories = SubCategory::paginate(10);
        return view('admin.sub-category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view("admin.sub-category.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "category" => ["required"],
            "name" => ["required", "max:100", "unique:sub_categories,name"],
            "status" => ["required"],
        ]);

        $subCategory = new SubCategory();

        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;

        $subCategory->save();

        toastr("created successfully!", "success");

        return redirect()->route('admin.sub-category.index');
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
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();

        return view("admin.sub-category.edit", compact("subCategory", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "category" => ["required"],
            "name" => ["required", "max:100", "unique:sub_categories,name,$id"],
            "status" => ["required"],
        ]);

        $subCategory = SubCategory::findOrFail($id);

        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;

        $subCategory->save();

        toastr("updated successfully!", "success");

        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $childs_count = ChildCategory::where("subCategory_id", $id)->count();

        if ($childs_count > 0) {
            return response(["status" => "error", "message" => "this sub category contains child categories, please delete all related child categories first"]);
        }
        SubCategory::findOrFail($id)->delete();
        return response(["status" => "success", "message" => "deleted successfully"]);
    }

    /**
     * update the status of a sub category.
     */
    public function updateStatus(Request $request)
    {
        $status = $request->json()->all()['status'];

        $id = $request->json()->all()['id'];

        $category = SubCategory::findOrFail($id);

        $category->status = $status;

        $category->save();

        return response(["status" => "success", "message" => "updated successfully"]);
    }


    public function getSubCategories(Request $request)
    {
        $category_id = $request->json()->all()['category'];
        if ($category_id !== "") {
            $sub_categories = SubCategory::select("id", "name")->where('category_id', $category_id)->get();
        } else {
            $sub_categories = SubCategory::select("id", "name")->get();
        }
        return response($sub_categories);
    }
}
