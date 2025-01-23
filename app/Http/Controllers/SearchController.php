<?php

namespace App\Http\Controllers;

use App\Models\Definition;
use App\Models\Term;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $terms = Term::where('term', 'Like', '%' . $query . '%')->get(); // mhd: pagination won't work easily on those

        return view('definitions.search_results', [
            'query' => $query,
            'terms' => $terms,
        ]);
    }

    public function autoComplete(Request $request): JsonResponse
    {
        $query = $request->get('query');
        $data = Term::select("term")->where('term', 'LIKE', '%' . $query . '%')
            ->take(15)->get()->pluck('term'); // mhd: pluck is for getting the term as a string and not get all of them as an array (without it search wasn't working)
        // $data = Definition::select("definition")->where('definition', 'LIKE', '%' . $request->get('query') . '%')
        //     ->take(15)->get()->pluck('definition');

        return response()->json($data);
    }
}
