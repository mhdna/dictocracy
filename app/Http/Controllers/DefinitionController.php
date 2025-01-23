<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;
use App\Models\Definition;
use Illuminate\Support\Facades\Auth;
use App\Models\Dialect;
use App\Models\User;
use App\Models\Term;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DefinitionController extends Controller
{
    public function home()
    {
        $definitions = Definition::paginate(10);
        $user_definitons = auth()->check() ? auth()->user()->definitions()->get() : collect();

        return view('definitions.home', [
            'definitions' => $definitions,
            'dialects' => Dialect::all(),
            'user_definitions' => $user_definitons
        ]);
    }

    public function index(Request $request)
    {
        $letter = $request->query('letter', '');

        $terms = $letter
            ? Term::where('term', 'like', $letter . '%')->get()
            : Term::all();

        return view('definitions.index', [
            'terms' => $terms
        ]);
    }

    public function term(string $term)
    {
        $definitions = Definition::whereHas('term', function ($query) use ($term) {
            $query->where('term', $term);
        })->withOnly('term')->get();

        return view('definitions.term_page', [
            'term' => $term,
            'definitions' => $definitions
        ]);
    }

    public function profile(string $user_id)
    {
        $user = User::findOrFail($user_id);
        return view('definitions.profile', [
            'user' => $user
        ]);
    }
}
