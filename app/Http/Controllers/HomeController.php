<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() 
    {
        $postController = new PostController();
        $userController = new SugestoesController();
        $comentController = new ComentController();
        
        return view('auth.home', [ 
            'post' => $postController->index()["post"],
            'coment' => $comentController->index()["coment"],
            'users' => $userController->index()["users"],
        ]);
    }

    public function profile() 
    {
        $profileController = new ProfileController();
        $userController = new UserController();
        $friendsController = new FriendsController();

        return view('auth.profile', [
            'post' => $profileController->index()["post"],
            'users' => $userController->index()["users"],
            'friends' => $friendsController->index()["friends"]
        ]);
    }
    

    public function userphoto(){
        return view('auth.user-photo');
    }

    public function agenda()
    {
        $AgendaController = new AgendaController();
        $userController = new UserController();

        return view('auth.agenda', [
            'agenda' => $AgendaController->index()["agenda"],
            'users' => $userController->index()["users"]
        ]);
    }

    public function list(){
        $listController = new ListController();
        $userController = new SugestoesController();

        return view('auth.list', [
            'lista' => $listController->index(),
            'users' => $userController->index()["users"],
        ]);
    }

    public function humor(){
        $humorController = new HumorController();
        $userController = new SugestoesController();

        return view('auth.humor', [
            'humor' => $humorController->index(),
            'users' => $userController->index()["users"],
        ]);
    }


    public function diario(){
        $diarioController = new DiarioController();

        return view('auth.diario', [
            'diario' => $diarioController->index()
        ]);
    }

    public function show($id){
         //buscar pela medida
        $profile = User::findOrFail($id);
        $profile = User::where('id', $profile->id)->first();

        $post = 
            DB::table('posts')
            ->leftjoin('users', 'posts.user_id', '=', 'users.id')
            ->where('user_id', '=', $profile->id)
            ->get()
            ->take(4)
            ->reverse();

        $friends = 
            DB::table('user_follower')
            ->leftJoin('users', 'user_follower.following_id', '=', 'users.id')
            ->get()
            ->where('follower_id', '=', $profile->id);

        $users = User::when(auth()->check(), function($query) {
            $query->where('id', '!=', auth()->id())->orderBy('id', 'asc')
            ->take(4)//quantidade de post a serem mostrados
            ->get();
            })->paginate(); 
        

          //return view('auth.home', ['post' => $post]);
        return view('auth.profilefeed', ['profile' => $profile, 'post' => $post, 'friends' => $friends, 'users' => $users
        ]);
    }

    public function comment() 
    {
        $postController = new PostController();
        $userController = new SugestoesController();
        $comentController = new ComentController();
        
        return view('auth.comment', [ 
            'post' => $postController->index()["post"],
            'coment' => $comentController->index()["coment"],
            'users' => $userController->index()["users"],
        ]);
    }

}