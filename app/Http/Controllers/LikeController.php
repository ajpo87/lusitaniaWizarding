<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($image_id){
         //conseguir utilizador identificado
         $user =\Auth::user();

         //verifica se ja existe like a
         $isset_like = Like::where('user_id',$user->id)->where('image_id',$image_id)->count();

         if($isset_like == 0) {
            $like = new Like;
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;
   
            $like->save();  

            return response()->json(['like'=>$like] );
         }else{
            return response()->json(['message'=>'ja existe um like'] );
         }
    }

    public function dislike($image_id){
         //conseguir utilizador identificado
         $user =\Auth::user();

         //verifica se ja existe like a
         $like = Like::where('user_id',$user->id)->where('image_id',$image_id)->first();

         if($like) {
            $like->delete();  
            return response()->json([
                                'like'=>$like,
                                'message'=>'Dislike Corretamente'
                                ]);
         }
         else{
            return response()->json(['message'=>'Like nao existe'] );
         }
    }
    public function likes(){
        $user =\Auth::user();

        $likes = Like::Orderby('id','desc')
                    ->where('user_id',$user->id)
                    ->paginate(2); 
        return view('like.likes', ['likes'=>$likes] );
    }
}
