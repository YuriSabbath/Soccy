<?php

namespace App\Http\Controllers;

use App\Http\Livewire;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::when(auth()->check(), function($query) {
            $query->where('id', '!=', auth()->id())->orderBy('id', 'asc')
            ->take(2)//quantidade de post a serem mostrados
            ->get();
        })->paginate(); 

        return view('users.index', compact('users'));
    }

    //Mostra as insformações do usuário
    public function show()
    {
        $users = User::when(auth()->check(), function($query) {
            $query->where('id', '!=', auth()->id());
        })->paginate();

        return view( 'auth.dashboard', compact('users'));
    }
}