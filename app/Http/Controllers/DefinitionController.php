<?php

namespace App\Http\Controllers;

use Definition as DefinitionDefinition;
use Illuminate\View\View;
use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware(function ($request, $next) {
            $this->middleware('permission:definition-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:definition-delete', ['only' => ['destroy']]);

            return $next($request);
        });
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

        $existingDefinition = Definition::where('user_id', auth()->id())
            ->where('term_id', $term->id)
            ->first();

        if ($existingDefinition) {
            return back()->with('error', 'You have already defined this term. You might try to edit it instead.');
        }


        Definition::create([
            'user_id' => auth()->id(),
            'term_id' => $term->id,
            'definition' => $request->definition,
            'example' => $request->example ?? ''
        ]);

        return redirect()->route('home')
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
            'definition' => 'required',
        ]);

        $updateData = $request->all();
        $updateData['is_approved'] = false; // definition waits approval again on edit
        $updateData['example'] = $updateData['example'] ?? ''; // example is optional

        $definition->update($updateData);

        return redirect()->route('home')
            ->with('success', 'definition updated successfully');
    }

    public function userDefinitions()
    {
        $user = Auth::user();
        $definitions = Definition::where('user_id', $user->id)->get();

        return view('definitions.user_definitions', [
            'definitions' => $definitions
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\definition  $definition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Definition $definition): RedirectResponse
    {
        $definition->delete();

        return redirect()->route('home')
            ->with('success', 'Your definition was deleted successfully.');
    }
}
