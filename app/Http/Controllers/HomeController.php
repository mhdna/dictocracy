<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Definition;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {}

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
