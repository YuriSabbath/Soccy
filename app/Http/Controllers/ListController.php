<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lista;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    //

    public function index(){

        $search = request('search-list');

        if($search) {
            $lista = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where([
                ['topico', 'like', '%'.$search."%"]
            ])->get();
        } else{

            $lista = 
            DB::table('listas')
            ->join('users', 'listas.user_id', '=', 'users.id')
            ->where('user_id', auth()->id())
            ->get()
            ->take(4)
            ->reverse();
        }
        return $lista;
    }

    public function store (Request $request){

        $lista = new Lista();
    
        $lista->topico = $request->topico;
        $lista->nome = $request->nome;
        $lista->descricao = $request->descricao;
        $lista->item1 = $request->item1;
        $lista->item2 = $request->item2;
        $lista->item3 = $request->item3;
        $lista->item4 = $request->item4;
        $lista->item5 = $request->item5;
        $lista->item6 = $request->item6;
        $lista->item7 = $request->item7;
        $lista->item8 = $request->item8;
        $lista->item9 = $request->item9;
        $lista->item10 = $request->item10;
       

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
    
            $extenssion = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extenssion;
    
            $requestImage->move(public_path('/img'), $imageName);
    
            $lista->image = $imageName;
        }

        $user = auth()->user();
        $lista->user_id = $user->id;

        $lista->save();
        return redirect('/lista');
    }

    public function destroy($id){

        Lista::findOrFail($id)->delete();
        return redirect('/lista');
    }

    public function edit($id){

        $lista = Lista::findOrFail($id);

        return view('auth.editlista', ['lista' => $lista]);
    }

    public function update(Request $request){

        $data = $request->all();

        //Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

        $requestImage = $request->image;

        $extenssion = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extenssion;

        $requestImage->move(public_path('/img'), $imageName);

        $data['image'] = $imageName;
    }

        Lista::findOrFail($request->id)->update($data);
        return redirect('/lista');
    }
}
