<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVendorProfileController extends Controller
{

    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profile = Vendor::where("user_id", Auth::user()->id)->first();
        // dd($profile->description);
        return view('admin.vendor-profile.index', compact("profile"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            "banner" => ["nullable", "image", "max:3000"],
            "phone" => ["required", "max:50"],
            "email" => ["required", "email", "max:200"],
            "address" => ["required"],
            "description" => ["required"],
            "facebook_link" => ["nullable", "url"],
            "twitter_link" => ["nullable", "url"],
            "instagram_link" => ["nullable", "url"],
        ]);

        $vendor = Vendor::where('user_id', Auth::user()->id)->first();

        $localPath = $this->updateImage($request, "banner", "uploads", $vendor->banner);

        if ($localPath)
            $vendor->banner = $localPath;

        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->description = $request->description;
        $vendor->facebook_link = $request->facebook_link;
        $vendor->twitter_link = $request->facebook_link;
        $vendor->instagram_link = $request->instagram_link;

        $vendor->save();

        toastr("updated successfully");

        return redirect()->back();
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
