<?php

namespace App\Http\Controllers;

use App\Models\Etudient;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants=Etudient::all();
        $villes = Ville::all();
          //OUTER JOIN
      //   $etudiants = Etudient::select()
      //   ->leftJOIN('villes', 'etudients.villeId', '=', 'villes.id')
      //   ->get();

        return view('etudiant.index',['etudiants' =>$etudiants,'villes' => $villes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();

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

        $etudient =Etudient::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'villeId' => $request->villeId
        ]);

        return redirect(route('etudiant.show', $etudient ->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function show(Etudient $etudient)
    {
        $villes = Ville::all();
        return view('etudiant.show', ['etudient' => $etudient,'villes' => $villes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudient  $etudient
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudient $etudient)
    {
        $villes = Ville::all();
        return view('etudiant.edit', ['etudient' => $etudient,'villes' => $villes]);
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
        $etudient->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
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

        return redirect(route('etudiant'));
    }
}
