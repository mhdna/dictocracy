<?php

namespace App\Http\Controllers;

use App\Models\Definition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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

        $lastWeek = Carbon::now()->subDays(7);
        $lastWeekDefinitionsCount = Definition::where('is_approved', true)->where('created_at', '>=', $lastWeek)->count();

        return view('home', [
            'definitions' => $definitions,
            'last_week_definitions_count' => $lastWeekDefinitionsCount
        ]);
    }
}
