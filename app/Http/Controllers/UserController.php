<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function AllUser()
    {
        $users = User::paginate(5);
        return view('backend.user.all_user', compact('users'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit_user', compact('user'));
    }
    public function update(Request $request)
    {
        $id = $request->user_id;
        $user = User::findOrFail($id);
        if ($request->has('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/user_images/';
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
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('all.user');
    }
    public function create()
    {
        return view('backend.user.create_user');
    }
    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 'active',
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
    public function updatePassword(Request $request)
    {
        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:5'
        ]);
        //Match the old password
        if (!Hash::check($request->old_password, Auth::user()->password)) {

            $notification = array(
                'message' => 'Current Does not match',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        /// Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password changed succesfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    public function changeUserPassword($id)
    {
        $user = User::findOrFail($id);
        return view('users.change_password', compact('user'));
    }
    public function status($id)
    {
        $user = User::findOrFail($id);
        if ($user->status === 'active') {
            $user->status = 'inactive';
        } else {
            $user->status = 'active';
        }
        $user->update([
            'status' => $user->status,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Status changed succesfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
