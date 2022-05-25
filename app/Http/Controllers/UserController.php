<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            if (Auth::user()->isAdmin()){
                $users = User::all();
            } else {
                $users = User::where('id',Auth::user()->id)->get();
            }
            return view('users.index', compact('users'));
        }
        return redirect()->route('posts.index')->with('warning','Access denied');
    }

    public function update(Request $request, $id)
    {
        if ($file = $request->file('avatar')) {
            //$file = $request->file('avatar'); 
            $upload_folder = 'public/image';
            $path = Storage::putFile($upload_folder, $file);
            $user = User::find($id);
            $user->avatar = Storage::url($path);
            $user->save();
        }
        return redirect()->route('users.index')->with('success','User avatar updated');
    }
}
