<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Edit profile view
    public function viewEditProfile()
    {
        return view('artist.profile.edit');
    }

  
    // get user data from user id
    public function getUserData($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            
            abort(404);

        } else {
            // send data to view
            return view('artist.profile.index', [
                
                'user' => $user
            ]); 
        }
    }
     public function store(Request $request)
     {
        $request->validate([
            'name' => 'required',
         ]);
 
   
    
         
         if($request->hasFile('avatar')){
              $request->validate([
                  'avatar' => 'image |mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
             $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
     
             $request->avatar->move(public_path('avatars'), $avatarName);
         }

         if($request->old_password != null || $request->new_password != null || $request->password_confirmation != null){

             $request->validate([
                 'old_password' => 'required',
                 'new_password' => 'required|confirmed|min:8',
             ]);

             #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

        }
        

   
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'avatar' => $avatarName ?? null,
            'about_me' => $request->about_me ?? null,
            'phone_number' => $request->phone_number ?? null,
        ]);

    
 
         return redirect()->back()->with('status', 'Profile updated successfully.');
 
     }
}
