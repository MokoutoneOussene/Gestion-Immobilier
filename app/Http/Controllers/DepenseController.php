<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depense;
use App\Models\User;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depenses = Depense::latest()->get();

        $total = $depenses->sum('montant');
        return view('pages.depenses.depense', compact('depenses', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function date_filter(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        $depenses = Depense::whereDate('date', '>=', $date_debut)->whereDate('date', '<=', $date_fin)->get();
        $total = $depenses->sum('montant');

        return view('pages.depenses.depense', compact('depenses', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Depense::create($request->all());

        emotify('success', ' Dépense courante ajoutée avec success !');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
