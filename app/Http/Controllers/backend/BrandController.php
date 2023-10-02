<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Str;

class BrandController extends Controller
{

    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brands = Brand::paginate(10);
        return view("admin.brand.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.brand.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "logo" => ["required", "image", "max:2000"],
            "name" => ["required", "max:200"],
            "is_featured" => ["required"],
            "status" => ["required"],
        ]);

        $localPath = $this->uploadImage($request, "logo", "uploads");

        $brand = new Brand();

        $brand->logo = $localPath;
        $brand->slug = Str::slug($request->name);
        $brand->name = $request->name;
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;

        $brand->save();

        toastr("created successfully");

        return redirect()->route("admin.brand.index");
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "logo" => ["nullable", "image", "max:2000"],
            "name" => ["required", "max:200"],
            "is_featured" => ["required"],
            "status" => ["required"],
        ]);

        $brand = Brand::findOrFail($id);

        $localPath = $this->updateImage($request, "logo", "uploads", $brand->logo);

        if ($localPath)
            $brand->logo = $localPath;

        $brand->slug = Str::slug($request->name);
        $brand->name = $request->name;
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;

        $brand->save();

        toastr("updated successfully");

        return redirect()->route("admin.brand.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $brand = Brand::find($id);
        $this->deleteImage($brand->logo);
        $brand->delete();

        toastr("deleted successfully");

        return response(["status" => "success", "message" => "deleted successfully"]);
    }

    /**
     * Update the status of a brand
     */
    public function updateStatus(Request $request)
    {
        $status = $request->json()->all()['status'];
        $id = $request->json()->all()['id'];

        $brand = Brand::findOrFail($id);

        $brand->status = $status;
        $brand->save();

        return response(["status" => "success", "message" => "updated successfully"]);
    }
}
