<?php

namespace App\Http\Controllers;

use App\Models\Definition;
use App\Models\Dialect;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); // don't open until logged in
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $definitions = Definition::paginate(10);
        $user_definitons = auth()->check() ? auth()->user()->definitions()->limit(15)->get() : collect();

        return view('home', [
            'definitions' => $definitions,
            'dialects' => Dialect::all(),
            'user_definitions' => $user_definitons
        ]);
    }
}
