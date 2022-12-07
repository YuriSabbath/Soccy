<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SugestoesController extends Controller
{
    //

    public function index(){

        $search = request('search-requests');

        if($search) {

            $users = User::where([
                ['name', 'like', '%'.$search."%"]
            ])
            ->where('id', '!=', auth()->id())
            ->get();
        
    } else{

        $users = User::when(auth()->check(), function($query) {
            $query->where('id', '!=', auth()->id())->orderBy('id', 'asc')
            ->take(4)//quantidade de post a serem mostrados
            ->get();
        })->paginate(); 
    
    }
        
    return ["users"=>$users];
    }
}
