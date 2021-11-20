<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Userdata;

class UserController extends Controller
{
    public function getUserData(){

        $users = Userdata::all();
        return view('userdata', ['users' => $users]);
    }

    public function createUserData(Request $request){

        $request->validate([
            'image' => 'required | mimes:jpg,jpeg,png,gif | max:200000',
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]*$/'],
            'profession' => ['required', 'regex:/^[a-zA-Z0-9\s]*$/'],
            'phone' => 'required | integer | min:10',
            'email' => 'required | email',
            'address' => 'required'
        ]);
        $userdata = new Userdata();
        if($request->hasFile('image')){
            $destination = 'public/images';
            $image = uniqid('', true) . '.' . $request->file('image')->guessClientExtension();
            $request->file('image')->storeAs($destination, $image);
            $userdata->image = $image;
        }
        $userdata->name = $request->name;
        $userdata->profession = $request->profession;
        $userdata->phone = $request->phone;
        $userdata->email = $request->email;
        $userdata->address = $request->address;
        $userdata->save();
        $request->session()->flash('status', 'New user has been created successfully');
        return redirect('/');
    }

    public function userData($id){

        $user = UserData::find($id);
        return view('moreinfo', ['user' => $user]);
    }

    public function getEditData($id){

        $user = UserData::find($id);
        return view('edit', ['user' => $user]);
    }

    public function editUserData(Request $request){

        $request->validate([
            'image' => 'nullable | mimes:jpg,jpeg,png,gif | max:200000',
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]*$/'],
            'profession' => ['required', 'regex:/^[a-zA-Z0-9\s]*$/'],
            'phone' => 'required | integer | min:10',
            'email' => 'required | email',
            'address' => 'required'
        ]);
        $editUser = Userdata::find($request->id);
        if($request->hasFile('image')){
            $destination = 'public/images';
            $image = uniqid('', true) . '.' . $request->file('image')->guessClientExtension();
            // delete old image file
            Storage::disk('public')->delete('images/' . $editUser->image);
            // create and store new image
            $request->file('image')->storeAs($destination, $image);
            $editUser->image = $image;
        }
        $editUser->name = $request->name;
        $editUser->profession = $request->profession;
        $editUser->phone = $request->phone;
        $editUser->email = $request->email;
        $editUser->address = $request->address;
        $editUser->save();
        $request->session()->flash('status', 'User data has been updated successfully');
        return redirect("moreinfo/{$request->id}");
    }

    public function deleteUserData($id){

        $user = Userdata::find($id);
        $user->delete();
        // delete image file
        Storage::disk('public')->delete('images/' . $user->image);
        Session::flash('status', 'User data has been deleted');
        return redirect('/');
    }

    public function searchUserData(Request $request){

        $users = Userdata::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('profession', 'like', '%' . $request->search . '%')
            ->get();
        return view('userdata', ['users' => $users]);
    }
}
