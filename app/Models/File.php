<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'titre_fr',
        'file_path',
        'file_path_fr',
        'etudientId',
    ];

    static public function selectFiles(){

        $lg = "";
        if(session()->has('locale') && session()->get('locale') == 'fr'){
            $lg = '_fr';
        }
        $query = File::Select('*', 
        DB::raw('(case 
        when titre'.$lg.' is null then titre else titre'.$lg.' end) as titre '))
        ->orderBy('created_at', 'desc')
        ->get();
        return $query;
    } 
}
