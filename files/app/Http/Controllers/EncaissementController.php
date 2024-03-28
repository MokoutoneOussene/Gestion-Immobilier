<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bailleur;
use App\Models\Encaissement;
use App\Models\Location;
use Illuminate\Http\Request;

class EncaissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encaissements = Encaissement::latest()->get();
        $locations = Location::latest()->get();

        $total = $encaissements->sum('montant');
        return view('pages.encaissements.encaissement', compact('encaissements', 'locations', 'total'));
    }

    /**
     * Display a listing of the resource.
     */
    public function etat_general()
    {
        $bailleurs = Bailleur::latest()->get();
        $encaissement = Encaissement::latest()->get();

        return view('pages.encaissements.etat_general', compact('encaissement', 'bailleurs'));
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $encaissements = Encaissement::latest()->get();
        $locations = Location::latest()->get();

        return view('pages.encaissements.create', compact('encaissements', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function date_filter(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        $locations = Location::latest()->get();
        $encaissements = Encaissement::whereDate('date_encaissement', '>=', $date_debut)->whereDate('date_encaissement', '<=', $date_fin)->get();
        $total = $encaissements->sum('montant');

        return view('pages.encaissements.encaissement', compact('encaissements', 'locations', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Encaissement::create([
            'code' => $request->code,
            'date_encaissement' => $request->date_encaissement,
            'montant' => $request->montant,
            'periode' => $request->periode,
            'annee' => $request->annee,
            'retard' => $request->retard,
            'operation_terrain' => $request->operation_terrain ?? false,
            'locations_id' => $request->locations_id,
            'users_id' => $request->users_id,
        ]);

        emotify('success', ' Encaissement ajouté avec success !');
        return redirect()->route('Gestion_encaissements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = Encaissement::find($id);

        return view('pages.encaissements.show', compact('finds'));
    }

    /**
     * Display the specified resource.
     */
    public function print(string $id)
    {
        $finds = Encaissement::find($id);

        return view('pages.encaissements.print_encaissement', compact('finds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
