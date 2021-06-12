<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;

class UserController extends Controller
{

    public function config(){
        return view('user.config');
    }

    public function change_password(){
        return view('user.change_password');
    }

    public function update(Request $request){
       
        
        //conseguir utilizador identificado
        $user =\Auth::user();
        $id  = $user->id;
        
        //validaçao do formulario
        $validate = $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users,email,'.$id
        ]);
        
       //recolhe dados do formulario
        $name = $request->input('name');
        $email = $request->input('email');


        //colocar novos dados no objecto user
        $user->name = $name;
        $user->email = $email;

         //subir imagem
         $image_path = $request->file('image_path');
        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            $user->image = $image_path_name;
        }
        //Executar consulta 
        $user->update();

        return redirect()->route('config')->with(['message' =>'Utilizador atualizado corretamente']);
    }

    public function update_password(Request $request){
        //conseguir utilizador identificado
        $user =\Auth::user();
        $id  = $user->id;
        
        //validaçao do formulario
        $validate = $this->validate($request, [
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'confirm_password' =>  'required', 'string', 'min:8', 'confirmed'
        ]);
        
       //recolhe dados do formulario
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');

        
        if ( ($password === $confirm_password) && strlen($password) > 8 && strlen($confirm_password) > 8 ){
            $user->password = Hash::make($password);

            //Executar consulta 
            $user->update();

            return redirect()->route('home')->with(['message' =>'Password alterada com sucesso']);
        }
        else if( strlen($password) < 8 && strlen($confirm_password) < 8){
            return redirect()->route('change_password')->with(['message' =>'Erro ! Password no minino com 8 Carateres']);
        }else{
            return redirect()->route('change_password')->with(['message' =>'Erro ao guardar ! As passwords preenchidas diferentes']);
        }
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }
    
    public function profile($id){
        $user = User::find($id);
        return view('user.profile',['user'=>$user]);
    }

}
