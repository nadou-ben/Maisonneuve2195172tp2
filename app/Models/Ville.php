<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'nom_fr'];

    static public function selectVilles(){

        $lg = "";
        if(session()->has('locale') && session()->get('locale') == 'fr'){
            $lg = '_fr';
        }

        $query = Ville::Select('id', 
        DB::raw('(case 
        when nom'.$lg.' is null then nom else nom'.$lg.' end) as nom'))
        ->orderBy('nom')
        ->get();
        return $query;
    } 
}
