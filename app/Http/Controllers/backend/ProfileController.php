<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('admin.profile.index');
    }

    //
    public function updateProfile(Request $request)
    {
        $request->validate([
            "name" => ['required', 'max:50', 'min:5'],
            "email" => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image'],
        ]);

        $user = Auth::user();



        if ($request->hasFile('image')) {
            //remove the old image
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            // upload the submited image
            $image = $request->image;
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path("uploads"), $imageName);

            $path = "/uploads/" . $imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('profile updated successfully');

        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('password updated successfully');


        return redirect()->back();
    }
}
