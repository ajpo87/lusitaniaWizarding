<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Image;

class ImageController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function CriarImagem() {
        return view('image.create');
    }

    public function save(Request $request){
        //conseguir utilizador identificado
        $user =\Auth::user();
        $id  = $user->id;

        //validacao
         $validate = $this->validate($request,[
             'description' =>'required', 'string', 
             'image_path' => 'required|image'
             ]);
    
       $image_path = $request->file('image_path');
       $description = $request->input('description');

       //atribuir valores ao objecto

        $image = new Image();
        $image ->user_id = $user->id;
        $image->image_path =null;
        $image->description = $description;    


         //subir imagem
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        //Executar consulta 
        $image->save();

        return redirect()->route('home')->with(['message' =>'Imagem carregada corretamente']);

    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file,200);

    }

}
