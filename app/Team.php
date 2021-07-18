<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'descricao','imagem', 'pontos_equipa'
    ];
    public $timestamps = false;
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

}
