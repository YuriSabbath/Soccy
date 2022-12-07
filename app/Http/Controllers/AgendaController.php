<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    //

    public function index(){

        $search = request('search');

        if($search) {
            $agenda = Agenda::where([
                ['nome', 'like', '%'.$search."%"]
            ])->get();
        } else{

            $agenda = 
            DB::table('agendas')
            ->join('users', 'agendas.user_id', '=', 'users.id')
            ->where('user_id', auth()->id())
            ->get()
            ->take(4)
            ->reverse();
        }
        return ["agenda"=>$agenda];
    }

    public function store (Request $request){

        $agenda = new Agenda();
    
        $agenda->date = $request->date;
        $agenda->nome = $request->nome;
        $agenda->descricao = $request->descricao;
        $agenda->lembrete = $request->lembrete;
      

        $user = auth()->user();
        $agenda->user_id = $user->id;

        $agenda->save();

        return redirect('/agenda');
    }

    public function destroy($id){

        Agenda::findOrFail($id)->delete();
        return redirect('/agenda');
    }

    public function edit($id){

        $agenda = Agenda::findOrFail($id);

        return view('auth.editagenda', ['agenda' => $agenda]);
    }

    public function update(Request $request){
       
        $data = $request->all();

        Agenda::findOrFail($request->id)->update($request->all());
        return redirect('/agenda');
    }
}
