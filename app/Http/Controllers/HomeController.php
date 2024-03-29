<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

     public function SelectionaEquipa($id_equipa){
       
        $nome_equipa = DB::table('teams')->select('descricao')->where('id',$id_equipa)->first();
        $team_name = get_object_vars($nome_equipa);

         return $team_name['descricao'];
     }

     public function actualizarUserFirtLogin(){
        $user =\Auth::user();
        $user->first_time_login = false;
         //Executar consulta 
         $user->update();
    }

    public function index()
    {
         $user =\Auth::user();
         if( $user['first_time_login'] == true  ){
             $equipa = $this->SelectionaEquipa($user['id_team']);
             $atualiza_user_login = $this->actualizarUserFirtLogin();
             return redirect()->route('select_team')->with(['message' =>'Selecionado para os: '.$equipa]);
        }
         else{

            $teams = DB::select('select * from teams');
             $images = Image::Orderby('id','desc')->paginate(2); 
            return view('home', ['images'=>$images, 'teams'=>$teams] );
         }

        
    }



    
}
