<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diario;

class DiarioController extends Controller
{
    //

     //
     public function index(){
 
        $search = request('search');
 
        if($search) {
            $diario = Diario::where([
                ['nome', 'like', '%'.$search."%"]
            ])->get();
        } else{
 
            $diario = Diario::all();
        }
        return $diario;
    }
 
    public function store (Request $request){
 
        $diario = new Diario();
   
        $diario->nome = $request->nome;
        $diario->texto = $request->texto;
        $diario->humor = $request->humor;
        $diario->date = $request->date;
   
        if($request->hasFile('image') && $request->file('image')->isValid()){
   
            $requestImage = $request->image;
   
            $extenssion = $requestImage->extension();
   
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extenssion;
   
            $requestImage->move(public_path('/img'), $imageName);
   
            $diario->image = $imageName;
        }
 
        $diario->save();
        return redirect('/diario');
       }
 
       public function destroy($id){
 
        Diario::findOrFail($id)->delete();
        return redirect('/diario');
    }
 
    public function edit($id){
 
        $diario = Diario::findOrFail($id);
 
        return view('auth.editdiario', ['diario' => $diario]);
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
 
        Diario::findOrFail($request->id)->update($data);
        return redirect('/diario');
    }

}
