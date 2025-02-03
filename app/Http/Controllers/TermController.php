<?php

namespace App\Http\Controllers;

use App\Models\Definition;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function term(string $term)
    {
        $definitions = Definition::whereHas('term', function ($query) use ($term) {
            $query->where('term', $term);
        })->without('term')->get();

        return view('definitions.term_page', [
            'term' => $term,
            'definitions' => $definitions
        ]);
    }
    public function termStartsWith(Request $request)
    {
        $letter = $request->query('letter', '');

        $terms = $letter
            ? Term::where('term', 'like', $letter . '%')->get()
            : Term::all();

        return view('definitions.index', [
            'terms' => $terms
        ]);
    }
}
