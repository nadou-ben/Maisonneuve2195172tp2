<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudient;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = Ville::selectVilles();
        $etudiants= DB::table('etudients')
        ->join('users', 'users.id', '=', 'etudients.id')
        ->select('users.*', 'etudients.*')
        ->get();
       return view('etudiant.index', ['etudiants' => $etudiants,'villes' => $villes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $villes = Ville::selectVilles();

        return view('etudiant.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|min:2|unique:users',
            'email' => 'required|email|unique:users'
        ]);
        
        $request->validate([
            'adresse' => 'required|regex:/([- ,\/0-9a-zA-Z]+)/',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date_naissance' => 'required|date'
           
        ]);
        $user =User::create([
          
            'name' => $request->name,
             'email' => $request->email,
         ]);
        $id_eudiant = DB::getPdo()->lastInsertId();

        $etudients = DB::table('etudients')
                     ->insert( array(
                        'id' => $id_eudiant,
                        'adresse' => $request->adresse,
                        'phone' => $request->phone,
                        'date_naissance' => $request->date_naissance,
                        'villeId' => $request->villeId
                         )
                     );
                   
       $etudient = Etudient::all();
       

        return redirect(route('etudiant.show', $id_eudiant));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function show(Etudient $etudient)
    {
        
        $villes = Ville::selectVilles();
         $user = DB::table('etudients')
        ->join('users', 'users.id', '=', 'etudients.id')
        ->select('users.*', 'etudients.*')
        ->WHERE('users.id','=', $etudient->id)
        ->get();
       return view('etudiant.show', ['user' => $user[0],'villes' => $villes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudient $etudient)
    {
        $villes = Ville::selectVilles();
        
        $user = DB::table('etudients')
        ->join('users', 'users.id', '=', 'etudients.id')
        ->select('users.*', 'etudients.*')
        ->WHERE('users.id','=', $etudient->id)
        ->get();
        return view('etudiant.edit', ['etudient' => $etudient,'user' => $user[0],'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudient $etudient)
    {
        $request->validate([
            'name' => 'required|max:30|min:2',
            'email' => 'required|email',
            
        ]);
       

         $request->validate([
            'adresse' => 'required|regex:/([- ,\/0-9a-zA-Z]+)/',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date_naissance' => 'required|date|nullable',
            'villeId' => 'required|exists:villes,id',
        ]);
        $user = DB::table('users')
        ->WHERE('users.id','=', $etudient->id)
         ->update( array(
            'name' => $request->name,
            'email' => $request->email
             )
         );
         $etudient->update([
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'date_naissance' => $request->date_naissance,
            'villeId' => $request->villeId
        ]);

        return redirect(route('etudiant.show', $etudient->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudient $etudient)
    {
        
        $etudient->delete();
        $id= $etudient->id;
        $user = DB::table('users')
        ->WHERE('users.id','=', $id)
        ->delete();
        return redirect(route('etudiant', $user ));
    }
}
