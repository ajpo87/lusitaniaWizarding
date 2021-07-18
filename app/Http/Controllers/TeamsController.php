<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
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

    public function getTeams(){
        $teams = DB::select('select * from teams');
        return view('home',['teams'=>$teams]);
    }

    public function index(){
            return view('select_team');
    }

    
}
