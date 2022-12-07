<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgendaComent;
use App\Models\Agenda;
use App\Models\User;


class AgendaComentController extends Controller
{
    //

    public function store (Request $request, $id){

        $agendacoment = new AgendaComent();
    
        $agendacoment->coment = $request->coment;

        $agenda = Agenda::findOrFail($id);
        $agendacoment->agenda_id = $agenda->id;

        $user = auth()->user();
        $agendacoment->user_id = $user->id;
        
        $agendacoment->save();

        return redirect('/agenda');
    }

    public function destroy($id){

        AgendaComent::findOrFail($id)->delete();
        return redirect('/agenda');

    }
}
