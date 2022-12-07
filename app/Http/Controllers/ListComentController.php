<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListComent;
use App\Models\User;
use App\Models\Lista;

class ListComentController extends Controller
{
    //

    public function store (Request $request, $id){

        $listcoment = new ListComent();
    
        $listcoment->coment = $request->coment;

        $lista = Lista::findOrFail($id);
        $listcoment->lista_id = $lista->id;

        $user = auth()->user();
        $listcoment->user_id = $user->id;
        
        $listcoment->save();

        return redirect('/lista');
    }

    public function destroy($id){

        ListComent::findOrFail($id)->delete();
        return redirect('/lista');

    }
}
