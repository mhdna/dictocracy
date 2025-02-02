<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Dialect;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Models\Term;
use App\Models\Definition;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware('permission:definition-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:definition-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:definition-delete', ['only' => ['destroy']]);
    }


    // TODO this must be something different I think (same as home page for now)
    public function index()
    {
        $definitions = Definition::paginate(10);
        $user_definitons = auth()->check() ? auth()->user()->definitions()->limit(15)->get() : collect();

        $lastWeek = Carbon::now()->subDays(7);
        $lastWeekDefinitionsCount = Definition::where('created_at', '>=', $lastWeek)->count();

        return view('home', [
            'definitions' => $definitions,
            'dialects' => Dialect::all(),
            'user_definitions' => $user_definitons,
            'last_week_definitions_count' => $lastWeekDefinitionsCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('definitions.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'term' => 'required',
            'definition' => 'required',
        ]);

        $term = Term::firstOrCreate(['term' => $request->term]);

        Definition::create([
            'user_id' => auth()->id(),
            'term_id' => $term->id,
            'definition' => $request->definition,
            'example' => $request->example ?? ''
        ]);


        return redirect()->route('definitions.index')
            ->with('success', 'definition created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\definition  $definition
     * @return \Illuminate\Http\Response
     */
    public function edit(definition $definition): View
    {
        return view('definitions.edit', compact('definition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\definition  $definition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, definition $definition): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $definition->update($request->all());

        return redirect()->route('definitions.index')
            ->with('success', 'definition updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\definition  $definition
     * @return \Illuminate\Http\Response
     */
    public function destroy(definition $definition): RedirectResponse
    {
        $definition->delete();

        return redirect()->route('definitions.index')
            ->with('success', 'definition deleted successfully');
    }

    public function term_id(Request $request)
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
        })->without('term')->get();

        return view('definitions.term_page', [
            'term' => $term,
            'definitions' => $definitions
        ]);
    }
}
