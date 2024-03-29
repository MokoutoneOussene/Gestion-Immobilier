<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Immeuble;
use App\Models\Maison;
use Illuminate\Http\Request;

class MaisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Maison::latest()->get();
        $immeubles = Immeuble::latest()->get();
        return view('pages.maisons.maison', compact('collection', 'immeubles'));
    }

    /**
     * Display a listing of the resource.
     */
    public function maison_libre()
    {
        $collection  = Maison::where('situation', '=', 'Libre')->get();
        $immeubles = Immeuble::latest()->get();
        return view('pages.maisons.maison', compact('collection', 'immeubles'));
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
        Maison::create($request->all());

        emotify('success', 'Maison ajoutée avec success !');
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
