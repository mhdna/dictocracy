<?php

namespace App\Http\Controllers;

use App\Models\Definition;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller
{
    public function term(string $term)
    {
        // TODO sort by upvotes
        $definitions = Definition::whereHas('term', function ($query) use ($term) {
            $query->where('term', $term);
        })->without('term')->get();

        return view('definitions.term_page', [
            'term' => $term,
            'definitions' => $definitions
        ]);
    }

    public function userterm(string $term)
    {
        $user = Auth::user();
        $definition = Definition::whereHas('term', function ($query) use ($term) {
            $query->where('term', $term);
        })->where('user_id', $user->id)->with('term')->first();

        return view('definitions.user_definition', [
            'term' => $term,
            'definition' => $definition
        ]);
    }

    public function termStartsWith(Request $request)
    {
        $letter = $request->query('letter', '');

        $terms = $letter
            ? Term::where('term', 'like', $letter . '%')->orderBy('term', 'asc')->get()
            : Term::all();

        return view('definitions.index', [
            'terms' => $terms
        ]);
    }
}
