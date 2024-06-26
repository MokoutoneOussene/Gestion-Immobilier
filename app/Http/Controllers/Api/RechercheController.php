<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Locataire;
use Illuminate\Http\Request;

class RechercheController extends Controller
{

    public function searchLocataires(Request $request)
    {
        $search = $request->get('q');
        $page = $request->get('page', 1);
        $resultCount = 25;

        $offset = ($page - 1) * $resultCount;

        $items = Locataire::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($resultCount)
            ->get();

        $count = Locataire::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'like', '%' . $search . '%')->count();

        return response()->json([
            'items' => $items,
            'total_count' => $count,
        ]);
    }
}
