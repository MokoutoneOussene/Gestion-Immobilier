<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bailleur;
use App\Models\Encaissement;
use App\Models\Immeuble;
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
        $bailleursId = Bailleur::latest()->pluck('id');
        $immeubles = Immeuble::latest()->with('maisons.location')->whereIn('bailleurs_id', $bailleursId)->get();

<<<<<<< HEAD
        $immeubles->each(function ($immeuble) {
            $immeuble->maisons->load('location.Encaissement');
        });

        $immeubles->each(function ($immeuble) {
            $totalEncaissement = 0;
            foreach ($immeuble->maisons as $maison) {
                if ($maison->location && $maison->location->Encaissement) {
                    $totalEncaissement += $maison->location->Encaissement->montant;
                }
            }
            $immeuble->totalEncaissement = $totalEncaissement;
        });

=======
        // // Charger les locations pour chaque maison de chaque immeuble
        $immeubles->each(function ($immeuble) {
            $immeuble->maisons->load('location.Encaissement');
        });

        // dd($immeubles);
>>>>>>> 4350dc4dd4d50f733b0bd84e2d2367820afba2e0
        return view('pages.encaissements.etat_general', compact('immeubles'));
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
        $finds = Encaissement::find($id);

        return view('pages.encaissements.edit', compact('finds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $encaiss = Encaissement::find($id);
        $encaiss->update([
            'date_encaissement' => $request->date_encaissement,
            'montant' => $request->montant,
            'periode' => $request->periode,
            'annee' => $request->annee,
            'operation_terrain' => $request->operation_terrain ?? false,
            'users_id' => $request->users_id,
        ]);

        emotify('success', ' Encaissement modifié avec success !');
        return redirect()->route('Gestion_encaissements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $encaiss = Encaissement::find($id);
        $encaiss->delete();

        emotify('error', ' Encaissement supprimer avec success !');
        return redirect()->route('Gestion_encaissements.index');
    }
}
