<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 
            'unique:users'],
            'username' => ['required', 'string', 'max:255'],
            'pronoun' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'pronoun' => $request->pronoun,
            'bio' => $request->bio,
            'date' => $request->date,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update_avatar($id, Request $request){

        $icon = User::findOrfail($id);

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
    
            $extenssion = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extenssion;
    
            $requestImage->move(public_path('/img'), $imageName);
    
            $icon->avatar = $imageName;
        }
    
            $icon->save();
            return redirect('/edit-profile');
    }

}
