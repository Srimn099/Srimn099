<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller {
    public function index() {
        return view('dashboard/users/index', [
            'title' => 'All Users',
            'users' => User::all()
        ]);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        return view('dashboard/users/show', [
            'title' => 'User Detail',
            'user' => User::findOrFail($id),
        ]);
    }

    public function edit($id) {
        return view('dashboard/users/edit', [
            'title' => 'User Edit',
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request, User $user) {
        $rules = [
            'name' => 'required',
            'image' => 'image|file|max:1024',
            'role' => 'required'
        ];

        if($request->username != $user->username) {
            $rules['username'] = 'required|min:6|unique:users';
        }

        if($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|min:6|unique:users';
        }

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage != 'profile-images/default-profile-image.png') {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('profile-images');
        } else {
            $validated['image'] = 'profile-images/default-profile-image.png';
        }

        User::where('id', $user->id)->update($validated);

        if(auth()->user()->role == 'admin'){
            return back()->with('success', 'User changed successfully!');
        } else {
            return back()->with('success', 'Profile changed successfully!');
        }
    }

    public function key(Request $request, User $user) {
        return view('dashboard/users/keyedit', [
            'title' => 'Key Edit',
            'user' => User::findOrFail($user->id)
        ]);
    }

    public function keyupdate(Request $request, User $user) {
        $request->validate([
            'current' => 'required|min:6',
            'new' => 'required|min:6',
            'confirm' => 'required|min:6',
        ]);

        if ($request->new != $request->confirm){
            return back()->with('failed', 'New and confirm password doesn\'t match!');
        }
        
        $verifyCurrent = password_verify($request->current, $user->password);

        if ($verifyCurrent == true){
            User::whereId($user->id)->update([ 'password' => bcrypt($request->new) ]);
            return back()->with('success', 'Password changed successfully!');
        } else {
            return back()->with('failed', 'The current password you entered is incorrect. Please try again!');
        }

    }

    public function destroy(User $user) {
        if($user->image != 'profile-images/default-profile-image.png') {
            Storage::delete($user->image);
        }
        User::destroy($user->id);
        return redirect('dashboard/users')->with('success', 'User has been deleted!');
    }
}
