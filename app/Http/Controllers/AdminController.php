<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.admin.admin_dashboard');
    }
    public function Login()
    {
        return view('backend.admin.admin_login');
    }
    public function profile($id)
    {
        $admin = User::findOrFail($id);
        return view('backend.admin.admin_profile', compact('admin'));
    }
    public function update(Request $request)
    {
        $id = $request->admin_id;
        $user = User::findOrFail($id);
        if ($request->has('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/admin_images/';
            $image->move($path, $filename);

            if (File::exists($user->image)) {
                File::delete($user->image);
            }
            User::findOrFail($id)->update([
                'image' => $path . $filename,
            ]);
        } else {
            User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'username' => $request->username,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Profile Updated succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.index')->with($notification);
    }
    public function imageUpdate(Request $request)
    {
        $request->validate([
            'image' => 'mimes:png,jpg,jpeg,webp|required'
        ]);

        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/admin_images/';
            $file->move($path, $filename);

            if (File::exists($user->image)) {
                File::delete($user->image);
            }
            $user->update([
                'image' => $path . $filename,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Profile Updated succesfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.index')->with($notification);
        }
    }
}
