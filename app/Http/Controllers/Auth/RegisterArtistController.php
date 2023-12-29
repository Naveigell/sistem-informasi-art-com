<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterArtistController extends Controller
{
    public function index()
    {
        return view('auth.register-artist');
    }
    
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => 'artist',
            'password' => Hash::make($request['password']),
        ]);
        
        auth()->login($user);
        
        return redirect()->to('/login');
    }
}
