<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function store(Request $request){
        //conseguir utilizador identificado
        $user =\Auth::user();
        $id  = $user->id;

       $image_id = $request->input('image_id');
       $content = $request->input('content');

       

       //atribuir valores ao objecto

        $comment = new Comment();
        $comment ->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;    

        //Executar consulta 
        $comment->save();

        return redirect()->route('image.detail',['id' =>$image_id])->with(['message' =>'Comentário Adicionado']);

    }
}
