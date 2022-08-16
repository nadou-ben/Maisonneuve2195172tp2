<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['titre','titre_fr', 'contenu','contenu_fr', 'etudientId'];

    static public function selectArticles(){

        $lg = "";
        if(session()->has('locale') && session()->get('locale') == 'fr'){
            $lg = '_fr';
        }

        $query = Article::Select('*', 
        DB::raw('(case 
        when titre'.$lg.' is null then titre else titre'.$lg.' end) as titre '),
        DB::raw('(case when contenu'.$lg.' is null then contenu else contenu'.$lg.' end) as contenu '))
        ->orderBy('created_at', 'desc')
        ->get();
        return $query;
    } 
}
