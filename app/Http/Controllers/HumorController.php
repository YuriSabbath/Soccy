<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Humor;
use Illuminate\Support\Facades\DB;

class HumorController extends Controller
{
    public function index(){

        $humor = 
            DB::table('humors')
            ->join('users', 'humors.user_id', '=', 'users.id')
            ->where('user_id', auth()->id())
            ->get()
            ->take(4)
            ->reverse();
        
        return $humor;
    }

    public function store (Request $request){

        $humor = new Humor();

        $humor->humor = $request->humor;

        $user = auth()->user();
        $humor->user_id = $user->id;
    
        $humor->save();
        return redirect('/humor');
    }

    public function destroy($id){

        Humor::findOrFail($id)->delete();
        return redirect('/humor');
    }

    public function update(Request $request, $id){

        //1. buscar pela medida que sera alterada
        $humor = Humor::findOrFail($id);

        //2. realizar as alterações
        $humor->humor = $request->humor;

        //3. salvar as alterações no bd(update)
        $humor->update();

          //4. redirecionar para pagina de medidas
          return redirect('/humor');
    }
        
}
