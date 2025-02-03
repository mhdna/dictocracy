<?php

namespace App\Http\Controllers;

use App\Models\Definition;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $definitions = Definition::where('is_approved', true)->latest()->paginate(16);
        $user_definitons = auth()->check() ? auth()->user()->definitions()->limit(10)->get() : collect();

        $lastWeek = Carbon::now()->subDays(7);
        $lastWeekDefinitionsCount = Definition::where('is_approved', true)->where('created_at', '>=', $lastWeek)->count();

        return view('home', [
            'definitions' => $definitions,
            'user_definitions' => $user_definitons,
            'last_week_definitions_count' => $lastWeekDefinitionsCount
        ]);
    }
}
